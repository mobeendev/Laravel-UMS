<!DOCTYPE html>
<html lang="en">

    <head>
        @include('layouts.partials.header')
        <style>
            .uper {
                margin-top: 10px;
            }
        </style>
    </head>

    <body>

        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            @include('layouts.partials.sidebar')
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                @include('layouts.partials.nav')


                @yield('content')


            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        @include('layouts.partials.footer')


    </body>

</html>
