@extends('layouts.admin')

@section('page-title', 'Pengaturan Profil')

@section('content')
<div class="max-w-3xl rounded-xl border border-gray-200 bg-white p-6 sm:p-8 shadow-sm">
    <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="flex flex-col sm:flex-row items-center gap-6 pb-6 border-b border-gray-100">
            <div class="h-24 w-24 rounded-2xl overflow-hidden border-2 border-gray-200 shrink-0">
                <img src="{{ old('avatar_url', $profile->avatar_url) ?: '/images/profile.jpg' }}" alt="Avatar" class="h-full w-full object-cover">
            </div>
            <div class="flex-1 w-full">
                <label for="avatar_url" class="block text-sm font-medium text-gray-700 mb-1">URL Foto Profil</label>
                <input type="text" id="avatar_url" name="avatar_url" value="{{ old('avatar_url', $profile->avatar_url) }}" placeholder="/images/profile.jpg" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
                <p class="mt-1 text-xs text-gray-500">Bisa menggunakan path lokal <code>/images/profile.jpg</code> atau link gambar eksternal.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap *</label>
                <input type="text" id="full_name" name="full_name" required value="{{ old('full_name', $profile->full_name) }}" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('full_name') border-red-500 @enderror">
                @error('full_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="headline" class="block text-sm font-medium text-gray-700 mb-1">Headline / Jabatan *</label>
                <input type="text" id="headline" name="headline" required value="{{ old('headline', $profile->headline) }}" placeholder="e.g., Full-Stack Developer" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('headline') border-red-500 @enderror">
                @error('headline') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="bio_short" class="block text-sm font-medium text-gray-700 mb-1">Bio Singkat</label>
            <textarea id="bio_short" name="bio_short" rows="2" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue resize-none">{{ old('bio_short', $profile->bio_short) }}</textarea>
            @error('bio_short') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="about_me" class="block text-sm font-medium text-gray-700 mb-1">Tentang Saya (Lengkap)</label>
            <textarea id="about_me" name="about_me" rows="4" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue resize-none">{{ old('about_me', $profile->about_me) }}</textarea>
            @error('about_me') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $profile->email) }}" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
                @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon / WhatsApp</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone) }}" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
                @error('phone') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                <input type="text" id="location" name="location" value="{{ old('location', $profile->location) }}" placeholder="Kota, Negara" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            </div>
            <div>
                <label for="resume_url" class="block text-sm font-medium text-gray-700 mb-1">Link CV / Resume</label>
                <input type="url" id="resume_url" name="resume_url" value="{{ old('resume_url', $profile->resume_url) }}" placeholder="https://..." class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            </div>
        </div>

        <div class="space-y-3 pt-2">
            <p class="text-sm font-medium text-gray-900">Tautan Sosial Media</p>
            <div class="space-y-2">
                <input type="url" name="github_url" value="{{ old('github_url', $profile->github_url) }}" placeholder="URL GitHub (https://github.com/...)" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}" placeholder="URL LinkedIn (https://linkedin.com/in/...)" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
                <input type="url" name="twitter_url" value="{{ old('twitter_url', $profile->twitter_url) }}" placeholder="URL Twitter / X" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-brand-deep px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-dark transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
