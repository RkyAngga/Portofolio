@extends('layouts.admin')

@section('page-title', 'Skill')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-900">Daftar Skill</h1>
    <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-deep px-4 py-2 text-sm font-medium text-white hover:bg-brand-dark transition shadow-sm">Tambah Skill</a>
</div>

<div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
    @if ($skills->count())
        <table class="w-full text-sm">
            <thead class="border-b border-gray-200 bg-gray-50">
                <tr class="text-gray-500">
                    <th class="px-4 py-3 text-left font-medium">Nama</th>
                    <th class="px-4 py-3 text-left font-medium">Kategori</th>
                    <th class="px-4 py-3 text-center font-medium">Urutan</th>
                    <th class="px-4 py-3 text-right font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($skills as $skill)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $skill->name }}</td>
                        <td class="px-4 py-3">
                            <span class="text-xs px-2 py-1 rounded bg-blue-50 text-brand-blue border border-blue-100">{{ $skill->category }}</span>
                        </td>
                        <td class="px-4 py-3 text-center text-gray-500">{{ $skill->order_index }}</td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="font-medium text-brand-blue hover:underline">Edit</a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Hapus skill ini?');">
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
            <p>Belum ada skill.</p>
            <a href="{{ route('admin.skills.create') }}" class="mt-4 inline-block font-medium text-brand-blue hover:underline">Tambah skill pertama</a>
        </div>
    @endif
</div>
@endsection
