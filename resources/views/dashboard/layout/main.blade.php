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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap');

        :root {
    --color-primary: #4373F6;
    --color-primary-hover: #2F5FE0;
    --color-secondary: #010521;
}
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
/* 1. Main Popup Container */
.custom-swal-popup {
    padding: 0 !important; /* Needed for the full-width header */
    background: #ffffff !important;
    overflow: hidden !important;
}

/* 2. The Header (styled via the title class) */
.custom-swal-header {
    background-color: var(--color-secondary);
    background-image: radial-gradient(circle at 0% 0%, rgba(67, 115, 246, 0.2) 0%, transparent 70%);
    color: white !important;
    margin: 0 !important;
    padding: 1.5rem 2rem !important;
    font-size: 1.1rem !important;
    font-weight: 700 !important;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    width: 100%;
    display: block;
    text-align: left;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}

/* 3. The Form Body */
.custom-swal-body {
    padding: 2rem !important;
    margin: 0 !important;
    text-align: left !important;
}

/* 4. The Bottom Actions (Buttons) */
.custom-swal-actions {
    background: #fcfdfe;
    padding: 1.25rem 2rem !important;
    margin: 0 !important;
    border-top: 1px solid #f1f5f9;
    width: 100%;
    justify-content: flex-end !important;
}

/* Button Customization */
.swal2-confirm {
    padding: 0.8rem 2.5rem !important;
    font-weight: 600 !important;
    border-radius: 0.75rem !important;
    text-transform: uppercase;
    letter-spacing: 0.02em;
    font-size: 0.85rem !important;
}

.swal2-cancel {
    background: transparent !important;
    color: #94a3b8 !important;
    font-weight: 600 !important;
    font-size: 0.85rem !important;
}

/* Close button (if enabled) */
.swal2-close {
    color: white !important;
    top: 10px !important;
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
            <main class="flex-1 flex flex-col overflow-hidden">
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
