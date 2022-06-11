<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8" />
        <title>Rethasoft Yönetim Paneli</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="RethaSoft" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf_token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('panel/assets/images/favicon.ico') }}">

        <!-- Plugins css -->
        <link href="{{ asset('panel/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/
        css" />
        <link href="{{ asset('panel/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('panel/assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('panel/assets/css/config/modern/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{ asset('panel/assets/css/config/modern/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

        <link href="{{ asset('panel/assets/css/config/modern/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="{{ asset('panel/assets/css/config/modern/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
        <!-- Jquery Toast css -->
        <link href="{{ asset('panel/assets/libs/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- icons -->
        <link href="{{ asset('panel/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- app -->
        <link href="{{ asset('panel/assets/css/app.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <!-- body start -->
    <body class="loading" data-layout-mode="detached" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">

            <li class="d-none d-lg-block">
                <form class="app-search">
                    <div class="app-search-box dropdown">
                        {{-- <div class="input-group">
                            <input type="search" class="form-control" placeholder="Müşteri Ara..." id="top-search">
                            <button class="btn input-group-text" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div> --}}
                        {{-- <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found 22 results</h5>
                            </div>
            
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-home me-1"></i>
                                <span>Analytics Report</span>
                            </a>
            
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-aperture me-1"></i>
                                <span>How can I help you?</span>
                            </a>
                            
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex align-items-start">
                                        <img class="d-flex me-2 rounded-circle" src="{{ asset('panel/assets/images/users/user-2.jpg') }}" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex align-items-start">
                                        <img class="d-flex me-2 rounded-circle" src="{{ asset('panel/assets/images/users/user-5.jpg') }}" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
            
                        </div>   --}}
                    </div>
                </form>
            </li>
    
            <li class="dropdown d-inline-block d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="{{ url('/admin') }}#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>
    
            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="{{ url('/admin') }}#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>
    
            {{-- <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="{{ url('/admin') }}#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('panel/assets/images/flags/us.jpg') }}" alt="user-image" height="16">
                </a>
                <div class="dropdown-menu dropdown-menu-end">
    
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('panel/assets/images/flags/germany.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                    </a>
    
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('panel/assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                    </a>
    
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('panel/assets/images/flags/spain.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                    </a>
    
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="{{ asset('panel/assets/images/flags/russia.jpg') }}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                    </a>
    
                </div>
            </li> --}}
            
            {{-- <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="{{ url('/admin') }}#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg">
    
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                <a href="{{ url('/admin') }}" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>
    
                    <div class="noti-scroll" data-simplebar>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon">
                                <img src="{{ asset('panel/assets/images/users/user-1.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Cristina Pride</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Hi, How are you? What about our next meeting</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="{{ asset('panel/assets/images/users/user-4.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">New user registered.
                                <small class="text-muted">5 hours ago</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-secondary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>
    
                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fe-arrow-right"></i>
                    </a>
    
                </div>
            </li> --}}
    
            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="{{ url('/admin') }}#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('panel/assets/images/users/user-6.jpg') }}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ms-1">
                        YÖNETİM PANELİ <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Hoş Geldiniz</h6>
                    </div>
    
                    <!-- item-->
                    <a href="{{ url('/admin/hesap') }}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Hesabım</span>
                    </a>
    
                    <!-- item-->
                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Ayarlar</span>
                    </a> --}}
    
                    <!-- item-->
                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Ekrani Kilitle</span>
                    </a> --}}
    
                    <div class="dropdown-divider"></div>
    
                    <!-- item-->
                    <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Çıkış</span>
                    </a>
                    <form id="logout-form" action="{{ url('/admin/logout') }}" method="post">
                        @csrf
                    </form>
    
                </div>
            </li>
        </ul>
    
        <!-- LOGO -->
        <div class="logo-box">
            <span class="logo-sm">
                <img src="{{ asset('panel/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <h1>Yönetim Paneli</h1>
            {{-- <a href="{{ url('/admin') }}" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{ asset('panel/assets/images/logo-sm.png') }}" alt="" height="22">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('panel/assets/images/logo-dark.png') }}" alt="" height="20">
                    <!-- <span class="logo-lg-text-light">U</span> -->
                </span>
            </a>
    
            <a href="{{ url('/admin') }}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{ asset('panel/assets/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('panel/assets/images/logo-light.png') }}" alt="" height="20">
                </span>
            </a> --}}
        </div>
    
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>   
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{ asset('panel/assets/images/users/user-6.jpg') }}" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-bs-toggle="dropdown">Rethasoft</a>
                            {{-- <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock me-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out me-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div> --}}
                        </div>
                        <p class="text-muted">Yönetici</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            {{-- <li class="menu-title">Navigation</li> --}}
                
                            <li>
                                <a href="/admin">
                                    <i data-feather="airplay"></i>
                                    {{-- <span class="badge bg-success rounded-pill float-end">4</span> --}}
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/modul/list') }}">
                                    <i data-feather="package"></i>
                                    <span> Modüller </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/slider/list') }}">
                                    <i data-feather="image"></i>
                                    <span> Slider </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/menu/list') }}">
                                    <i data-feather="menu"></i>
                                    <span> Menu </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/kategori/list') }}">
                                    <i data-feather="list"></i>
                                    <span> Kategoriler </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/urun/list') }}">
                                    <i data-feather="package"></i>
                                    <span> Ürünler </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/proje/list') }}">
                                    <i data-feather="package"></i>
                                    <span> Projeler </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/haber/list') }}">
                                    <i data-feather="file-text"></i>
                                    <span> Haberler </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/hizmet/list') }}">
                                    <i data-feather="package"></i>
                                    <span> Hizmetlerimiz </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/referans/list') }}">
                                    <i data-feather="users"></i>
                                    <span> Referanslar </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/sertifika/list') }}">
                                    <i data-feather="file-text"></i>
                                    <span> Sertifikalarımız </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/sayfa/list') }}">
                                    <i data-feather="file-text"></i>
                                    <span> Sabit Sayfalar </span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ url('/admin/lang/list') }}">
                                    <i data-feather="flag"></i>
                                    <span> Dil </span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="#ayarlar" data-bs-toggle="collapse">
                                    <i data-feather="settings"></i>
                                    <span> Ayarlar </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div id="ayarlar">
                                    <ul class="nav-second-level">
                                        <li><a href="{{ url('/admin/hesap') }}">Hesap Ayarları</a></li>
                                        <li><a href="{{ url('/admin/ayarlar/islem') }}">Genel Ayarları</a></li>
                                        {{-- <li><a href="{{ url('/admin/ayarlar/iletisim') }}">İletişim Ayarları</a></li> --}}
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            @yield('content')

        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{ asset('panel/assets/js/vendor.min.js') }}"></script>

        <!-- Plugins js-->
        <script src="{{ asset('panel/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/sweetalert2/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/jquery-mask-plugin/jquery.mask.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
        <script src="{{ asset('panel/assets/libs/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
        <!-- Dashboar 1 init js-->
        {{-- <script src="{{ asset('panel/assets/js/pages/dashboard-1.init.js') }}"></script> --}}
        {{-- Init Js --}}
        {{-- <script src="{{ asset('panel/assets/js/pages/form-pickers.init.js') }}"></script> --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
        <script>
            var editor = document.getElementById('editor');
            if( editor ){
                ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
            }
        </script>
        <script src="https://npmcdn.com/flatpickr@4.6.9/dist/l10n/tr.js"></script>
        <script src="{{ asset('panel/assets/js/pages/jquery.editable.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="{{ asset('panel/assets/js/speakingurl.min.js') }}"></script>
        <script src="{{ asset('panel/assets/js/slug.js') }}"></script>
        <script src="{{ asset('panel/assets/js/app.js') }}"></script>
        <!-- App js-->
        <script src="{{ asset('panel/assets/js/app.min.js') }}"></script>
        
    </body>
</html>