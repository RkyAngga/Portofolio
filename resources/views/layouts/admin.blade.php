<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans text-gray-800 antialiased">
    <div class="min-h-screen flex">
        <!-- Mobile overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black/40 hidden md:hidden"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 border-r border-gray-200 bg-white transform -translate-x-full transition-transform duration-200 md:relative md:translate-x-0 md:flex md:flex-col">
            <div class="p-6 border-b border-gray-200 flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-900">Admin Panel</h1>
                <button id="sidebar-close" type="button" aria-label="Tutup menu" class="md:hidden rounded-lg p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition">✕</button>
            </div>
            <nav class="flex-1 space-y-1 p-4 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-lg text-sm font-medium @if (Route::is('admin.dashboard')) bg-brand-deep text-white @else text-gray-600 hover:text-brand-deep hover:bg-gray-50 @endif transition">
                    Dashboard
                </a>
                <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 rounded-lg text-sm font-medium @if (Route::is('admin.profile.*')) bg-brand-deep text-white @else text-gray-600 hover:text-brand-deep hover:bg-gray-50 @endif transition">
                    Profile
                </a>
                <a href="{{ route('admin.projects.index') }}" class="block px-4 py-2 rounded-lg text-sm font-medium @if (Route::is('admin.projects.*')) bg-brand-deep text-white @else text-gray-600 hover:text-brand-deep hover:bg-gray-50 @endif transition">
                    Projects
                </a>
                <a href="{{ route('admin.skills.index') }}" class="block px-4 py-2 rounded-lg text-sm font-medium @if (Route::is('admin.skills.*')) bg-brand-deep text-white @else text-gray-600 hover:text-brand-deep hover:bg-gray-50 @endif transition">
                    Skills
                </a>
                <a href="{{ route('admin.experiences.index') }}" class="block px-4 py-2 rounded-lg text-sm font-medium @if (Route::is('admin.experiences.*')) bg-brand-deep text-white @else text-gray-600 hover:text-brand-deep hover:bg-gray-50 @endif transition">
                    Experiences
                </a>
                <a href="{{ route('admin.messages.index') }}" class="block px-4 py-2 rounded-lg text-sm font-medium @if (Route::is('admin.messages.*')) bg-brand-deep text-white @else text-gray-600 hover:text-brand-deep hover:bg-gray-50 @endif transition">
                    Messages
                </a>
            </nav>
            <div class="border-t border-gray-200 p-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full rounded-lg bg-red-50 px-4 py-2 text-sm font-medium text-red-700 hover:bg-red-100 transition">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main -->
        <main class="flex-1 min-w-0 flex flex-col">
            <!-- Top bar -->
            <header class="sticky top-0 z-30 border-b border-gray-200 bg-white px-4 sm:px-6 py-3 sm:py-4 flex items-center gap-3">
                <button id="sidebar-open" type="button" aria-label="Buka menu" class="md:hidden rounded-lg border border-gray-200 p-2 text-gray-600 hover:bg-gray-50 transition">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h2 class="text-lg sm:text-xl font-bold text-gray-900 truncate">@yield('page-title', 'Dashboard')</h2>
                <div class="ml-auto flex items-center gap-4">
                    <span class="hidden sm:inline text-sm text-gray-600 truncate max-w-[160px]">{{ auth()->user()->name }}</span>
                </div>
            </header>

            <!-- Content -->
            <div class="flex-1 overflow-x-hidden p-4 sm:p-6">
                @if (session('success'))
                    <div class="mb-4 rounded-lg bg-green-50 border border-green-200 p-4 text-sm text-green-800">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4 text-sm text-red-700">{{ session('error') }}</div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        (function () {
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('sidebar-overlay');
            var openBtn = document.getElementById('sidebar-open');
            var closeBtn = document.getElementById('sidebar-close');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }

            openBtn.addEventListener('click', openSidebar);
            closeBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);
            window.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') closeSidebar();
            });
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.add('hidden');
                    document.body.style.overflow = '';
                    return;
                }

                if (overlay.classList.contains('hidden')) {
                    sidebar.classList.add('-translate-x-full');
                }
            });
        })();
    </script>
</body>
</html>
