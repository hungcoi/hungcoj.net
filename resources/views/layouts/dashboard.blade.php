<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" >

        <title>{{ trans('common.title.page') }}</title>

        @include('partial.styles')

    </head>

    <body>
        <!-- Wrapper-->
        <div id="wrapper">

            <!-- Navigation -->
            @include('partial.navigation')

            <!-- Page wraper -->
            <div id="page-wrapper" class="gray-bg">

                <!-- Page wrapper -->
                @include('partial.topnavbar')

                <!-- Main view  -->
                <div class="container-fluid" id="page-content">
                    @yield('content')
                </div>

                <!-- Footer -->
                @include('partial.footer')

            </div>
            <!-- End page wrapper-->

        </div>

        @include('partial.scripts')

    </body>
</html>
