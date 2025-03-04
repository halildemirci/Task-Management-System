<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task Management System</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    {{-- @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @endif --}}
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="min-w-screen flex p-6 items-center justify-center min-h-screen flex-col">

    <x-toast />

    <div class="w-full h-16 bg-white shadow-md flex items-center justify-between px-6 absolute top-0 left-0 right-0">
        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ route('users.index') }}" class="text-blue-500 font-medium">Kullanıcılar</a>
                <a href="{{ route('tasks.index') }}" class="text-blue-500 font-medium">Görevler</a>
                <a href="{{ route('tasks.create') }}" class="text-blue-500 font-medium">Yeni Görev Ekle</a>
                <a href="{{ route('auth.logout') }}" class="text-blue-500 font-medium">Çıkış Yap</a>
            @else
                <a href="{{ route('auth.login') }}" class="text-blue-500 font-medium">Giriş Yap</a>
                <a href="{{ route('auth.register') }}" class="text-blue-500 font-medium">Kayıt Ol</a>
            @endauth
        </div>
    </div>

    @if (auth()->check())
        <div
            class="{{ (route('tasks.index') || route('users.index')) == request()->url() ? 'container mx-auto' : '' }}">
    @endif
