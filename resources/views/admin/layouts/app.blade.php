<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
    @yield('styles')
</head>
    <body>
    <!-- Begin page -->
    <div id="wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                @include('admin.includes.breadcrumbs')
                @yield('content')
            </div>
            <!-- end content -->
            @include('admin.layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    @include('admin.layouts.scripts')
    </body>
</html>
