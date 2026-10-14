@extends('layouts.admin')

@section('page-title', 'Pesan Kontak')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Pesan Pengunjung</h1>
</div>

<div class="overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
    @if ($messages->count())
        <table class="w-full text-sm">
            <thead class="border-b border-gray-200 bg-gray-50">
                <tr class="text-gray-500">
                    <th class="px-4 py-3 text-left font-medium">Status</th>
                    <th class="px-4 py-3 text-left font-medium">Pengirim</th>
                    <th class="px-4 py-3 text-left font-medium">Subjek</th>
                    <th class="px-4 py-3 text-left font-medium">Diterima</th>
                    <th class="px-4 py-3 text-right font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($messages as $msg)
                    <tr class="hover:bg-gray-50 transition {{ !$msg->is_read ? 'bg-blue-50/40' : '' }}">
                        <td class="px-4 py-3">
                            @if (!$msg->is_read)
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-brand-blue">Baru</span>
                            @else
                                <span class="text-xs text-gray-400">Dibaca</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <p class="font-medium text-gray-900">{{ $msg->name }}</p>
                            <p class="text-xs text-gray-500">{{ $msg->email }}</p>
                        </td>
                        <td class="px-4 py-3 text-gray-700">{{ $msg->subject ?? '—' }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $msg->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-4 py-3 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <a href="{{ route('admin.messages.show', $msg) }}" class="font-medium text-brand-blue hover:underline">Buka</a>
                                <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
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
            <p>Belum ada pesan masuk.</p>
        </div>
    @endif
</div>
@endsection
