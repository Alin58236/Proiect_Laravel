<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

        <!-- Styles -->
        
        <link id="pagestyle" href="admin/css/material-dashboard.css" rel="stylesheet" />
        <link href="admin/css/nucleo-icons.css" rel="stylesheet" />
        <link href="admin/css/nucleo-svg.css" rel="stylesheet" />

        <!-- Scripts -->

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <script src="{{asset('admin/js/core/popper.min.js') }}" defer></script>
        <script src="{{asset('admin/js/core/bootstrap.min.js') }}" defer></script>
        <script src="{{asset('admin/js/plugins/perfect-scrollbar.min.js') }}" defer></script>
        <script src="{{asset('admin/js/plugins/smooth-scrollbar.min.js') }}" defer></script>
        <script src="{{asset('admin/js/plugins/chartjs.min.js') }}" defer></script>

    </head>

    <body class="g-sidenav-show  bg-gray-200">

        
        <div class="wrapper">
            @include('layouts.inc.sidebar')
            
            <div class="main-panel">
                @include('layouts.inc.adminnav')
            

                <div class="content">
                    @yield('content')
                </div>

                @include('layouts.inc.adminfooter')

            </div>
        </div>


        @yield('scripts')
    </body>

</html>
