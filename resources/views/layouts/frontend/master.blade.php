<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="okiiq8vvw4EvAJykmDfKcZ_K3BCAyimVOt66oGm8zBE" />
    <link rel="shortcut icon"
        href="{{ asset($setting['site_fav_icon'] ? get_media($setting['site_fav_icon'])->fullurl : 'frontend/images/logo.png') }}"
        type="image/x-icon">
    <link rel="icon"
        href="{{ asset($setting['site_fav_icon'] ? get_media($setting['site_fav_icon'])->fullurl : 'frontend/images/logo.png') }}"
        type="image/x-icon">
    @yield('seo')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Seaweed+Script&amp;display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('frontend') }}/assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/flaticon.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/owl.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/nice-select.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/jquery-ui.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/elpath.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/color.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/rtl.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link href="{{ asset('frontend') }}/assets/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/assets/css/responsive.css" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z45P0WW3F9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Z45P0WW3F9');
    </script>
</head>

<body id="rarasite">
    <div class="boxed_wrapper ltr">
        @include('layouts.frontend.header')

        <main>
            @yield('content')
        </main>

        @include('layouts.frontend.footer')
    </div>
    <script>
        window.gtranslateSettings = {
            "default_language": "en",
            "languages": ["en", "hi", "ne", "gu", "ta", "te", "ru", "fr", "bn", "de", "mr", "ml", "uk", "et", "nl"],
            "wrapper_selector": ".gtranslate_wrapper"
        }
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>

    <script src="{{ asset('frontend') }}/assets/js/jquery.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/owl.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/wow.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.fancybox.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/appear.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/isotope.js"></script>
    {{-- <script src="{{ asset('frontend') }}/assets/js/jquery.nice-select.min.js"></script> --}}
    <script src="{{ asset('frontend') }}/assets/js/jquery-ui.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/text_animation.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/text_plugins.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/parallax-scroll.js"></script>

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- main-js -->
    <script src="{{ asset('frontend') }}/assets/js/script.js"></script>
    @yield('scripts')

</body>

</html>
