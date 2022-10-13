<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Aplikasi Arsip</title>
    {{-- konekkan semua file css atau js ke folder public --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link href="{{ asset('assets/dist/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">AdminKit</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Pages
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.html">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item @if (isset($menuTransaksi)) {{ $menuTransaksi }} @endif">
                        <a class="sidebar-link" href="{{ route('transactions.index') }}">
                            <i class="align-middle" data-feather="file"></i> <span class="align-middle">Transaksi
                                Arsip</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Setting
                    </li>

                    <li class="sidebar-item @if (isset($menuTemplate)) {{ $menuTemplate }} @endif">
                        <a class="sidebar-link" href="{{ route('templates.index') }}">
                            <i class="align-middle" data-feather="file"></i> <span class="align-middle">Template
                                Surat</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Data Utama
                    </li>

                    <li class="sidebar-item @if (isset($menuPegawai)) {{ $menuPegawai }} @endif">
                        <a class="sidebar-link" href="{{ route('pegawai.index') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Pegawai</span>
                        </a>
                    </li>

                    <li class="sidebar-item @if (isset($menuPersetujuan)) {{ $menuPersetujuan }} @endif">
                        <a class="sidebar-link" href="{{ route('persetujuan.index') }}">
                            <i class="align-middle" data-feather="grid"></i> <span
                                class="align-middle">Persetujuan</span>
                        </a>
                    </li>

                    <li class="sidebar-item @if (isset($menuJabatan)) {{ $menuJabatan }} @endif">
                        <a class="sidebar-link" href="{{ route('jabatan.index') }}">
                            <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Jabatan</span>
                        </a>
                    </li>

                    <li class="sidebar-item @if (isset($menuGolongan)) {{ $menuGolongan }} @endif">
                        <a class="sidebar-link active" href="{{ route('golongan.index') }}">
                            <i class="align-middle" data-feather="align-left"></i> <span
                                class="align-middle">Golongan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                {{-- tidak usah pake image --}}
                                {{-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1"
                                    alt="Charles Hall" /> --}}
                                <span class="text-dark">
                                    <i class="align-middle" data-feather="user"></i> {{ Auth::user()->name }}
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a> --}}
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
        </div>

        <script src="{{ asset('assets/dist/js/app.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
        </script>

        @stack('scriptjs')
</body>

</html>
