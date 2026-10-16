@extends('layouts.app')

@section('content')
<!-- Header/Nav -->
<header class="sticky top-0 z-50 border-b border-gray-200 bg-white/90 backdrop-blur-md transition-all duration-300">
    <nav class="container-wide flex h-16 items-center justify-between">
        <a href="#" class="text-xl font-bold tracking-tight text-gray-900 hover:text-brand-blue transition-colors">
            {{ $profile->full_name ?? 'Portfolio' }}
        </a>
        <div class="hidden gap-8 md:flex">
            <a href="#about" class="text-sm font-medium text-gray-600 hover:text-brand-blue transition-colors">About</a>
            <a href="#skills" class="text-sm font-medium text-gray-600 hover:text-brand-blue transition-colors">Skills</a>
            <a href="#experience" class="text-sm font-medium text-gray-600 hover:text-brand-blue transition-colors">Experience</a>
            <a href="#projects" class="text-sm font-medium text-gray-600 hover:text-brand-blue transition-colors">Projects</a>
            <a href="#contact" class="text-sm font-medium text-gray-600 hover:text-brand-blue transition-colors">Contact</a>
        </div>
    </nav>
</header>

<!-- Hero with Photo -->
<section class="relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-blue-50/30 py-20 sm:py-32">
    <!-- Background glowing orbs -->
    <div class="absolute -top-24 -left-24 h-96 w-96 rounded-full bg-brand-blue/5 blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -right-24 h-96 w-96 rounded-full bg-brand-deep/5 blur-3xl pointer-events-none"></div>

    <div class="container-wide relative z-10">
        <div class="grid gap-12 lg:grid-cols-2 items-center">
            <div data-aos="fade-right" data-aos-duration="1000">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-xs font-semibold tracking-wider text-brand-blue uppercase mb-4 shadow-sm">
                    <span class="inline-block h-2 w-2 rounded-full bg-brand-blue animate-pulse"></span>
                    {{ $profile->headline ?? 'Full-Stack Developer' }}
                </div>
                <h1 class="text-5xl font-extrabold leading-tight text-gray-900 sm:text-6xl tracking-tight">
                    Halo, Saya <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-deep via-brand-blue to-blue-600">{{ $profile->full_name ?? 'Portfolio' }}</span>
                </h1>
                <p class="mt-6 text-lg text-gray-600 leading-relaxed max-w-xl">
                    {{ $profile->bio_short ?? 'Crafting digital solutions with precision, creativity, and impact.' }}
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#projects" class="inline-flex items-center gap-2 rounded-full bg-brand-deep px-7 py-3.5 text-sm font-semibold text-white shadow-md shadow-brand-deep/20 transition-all duration-300 hover:bg-brand-dark hover:shadow-xl hover:shadow-brand-deep/30 hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:ring-offset-2">
                        <span>Lihat Karya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                    <a href="#contact" class="inline-flex items-center gap-2 rounded-full border-2 border-gray-300 bg-white px-7 py-3.5 text-sm font-semibold text-gray-700 transition-all duration-300 hover:border-brand-blue hover:text-brand-blue hover:bg-blue-50/30 hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 shadow-sm">
                        Hubungi Saya
                    </a>
                </div>
            </div>

            <!-- Photo with Float & Glow Animation -->
            <div class="flex justify-center lg:justify-end" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="relative group">
                    <div class="absolute -inset-2 bg-gradient-to-r from-brand-blue via-blue-400 to-brand-deep rounded-3xl opacity-20 blur-2xl group-hover:opacity-40 transition-opacity duration-700"></div>
                    <div class="relative bg-white rounded-3xl p-3 shadow-2xl border border-gray-100 animate-float">
                        <div class="overflow-hidden rounded-2xl relative">
                            <img src="{{ $profile->avatar_url ?? '/images/profile.jpg' }}" 
                                 alt="{{ $profile->full_name }}" 
                                 class="h-[400px] w-[300px] sm:h-[440px] sm:w-[330px] object-cover object-center transition-transform duration-700 group-hover:scale-105">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Counter Section -->
<section class="stats-section border-y border-gray-200 bg-white py-12">
    <div class="container-wide">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div data-aos="zoom-in" data-aos-delay="100" class="p-4">
                <div class="text-4xl sm:text-5xl font-extrabold text-brand-deep">
                    <span data-count="{{ max($projectsCount ?? 0, 3) }}">0</span>+
                </div>
                <p class="mt-2 text-sm font-medium text-gray-500 uppercase tracking-wider">Proyek Selesai</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="200" class="p-4">
                <div class="text-4xl sm:text-5xl font-extrabold text-brand-blue">
                    <span data-count="{{ max($skillsCount ?? 0, 10) }}">0</span>+
                </div>
                <p class="mt-2 text-sm font-medium text-gray-500 uppercase tracking-wider">Skill & Teknologi</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="300" class="p-4">
                <div class="text-4xl sm:text-5xl font-extrabold text-brand-deep">
                    <span data-count="{{ max($experiencesCount ?? 0, 2) }}">0</span>+
                </div>
                <p class="mt-2 text-sm font-medium text-gray-500 uppercase tracking-wider">Pengalaman Kerja</p>
            </div>
            <div data-aos="zoom-in" data-aos-delay="400" class="p-4">
                <div class="text-4xl sm:text-5xl font-extrabold text-emerald-600">
                    <span data-count="100">0</span>%
                </div>
                <p class="mt-2 text-sm font-medium text-gray-500 uppercase tracking-wider">Dedikasi</p>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section id="about" class="bg-white py-20 sm:py-28">
    <div class="container-wide max-w-3xl" data-aos="fade-up" data-aos-duration="900">
        <p class="eyebrow text-brand-blue font-semibold">About</p>
        <h2 class="section-title text-gray-900">Tentang Saya</h2>
        <div class="mt-8 space-y-4 text-gray-600 leading-relaxed text-base sm:text-lg">
            {!! nl2br(e($profile->about_me ?? 'Professional software engineer with expertise in web development, system design, and modern architecture.')) !!}
        </div>
        @if ($profile->resume_url && $profile->resume_url !== '#')
            <div class="mt-8">
                <a href="{{ $profile->resume_url }}" class="inline-flex items-center gap-2 rounded-full border border-gray-300 bg-white px-6 py-3 text-sm font-semibold text-gray-700 shadow-sm transition-all duration-300 hover:border-brand-blue hover:text-brand-blue hover:-translate-y-0.5" target="_blank" rel="noopener">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Unduh Resume
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Skills -->
@if ($skills->count())
<section id="skills" class="bg-gray-50 py-20 sm:py-28 border-t border-gray-100">
    <div class="container-wide">
        <div data-aos="fade-up">
            <p class="eyebrow text-brand-blue font-semibold">Expertise</p>
            <h2 class="section-title text-gray-900">Keahlian & Teknologi</h2>
        </div>
        <div class="mt-12 space-y-10">
            @foreach ($skills as $category => $categorySkills)
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-brand-blue mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-brand-blue"></span>
                        {{ $category }}
                    </h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($categorySkills as $skill)
                            <span class="inline-flex items-center rounded-xl bg-white px-4 py-2.5 text-sm font-medium text-gray-700 border border-gray-200 shadow-sm transition-all duration-300 hover:border-brand-blue hover:text-brand-blue hover:scale-105 hover:shadow-md cursor-default">
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
        <div data-aos="fade-up">
            <p class="eyebrow text-brand-blue font-semibold">Background</p>
            <h2 class="section-title text-gray-900">Pengalaman Kerja</h2>
        </div>
        <div class="mt-12 space-y-10">
            @foreach ($experiences as $index => $exp)
                <div class="relative border-l-2 border-blue-200 pl-8 group" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                    <div class="absolute left-[-9px] top-1.5 h-4 w-4 rounded-full bg-white border-4 border-brand-blue shadow transition-transform duration-300 group-hover:scale-125 group-hover:border-brand-deep"></div>
                    <div class="p-5 rounded-2xl bg-gray-50/60 border border-gray-100 transition-all duration-300 group-hover:bg-white group-hover:shadow-md group-hover:border-gray-200">
                        <h3 class="text-lg font-bold text-gray-900">{{ $exp->role }}</h3>
                        <p class="mt-1 text-sm font-medium text-brand-blue">{{ $exp->company }} · <span class="text-gray-500 font-normal">{{ $exp->type }}</span></p>
                        <p class="mt-1 text-xs text-gray-400 font-mono">
                            {{ $exp->start_date->format('M Y') }} – 
                            @if ($exp->is_current)
                                <span class="text-emerald-600 font-semibold">Sekarang</span>
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
<section id="projects" class="bg-gray-50 py-20 sm:py-28 border-t border-gray-100">
    <div class="container-wide">
        <div data-aos="fade-up">
            <p class="eyebrow text-brand-blue font-semibold">Portfolio</p>
            <h2 class="section-title text-gray-900">Proyek Unggulan</h2>
        </div>
        <div class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($projects as $index => $project)
                <article data-aos="fade-up" data-aos-delay="{{ 100 * ($index % 3 + 1) }}" class="group rounded-2xl border border-gray-200 bg-white overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:border-gray-300 flex flex-col">
                    @if ($project->thumbnail)
                        <div class="aspect-video overflow-hidden bg-gray-100 relative">
                            <img src="{{ $project->thumbnail }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-brand-deep/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-3">
                                @if ($project->demo_url && $project->demo_url !== '#')
                                    <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="p-2.5 rounded-full bg-white text-brand-deep shadow-lg hover:scale-110 transition-transform" title="Live Demo">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                @endif
                                @if ($project->github_url && $project->github_url !== '#')
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="p-2.5 rounded-full bg-white text-brand-deep shadow-lg hover:scale-110 transition-transform" title="Source Code">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 group-hover:text-brand-blue transition-colors">{{ $project->title }}</h3>
                            <p class="mt-2 text-sm text-gray-600 line-clamp-3 leading-relaxed">{{ $project->description }}</p>
                        </div>
                        
                        <div class="mt-6">
                            @if ($project->skills->count())
                                <div class="flex flex-wrap gap-1.5 mb-4">
                                    @foreach ($project->skills->take(4) as $skill)
                                        <span class="text-xs px-2.5 py-0.5 rounded-full bg-blue-50 text-brand-blue border border-blue-100 font-medium">{{ $skill->name }}</span>
                                    @endforeach
                                </div>
                            @endif
                            
                            <div class="flex gap-4 pt-4 border-t border-gray-100">
                                @if ($project->demo_url && $project->demo_url !== '#')
                                    <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="text-xs font-semibold text-brand-blue hover:underline inline-flex items-center gap-1">
                                        Live Demo →
                                    </a>
                                @endif
                                @if ($project->github_url && $project->github_url !== '#')
                                    <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="text-xs font-semibold text-gray-500 hover:text-gray-900 inline-flex items-center gap-1">
                                        Source Code →
                                    </a>
                                @endif
                            </div>
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
    <div class="container-wide max-w-2xl" data-aos="fade-up" data-aos-duration="900">
        <p class="eyebrow text-brand-blue font-semibold">Get in Touch</p>
        <h2 class="section-title text-gray-900">Mari Terhubung</h2>
        
        <div class="mt-8 flex flex-wrap gap-4 text-sm">
            @if ($profile->email)
                <a href="mailto:{{ $profile->email }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-50 border border-gray-200 text-gray-700 hover:border-brand-blue hover:text-brand-blue transition-all duration-300 hover:scale-105 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    {{ $profile->email }}
                </a>
            @endif
            @if ($profile->github_url && $profile->github_url !== '#')
                <a href="{{ $profile->github_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-50 border border-gray-200 text-gray-700 hover:border-brand-blue hover:text-brand-blue transition-all duration-300 hover:scale-105 shadow-sm">
                    GitHub
                </a>
            @endif
            @if ($profile->linkedin_url && $profile->linkedin_url !== '#')
                <a href="{{ $profile->linkedin_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-50 border border-gray-200 text-gray-700 hover:border-brand-blue hover:text-brand-blue transition-all duration-300 hover:scale-105 shadow-sm">
                    LinkedIn
                </a>
            @endif
        </div>

        <form action="{{ route('contact.store') }}" method="POST" class="mt-10 space-y-6 bg-gray-50/50 p-6 sm:p-8 rounded-2xl border border-gray-200 shadow-sm">
            @csrf
            
            @if (session('success'))
                <div class="rounded-lg bg-green-50 border border-green-200 p-4 text-sm text-green-800">{{ session('success') }}</div>
            @endif
            
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                <input type="text" id="name" name="name" required class="w-full rounded-xl bg-white border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20 transition @error('name') border-red-500 @enderror">
                @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                <input type="email" id="email" name="email" required class="w-full rounded-xl bg-white border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20 transition @error('email') border-red-500 @enderror">
                @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek (Opsional)</label>
                <input type="text" id="subject" name="subject" class="w-full rounded-xl bg-white border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20 transition">
            </div>
            
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan *</label>
                <textarea id="message" name="message" rows="5" required class="w-full rounded-xl bg-white border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20 transition resize-none @error('message') border-red-500 @enderror"></textarea>
                @error('message') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
            
            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-brand-deep px-6 py-3.5 text-sm font-semibold text-white shadow-md shadow-brand-deep/20 transition-all duration-300 hover:bg-brand-dark hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:ring-offset-2">
                Kirim Pesan
            </button>
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
