<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengguna | Produk</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fs-1 bi-basket2-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TOKO KITA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="#">
                    <div class="user-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="user-details ms-2">
                        <p class="greeting m-0">Hai {{ $user->email }}!</p>
                        <p style="font-size:10px;" class="fw-light">Created on 04-July-2024</p>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dashboardPengguna">
                    <i class="fs-4 bi-house-door-fill"></i>
                    <span>Home Page</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link bg-light text-primary" href="/productPengguna">
                    <i class="fs-4 bi-cart-fill text-primary"></i>
                    <span>Riwayat Transaksi</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <li class="nav-item">
                <a class="nav-link text-light" style="margin-top: 125px;" href="/logout" onclick="logout()">
                    <i class="fs-4 bi-box-arrow-left text-light"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <br>
            <!-- Main Content -->
            <div class=" bg-dark pt-3 pb-3 mt-1 rounded">
                <h4 class="text-center text-light">History Pembelian </h4>

                <table id="tabel" class="table table-bordered table-striped table-secondary pt-3">
                    <thead>

                        <tr>
                            <th>No.</th>
                            <th>User ID</th>
                            <th>Item</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            $no = 1;
                            @endphp --}}
                        @foreach ($laporans as $laporan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $laporan->akun }}</td>
                                <td>{{ $laporan->nominal }}</td>
                                <td>{{ $laporan->date }}</td>
                                <td>{{ $laporan->total_pembayaran*1000 }}</td>
                                <td>{{ $laporan->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <script>
        function logout() {
            var result = confirm('Anda yakin ingin logout?');
            if (result == false) {
                event.preventDefault();
            }
        }
    </script>
</body>

</html>
