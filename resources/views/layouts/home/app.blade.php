    <!doctype html>
    <html lang="en" dir="lrt">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ optional($homePage)->logo }}"
            content="mustard seed, causes, donate, charity foundation, charity hub, mustard seed charity,  theme, donations, non profit, fundraiser,social, ngo, non-profit, nonprofit, organization, volunteer">
        <meta name="author" content="Mustard Seed">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Mustard Seed Charity">
        <meta property="og:site_name" content="Mustard Seed Charity Donations">
        <meta property="og:site_name" content="Mustard Seed Charity">
        <meta property="og:url" content="www.mustardseedcharity.com">
        <meta property="og:image" content="{{ asset('storage/' . optional($homePage)->logo) }}">
        <meta property="og:description" content="{{ optional($homePage)->footer_text }}">
        <meta name="twitter:title" content="Mustard Seed Charity">
        <meta name="twitter:description" content="{{ optional($homePage)->footer_text }}">
        <meta name="twitter:image" content="www.mustardseedcharity.com">
        <meta name="twitter:card" content="summary">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @yield('title', 'Mustatrd Seed') - Mustard Seed Charity
        </title>

        {{-- FONTS --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Space+Grotesk:wght@300..700&display=swap"
            rel="stylesheet">

        {{-- FAVICON --}}
        <link rel="icon" type="image/x-icon" sizes="20x20"
            href="{{ asset('storage/' . optional($homePage)->logo) }}">

        <!-- Bootstrap -->
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-5.3.0.min.css') }}"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- fonts & icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/remixicon.css') }}">
        <!-- Plugin -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugin.css') }}">
        <!-- Main CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main-style.css') }}">
        <!-- RTL CSS::When Need RTL Uncomments File -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <style>
            #content * {
                all : unset !important;
            }
        </style>
        @livewireStyles
    </head>

    <body>
        <div class="loading-page" id="preloader-active">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <x-menu />
        {{ $slot }}
        <x-footer />

        @livewireScripts
        @if (session('error'))
            <script>
                swal({
                    title: 'Action is denied',
                    text: '{{ session('error') }}',
                    icon: 'error',
                })
            </script>
        @endif
        <script src="{{ asset('assets/js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-5.3.0.min.js') }}"></script>
        <!-- Plugin -->
        <script src="{{ asset('assets/js/plugin.js') }}"></script>
        <!-- Main js-->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </body>

    </html>
