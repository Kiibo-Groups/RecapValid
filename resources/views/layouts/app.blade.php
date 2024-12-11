<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" lang="en" class="light-style customizer-hide"
    dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets') }}"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Recaptcha Validator</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" /> --}}


    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets2/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendors/css/vendor.bundle.base.css') }}">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Page CSS -->
    @yield('css')
</head>

<body>
    <div class="container-scroller">

        @if (!Route::is('login'))
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo text-white" href="./"> 
                    RECAP
                </a>
                <a class="navbar-brand brand-logo-mini text-white" href="./"> 
                    RECAP
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu" style="font-size: 28px;"></span>
                </button>
                
                <ul class="navbar-nav navbar-nav-left">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="assets/img/illustrations/man-with-laptop-light.png" alt="image">
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">SuperAdmin</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                            <div class="p-2"> 
                                 
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="#">
                                    <span>Cuenta</span>
                                    <span class="p-0">
                                        <i class="mdi mdi-account-outline ms-1"></i>
                                    </span>
                                </a>
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    <span>Conexiones</span>
                                    <i class="mdi mdi-settings"></i>
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="{{ route('logout') }}">
                                    <span>Cerrar Sesión</span>
                                    <i class="mdi mdi-logout ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        @endif

        <div class="container-fluid page-body-wrapper @if(Route::is('login')) full-page-wrapper @endif">
            @if (!Route::is('login'))
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
              <ul class="nav">
                <li class="nav-item nav-category">Opciones</li>

                <li class="nav-item @if(Route::is('home')) active @endif">
                  <a class="nav-link" href="{{ route('home') }}">
                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li>
                
                <li class="nav-item @if(Route::is('account')) active open @elseif(Route::is('conns')) active open @endif">
                  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                    <span class="menu-title">Configuraciónes</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu"> 
                      <li class="nav-item @if(Route::is('account')) active @endif"> <a class="nav-link" href="{{ route('account') }}">Cuenta</a></li>
                      <li class="nav-item @if(Route::is('conns')) active @endif"> <a class="nav-link" href="{{ route('conns') }}">Conexiones</a></li>
                    </ul>
                  </div>
                </li>

                <li class="nav-item nav-category">Componentes</li>

                <li class="nav-item @if(Route::is('upload_xlsx')) active @endif">
                    <a class="nav-link" href="{{ route('upload_xlsx') }}">
                      <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                      <span class="menu-title">Listado Vehicular</span>
                    </a>
                </li>

                <li class="nav-item @if(Route::is('upload_xlsx.reports_filex')) active @endif">
                    <a class="nav-link" href="{{ route('upload_xlsx.reports_filex') }}">
                      <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                      <span class="menu-title">Reporte de Póliza</span>
                    </a>
                </li>
  
                <li class="nav-item sidebar-user-actions">
                  <div class="sidebar-user-menu">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="mdi mdi-logout menu-icon"></i>
                        <span class="menu-title">Log Out</span></a>
                  </div>
                </li>
              </ul>
            </nav>
            <!-- partial -->
            @endif
           
            @if(Route::is('login'))
                @yield('content')
            @else 
            
            <div class="main-panel">
              <div class="content-wrapper">
                

                @if(Session::has('error'))
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12 col-xl-12"> 
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>ERROR : </strong> {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
                    </div> <!-- end col -->
                </div>
                @endif
                
                
                @if(Session::has('message'))
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>SUCCESS : </strong> {{ Session::get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
                    </div> <!-- end col -->
                </div>
                @endif
                
                @yield('content')
              </div>
              <!-- content-wrapper ends -->
              <!-- partial:partials/_footer.html -->
              @if (!Route::is('login'))
              <footer class="footer">
                <div class="footer-inner-wraper">
                  <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://kiibo.mx" target="_blank" class="footer-link fw-bolder">Kiibo Groups</a> 2024</span>
                  </div>
                </div>
              </footer>
              @endif
              <!-- partial -->
            </div>
            <!-- main-panel ends -->
            @endif
        </div>
 
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    {{-- <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script> --}}
    <!-- endbuild -->
     <!-- plugins:js -->
     <script src="{{ asset('assets2/vendors/js/vendor.bundle.base.js') }}"></script>
     <!-- endinject -->
     <!-- Plugin js for this page -->
     <script src="{{ asset('assets2/vendors/chart.js/Chart.min.js') }}"></script>
     <script src="{{ asset('assets2/vendors/jquery-circle-progress/js/circle-progress.min.js') }}"></script>
     <script src="{{ asset('assets2/js/jquery.cookie.js') }}" type="text/javascript"></script>
     <!-- End plugin js for this page -->
     <!-- inject:js -->
     <script src="{{ asset('assets2/js/off-canvas.js') }}"></script>
     <script src="{{ asset('assets2/js/hoverable-collapse.js') }}"></script>
     <script src="{{ asset('assets2/js/misc.js') }}"></script>
     <!-- endinject -->
     <!-- Custom js for this page -->
     <script src="{{ asset('assets2/js/dashboard.js') }}"></script>
     <!-- End custom js for this page -->
    <!-- Vendors JS -->
    <!-- Main JS -->
    {{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}
    <!-- Page JS -->
    @yield('js')

    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script>
        function deleteConfirm(url) {
            Swal.fire({
                title: '¿Estas seguro(a)?',
                text: "Estas a punto de eliminar este elemento.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'SI, Eliminar!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Eliminado!',
                        'Este elemento ha sido eliminado con éxito.',
                        'success'
                    )

                    window.location = url;
                }
            });
        }

        function confirmAlert(url) {
            Swal.fire({
                title: '¿Estas seguro(a)?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Hacerlo!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Cambio!',
                        'Este elemento ha sido actualizado con éxito.',
                        'success'
                    )

                    window.location = url;
                }
            });
        }

        function ViewData() {

        }

        function showMsg(data) {
            Swal.fire(data);
        }
    </script>

</body>

</html>
