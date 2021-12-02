<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Xoric - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css" />
    <!-- datepicker -->
    <link href="{{ asset('assets/libs/air-datepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('assets/libs/jqvmap/jqvmap.min.css')}}" rel="stylesheet" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    @yield('tempat_css')

</head>

<body data-topbar="colored">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="/home" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-sm-dark.png')}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo-dark.png')}}" alt="" height="20">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-sm-light.png')}}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo-light.png')}}" alt="" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-backburger"></i>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="mdi mdi-magnify"></span>

                        </div>
                    </form>
                </div>

                <div class="d-flex">

                    <!-- <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->

                    <!-- <div class="dropdown d-inline-block">
                            <!-- <button type="button" class="btn header-item waves-effect" id="page-header-flag-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="" src="{{ asset('assets/images/flags/us.jpg')}}" alt="Header Language" height="14">
                            </button> -->
                    <!-- <div class="dropdown-menu dropdown-menu-right">
        
                                item
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('assets/images/flags/spain.jpg')}}" alt="user-image" class="mr-2" height="12"><span class="align-middle">Spanish</span>
                                </a>

                                item
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('assets/images/flags/germany.jpg')}}" alt="user-image" class="mr-2" height="12"><span class="align-middle">German</span>
                                </a>

                                item
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('assets/images/flags/italy.jpg')}}" alt="user-image" class="mr-2" height="12"><span class="align-middle">Italian</span>
                                </a>

                                item
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{ asset('assets/images/flags/russia.jpg')}}" alt="user-image" class="mr-2" height="12"><span class="align-middle">Russian</span>
                                </a>
                            </div> -->
                    <!-- </div> --> -->

                    <div class="dropdown d-inline-block">
                        <!-- <button  class="btn header-item noti-icon waves-effect">
                                <a href="/cart" ><i class="mdi mdi-cart"></i><span class="badge badge-danger">{{ count((array) session('cart')) }}</span></a></button> -->
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">{{Auth::user()->namauser}}</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> Billing</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-settings font-size-16 align-middle mr-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-lock font-size-16 align-middle mr-1"></i> Lock screen</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="/home" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                <span>Home</span>
                            </a>
                        </li>
                        <hr>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-comment-message"></i></div>
                                <span>Master</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/customer">Customer</a></li>
                                @if(Auth::user()->status == "Admin")
                                <li><a href="/pegawai">Pegawai</a></li>
                                <li><a href="/jenisPelayanan">Pelayanan</a></li>
                                <li><a href="/user">User</a></li>
                                @endif
                            </ul>
                        </li>

                        <li>
                            <a href="/penjadwalan" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                <!-- <span class="badge badge-pill badge-success float-right">3</span> -->
                                <span>Penjadwalan</span>
                            </a>
                        </li>
                        <li>
                            <a href="/transaksi/create" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                <!-- <span class="badge badge-pill badge-success float-right">3</span> -->
                                <span>Transaksi</span>
                            </a>
                        </li>
                        <!-- <li>
                                <a href="/cart" class="waves-effect">
                                    <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                   <span class="badge badge-pill badge-success float-right">3</span>
                                    <span>Cart</span>
                                </a>
                            </li> -->
                        <li>
                            <a href="/transaksi" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                <!-- <span class="badge badge-pill badge-success float-right">3</span> -->
                                <span>Riwayat transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="/penagihan" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                <!-- <span class="badge badge-pill badge-success float-right">3</span> -->
                                <span>Laporan Penagihan</span>
                            </a>
                        </li>
                        @if(Auth::user()->status == "Admin")
                        <li>
                            <a href="/report" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                <!-- <span class="badge badge-pill badge-success float-right">3</span> -->
                                <span>Report Bulanan</span>
                            </a>
                        </li>
                        @endif

                        <!-- <li>
                            <a href="/pengerjaan" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                 <span class="badge badge-pill badge-success float-right">3</span> 
                                <span>pengerjaan</span>
                            </a>
                        </li> -->

                        @if(Auth::user()->status == "Admin")
                        <li>
                            <a href="/pengeluaran" class="waves-effect">
                                <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                                <!-- <span class="badge badge-pill badge-success float-right">3</span> -->
                                <span>Riwayat Pengeluaran</span>
                            </a>
                        </li>
                        @endif



                    </ul>

                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('tempat_konten')
                <!-- Page-Title -->

                <!-- end page-content-wrapper -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2020 © Xoric.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom rightbar-nav-tab nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link py-3 active" data-toggle="tab" href="#chat-tab" role="tab">
                        <i class="mdi mdi-message-text font-size-22"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3" data-toggle="tab" href="#tasks-tab" role="tab">
                        <i class="mdi mdi-format-list-checkbox font-size-22"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3" data-toggle="tab" href="#settings-tab" role="tab">
                        <i class="mdi mdi-settings font-size-22"></i>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content text-muted">
                <div class="tab-pane active" id="chat-tab" role="tabpanel">

                    <form class="search-bar py-4 px-3">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                    </form>


                    <h6 class="px-4 py-3 mt-2 bg-light">Group Chats</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-success"></i>
                            <span class="mb-0 mt-1">App Development</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-warning"></i>
                            <span class="mb-0 mt-1">Office Work</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-danger"></i>
                            <span class="mb-0 mt-1">Personal Group</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                            <span class="mb-0 mt-1">Freelance</span>
                        </a>
                    </div>

                    <h6 class="px-4 py-3 mt-4 bg-light">Favourites</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="{{ asset('assets/images/users/avatar-10.jpg')}}"
                                        class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Andrew Mackie</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="{{ asset('assets/images/users/avatar-1.jpg')}}"
                                        class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Rory Dalyell</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">To an English person, it will seem like simplified
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="{{ asset('assets/images/users/avatar-9.jpg')}}"
                                        class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Jaxon Dunhill</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">To achieve this, it would be necessary.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <h6 class="px-4 py-3 mt-4 bg-light">Other Chats</h6>

                    <div class="p-2 pb-4">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="{{ asset('assets/images/users/avatar-2.jpg')}}"
                                        class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Jackson Therry</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">Everyone realizes why a new common language.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="{{ asset('assets/images/users/avatar-4.jpg')}}"
                                        class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Charles Deakin</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">The languages only differ in their grammar.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="{{ asset('assets/images/users/avatar-5.jpg')}}"
                                        class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Ryan Salting</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">If several languages coalesce the grammar of the
                                            resulting.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="{{ asset('assets/images/users/avatar-6.jpg')}}"
                                        class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Sean Howse</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="{{ asset('assets/images/users/avatar-7.jpg')}}"
                                        class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Dean Coward</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">The new common language will be more simple.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative align-self-center mr-3">
                                    <img src="{{ asset('assets/images/users/avatar-8.jpg')}}"
                                        class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Hayley East</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">One could refuse to pay expensive translators.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="tab-pane" id="tasks-tab" role="tabpanel">
                    <h6 class="p-3 mb-0 mt-4 bg-light">Working Tasks</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">App Development<span class="float-right">75%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Database Repair<span class="float-right">37%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 37%"
                                    aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Backup Create<span class="float-right">52%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 52%"
                                    aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <h6 class="p-3 mb-0 mt-4 bg-light">Upcoming Tasks</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Sales Reporting<span class="float-right">12%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 12%"
                                    aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Redesign Website<span class="float-right">67%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 67%"
                                    aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">New Admin Design<span class="float-right">84%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 84%"
                                    aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <div class="p-3 mt-2">
                        <a href="javascript: void(0);" class="btn btn-success btn-block waves-effect waves-light">Create
                            Task</a>
                    </div>

                </div>
                <div class="tab-pane" id="settings-tab" role="tabpanel">
                    <h6 class="px-4 py-3 bg-light">General Settings</h6>

                    <div class="p-4">
                        <h6 class="font-weight-medium">Online Status</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check1"
                                name="settings-check1" checked="">
                            <label class="custom-control-label font-weight-normal" for="settings-check1">Show your
                                status to all</label>
                        </div>

                        <h6 class="mt-4">Auto Updates</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check2"
                                name="settings-check2" checked="">
                            <label class="custom-control-label font-weight-normal" for="settings-check2">Keep up to
                                date</label>
                        </div>

                        <h6 class="mt-4">Backup Setup</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check3"
                                name="settings-check3">
                            <label class="custom-control-label font-weight-normal" for="settings-check3">Auto
                                backup</label>
                        </div>

                    </div>

                    <h6 class="px-4 py-3 mt-2 bg-light">Advanced Settings</h6>

                    <div class="p-4">
                        <h6 class="font-weight-medium">Application Alerts</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check4"
                                name="settings-check4" checked="">
                            <label class="custom-control-label font-weight-normal" for="settings-check4">Email
                                Notifications</label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check5"
                                name="settings-check5">
                            <label class="custom-control-label font-weight-normal" for="settings-check5">SMS
                                Notifications</label>
                        </div>

                        <h6 class="mt-4">API</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check6"
                                name="settings-check6">
                            <label class="custom-control-label font-weight-normal" for="settings-check6">Enable
                                access</label>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js')}}"></script>

    <!-- datepicker -->
    <script src="{{ asset('assets/libs/air-datepicker/js/datepicker.min.js')}}"></script>
    <script src="{{ asset('assets/libs/air-datepicker/js/i18n/datepicker.en.js')}}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

    <!-- plugin js -->
    <script src="{{ asset('assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{ asset('assets/libs/jquery-ui-dist/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
    <!-- Calendar init -->
    <script src="{{ asset('assets/js/pages/calendar.init.js')}}"></script>
    <!-- Jq vector map -->
    <script src="{{ asset('assets/libs/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('assets/libs/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

    <script src="{{ asset('assets/js/pages/dashboard.init.js')}}"></script>

    <script src="{{ asset('assets/js/app.js')}}"></script>
    @yield('tempat_js')

    <script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        App.init();
    });



    }
    export default (props, {
        $f7,
        $el,
        $on
    }) => {
        let textEditorCustomButtons;
        $on('pageInit', () => {
            textEditorCustomButtons = $f7.textEditor.create({
                el: $el.value.find('.text-editor-custom-buttons'),
                // define custom "hr" button
                customButtons: {
                    hr: {
                        content: '<hr>',
                        onClick(editor, buttonEl) {
                            document.execCommand('insertHorizontalRule', false);
                        },
                    },
                },
                buttons: [
                    ["bold", "italic", "underline", "strikeThrough"], "hr"
                ],
            });
        });
        $on('pageBeforeRemove', () => {
            textEditorCustomButtons.destroy()
        });

        return $render;
    };
    </script>

    @yield('tempat_script')
</body>

</html>