<!DOCTYPE html>
<html lang="zxx">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="images/favi.ico">
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <title>{{ get_option('site_title') }}</title>
        @include('Frontend.Layout.top-scripts')
    </head>
    <body>
    
    

        @include('Admin.Layout.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('Admin.Layout.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            
            @include('Admin.Layout.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    
    @include('Frontend.Layout.bottom-scripts')
    <!-- Js Files Start -->
    
    </body>
</html>