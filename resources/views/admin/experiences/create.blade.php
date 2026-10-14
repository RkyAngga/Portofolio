@extends('layouts.admin')

@section('page-title', 'Tambah Pengalaman')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.experiences.index') }}" class="text-sm font-medium text-brand-blue hover:underline">← Kembali ke Daftar Pengalaman</a>
</div>

<div class="max-w-xl rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <form action="{{ route('admin.experiences.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Jabatan *</label>
            <input type="text" id="role" name="role" required value="{{ old('role') }}" placeholder="e.g., Software Engineer" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('role') border-red-500 @enderror">
            @error('role') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Perusahaan *</label>
            <input type="text" id="company" name="company" required value="{{ old('company') }}" placeholder="e.g., Tech Startup" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('company') border-red-500 @enderror">
            @error('company') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Kota, Negara" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            </div>
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Tipe *</label>
                <select id="type" name="type" required class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
                    @foreach ($types as $t)
                        <option value="{{ $t }}" {{ old('type') == $t ? 'selected' : '' }}>{{ $t }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai *</label>
                <input type="date" id="start_date" name="start_date" required value="{{ old('start_date') }}" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('start_date') border-red-500 @enderror">
                @error('start_date') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
                @error('end_date') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" id="is_current" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }} class="rounded border-gray-300 text-brand-deep focus:ring-brand-blue">
            <label for="is_current" class="text-sm font-medium text-gray-700">Masih bekerja di sini</label>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
            <textarea id="description" name="description" rows="3" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue resize-none">{{ old('description') }}</textarea>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-brand-deep px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-dark transition">Simpan</button>
            <a href="{{ route('admin.experiences.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
