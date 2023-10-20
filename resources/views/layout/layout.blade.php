<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Avicena</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin-ui') }}/src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('admin-ui') }}/src/assets/css/styles.min.css" />
    <script src="https://kit.fontawesome.com/41517c21c4.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Main style -->
    <link rel="stylesheet" href="{{ asset('/') }}css/main.css?v=<?php echo time(); ?>">
    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('admin-ui') }}/src/datatables/dataTables.bootstrap4.css">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="{{ asset('admin-ui') }}/src/assets/images/logos/dark-logo.svg" width="180"
                            alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav text-white" data-simplebar="" style=" ">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/home" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/barang" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Barang</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/pegawai" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <span class="hide-menu">Data Pegawai</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/kategori" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <span class="hide-menu">Kategori</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Peminjaman & Pengembalian</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/peminjam" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-users"></i>
                                </span>
                                <span class="hide-menu">Peminjaman</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/pengembalian" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </span>
                                <span class="hide-menu">Pengembalian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/history" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                </span>
                                <span class="hide-menu">History</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Pengadaan</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/pengadaan" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </span>
                                <span class="hide-menu">Pengadaan Barang</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/stok" aria-expanded="false">
                                <span>
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                </span>
                                <span class="hide-menu">Stok Barang</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-item">
                            <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-aperture"></i>
                                </span>
                                <span class="hide-menu">Sample Page</span>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            {{-- <a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a> --}}
                            <li>{{ auth()->user()->role }}</li>
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('admin-ui') }}/src/assets/images/profile/user-1.jpg"
                                        alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        {{-- <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a> --}}
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button class="btn btn-outline-primary mx-3 mt-2 d-block">
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            @yield('container')
        </div>
    </div>
    <script src="{{ asset('admin-ui') }}/src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('admin-ui') }}/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin-ui') }}/src/assets/js/sidebarmenu.js"></script>
    <script src="{{ asset('admin-ui') }}/src/assets/js/app.min.js"></script>
    <script src="{{ asset('admin-ui') }}/src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('admin-ui') }}/src/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="{{ asset('admin-ui') }}/src/assets/js/dashboard.js"></script>
    <script src="{{ asset('admin-ui') }}/src/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('admin-ui') }}/src/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin-ui') }}/src/datatables/datatables-demo.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(function() {
            /*  $( ".datepicker" ).datepicker({
                  dateFormat: 'dd-mm-yy',
                  yearRange: "-70:+0",
                  changeMonth: true,
                  changeYear: true,
               });
              });*/

            //Initialize Select2 Elements
            $('.select2').select2()


            /* $(document).ready(function () {
               bsCustomFileInput.init()
             })    */


        });

        $(function() {
            $('#selectjurusan').select2({
                placeholder: 'Select Jurusan',
                ajax: {
                    url: '/getjurusan',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });


        $(function() {
            $('#selectcategory').select2({
                placeholder: 'Select Category',
                ajax: {
                    url: '/getcategory',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });


        $(function() {
            $('.selectbarang').select2({
                placeholder: 'Select Barang',
                ajax: {
                    url: '/getbarang',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.kode_brg,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });

        $(function() {
            $('#selectpegawai').select2({
                placeholder: 'Select Pegawai',
                ajax: {
                    url: '/getpegawai',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nama,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            //var end = moment($("#tgl_kmb").val());


            $("#tgl_kmb").change(function() {
                var start = moment($("#tgl_pjm").val());
                var end = moment($("#tgl_kmb").val());
                if (end.diff(start, "days") > 5) {
                    var denda = (end.diff(start, "days") - 5) * 5000;

                } else {
                    var denda = 0;
                }
                $("#denda").val(denda);
                console.log(denda);
            });

        });
    </script>



</body>

</html>
