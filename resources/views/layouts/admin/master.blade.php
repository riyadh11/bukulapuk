<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Bukulapuk adalah tempat jual beli buku online paling murah se indonesia">
        <meta name="author" content="Bukulapuk">

        <link rel="shortcut icon" href="/assets/images/favicon_1.ico">
        <link href="/assets/plugins/custombox/css/custombox.css" rel="stylesheet">
        <link href="/assets/plugins/footable/css/footable.core.css" rel="stylesheet">
        <link href="/assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />


        <title> {{ $title or 'BUKULAPUK - DASHBOARD' }}</title>
        
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="/assets/js/modernizr.min.js"></script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
         @include('layouts.admin.header')
         @include('layouts.admin.sidebar')
         

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title"> {{ $page_title or 'DASHBOARD' }} </h4>
                                <p class="text-muted page-title-alt"> {{ $page_desc or 'This Is Dashboard!' }}</p>
                            </div>
                          @yield('content')
                        </div>
                    </div>
                  </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
         @include('layouts.core.footer')
        </div>

        <!-- END wrapper -->
            
            <!-- ============================================================== -->
            <!-- Modal here -->
            <!-- ============================================================== -->
        @yield('modals')
            <!-- ============================================================== -->
            <!-- END Modal here -->
            <!-- ============================================================== -->
        
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/detect.js"></script>
        <script src="/assets/js/fastclick.js"></script>

        <script src="/assets/js/jquery.slimscroll.js"></script>
        <script src="/assets/js/jquery.blockUI.js"></script>
        <script src="/assets/js/waves.js"></script>
        <script src="/assets/js/wow.min.js"></script>
        <script src="/assets/js/jquery.nicescroll.js"></script>
        <script src="/assets/js/jquery.scrollTo.min.js"></script>
        <script src="/assets/js/jquery.core.js"></script>
        <script src="/assets/js/jquery.app.js"></script>
        <script>
            function logout() {
            window.location = "/admin/logout";
            }
        </script>
         @yield('plugins')
    </body>
</html>