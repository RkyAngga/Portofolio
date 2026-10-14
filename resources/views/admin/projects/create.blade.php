@extends('layouts.admin')

@section('page-title', 'Tambah Proyek')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.projects.index') }}" class="text-sm font-medium text-brand-blue hover:underline">← Kembali ke Daftar Proyek</a>
</div>

<div class="max-w-2xl rounded-xl border border-gray-200 bg-white p-6 sm:p-8 shadow-sm">
    <form action="{{ route('admin.projects.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Proyek *</label>
            <input type="text" id="title" name="title" required value="{{ old('title') }}" placeholder="e.g., E-Commerce Platform" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('title') border-red-500 @enderror">
            @error('title') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug <span class="text-xs text-gray-400 font-normal">(otomatis dibuat jika dikosongkan)</span></label>
            <input type="text" id="slug" name="slug" value="{{ old('slug') }}" placeholder="e-commerce-platform" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('slug') border-red-500 @enderror">
            @error('slug') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Proyek *</label>
            <textarea id="description" name="description" required rows="4" placeholder="Jelaskan fitur utama, masalah yang dipecahkan, atau arsitektur proyek..." class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue resize-none @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
            <input type="text" id="category" name="category" required value="{{ old('category', 'Web App') }}" placeholder="e.g., Web App, Mobile App, API, UI/UX" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('category') border-red-500 @enderror">
            @error('category') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">URL Gambar / Thumbnail</label>
            <input type="url" id="thumbnail" name="thumbnail" value="{{ old('thumbnail') }}" placeholder="https://images.unsplash.com/..." class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('thumbnail') border-red-500 @enderror">
            @error('thumbnail') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="demo_url" class="block text-sm font-medium text-gray-700 mb-2">URL Live Demo</label>
                <input type="url" id="demo_url" name="demo_url" value="{{ old('demo_url') }}" placeholder="https://..." class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('demo_url') border-red-500 @enderror">
                @error('demo_url') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="github_url" class="block text-sm font-medium text-gray-700 mb-2">URL Repository (GitHub)</label>
                <input type="url" id="github_url" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/..." class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('github_url') border-red-500 @enderror">
                @error('github_url') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Teknologi / Skill Terkait</label>
            <div class="space-y-1.5 max-h-48 overflow-y-auto p-3 rounded-lg border border-gray-300 bg-gray-50/50">
                @forelse ($skills as $skill)
                    <label class="flex items-center gap-2.5 text-sm text-gray-700 hover:bg-white p-2 rounded-md cursor-pointer transition">
                        <input type="checkbox" name="skills[]" value="{{ $skill->id }}" {{ in_array($skill->id, old('skills', [])) ? 'checked' : '' }} class="rounded border-gray-300 text-brand-deep focus:ring-brand-blue">
                        <span class="font-medium text-gray-900">{{ $skill->name }}</span>
                        <span class="text-gray-400 text-xs">({{ $skill->category }})</span>
                    </label>
                @empty
                    <p class="text-xs text-gray-500 p-2">Belum ada skill yang terdaftar.</p>
                @endforelse
            </div>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center gap-6 pt-2">
            <label class="flex items-center gap-2.5 text-sm font-medium text-gray-700 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded border-gray-300 text-brand-deep focus:ring-brand-blue">
                <span>Tandai sebagai Proyek Unggulan</span>
            </label>
            
            <div class="flex items-center gap-2">
                <label for="order_index" class="text-sm font-medium text-gray-700">Urutan:</label>
                <input type="number" id="order_index" name="order_index" min="0" value="{{ old('order_index', 0) }}" class="w-24 rounded-lg border border-gray-300 px-3 py-1.5 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            </div>
        </div>

        <div class="flex gap-3 pt-4 border-t border-gray-100">
            <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-brand-deep px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-dark transition">
                Simpan Proyek
            </button>
            <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
