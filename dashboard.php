<?php
require 'funcition.php';
require 'cek.php'

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
           <a class="navbar-brand ps-3" href="index.html">Sistem Integrasi persediaan dan Ekspedisi Barang</a>
           
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-7 order-lg-0 me-2 me-lg-0" id="sidebarToggle" href="#!"><br><i class="fas fa-bars mt-4"></i></button>
            </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dshboard
                        
                            <a class="nav-link" href="konfirmasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
                                Konfirmasi Pembayaran
                            </a>
                            
                            <a class="nav-link" href="register.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                                Registrasi Kredit
                            </a>
                            <a class="nav-link" href="pengiriman.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                                Pengiriman
                            </a>
                            
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Kelola Admin
                            </a>
                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                                </nav>
                            </div>   
                </nav>
            <div id="layoutSidenav_content">
          
                <main>
                    <div class="container-fluid mt-5">
                                    <a href="index.php" class="btn btn-info"><i class="fas fa-boxes"></i>Barang</a>
                                    <a href="masuk.php" class="btn btn-info"><i class="fas fa-briefcase"></i>Barang Masuk</a>
                                    <a href="keluar.php" class="btn btn-info"><i class="fas fa-dolly"></i>Barang Keluar</a>
                                    <a href="pengiriman.php" class="btn btn-info"><i class="fas fa-truck"></i>Pengiriman</a>
                                    <a href="konfirmasi.php" class="btn btn-info"><i class="fas fa-hand-holding-usd"></i>Konfirmasi Pembayaran</a>
                                    <br>
                                    <br>
                                   
                                    <a href="kranjang.php" class="btn btn-info"><i class="fas fa-shopping-cart"></i>Keranjang</a>
                                     <a href="register.php" class="btn btn-info"><i class="fas fa-money-check"></i>Registrasi Kredit</a>
                                     
                        <h1 class="mt-4">Slamat Datang Di Website Kami</h1> 
                         
                        <img src="assets/logo/dd.jpg"style="width:800px;height:350px ;" class="center" >
                        <p class="center">Sorry, we have encountered internal server error. </p>
                        
                        <div class=" ">
                            <div class="">

                               
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4>
                           
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2021 ws</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

</html>
