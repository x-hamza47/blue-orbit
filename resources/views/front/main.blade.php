<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BlueOrbit Digital Agency</title>
    <meta name="robots" content="noindex, nofollow">
    {{-- ? CDNs --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/swiper.js'])
</head>

<body>
    @include('front.shared.header')
    <main class="md:pt-32 pt-20">
        @yield('content')
    </main>
    @include('front.shared.footer')
</body>

{{-- ? CDNs --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


@stack('scripts')

@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')),
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                customClass: {
                    popup: 'swal2-high-z'
                }
            });
        });
    </script>
@endif

</html>
