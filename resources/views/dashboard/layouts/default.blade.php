<!DOCTYPE html>
<html lang="en">

<head>

    @include('dashboard.includes.head')

</head>

  <body class="hold-transition sidebar-mini sidebar-collapse">

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('dashboard.includes.navbar')
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('dashboard.includes.sidebar')
        </aside>

        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>@yield('pageTitle') Controller</h1>
                  </div>
                  <div class="col-sm-6">
                      <!--<div class="text-right">
                        <p>Welcome To our Custom made dashboard from <b>SENRO</b><p>
                            <p class="text-muted">Developed by <ion-icon name="glasses-outline"></ion-icon> Farouk Bousselmi <p>
                      </div>-->

                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            @include('dashboard.includes.footer')
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    @include('dashboard.includes.footer-scripts')
  </body>

</html>
