<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }} @yield('sides')</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Plugins --}}
    <link href="{{ asset('plugins/fontawesome-6.1.1/css/all.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('plugins/datatables-1.11.5/datatables.min.css') }}" rel="stylesheet">
    </link> --}}
    <link href="{{ asset('plugins/datatables-1.11.5/DataTables-1.11.5/css/jquery.dataTables.min.css') }}"
        rel="stylesheet">
    </link>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>
    <script src="{{ asset('js/jquery3.6.0.js') }}"></script>
    <script src="{{ asset('plugins/datatables-1.11.5/datatables.min.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body>
    @livewire('livewire-ui-modal')
    @yield('body')

    @livewireScripts
</body>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>

</html>
