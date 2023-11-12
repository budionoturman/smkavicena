<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Avicena | Inventaris Barang</title>
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
                        <img src="data:image/jpeg;base64,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"
                            width="50" height="50" alt="" />
                        <span class="text-secondary">SMK Avicena</span>
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
                                    <i class="fa-solid fa-computer"></i>
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
                                    <i class="ti ti-article"></i>
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
                                    <i class="fa-solid fa-right-left"></i>
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
                                    text: item.nama_brg,
                                    id: item.id,
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
