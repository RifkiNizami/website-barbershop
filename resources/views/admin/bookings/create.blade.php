@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-700">
        <div>
            <h1 class="text-xl font-bold text-white">Tambah Booking Baru</h1>
            <p class="text-xs text-slate-400">Input manual reservasi pelanggan Black Crown.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="px-3 py-1.5 text-xs text-slate-300 bg-slate-800 hover:bg-slate-700 border border-slate-700 rounded-md transition-colors">
            &larr; Kembali
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-slate-800 rounded-lg border border-slate-700 p-6 shadow-sm">
        <form action="{{ route('admin.bookings.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Nama Pelanggan -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Nama Pelanggan</label>
                <input type="text" name="customer_name" required placeholder="Masukkan nama pelanggan" 
                    class="w-full bg-slate-900 border border-slate-700 text-white text-sm rounded-md px-3.5 py-2.5 focus:outline-none focus:border-red-500 transition-colors">
            </div>

            <!-- Nomor WhatsApp / HP -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Nomor WhatsApp / HP</label>
                <input type="text" name="phone" required placeholder="08123456789" 
                    class="w-full bg-slate-900 border border-slate-700 text-white text-sm rounded-md px-3.5 py-2.5 focus:outline-none focus:border-red-500 transition-colors">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Pilih Layanan -->
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Layanan</label>
                    <select name="service_id" required class="w-full bg-slate-900 border border-slate-700 text-white text-sm rounded-md px-3.5 py-2.5 focus:outline-none focus:border-red-500 transition-colors">
                        <option value="">-- Pilih Layanan --</option>
                        {{-- Loop layanan dari database --}}
                        @foreach($services ?? [] as $service)
                            <option value="{{ $service->id }}">{{ $service->name }} (Rp {{ number_format($service->price, 0, ',', '.') }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal & Jam Booking -->
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Jadwal Booking</label>
                    <input type="datetime-local" name="booking_time" required 
                        class="w-full bg-slate-900 border border-slate-700 text-white text-sm rounded-md px-3.5 py-2.5 focus:outline-none focus:border-red-500 transition-colors">
                </div>
            </div>

            <!-- Catatan Tambahan -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Catatan (Opsional)</label>
                <textarea name="notes" rows="3" placeholder="Request khusus dari pelanggan..." 
                    class="w-full bg-slate-900 border border-slate-700 text-white text-sm rounded-md px-3.5 py-2.5 focus:outline-none focus:border-red-500 transition-colors"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-700/60">
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-xs font-medium text-slate-400 hover:text-white transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded-md transition-colors shadow-sm">
                    Simpan Booking
                </button>
            </div>
        </form>
    </div>
</div>
@endsection