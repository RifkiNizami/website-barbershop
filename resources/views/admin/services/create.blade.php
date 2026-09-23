@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-800">
        <div>
            <h1 class="text-lg font-bold text-white">Tambah Layanan Baru</h1>
            <p class="text-xs text-slate-400">Buat jenis layanan atau treatment baru untuk Black Crown.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="px-3 py-1.5 text-xs text-slate-300 bg-slate-900 border border-slate-800 hover:bg-slate-800 rounded transition-colors">
            &larr; Batal
        </a>
    </div>

    <!-- Form Card -->
    <div class="bg-slate-900 border border-slate-800 rounded-lg p-5">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Nama Layanan -->
            <div>
                <label class="block text-xs font-medium text-slate-300 mb-1.5">Nama Layanan</label>
                <input type="text" name="name" required placeholder="Contoh: Gentle Haircut & Wash" 
                    class="w-full bg-slate-950 border border-slate-800 text-white text-xs rounded px-3 py-2 focus:outline-none focus:border-red-600 transition-colors">
            </div>

            <!-- Harga & Durasi -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-300 mb-1.5">Harga (Rp)</label>
                    <input type="number" name="price" required placeholder="50000" 
                        class="w-full bg-slate-950 border border-slate-800 text-white text-xs rounded px-3 py-2 focus:outline-none focus:border-red-600 transition-colors">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-300 mb-1.5">Durasi (Menit)</label>
                    <input type="number" name="duration" placeholder="30" 
                        class="w-full bg-slate-950 border border-slate-800 text-white text-xs rounded px-3 py-2 focus:outline-none focus:border-red-600 transition-colors">
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-xs font-medium text-slate-300 mb-1.5">Deskripsi Layanan</label>
                <textarea name="description" rows="3" placeholder="Penjelasan singkat mengenai layanan ini..." 
                    class="w-full bg-slate-950 border border-slate-800 text-white text-xs rounded px-3 py-2 focus:outline-none focus:border-red-600 transition-colors"></textarea>
            </div>

            <!-- Upload Gambar (Opsional) -->
            <div>
                <label class="block text-xs font-medium text-slate-300 mb-1.5">Gambar / Foto Layanan (Opsional)</label>
                <input type="file" name="image" accept="image/*" 
                    class="w-full bg-slate-950 border border-slate-800 text-slate-400 text-xs rounded px-3 py-2 file:mr-3 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-medium file:bg-slate-800 file:text-white hover:file:bg-slate-700">
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-2 pt-3 border-t border-slate-800">
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-xs font-medium text-slate-400 hover:text-white transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded transition-colors">
                    Simpan Layanan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection