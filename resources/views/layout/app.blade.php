<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins') }}/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('plugins') }}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{ asset('plugins') }}/datatables/datatables.css">
    <script src="{{ asset('plugins') }}/jquery/jquery.min.js"></script>
    <script src="{{ asset('plugins') }}/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ asset('plugins') }}/datatables/datatables.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <span class="brand-text font-weight-light ml-2">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">
                            {{ auth()->user()->name }},
                            @if (auth()->user()->level == 1)
                                Super User
                            @elseif(auth()->user()->level == 2)
                                Kepala Unit
                            @elseif(auth()->user()->level == 3)
                                Pengendali Gudang
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Barang
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/item" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Daftar Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/category" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/unit" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Satuan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/warehouse" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Gudang
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/supplier" class="nav-link">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>
                                    Supplier
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-credit-card"></i>
                                <p>
                                    Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/checkin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Barang Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/checkout" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Barang Keluar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @can('super-user')
                            <li class="nav-item">
                                <a href="/user" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Pengguna
                                    </p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content pt-4">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </section>
        </div>
    </div>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{ asset('plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('plugins') }}/chart.js/Chart.min.js"></script>
    <script src="{{ asset('plugins') }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="{{ asset('dist') }}/js/adminlte.min.js"></script>

</body>

</html>
