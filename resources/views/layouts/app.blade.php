<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>



    @livewireStyles
</head>
<body class="bg-gray-100">

    <div class="max-w-5xl mx-auto p-6 bg-white shadow-lg mt-10 rounded-lg border border-gray-200">
        @yield('content')
    </div>

    {{-- Livewire Scripts --}}
    @livewireScripts
</body>
</html>
