@extends('layouts.admin')

@section('page-title', 'Pengalaman')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-2xl font-bold text-gray-900">Daftar Pengalaman</h1>
    <a href="{{ route('admin.experiences.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-deep px-4 py-2 text-sm font-medium text-white hover:bg-brand-dark transition shadow-sm">Tambah Pengalaman</a>
</div>

<div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
    @if ($experiences->count())
        <table class="w-full text-sm">
            <thead class="border-b border-gray-200 bg-gray-50">
                <tr class="text-gray-500">
                    <th class="px-4 py-3 text-left font-medium">Jabatan</th>
                    <th class="px-4 py-3 text-left font-medium">Perusahaan</th>
                    <th class="px-4 py-3 text-left font-medium">Periode</th>
                    <th class="px-4 py-3 text-right font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($experiences as $exp)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $exp->role }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $exp->company }}</td>
                        <td class="px-4 py-3 text-gray-500">
                            {{ $exp->start_date->format('M Y') }} – {{ $exp->is_current ? 'Sekarang' : $exp->end_date?->format('M Y') }}
                        </td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.experiences.edit', $exp) }}" class="font-medium text-brand-blue hover:underline">Edit</a>
                                <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" onsubmit="return confirm('Hapus pengalaman ini?');">
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
            <p>Belum ada pengalaman.</p>
            <a href="{{ route('admin.experiences.create') }}" class="mt-4 inline-block font-medium text-brand-blue hover:underline">Tambah pengalaman pertama</a>
        </div>
    @endif
</div>
@endsection
