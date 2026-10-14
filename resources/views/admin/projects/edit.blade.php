@extends('layouts.admin')

@section('page-title', 'Edit Project')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.projects.index') }}" class="text-sm text-brand-blue hover:text-brand-cream transition">← Back to Projects</a>
</div>

<div class="max-w-2xl rounded-lg border border-brand-dark bg-brand-dark/50 p-4 sm:p-6">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-brand-cream mb-2">Title *</label>
            <input type="text" id="title" name="title" required value="{{ old('title', $project->title) }}" class="w-full rounded-lg bg-brand-deep/50 border border-brand-dark px-4 py-2 text-brand-cream placeholder-brand-cream/40 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('title') border-red-500 @enderror">
            @error('title') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="slug" class="block text-sm font-medium text-brand-cream mb-2">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $project->slug) }}" class="w-full rounded-lg bg-brand-deep/50 border border-brand-dark px-4 py-2 text-brand-cream placeholder-brand-cream/40 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            @error('slug') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-brand-cream mb-2">Description *</label>
            <textarea id="description" name="description" required rows="4" class="w-full rounded-lg bg-brand-deep/50 border border-brand-dark px-4 py-2 text-brand-cream placeholder-brand-cream/40 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue resize-none @error('description') border-red-500 @enderror">{{ old('description', $project->description) }}</textarea>
            @error('description') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-brand-cream mb-2">Category *</label>
            <input type="text" id="category" name="category" required value="{{ old('category', $project->category) }}" class="w-full rounded-lg bg-brand-deep/50 border border-brand-dark px-4 py-2 text-brand-cream placeholder-brand-cream/40 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            @error('category') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="thumbnail" class="block text-sm font-medium text-brand-cream mb-2">Thumbnail URL</label>
            <input type="url" id="thumbnail" name="thumbnail" value="{{ old('thumbnail', $project->thumbnail) }}" class="w-full rounded-lg bg-brand-deep/50 border border-brand-dark px-4 py-2 text-brand-cream placeholder-brand-cream/40 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            @error('thumbnail') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="demo_url" class="block text-sm font-medium text-brand-cream mb-2">Demo URL</label>
                <input type="url" id="demo_url" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}" class="w-full rounded-lg bg-brand-deep/50 border border-brand-dark px-4 py-2 text-brand-cream placeholder-brand-cream/40 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
                @error('demo_url') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="github_url" class="block text-sm font-medium text-brand-cream mb-2">GitHub URL</label>
                <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="w-full rounded-lg bg-brand-deep/50 border border-brand-dark px-4 py-2 text-brand-cream placeholder-brand-cream/40 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
                @error('github_url') <p class="mt-1 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-brand-cream mb-2">Skills</label>
            <div class="space-y-2 max-h-48 overflow-y-auto p-3 rounded-lg bg-brand-deep/50 border border-brand-dark">
                @foreach ($skills as $skill)
                    <label class="flex items-center gap-2 text-sm text-brand-cream hover:bg-brand-dark/30 p-2 rounded cursor-pointer transition">
                        <input type="checkbox" name="skills[]" value="{{ $skill->id }}" {{ in_array($skill->id, old('skills', $project->skills->pluck('id')->toArray())) ? 'checked' : '' }} class="rounded border-brand-dark text-brand-blue focus:ring-brand-blue focus:ring-offset-0">
                        <span>{{ $skill->name }} <span class="text-brand-cream/50 text-xs">({{ $skill->category }})</span></span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="flex items-center gap-6">
            <label class="flex items-center gap-2 text-sm text-brand-cream cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }} class="rounded border-brand-dark text-brand-blue focus:ring-brand-blue focus:ring-offset-0">
                <span>Featured Project</span>
            </label>
            
            <div>
                <label for="order_index" class="text-sm font-medium text-brand-cream mr-2">Order:</label>
                <input type="number" id="order_index" name="order_index" min="0" value="{{ old('order_index', $project->order_index) }}" class="w-20 rounded-lg bg-brand-deep/50 border border-brand-dark px-3 py-1 text-sm text-brand-cream focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="solid-button">Update Project</button>
            <a href="{{ route('admin.projects.index') }}" class="outline-button">Cancel</a>
        </div>
    </form>
</div>
@endsection
