@php
    $identity = \App\Models\Master\Identity::first();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>

    <meta name="robots" content="noindex, follow" />

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Sistem Informasi Desa" name="description" />
    <meta content="SID" name="author" />

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/css/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/backtotop.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

    @livewireStyles
    @stack('style')
</head>

<body>

    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="loader"></div>
                <div class="shadow"></div>
            </div>
        </div>
    </div>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <x-f-header />

    <div class="body-overlay"></div>

    <main class="all-content">
        {{ $slot }}
    </main>

    <x-f-footer />

    <!-- JS here -->
    <script src="{{ asset('frontend/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('frontend/js/meanmenu.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('frontend/js/tweenmax.js') }}"></script>
    <script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/js/parallax.js') }}"></script>
    <script src="{{ asset('frontend/js/backtotop.js') }}"></script>
    <script src="{{ asset('frontend/js/nice-select.js') }}"></script>
    <script src="{{ asset('frontend/js/countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/js/counterup.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('frontend/js/ajax-form.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 800, // durasi animasi dalam ms
            easing: 'ease-in-out', // efek easing
            once: false, // true: animasi hanya sekali, false: animasi saat muncul lagi di viewport
            mirror: true // true: animasi juga aktif saat scroll ke atas
        });
    </script>

    <script>
        const counters = document.querySelectorAll('.count');
        const duration = 2000; // durasi animasi (ms)
        const delay = 5000; // jeda sebelum animasi diulang (ms)

        function startCounter(counter) {
            const target = +counter.getAttribute('data-target');
            let current = 0;

            const increment = target / (duration / 20);

            function updateCount() {
                if (current < target) {
                    current += increment;
                    counter.innerText = Math.ceil(current).toLocaleString('id-ID');
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target.toLocaleString('id-ID');

                    // Ulangi animasi setelah delay
                    setTimeout(() => {
                        counter.innerText = '0';
                        startCounter(counter);
                    }, delay);
                }
            }

            updateCount();
        }

        // Jalankan semua counter
        counters.forEach(counter => {
            startCounter(counter);
        });
    </script>

    @livewireScripts
    @stack('script')
</body>

</html>
