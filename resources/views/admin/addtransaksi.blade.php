<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Tambah Transaksi</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

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
                <a class="nav-link " href="/productAdmin">
                    <i class="fs-4 bi-cart-fill"></i>
                    <span>Product</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/laporan">
                    <i class="fs-4 bi-clipboard-data-fill"></i>
                    <span>Laporan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dataUser">
                    <i class="fs-4 bi-person-fill"></i>
                    <span>Data Pengguna</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <li class="nav-item">
                <a class="nav-link text-light" style="margin-top: 35px;"  href="/logout" onclick="logout()">
                    <i class="fs-4 bi-box-arrow-left text-light"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->
          <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <br>
          <!-- Main Content -->
          <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Produk</h1>
            <p class="mb-4">Deskripsi di sini <a target="_blank"
                    href="https://datatables.net">official DataTables documentation</a>.</p>

            <!-- body -->
            <form action="/adminAdd" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <!-- form fields -->
                
                <div class="mb-3 mt-5">
                    <select class = "form-control select2" style = "width: 100%;" name="product_id" id ="product_id" required>
                        <option disable value>Pilih Product</option>
                        @foreach ($product as $dt)
                        <option value = "{{$dt->id}}">{{$dt->namaProduk}}</option> 
                        @endforeach
                    </select>
                    <div id="emailHelp" class="form-text">Silahkan Pilih </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Ex: 3</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Ex: 30000</div>
                </div>
                
            
                <button type="submit" class="btn btn-success" onclick="add()">Submit</button>
                <a href="/transaksiAdmin" class="btn btn-warning" onclick="back()">Kembali</a>
            </form>

            <!-- end body -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    <script>
        function add(){
            var result = confirm('Apakah data yang anda isi sudah benar?');
            if (result == false){
            event.preventDefault();
            }
        }
    </script>

    <script>
        function back(){
            var result = confirm('Ingin kembali tanpa isi data?');
            if (result == false){
            event.preventDefault();
            }
        }
    </script>
    
    <script>
        function logout(){
            var result = confirm('Anda yakin ingin logout?');
            if (result == false){
            event.preventDefault();
            }
        }
    </script>

</body>

</html>
