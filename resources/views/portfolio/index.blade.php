@extends('layouts.app')

@section('content')
<!-- Header/Nav -->
<header class="sticky top-0 z-50 border-b border-gray-200 bg-white backdrop-blur">
    <nav class="container-wide flex h-16 items-center justify-between">
        <a href="#" class="text-xl font-bold text-gray-900">{{ $profile->full_name ?? 'Portfolio' }}</a>
        <div class="hidden gap-8 md:flex">
            <a href="#about" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">About</a>
            <a href="#skills" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Skills</a>
            <a href="#experience" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Experience</a>
            <a href="#projects" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Projects</a>
            <a href="#contact" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Contact</a>
        </div>
    </nav>
</header>

<!-- Hero with Photo -->
<section class="bg-gradient-to-br from-gray-50 to-white py-20 sm:py-32">
    <div class="container-wide">
        <div class="grid gap-12 lg:grid-cols-2 items-center">
            <div>
                <p class="eyebrow text-brand-blue font-semibold tracking-[0.22em]">{{ $profile->headline ?? 'Welcome' }}</p>
                <h1 class="mt-4 text-5xl font-bold leading-tight text-gray-900 sm:text-6xl">
                    {{ $profile->full_name ?? 'Portfolio' }}
                </h1>
                <p class="mt-6 text-lg text-gray-600 leading-relaxed">
                    {{ $profile->bio_short ?? 'Crafting digital solutions with precision, creativity, and impact.' }}
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#projects" class="inline-flex items-center gap-2 rounded-full bg-brand-deep px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-blue focus:ring-offset-2">View My Work</a>
                    <a href="#contact" class="inline-flex items-center gap-2 rounded-full border-2 border-gray-300 bg-white px-6 py-3 text-sm font-semibold text-gray-700 transition hover:border-gray-400 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">Contact Me</a>
                </div>
            </div>
            <!-- Photo -->
            <div class="flex justify-center lg:justify-end">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-blue/10 to-brand-deep/10 rounded-3xl blur-3xl"></div>
                    <div class="relative bg-white rounded-3xl p-2 shadow-2xl border border-gray-100">
                        <div class="overflow-hidden rounded-2xl">
                            <img src="{{ $profile->avatar_url ?? '/images/avatar.jpg' }}" 
                                 alt="{{ $profile->full_name }}" 
                                 class="h-[420px] w-[320px] object-cover object-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section id="about" class="bg-white py-20 sm:py-28 border-t border-gray-100">
    <div class="container-wide max-w-3xl">
        <p class="eyebrow text-brand-blue">About</p>
        <h2 class="section-title text-gray-900">Who I Am</h2>
        <div class="mt-8 space-y-4 text-gray-600 leading-relaxed">
            {!! nl2br(e($profile->about_me ?? 'Professional software engineer with expertise in web development, system design, and modern architecture.')) !!}
        </div>
        @if ($profile->resume_url && $profile->resume_url !== '#')
            <a href="{{ $profile->resume_url }}" class="mt-8 inline-flex items-center gap-2 rounded-full border border-gray-300 bg-white px-6 py-3 text-sm font-semibold text-gray-700 transition hover:border-gray-400 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2" target="_blank" rel="noopener">Download Resume</a>
        @endif
    </div>
</section>

<!-- Skills -->
@if ($skills->count())
<section id="skills" class="bg-gray-50 py-20 sm:py-28">
    <div class="container-wide">
        <p class="eyebrow text-brand-blue">Expertise</p>
        <h2 class="section-title text-gray-900">Skills & Technologies</h2>
        <div class="mt-12 space-y-10">
            @foreach ($skills as $category => $categorySkills)
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-widest text-brand-blue mb-4">{{ $category }}</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($categorySkills as $skill)
                            <span class="inline-block rounded-full bg-white px-4 py-2 text-sm font-medium text-gray-700 border border-gray-200 shadow-sm hover:border-gray-300 transition">
                                {{ $skill->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Experience -->
@if ($experiences->count())
<section id="experience" class="bg-white py-20 sm:py-28 border-t border-gray-100">
    <div class="container-wide max-w-3xl">
        <p class="eyebrow text-brand-blue">Background</p>
        <h2 class="section-title text-gray-900">Experience</h2>
        <div class="mt-12 space-y-10">
            @foreach ($experiences as $exp)
                <div class="relative border-l-2 border-gray-200 pl-8 before:absolute before:left-[-9px] before:top-2 before:h-4 before:w-4 before:rounded-full before:bg-brand-blue before:border-4 before:border-white before:shadow-lg">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ $exp->role }}</h3>
                        <p class="mt-1 text-sm font-medium text-brand-blue">{{ $exp->company }} · {{ $exp->type }}</p>
                        <p class="mt-2 text-xs text-gray-500">
                            {{ $exp->start_date->format('M Y') }} – 
                            @if ($exp->is_current)
                                Present
                            @else
                                {{ $exp->end_date?->format('M Y') }}
                            @endif
                        </p>
                        @if ($exp->description)
                            <p class="mt-3 text-gray-600 text-sm leading-relaxed">{{ $exp->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Projects -->
@if ($projects->count())
<section id="projects" class="bg-gray-50 py-20 sm:py-28">
    <div class="container-wide">
        <p class="eyebrow text-brand-blue">Portfolio</p>
        <h2 class="section-title text-gray-900">Featured Works</h2>
        <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($projects as $project)
                <article class="group rounded-xl border border-gray-200 bg-white overflow-hidden hover:border-gray-300 transition shadow-sm hover:shadow-lg">
                    @if ($project->thumbnail)
                        <div class="aspect-video overflow-hidden bg-gray-100">
                            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" class="h-full w-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $project->title }}</h3>
                        <p class="mt-2 text-sm text-gray-600">{{ Str::limit($project->description, 100) }}</p>
                        
                        @if ($project->skills->count())
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach ($project->skills->take(3) as $skill)
                                    <span class="text-xs px-2 py-1 rounded bg-blue-50 text-brand-blue border border-blue-100">{{ $skill->name }}</span>
                                @endforeach
                            </div>
                        @endif
                        
                        <div class="mt-4 flex gap-3">
                            @if ($project->demo_url && $project->demo_url !== '#')
                                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="text-xs font-medium text-gray-500 hover:text-brand-blue transition">Demo →</a>
                            @endif
                            @if ($project->github_url && $project->github_url !== '#')
                                <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="text-xs font-medium text-gray-500 hover:text-brand-blue transition">Code →</a>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Contact -->
<section id="contact" class="bg-white py-20 sm:py-28 border-t border-gray-100">
    <div class="container-wide max-w-2xl">
        <p class="eyebrow text-brand-blue">Get in Touch</p>
        <h2 class="section-title text-gray-900">Let's Connect</h2>
        
        <div class="mt-8 flex flex-wrap gap-6 text-sm">
            @if ($profile->email)
                <a href="mailto:{{ $profile->email }}" class="flex items-center gap-2 text-gray-600 hover:text-brand-blue transition">
                    <span>📧</span> {{ $profile->email }}
                </a>
            @endif
            @if ($profile->github_url && $profile->github_url !== '#')
                <a href="{{ $profile->github_url }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-brand-blue transition">GitHub</a>
            @endif
            @if ($profile->linkedin_url && $profile->linkedin_url !== '#')
                <a href="{{ $profile->linkedin_url }}" target="_blank" rel="noopener" class="text-gray-600 hover:text-brand-blue transition">LinkedIn</a>
            @endif
        </div>

        <form action="{{ route('contact.store') }}" method="POST" class="mt-12 space-y-6">
            @csrf
            
            @if (session('success'))
                <div class="rounded-lg bg-green-50 border border-green-200 p-4 text-sm text-green-800">{{ session('success') }}</div>
            @endif
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" id="name" name="name" required class="w-full rounded-lg bg-white border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('name') border-red-500 @enderror">
                @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" required class="w-full rounded-lg bg-white border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue @error('email') border-red-500 @enderror">
                @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject (Optional)</label>
                <input type="text" id="subject" name="subject" class="w-full rounded-lg bg-white border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue">
            </div>
            
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                <textarea id="message" name="message" rows="5" required class="w-full rounded-lg bg-white border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-1 focus:ring-brand-blue resize-none @error('message') border-red-500 @enderror"></textarea>
                @error('message') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
            
            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-brand-deep px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-dark focus:outline-none focus:ring-2 focus:ring-brand-blue focus:ring-offset-2">Send Message</button>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="border-t border-gray-200 bg-gray-50 py-12">
    <div class="container-wide text-center text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} {{ $profile->full_name ?? 'Portfolio' }}. All rights reserved.</p>
    </div>
</footer>
@endsection
