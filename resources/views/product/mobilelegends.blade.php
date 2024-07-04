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

    <style>
        .selected {
            border: 2px solid #007bff;
            background-color: #e7f1ff;
        }
    </style>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper" class="d-flex">


            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboardPengguna">
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
                    <a class="nav-link text-light" style="margin-top: 125px;" href="/logout" onclick="logout()">
                        <i class="fs-4 bi-box-arrow-left text-light"></i>
                        <span>Logout</span></a>
                </li>
            </ul>

            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <br>
                <div id="content">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <img src="/storage/images/product/mlBanner.jpg" class="img-fluid" alt="Gambar Valorant">
                                <br><br>

                                <h1 class="display-4 fw-bold">MOBILE LEGENDS</h1>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        <i class="bi bi-shield-check"></i> <span>Pembayaran Aman</span>
                                    </div>
                                    <div>
                                        <i class="bi bi-headset"></i> <span>Layanan Pelanggan 24/7</span>
                                    </div>
                                </div>
                                <p class="text-wrap">
                                    Codashop menawarkan top up Mobile Legends yang mudah, aman, dan instan.
                                </p>
                                <p>
                                    Pembayaran tersedia melalui pulsa (Telkomsel, Indosat, Tri, XL, Smartfren),
                                    Codacash, QRIS, GoPay, OVO, DANA, ShopeePay, LinkAja, Krevido, Alfamart, Indomaret,
                                    DOKU, Bank Transfer, dan Card Payments.
                                </p>

                                <p>
                                    Top up ML Diamond, Twilight Pass, Weekly Pass, dan Starlight hanya dalam hitungan
                                    detik! Cukup masukkan User ID dan Zone ID MLBB Anda, pilih jumlah Diamond yang Anda
                                    inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke
                                    akun Mobile Legends Anda.
                                </p>

                                <p>
                                    <span class="highlight">Sign in</span> ke akun Codashop Kamu dan dapatkan akses ke
                                    event & promo Mobile Legends. Belum memiliki akun Codashop?
                                    <span class="highlight">Daftar sekarang!</span>
                                </p>
                                <p>
                                    Unduh dan mainkan Mobile Legends sekarang!
                                    <br>
                                    Mending HOK cuy
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-5"> {{-- Tambahkan div dengan class ms-5 --}}
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('saveOrder') }}">
                                                @csrf
                                                <input type="hidden" id="riotID_hidden" name="riotID_hidden">
                                                <input type="hidden" id="harga_hidden" name="harga_hidden">
                                                <input type="hidden" id="metode_hidden" name="metode_hidden">
                                                <input type="hidden" id="total_hidden" name="total_hidden">
                                                <h5 class="fw-bold">1. Masukkan User ID Anda</h5>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        placeholder="Masukkan User ID & Server" aria-label="Riot ID"
                                                        aria-describedby="basic-addon2">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="bi bi-question-circle"></i></span>
                                                </div>
                                                <small class="text-muted">Untuk mengetahui User ID Anda, silakan klik
                                                    menu
                                                    profile dibagian kiri atas pada menu utama game. User ID akan
                                                    terlihat
                                                    dibagian bawah Nama Karakter Game Anda. Silakan masukkan User ID
                                                    Anda
                                                    untuk menyelesaikan transaksi. Contoh : 12345678(1234).</small>

                                                <h5 class="mt-4 fw-bold">2. Pilih Nominal Top Up</h5>
                                                <div class="row row-cols-2 row-cols-md-3 g-4">
                                                    @foreach ([3, 5, 12, 19, 28, 44, 59, 85, 170, 240] as $vp)
                                                        <a href="#"
                                                            class="btn btn-light border w-100 pilih-nominal"
                                                            data-nominal="{{ $vp }}">
                                                            <div class="col">
                                                                <div class="card h-100 d-flex flex-column">
                                                                    <div
                                                                        class="card-body text-center flex-grow-1 d-flex flex-column justify-content-center">
                                                                        <div class="text-center">
                                                                            <p class="card-text fw-bold">
                                                                                {{ $vp }}
                                                                                Diamonds
                                                                            </p>
                                                                            <img src="/storage/images/diamonds.png"
                                                                                class="img-fluid" alt="VP"
                                                                                style="max-width: 30%;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <p class="text-end fs-6 fw-light">Dari</p>
                                                                        <p
                                                                            class="text-end fw-bold ms-auto text-dark-emphasis">
                                                                            Rp.
                                                                            {{ number_format($vp * 100, 0, ',', '.') }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                </div>


                                                <h5 class="mt-4 fw-bold">3. Pilih Pembayaran</h5>
                                                <div class="row row-cols-2 row-cols-md-3 g-4">
                                                    @foreach (['ShopeePay', 'GoPay', 'OVO', 'DANA', 'QRIS', 'Transfer Bank'] as $metode)
                                                        <div class="col">
                                                            <a href="#"
                                                                class="btn btn-light border w-100 pilih-metode"
                                                                data-metode="{{ $metode }}">
                                                                <i class="bi bi-{{ strtolower($metode) }}"></i>
                                                                {{ $metode }}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <h5 class="mt-4 fw-bold">4. Beli!</h5>
                                                <div class="form-group">
                                                    <p class="fw-bold">Opsional: Jika anda ingin mendapatkan bukti
                                                        pembayaran atas pembelian anda, harap mengisi alamat
                                                        emailnya</p>
                                                    <input type="email" class="form-control" id="email"
                                                        placeholder="Alamat E-mail">
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="promoCheckbox">
                                                    <label class="form-check-label" for="promoCheckbox">Ya, Saya ingin
                                                        menerima berita dan promosi melalui SMS atau Whatsapp</label>
                                                </div>
                                                <div class="alert alert-success mt-4" role="alert">
                                                    <i class="bi bi-lightning-fill"></i> Terima top up secara instan
                                                    setelah pembayaran!
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <span id="selected-vp"> - </span>
                                                        <span> | </span>
                                                        <span id="selected-metode"> - </span>
                                                    </div>
                                                    <div>
                                                        <span class="fw-bold" id="selected-harga">Rp. -</span>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block mt-4">Beli
                                                    sekarang</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        {{-- POPUP 1 START --}}
        <div class="modal fade" id="orderConfirmationModal" tabindex="-1"
            aria-labelledby="orderConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="orderConfirmationModalLabel">Detail pesanan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="text-start">Mohon konfirmasi Username anda sudah benar.</p>
                        <div class="alert alert-success" role="alert">
                            <i class="bi bi-lightning-fill"></i> Terima top up secara instan setelah pembayaran!
                        </div>

                        <table class="table text-start">
                            <tr>
                                <td>User ID & Server:</td>
                                <td id="modalRiotID">-</td>
                            </tr>
                            <tr>
                                <td>Harga:</td>
                                <td id="modalHarga">-</td>
                            </tr>
                            <tr>
                                <td>Bayar dengan:</td>
                                <td id="modalMetode">-</td>
                            </tr>
                            <tr>
                                <td class="text-start">Total pembayaran:</td>
                                <td id="modalTotal" class="fw-bold fs-3 ">-</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="button" class="btn btn-primary" id="konfrimPopUp">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- POP UP 1 END --}}

        {{-- POPUP 2 START --}}
        <div class="modal fade" id="orderPaymentModal" tabindex="-1" aria-labelledby="orderPaymentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="orderConfirmationModalLabel">PEMBAYARAN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="text-start">Mohon konfirmasi Username anda sudah benar.</p>

                        <table class="table text-start">
                            <tr>
                                <td>User ID & Server:</td>
                                <td id="modalRiotID">-</td>
                            </tr>
                            <tr>
                                <td class="text-start">Total pembayaran:</td>
                                <td id="modalTotal" class="fw-bold fs-3 ">-</td>
                            </tr>
                            <img src="/storage/images/qr-code.png" style="max-width: 100%; height: auto;">
                        </table>

                    </div>
                    <div class="modal-footer">
                        <a href="/history" class="btn btn-success">SUDAH BAYAR</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- POP UP 2 END --}}


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

            document.addEventListener("DOMContentLoaded", function() {
                let selectedNominal = null;
                let selectedMetode = null;

                document.querySelectorAll('.pilih-nominal').forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        document.querySelectorAll('.pilih-nominal').forEach(btn => btn.classList.remove(
                            'selected'));
                        button.classList.add('selected');
                        selectedNominal = button.getAttribute('data-nominal');
                        document.getElementById('selected-vp').innerText =
                            `${selectedNominal} Diamonds`;
                        updateHarga();
                    });
                });

                document.querySelectorAll('.pilih-metode').forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        document.querySelectorAll('.pilih-metode').forEach(btn => btn.classList.remove(
                            'selected'));
                        button.classList.add('selected');
                        selectedMetode = button.getAttribute('data-metode');
                        document.getElementById('selected-metode').innerText = selectedMetode;
                    });
                });

                document.querySelector('.btn-primary[type="submit"]').addEventListener('click', function() {
                    event.preventDefault();
                    // Get form data (adjust based on your actual input IDs)
                    const riotID = document.querySelector('input[placeholder="Masukkan User ID & Server"]')
                        .value;
                    const harga = document.getElementById('selected-harga').innerText;
                    const metode = document.getElementById('selected-metode').innerText;
                    const total = document.getElementById('selected-harga')
                        .innerText; // Assuming it's the same as selected-harga

                    document.getElementById('riotID_hidden').value = riotID;
                    document.getElementById('harga_hidden').value = harga;
                    document.getElementById('metode_hidden').value = metode;
                    document.getElementById('total_hidden').value = total;

                    // Populate the modal
                    document.getElementById('modalRiotID').innerText = riotID;
                    document.getElementById('modalHarga').innerText = harga;
                    document.getElementById('modalMetode').innerText = metode;
                    document.getElementById('modalTotal').innerText = total;

                    const modal = new bootstrap.Modal(document.getElementById('orderConfirmationModal'));
                    $("#orderConfirmationModal").modal('show');
                });

                document.getElementById('konfrimPopUp').addEventListener('click', function() {
                    event.preventDefault();
                    // Get form data (adjust based on your actual input IDs)
                    const riotID = document.querySelector('input[placeholder="Masukkan User ID & Server"]')
                        .value;
                    const total = document.getElementById('selected-harga')
                        .innerText; // Assuming it's the same as selected-harga

                    document.getElementById('modalRiotID').innerText = riotID; // Ini untuk popup 1
                    document.getElementById('modalTotal').innerText = total; // Ini untuk popup 1

                    document.getElementById('orderPaymentModal').querySelector('#modalRiotID').innerText =
                        riotID;
                    document.getElementById('orderPaymentModal').querySelector('#modalTotal').innerText = total;


                    $('#orderConfirmationModal').modal('hide');
                    setTimeout(function() {
                        $('#orderPaymentModal').modal('show');
                    }, 300);
                });

                function updateHarga() {
                    if (selectedNominal) {
                        const harga = selectedNominal * 100;
                        document.getElementById('selected-harga').innerText =
                            `Rp. ${new Intl.NumberFormat('id-ID').format(harga)}`;
                    }
                }
            });
        </script>


    </body>

    </html>
