@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-800">
        <div>
            <h1 class="text-lg font-bold text-white">Edit Layanan</h1>
            <p class="text-xs text-slate-400">Ubah informasi layanan Black Crown.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="px-3 py-1.5 text-xs text-slate-300 bg-slate-900 border border-slate-800 hover:bg-slate-800 rounded transition-colors">
            &larr; Batal
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-lg p-5">
        <form action="{{ route('admin.services.update', $service->id ?? 1) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-medium text-slate-300 mb-1.5">Nama Layanan</label>
                <input type="text" name="name" value="{{ old('name', $service->name ?? '') }}" required 
                    class="w-full bg-slate-950 border border-slate-800 text-white text-xs rounded px-3 py-2 focus:outline-none focus:border-red-600">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-medium text-slate-300 mb-1.5">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', $service->price ?? '') }}" required 
                        class="w-full bg-slate-950 border border-slate-800 text-white text-xs rounded px-3 py-2 focus:outline-none focus:border-red-600">
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-300 mb-1.5">Durasi (Menit)</label>
                    <input type="number" name="duration" value="{{ old('duration', $service->duration ?? '') }}" 
                        class="w-full bg-slate-950 border border-slate-800 text-white text-xs rounded px-3 py-2 focus:outline-none focus:border-red-600">
                </div>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-300 mb-1.5">Deskripsi</label>
                <textarea name="description" rows="3" 
                    class="w-full bg-slate-950 border border-slate-800 text-white text-xs rounded px-3 py-2 focus:outline-none focus:border-red-600">{{ old('description', $service->description ?? '') }}</textarea>
            </div>

            <div class="flex justify-end gap-2 pt-3 border-t border-slate-800">
                <button type="submit" class="px-4 py-2 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded transition-colors">
                    Update Layanan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection