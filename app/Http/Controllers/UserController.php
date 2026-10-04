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

        // Stempel & Poin dari DB
        $totalCompleted = Booking::where('status', 'completed')->count();
        $stamps = ($totalCompleted % 10) ?: 7;

        $member = [
            'name' => $userName,
            'phone' => $currentUser ? ($currentUser->phone ?? '-') : '-',
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
            'price' => 'Rp '.number_format($upcomingBookingModel->harga, 0, ',', '.'),
            'status' => $upcomingBookingModel->status,
        ] : null;

        // Riwayat potong rambut
        $pastBookings = Booking::latest()->take(5)->get()->map(function ($b) {
            return [
                'id' => $b->booking_code,
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
        $bookings = Booking::latest()->paginate(8);

        return view('user.bookings.index', compact('bookings'));
    }

    /**
     * Batalkan Booking
     */
    public function destroyBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'cancelled']);

        return redirect()->route('user.dashboard')->with('success', 'Booking '.$booking->booking_code.' berhasil dibatalkan.');
    }

    /**
     * Simpan Booking Langsung dari Form Katalog Landing Page
     */
    public function storePublicBooking(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk melakukan booking.');
        }

        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:100',
            'no_whatsapp' => 'required|string|max:30',
            'layanan' => 'required|string|max:150',
            'barber' => 'nullable|string|max:100',
            'tanggal' => 'required|date',
            'jam' => 'required|string|max:30',
            'model_rambut' => 'nullable|string|max:100',
            'catatan' => 'nullable|string|max:500',
            'foto_referensi' => 'nullable|image|max:3072',
        ]);

        $svc = Service::where('nama_layanan', $validated['layanan'])->first();
        $harga = $svc ? $svc->harga : 55000;

        $fotoPath = null;
        if ($request->hasFile('foto_referensi')) {
            $file = $request->file('foto_referensi');
            $filename = 'ref_'.time().'_'.rand(100, 999).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/referensi'), $filename);
            $fotoPath = 'uploads/referensi/'.$filename;
        }

        $note = '';
        if (! empty($validated['model_rambut'])) {
            $note .= '[Model Katalog: '.$validated['model_rambut'].'] ';
        }
        if (! empty($validated['catatan'])) {
            $note .= $validated['catatan'];
        }
        if ($fotoPath) {
            $note .= ' [Foto Referensi: '.$fotoPath.']';
        }

        $bookingCode = 'BK-'.rand(1000, 9999);
        Booking::create([
            'booking_code' => $bookingCode,
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'no_whatsapp' => $validated['no_whatsapp'],
            'layanan' => $validated['layanan'],
            'barber' => $validated['barber'] ?: 'Rusdi (Master Barber)',
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'catatan' => trim($note),
            'harga' => $harga,
            'status' => 'pending',
            'user_id' => Auth::check() ? Auth::id() : null,
        ]);

        return redirect()->to(url('/#katalog'))->with('catalog_success', 'Booking berhasil dibuat untuk '.$validated['nama_pelanggan'].' (Kode: '.$bookingCode.'). Kapster kami akan segera menghubungi Anda via WhatsApp!');
    }
}
