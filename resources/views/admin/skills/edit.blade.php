@extends('layouts.admin')

@section('page-title', 'Edit Skill')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.skills.index') }}" class="text-sm font-medium text-brand-blue hover:underline">← Kembali ke Daftar Skill</a>
</div>

<div class="max-w-xl rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
    <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Skill *</label>
            <input type="text" id="name" name="name" required value="{{ old('name', $skill->name) }}" class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('name') border-red-500 @enderror">
            @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
            <select id="category" name="category" required class="w-full rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('category') border-red-500 @enderror">
                @foreach ($categories as $cat)
                    <option value="{{ $cat }}" {{ old('category', $skill->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            @error('category') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="order_index" class="block text-sm font-medium text-gray-700 mb-2">Urutan</label>
            <input type="number" id="order_index" name="order_index" min="0" value="{{ old('order_index', $skill->order_index) }}" class="w-32 rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-900 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
        </div>

        <div class="flex gap-3">
            <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-brand-deep px-6 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-brand-dark transition">Update Skill</button>
            <a href="{{ route('admin.skills.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
