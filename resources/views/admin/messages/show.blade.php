@extends('layouts.admin')

@section('page-title', 'Detail Pesan')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.messages.index') }}" class="text-sm font-medium text-brand-blue hover:underline">← Kembali ke Daftar Pesan</a>
</div>

<div class="max-w-2xl rounded-xl border border-gray-200 bg-white p-6 sm:p-8 shadow-sm">
    <div class="border-b border-gray-100 pb-5 mb-6">
        <h2 class="text-xl font-bold text-gray-900">{{ $message->subject ?? 'Tanpa Subjek' }}</h2>
        <div class="mt-3 flex flex-col sm:flex-row sm:items-center justify-between text-xs text-gray-500 gap-2">
            <div>
                <span class="font-medium text-gray-900">{{ $message->name }}</span>
                <span>({{ $message->email }})</span>
            </div>
            <div>
                {{ $message->created_at->format('d M Y, H:i') }}
            </div>
        </div>
    </div>

    <div class="text-gray-700 text-sm leading-relaxed mb-8 whitespace-pre-wrap">
        {{ $message->message }}
    </div>

    <div class="flex items-center gap-4 pt-5 border-t border-gray-100">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ rawurlencode($message->subject ?? 'Pertanyaan Portfolio') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-deep px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-dark transition">
            Balas via Email
        </a>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center gap-2 rounded-lg border border-red-200 bg-white px-5 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50 transition">
                Hapus
            </button>
        </form>
    </div>
</div>
@endsection
