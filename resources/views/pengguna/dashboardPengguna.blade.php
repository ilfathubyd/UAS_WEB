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

        <title>TOKO KITA</title>

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
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboardPengguna#">
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
                    <a class="nav-link bg-light text-primary" href="/dashboardPengguna">
                        <i class="fs-4 bi-house-door-fill text-primary"></i>
                        <span>Home Page</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/history">
                        <i class="fs-4 bi-cart-fill"></i>
                        <span>Riwayat Transaksi</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

                <li class="nav-item">
                    <a class="nav-link text-light" style="margin-top: 50px;" href="/logout" onclick="logout()">
                        <i class="fs-4 bi-box-arrow-left text-light"></i>
                        <span>Logout</span></a>
                </li>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <br>
                <!-- Main Content -->

                {{-- CAROUSEL --}}
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($images as $imageUrl)
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <img src="{{ $imageUrl }}" class="d-block w-100" alt="carousel">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END OF CAROUSEL --}}

                {{-- HOTSALE --}}
                <p class="text-start pt-5 ps-4 fs-3 fw-bold">HOT SALE</p>
                <div class="row ps-4">
                    <div class="col-md-2">
                        <a href="/product/valorant" class="text-decoration-none">
                            <div class="card shadow-sm h-100 product-card" style="width: 10rem;">
                                <img src="/storage/images/product/product1.jpg" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title fs-6 fw-bold text-center">Valorant</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                {{-- END OF HOTSALE --}}

                <p class="text-start pt-5 ps-4 fs-3 fw-bold">PRODUCT</p>
                <div class="row ps-4">
                    @foreach ($products as $product)
                        <div class="col-md-2">
                            <a href="{{ url('product/' . $product->url) }}" class="text-decoration-none">
                                <div class="card shadow-sm h-100 product-card" style="width: 10rem;">
                                    <img src="{{ $product->gambar }}" class="card-img-top"
                                        alt="{{ $product->nama_product }}">
                                    <div class="card-body">
                                        <h5 class="card-title fs-6 fw-bold text-center">{{ $product->nama_product }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <style>
                    .product-card {
                        transition: transform 0.3s ease;
                    }

                    .product-card:hover {
                        transform: scale(1.15);
                        cursor: pointer;
                    }

                    .product-card:not(:hover) {
                        transform: scale(1);
                    }

                    .card a:hover h5 {
                        text-decoration: none;
                    }

                    .card a {
                        text-decoration: none;
                    }
                </style>

                <!-- End of Main Content -->
                <div class="card text-center mt-5">
                    <div class="card-body">
                        <h5 class="card-title">TOKOKITA</h5>
                        <p class="card-text">"Kami tidak pernah meragukan pelanggan meskipun permintaannya aneh-aneh"
                        </p>
                        <a href="https://wa.me/6289659958740" class="btn btn-primary">LIVE CHAT!</a>
                    </div>
                    <div class="card-footer text-body-secondary">
                        ©Since 1945
                    </div>
                </div>
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
