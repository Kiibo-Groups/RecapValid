<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}"
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
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Page CSS -->
    @yield('css')
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @if (!Route::is('login'))
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('home') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><defs><linearGradient id="0" gradientUnits="userSpaceOnUse" y1="227.63" x2="0" y2="171.63"><stop stop-color="#2fae61"/><stop offset="1" stop-color="#4bdf88"/></linearGradient></defs><g transform="matrix(.92857 0 0 .92857-676.99-152.79)"><path d="m789.32 182.93c-.017-1.302-1.019-2.377-2.315-2.496-10.772-1.01-19.563-6.764-22.461-8.87-.606-.442-1.426-.442-2.032 0-2.893 2.106-11.683 7.863-22.456 8.87-1.296.119-2.293 1.194-2.315 2.496-.13 8.497 1.234 37.34 25.14 43.762.425.113.872.113 1.296 0 23.905-6.413 25.27-35.27 25.14-43.762" fill="url(#0)"/><path d="m773.85 193.97l-1.89-1.89c-.259-.259-.574-.389-.945-.389-.371 0-.686.13-.945.389l-9.116 9.13-4.085-4.099c-.259-.259-.574-.389-.945-.389-.371 0-.686.13-.945.389l-1.89 1.89c-.259.259-.389.574-.389.945 0 .37.13.686.389.945l5.03 5.03 1.89 1.89c.259.259.574.389.945.389.37 0 .685-.13.945-.389l1.89-1.89 10.06-10.06c.259-.259.389-.574.389-.945 0-.37-.13-.685-.389-.945" fill="#fff" fill-opacity=".851"/></g></svg>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">SuperAdmin</span>
                    </a>
            
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
        
                <div class="menu-inner-shadow"></div>
        
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item @if(Route::is('home')) active @endif">
                        <a href="{{ route('home') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Inicio</div>
                        </a>
                    </li>
            
                    <!-- Layouts -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Opciones</span>
                    </li>
                    <li class="menu-item @if(Route::is('account')) active open @elseif(Route::is('conns')) active open @endif">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Configuraciónes</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item @if(Route::is('account')) active @endif">
                                <a href="{{ route('account') }}" class="menu-link">
                                <div data-i18n="Account">Cuenta</div>
                                </a>
                            </li>
                            <li class="menu-item @if(Route::is('conns')) active @endif">
                                <a href="{{ route('conns') }}" class="menu-link">
                                <div data-i18n="Connections">Conexiones</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                
                    <!-- Components -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Componentes</span></li>
 
                    <li class="menu-item @if(Route::is('upload_xlsx')) active @endif">
                        <a href="{{ route('upload_xlsx') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-box"></i>
                        <div data-i18n="Basic">Listado Vehicular</div>
                        </a>
                    </li> 
                    </ul>
            </aside>
            <!-- / Menu -->
            @endif

            <!-- Layout container -->
            <div class="layout-page">
        
                @if (!Route::is('login'))
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
        
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                @yield('title_page')
                            </div>
                        </div>
                        <!-- /Search -->
                        
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- Place this tag where you want the button to render. -->
            
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><defs><linearGradient id="0" gradientUnits="userSpaceOnUse" y1="227.63" x2="0" y2="171.63"><stop stop-color="#2fae61"/><stop offset="1" stop-color="#4bdf88"/></linearGradient></defs><g transform="matrix(.92857 0 0 .92857-676.99-152.79)"><path d="m789.32 182.93c-.017-1.302-1.019-2.377-2.315-2.496-10.772-1.01-19.563-6.764-22.461-8.87-.606-.442-1.426-.442-2.032 0-2.893 2.106-11.683 7.863-22.456 8.87-1.296.119-2.293 1.194-2.315 2.496-.13 8.497 1.234 37.34 25.14 43.762.425.113.872.113 1.296 0 23.905-6.413 25.27-35.27 25.14-43.762" fill="url(#0)"/><path d="m773.85 193.97l-1.89-1.89c-.259-.259-.574-.389-.945-.389-.371 0-.686.13-.945.389l-9.116 9.13-4.085-4.099c-.259-.259-.574-.389-.945-.389-.371 0-.686.13-.945.389l-1.89 1.89c-.259.259-.389.574-.389.945 0 .37.13.686.389.945l5.03 5.03 1.89 1.89c.259.259.574.389.945.389.37 0 .685-.13.945-.389l1.89-1.89 10.06-10.06c.259-.259.389-.574.389-.945 0-.37-.13-.685-.389-.945" fill="#fff" fill-opacity=".851"/></g></svg>
                            </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><defs><linearGradient id="0" gradientUnits="userSpaceOnUse" y1="227.63" x2="0" y2="171.63"><stop stop-color="#2fae61"/><stop offset="1" stop-color="#4bdf88"/></linearGradient></defs><g transform="matrix(.92857 0 0 .92857-676.99-152.79)"><path d="m789.32 182.93c-.017-1.302-1.019-2.377-2.315-2.496-10.772-1.01-19.563-6.764-22.461-8.87-.606-.442-1.426-.442-2.032 0-2.893 2.106-11.683 7.863-22.456 8.87-1.296.119-2.293 1.194-2.315 2.496-.13 8.497 1.234 37.34 25.14 43.762.425.113.872.113 1.296 0 23.905-6.413 25.27-35.27 25.14-43.762" fill="url(#0)"/><path d="m773.85 193.97l-1.89-1.89c-.259-.259-.574-.389-.945-.389-.371 0-.686.13-.945.389l-9.116 9.13-4.085-4.099c-.259-.259-.574-.389-.945-.389-.371 0-.686.13-.945.389l-1.89 1.89c-.259.259-.389.574-.389.945 0 .37.13.686.389.945l5.03 5.03 1.89 1.89c.259.259.574.389.945.389.37 0 .685-.13.945-.389l1.89-1.89 10.06-10.06c.259-.259.389-.574.389-.945 0-.37-.13-.685-.389-.945" fill="#fff" fill-opacity=".851"/></g></svg>
                                        </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-semibold d-block">Bienvenido(a)</span>
                                            <small class="text-muted">Admin</small>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Cuenta</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Conexiones</span>
                                    </a>
                                </li> 
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Cerrar Sesión</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->
                @endif
        
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        
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
                    <!-- / Content -->
            
                    @if (!Route::is('login'))
                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                            document.write(new Date().getFullYear());
                            </script>
                            , Desarrollado por 
                            <a href="https://kiibo.mx" target="_blank" class="footer-link fw-bolder">Kiibo Groups</a>
                        </div> 
                        </div>
                    </footer>
                    <!-- / Footer -->
            
                    <div class="content-backdrop fade"></div>
                    @endif
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
      </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Page JS -->
    @yield('js')

    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script>
        function deleteConfirm(url)
        {
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

        function confirmAlert(url)
        {
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
        })
        }

        function showMsg(data)
        {
            Swal.fire(data);
        } 
    </script>
</body>
</html>
