<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Tampilkan Halaman Utama Dashboard Admin
     */
    public function dashboard()
    {
        $stats = [
            'total_bookings_today' => Booking::whereDate('tanggal', now())->count(),
            'monthly_income' => 'Rp '.number_format(Booking::whereMonth('tanggal', now()->month)->where('status', '!=', 'cancelled')->sum('harga'), 0, ',', '.'),
            'total_services' => Service::where('is_active', true)->count(),
            'active_barbers' => 4,
        ];

        $recentBookings = Booking::latest()->paginate(8)->through(function ($b) {
            return [
                'id' => $b->booking_code,
                'db_id' => $b->id,
                'customer_name' => $b->nama_pelanggan,
                'phone' => $b->no_whatsapp,
                'service' => $b->layanan,
                'barber' => $b->barber,
                'time' => $b->jam,
                'price' => 'Rp '.number_format($b->harga, 0, ',', '.'),
                'status' => $b->status,
            ];
        });

        $services = Service::latest()->get();

        return view('admin.dashboard', compact('stats', 'recentBookings', 'services'));
    }

    /**
     * Form & CRUD Layanan Barbershop
     */
    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'durasi' => 'required|integer|min:5',
            'deskripsi' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Service::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Layanan "'.$validated['nama_layanan'].'" berhasil ditambahkan!');
    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'durasi' => 'required|integer|min:5',
            'deskripsi' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $service->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Layanan "'.$service->nama_layanan.'" berhasil diperbarui!');
    }

    public function destroyService($id)
    {
        $service = Service::findOrFail($id);
        $name = $service->nama_layanan;
        $service->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Layanan "'.$name.'" berhasil dihapus!');
    }

    /**
     * Form & CRUD Booking / Reservasi
     */
    public function createBooking()
    {
        $services = Service::where('is_active', true)->get();

        return view('admin.bookings.create', compact('services'));
    }

    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_whatsapp' => 'required|string',
            'layanan' => 'required|string',
            'barber' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        // Hitung estimasi harga dari layanan
        $svc = Service::where('nama_layanan', $validated['layanan'])->first();
        $harga = $svc ? $svc->harga : 65000;

        $validated['booking_code'] = 'BK-'.rand(1000, 9999);
        $validated['harga'] = $harga;
        $validated['status'] = 'confirmed';

        Booking::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Booking untuk '.$validated['nama_pelanggan'].' ('.$validated['booking_code'].') berhasil dibuat!');
    }

    public function updateBookingStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $request->validate(['status' => 'required|string']);

        $booking->update(['status' => $request->status]);

        return redirect()->route('admin.dashboard')->with('success', 'Status booking '.$booking->booking_code.' diubah menjadi '.strtoupper($request->status));
    }

    public function destroyBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $code = $booking->booking_code;
        $booking->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Booking '.$code.' telah dihapus!');
    }
}
