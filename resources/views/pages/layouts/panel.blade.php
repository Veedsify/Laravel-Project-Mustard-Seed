<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- Title -->
    <title>
        @yield('title', 'Admin Panel')
    </title>
    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('lime_assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lime_assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lime_assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lime_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- Theme Styles -->
    <link href="{{ asset('lime_assets/css/lime.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lime_assets/css/custom.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
        @livewireStyles
</head>

<body>
    {{-- <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div> --}}
    {{-- SIDEBAR  --}}
    <x-panel.sidebar />
    {{-- SEARCH  --}}
    <x-panel.search />
    {{-- NOTIFICATIONS  --}}
    <x-panel.notifications />
    {{-- HEADER  --}}
    <x-panel.header />
    @yield('content')
    <!-- Javascripts -->
    @livewireScripts
    <script src="{{ asset('lime_assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('lime_assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('lime_assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lime_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('lime_assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('lime_assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('lime_assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('lime_assets/js/lime.min.js') }}"></script>
    <script src="{{ asset('lime_assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('lime_assets/js/pages/select2.js') }}"></script>
    <script src="{{ asset('lime_assets/js/pages/dashboard.js') }}"></script>
    <script>
        window.addEventListener('notify-success', event => {
            toastr.success(event.detail.message)
        });
        window.addEventListener('notify-error', event => {
            toastr.error(event.detail.message)
            // swal({
            //     title: event.detail.title,
            //     icon: 'error',
            //     button: 'OK',
            //     text: event.detail.message
            // })
        });

        function confirmDelete(id, name) {
            swal({
                title: 'Are you sure?',
                text: `Once deleted, you will not be able to recover this ${name}!`,
                icon: 'warning',
                buttons: true,
            }).then((value) => {
                if (value) {
                    Livewire.dispatch('deleteThis', {
                        id: id
                    });
                }
            });
        }
        const quill = new Quill('#exampleEditor1', {
            debug: 'info',
            modules: {
                toolbar: true,
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
        });
    </script>
</body>

</html>
