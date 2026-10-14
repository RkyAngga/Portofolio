<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', ($profile->full_name ?? 'Portfolio') . ' — Portfolio')</title>
    <meta name="description" content="{{ $profile->bio_short ?? 'Portfolio profesional — software development, engineering, dan design.' }}">
    <meta property="og:title" content="@yield('title', ($profile->full_name ?? 'Portfolio') . ' — Portfolio')">
    <meta property="og:description" content="{{ $profile->bio_short ?? 'Portfolio profesional.' }}">
    <meta property="og:type" content="website">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans text-gray-800 antialiased">
    @yield('content')
</body>
</html>
