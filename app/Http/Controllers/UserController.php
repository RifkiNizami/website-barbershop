<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Tampilkan Halaman Login (Unified untuk Admin & Customer)
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user());
        }

        return view('auth.login');
    }

    /**
     * Proses Login (Email + Password, redirect berdasarkan role)
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Coba autentikasi dengan email & password
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();

            return $this->redirectByRole($user);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah. Silakan coba lagi.',
        ])->onlyInput('email');
    }

    /**
     * Redirect berdasarkan role user
     */
    private function redirectByRole($user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin '.$user->name.'!');
        }

        return redirect()->route('user.dashboard')->with('success', 'Selamat datang kembali, '.$user->name.'!');
    }

    /**
     * Tampilkan Halaman Registrasi Member
     */
    public function showRegister()
    {
        return view('user.auth.register');
    }

    /**
     * Proses Registrasi Member Baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_whatsapp' => ['required', 'regex:/^[0-9]+$/'],
            'password' => 'required|string|min:4',
        ]);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->email,
            'phone' => $request->no_whatsapp,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);


        return redirect()->route('login')->with('success', 'Pendaftaran Member Berhasil! ');
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah keluar. Sampai jumpa kembali!');
    }

    /**
     * Halaman Dashboard Member
     */
    public function dashboard()
    {
        $currentUser = Auth::user();
        $userName = $currentUser ? $currentUser->name : 'Dimas Pratama';
        $userEmail = $currentUser ? $currentUser->email : 'dimas@gmail.com';

        // Stempel & Poin dari DB — hanya kunjungan milik user yang login
        $userBookingQuery = $currentUser
            ? Booking::where('user_id', $currentUser->user_id)
            : Booking::whereNull('user_id');

        $totalCompleted = (clone $userBookingQuery)->where('status', 'completed')->count();

        // Modulo 10: count resets after reaching 10 (0-9 stamps in current cycle)
        $stamps = $totalCompleted % 10;

        $member = [
            'name'           => $userName,
            'phone'          => $currentUser ? ($currentUser->phone ?? '-') : '-',
            'tier'           => 'Gold VIP Member',
            'loyalty_points' => $totalCompleted * 50,
            'stamps'         => $stamps,
            'max_stamps'     => 10,
            'favorite_barber' => 'Mas Rusdi (Master Barber)',
            'favorite_style'  => 'Taper Fade + Textured Quiff',
        ];

        // Booking mendatang — hanya milik user yang login
        $upcomingBookingModel = (clone $userBookingQuery)
            ->whereIn('status', ['confirmed', 'pending'])
            ->latest()
            ->first();

        $upcomingBooking = $upcomingBookingModel ? [
            'id'      => $upcomingBookingModel->booking_code,
            'db_id'   => $upcomingBookingModel->id,
            'service' => $upcomingBookingModel->layanan,
            'barber'  => $upcomingBookingModel->barber,
            'date'    => $upcomingBookingModel->tanggal ? $upcomingBookingModel->tanggal->format('d M Y') : 'Hari Ini',
            'time'    => $upcomingBookingModel->jam,
            'price'   => 'Rp '.number_format($upcomingBookingModel->harga, 0, ',', '.'),
            'status'  => $upcomingBookingModel->status,
        ] : null;

        // Riwayat potong rambut — hanya milik user yang login
        $pastBookings = (clone $userBookingQuery)->latest()->take(5)->get()->map(function ($b) {
            return [
                'id' => $b->booking_code,
                'db_id' => $b->id,
                'service' => $b->layanan,
                'barber' => $b->barber,
                'date' => $b->tanggal ? $b->tanggal->format('d M Y') : '-',
                'price' => 'Rp '.number_format($b->harga, 0, ',', '.'),
                'rating' => 5,
            ];
        });

        return view('user.dashboard', compact('member', 'upcomingBooking', 'pastBookings'));
    }

    /**
     * Form Booking Mandiri Member
     */
    public function createBooking()
    {
        $services = Service::where('is_active', true)->get();

        return view('user.bookings.create', compact('services'));
    }

    /**
     * Simpan Booking Mandiri
     */
    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            'layanan' => 'required|string',
            'barber' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $svc = Service::where('nama_layanan', $validated['layanan'])->first();
        $harga = $svc ? $svc->harga : 65000;

        $user = Auth::user();

        Booking::create([
            'booking_code' => 'BK-'.rand(1000, 9999),
            'nama_pelanggan' => $user ? $user->name : ($request->nama_pelanggan ?? 'Pelanggan Member'),
            'no_whatsapp' => $user ? ($user->phone ?? '081234567890') : '081234567890',
            'layanan' => $validated['layanan'],
            'barber' => $validated['barber'],
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'catatan' => $validated['catatan'] ?? null,
            'harga' => $harga,
            'status' => 'confirmed',
            'user_id' => $user ? $user->user_id : null,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Reservasi berhasil dibuat! Silakan datang 10 menit sebelum jadwal.');
    }

    /**
     * Riwayat Lengkap Booking Saya
     */
    public function bookingsIndex()
    {
        $currentUser = Auth::user();

        $query = $currentUser
            ? Booking::where('user_id', $currentUser->user_id)
            : Booking::query();

        $bookings = $query->latest()->paginate(8);

        return view('user.bookings.index', compact('bookings'));
    }

    /**
     * Detail Appointment / Reservasi Cukur
     */
    public function showBooking($id)
    {
        $booking = Booking::with('payment')->findOrFail($id);
        $currentUser = Auth::user();

        return view('user.bookings.show', compact('booking', 'currentUser'));
    }

    /**
     * Halaman Tagihan Pembayaran & Barcode Validasi (Payment Bill)
     */
    public function showPayment($id = null)
    {
        $currentUser = Auth::user();

        if ($id) {
            $booking = Booking::with('payment')->findOrFail($id);
        } else {
            // Jika tanpa ID, ambil booking aktif / mendatang milik user, atau booking terakhir
            $query = $currentUser
                ? Booking::where('user_id', $currentUser->user_id)
                : Booking::query();

            $booking = (clone $query)->whereIn('status', ['confirmed', 'pending'])->latest()->first();

            if (!$booking) {
                $booking = (clone $query)->latest()->first();
            }
        }

        if (!$booking) {
            return redirect()->route('user.bookings.index')->with('error', 'Tidak ada data reservasi untuk membuat tagihan pembayaran.');
        }

        // Pastikan entitas payment tersinkronisasi di tabel payment
        $payment = Payment::firstOrCreate(
            ['booking_id' => $booking->id],
            [
                'payment_method' => 'Cash / QRIS di Kasir',
                'amount' => $booking->harga,
                'payment_status' => ($booking->status === 'completed' ? 'paid' : 'unpaid'),
                'payment_date' => ($booking->status === 'completed' ? now() : null),
                'transaction_code' => 'TRX-' . strtoupper(substr(md5($booking->booking_code . $booking->id), 0, 8)),
            ]
        );

        // Jika status booking completed tapi status payment masih unpaid, sinkronkan
        if ($booking->status === 'completed' && $payment->payment_status !== 'paid') {
            $payment->update([
                'payment_status' => 'paid',
                'payment_date' => $payment->payment_date ?? now(),
            ]);
        }

        return view('user.payment.payment', compact('booking', 'payment', 'currentUser'));
    }

    /**
     * Batalkan Booking
     */
    public function destroyBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'cancelled']);

        return redirect()->route('user.bookings.index')->with('success', 'Booking '.$booking->booking_code.' berhasil dibatalkan.');
    }
}
