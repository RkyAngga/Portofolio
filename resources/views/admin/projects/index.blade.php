@extends('layouts.admin')

@section('page-title', 'Proyek')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-900">Daftar Proyek</h1>
    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-deep px-4 py-2 text-sm font-medium text-white hover:bg-brand-dark transition shadow-sm">Tambah Proyek</a>
</div>

<div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
    @if ($projects->count())
        <table class="w-full text-sm">
            <thead class="border-b border-gray-200 bg-gray-50">
                <tr class="text-gray-500">
                    <th class="px-4 py-3 text-left font-medium">Judul</th>
                    <th class="px-4 py-3 text-left font-medium">Kategori</th>
                    <th class="px-4 py-3 text-left font-medium">Skill</th>
                    <th class="px-4 py-3 text-center font-medium">Unggulan</th>
                    <th class="px-4 py-3 text-right font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($projects as $project)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">
                            <div>
                                <p class="font-medium text-gray-900">{{ $project->title }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ Str::limit($project->description, 60) }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-xs px-2 py-1 rounded bg-gray-100 text-gray-600">{{ $project->category }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap gap-1">
                                @foreach ($project->skills->take(3) as $skill)
                                    <span class="text-xs px-2 py-0.5 rounded bg-blue-50 text-brand-blue border border-blue-100">{{ $skill->name }}</span>
                                @endforeach
                                @if ($project->skills->count() > 3)
                                    <span class="text-xs text-gray-400">+{{ $project->skills->count() - 3 }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if ($project->is_featured)
                                <span class="text-amber-500">★</span>
                            @else
                                <span class="text-gray-300">☆</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="font-medium text-brand-blue hover:underline">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Hapus proyek ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="p-10 text-center text-gray-500">
            <p>Belum ada proyek.</p>
            <a href="{{ route('admin.projects.create') }}" class="mt-4 inline-block font-medium text-brand-blue hover:underline">Tambah proyek pertama</a>
        </div>
    @endif
</div>
@endsection
