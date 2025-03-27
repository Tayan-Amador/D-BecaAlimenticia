<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-orange-900 hidden lg:block">
            @include('components.menu-lateral')
        </aside>

        <!-- Mobile Sidebar (Usa un menú colapsable) -->
        <aside class="bg-orange-900 lg:hidden" x-data="{ open: false }">
            <button @click="open = !open" class="p-4 text-white">☰</button>
            <div x-show="open" class="p-4">
                @include('components.menu-lateral')
            </div>
        </aside>

        <div class="flex-1">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('layouts.footer')
        </div>
    </div>
</body>

<script>
    document.querySelectorAll('.dropdown-btn').forEach(button => {
        button.addEventListener('click', () => {
            const targetMenu = document.getElementById(button.getAttribute('data-target'));
            const icon = button.querySelector('.dropdown-icon');

            if (targetMenu.classList.contains('hidden')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add(
                    'hidden'));
                document.querySelectorAll('.dropdown-icon').forEach(icon => icon.classList.remove(
                    'rotate-180'));
            }

            targetMenu.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
</script>

</html>
