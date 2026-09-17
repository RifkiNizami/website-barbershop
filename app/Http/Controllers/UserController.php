<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Tampilkan Halaman Login Pelanggan
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        }
        return view('user.auth.login');
    }

    /**
     * Proses Login Pelanggan (Auth Session)
     */
    public function login(Request $request)
    {
        $request->validate([
            'no_whatsapp' => 'required|string',
        ]);

        // Login atau buat user otomatis berdasarkan nomor WA / HP
        $user = User::where('email', $request->no_whatsapp . '@member.com')
            ->orWhere('name', 'LIKE', '%' . $request->no_whatsapp . '%')
            ->first();

        if (!$user) {
            $user = User::create([
                'name' => 'Member ' . substr($request->no_whatsapp, -4),
                'email' => $request->no_whatsapp . '@member.com',
                'password' => Hash::make('password'),
            ]);
        }

        Auth::login($user);

        return redirect()->route('user.dashboard')->with('success', 'Selamat datang kembali, ' . $user->name . '!');
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
            'no_whatsapp' => 'required|string',
            'password' => 'required|string|min:4',
        ]);

        $user = User::create([
            'name' => $request->nama_lengkap,
            'email' => $request->no_whatsapp . '@member.com',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('user.dashboard')->with('success', 'Pendaftaran Member Berhasil! Selamat datang ' . $user->name . ' 💈');
    }

    /**
     * Logout Pelanggan
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Anda telah keluar dari Member Area.');
    }

    /**
     * Halaman Dashboard Member
     */
    public function dashboard()
    {
        $currentUser = Auth::user();
        $userName = $currentUser ? $currentUser->name : 'Dimas Pratama';
        $userEmail = $currentUser ? $currentUser->email : '081234567890@member.com';

        // Stempel & Poin dari DB
        $totalCompleted = Booking::where('status', 'completed')->count();
        $stamps = ($totalCompleted % 10) ?: 7;

        $member = [
            'name' => $userName,
            'phone' => str_replace('@member.com', '', $userEmail),
            'tier' => 'Gold VIP Member',
            'loyalty_points' => 380 + ($totalCompleted * 50),
            'stamps' => $stamps,
            'max_stamps' => 10,
            'favorite_barber' => 'Mas Rusdi (Master Barber)',
            'favorite_style' => 'Taper Fade + Textured Quiff',
        ];

        // Booking mendatang
        $upcomingBookingModel = Booking::whereIn('status', ['confirmed', 'pending'])
            ->latest()
            ->first();

        $upcomingBooking = $upcomingBookingModel ? [
            'id' => $upcomingBookingModel->booking_code,
            'db_id' => $upcomingBookingModel->id,
            'service' => $upcomingBookingModel->layanan,
            'barber' => $upcomingBookingModel->barber,
            'date' => $upcomingBookingModel->tanggal ? $upcomingBookingModel->tanggal->format('d M Y') : 'Hari Ini',
            'time' => $upcomingBookingModel->jam,
            'price' => 'Rp ' . number_format($upcomingBookingModel->harga, 0, ',', '.'),
            'status' => $upcomingBookingModel->status,
        ] : null;

        // Riwayat potong rambut
        $pastBookings = Booking::latest()->take(5)->get()->map(function ($b) {
            return [
                'id' => $b->booking_code,
                'service' => $b->layanan,
                'barber' => $b->barber,
                'date' => $b->tanggal ? $b->tanggal->format('d M Y') : '-',
                'price' => 'Rp ' . number_format($b->harga, 0, ',', '.'),
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
            'booking_code' => 'BK-' . rand(1000, 9999),
            'nama_pelanggan' => $user ? $user->name : ($request->nama_pelanggan ?? 'Pelanggan Member'),
            'no_whatsapp' => $user ? str_replace('@member.com', '', $user->email) : '081234567890',
            'layanan' => $validated['layanan'],
            'barber' => $validated['barber'],
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'catatan' => $validated['catatan'] ?? null,
            'harga' => $harga,
            'status' => 'confirmed',
            'user_id' => $user ? $user->id : null,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Reservasi berhasil dibuat! Silakan datang 10 menit sebelum jadwal.');
    }

    /**
     * Riwayat Lengkap Booking Saya
     */
    public function bookingsIndex()
    {
        $bookings = Booking::latest()->get();
        return view('user.bookings.index', compact('bookings'));
    }

    /**
     * Batalkan Booking
     */
    public function destroyBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'cancelled']);

        return redirect()->route('user.dashboard')->with('success', 'Booking ' . $booking->booking_code . ' berhasil dibatalkan.');
    }
}
