<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @yield('sidemenu')
        @include('layouts.navbar')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid min-height" style="height: 7px;">
                    <div class="row">
                    </div>
                </div>
            </section>
            @yield('content')
        </div>
    </div>
    <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('data-tables')
    @yield('custom-table')
</body>

</html>