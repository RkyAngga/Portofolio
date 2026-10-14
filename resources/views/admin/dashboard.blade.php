@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<!-- Hero Profile Banner in Dashboard -->
<div class="mb-8 overflow-hidden rounded-2xl bg-white border border-gray-200 shadow-sm">
    <div class="p-6 sm:p-8 flex flex-col sm:flex-row items-center gap-6">
        <div class="relative shrink-0">
            <div class="h-28 w-28 sm:h-32 sm:w-32 rounded-2xl overflow-hidden border-4 border-gray-100 shadow-md">
                <img src="/images/profile.jpg" alt="Profile Photo" class="h-full w-full object-cover object-top">
            </div>
            <span class="absolute bottom-1 right-1 h-4 w-4 rounded-full bg-green-500 border-2 border-white"></span>
        </div>
        <div class="text-center sm:text-left flex-1">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Selamat Datang Kembali!</h1>
                    <p class="mt-1 text-sm text-gray-500">Kelola portofolio, karya proyek, dan pesan pengunjung dari satu tempat yang rapi dan elegan.</p>
                </div>
                <div>
                    <a href="{{ route('admin.profile.edit') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-deep px-4 py-2 text-sm font-medium text-white hover:bg-brand-dark transition shadow-sm">
                        Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow transition">
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-medium text-gray-500">Total Proyek</h3>
            <span class="p-2 rounded-lg bg-blue-50 text-brand-blue">📁</span>
        </div>
        <p class="mt-4 text-3xl font-bold text-gray-900">{{ $projectCount }}</p>
        <a href="{{ route('admin.projects.index') }}" class="mt-3 inline-block text-sm font-medium text-brand-blue hover:underline">Kelola proyek →</a>
    </div>
    
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow transition">
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-medium text-gray-500">Total Skill</h3>
            <span class="p-2 rounded-lg bg-blue-50 text-brand-blue">⚡</span>
        </div>
        <p class="mt-4 text-3xl font-bold text-gray-900">{{ $skillCount }}</p>
        <a href="{{ route('admin.skills.index') }}" class="mt-3 inline-block text-sm font-medium text-brand-blue hover:underline">Kelola skill →</a>
    </div>
    
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow transition">
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-medium text-gray-500">Pengalaman</h3>
            <span class="p-2 rounded-lg bg-blue-50 text-brand-blue">💼</span>
        </div>
        <p class="mt-4 text-3xl font-bold text-gray-900">{{ $experienceCount }}</p>
        <a href="{{ route('admin.experiences.index') }}" class="mt-3 inline-block text-sm font-medium text-brand-blue hover:underline">Kelola riwayat →</a>
    </div>
    
    <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm hover:shadow transition">
        <div class="flex items-center justify-between">
            <h3 class="text-sm font-medium text-gray-500">Pesan Masuk</h3>
            <span class="p-2 rounded-lg bg-blue-50 text-brand-blue">✉️</span>
        </div>
        <p class="mt-4 text-3xl font-bold text-gray-900">{{ $messageCount }}</p>
        <a href="{{ route('admin.messages.index') }}" class="mt-3 inline-block text-sm font-medium text-brand-blue hover:underline">Lihat pesan →</a>
    </div>
</div>

<!-- Messages Table -->
<div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold text-gray-900">Pesan Terbaru</h2>
        <a href="{{ route('admin.messages.index') }}" class="text-sm font-medium text-brand-blue hover:underline">Semua pesan</a>
    </div>
    @if ($recentMessages->count())
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="border-b border-gray-200 bg-gray-50/50">
                    <tr class="text-gray-500">
                        <th class="px-4 py-3 text-left font-medium">Nama</th>
                        <th class="px-4 py-3 text-left font-medium">Email</th>
                        <th class="px-4 py-3 text-left font-medium">Subjek</th>
                        <th class="px-4 py-3 text-left font-medium">Waktu</th>
                        <th class="px-4 py-3 text-right font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($recentMessages as $msg)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $msg->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $msg->email }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $msg->subject ?? '—' }}</td>
                            <td class="px-4 py-3 text-gray-400">{{ $msg->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('admin.messages.show', $msg) }}" class="font-medium text-brand-blue hover:underline">Buka</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 py-4 text-center">Belum ada pesan masuk.</p>
    @endif
</div>
@endsection
