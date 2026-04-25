<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>BlueOrbit | Growth Dashboard</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/dashboard/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar-transition {
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #E2E8F0;
            border-radius: 10px;
        }
    </style>
</head>

<body class="bg-[#F8FAFF] text-(--color-primary)">
    <div class="flex">

        @include('dashboard.layout.sidebar')

        <div class="flex flex-col w-full">
            {{-- ! Header --}}
            @include('dashboard.layout.header')

            {{-- ! Main Content --}}
            <main class="flex-1 flex flex-col  overflow-hidden">
                @yield('content')
            </main>
        </div>
    </div>
    <script>
        lucide.createIcons();
    </script>
</body>
@stack('scripts')

</html>
