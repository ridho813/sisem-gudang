<?php
require 'funcition.php';
require 'cek.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ini Barang Masuk</title>
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
                            </a>
                                <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                               Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-dolly"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="konfirmasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
                                Konfirmasi Pembayaran
                            </a>
                            
                            </a>
                            <a class="nav-link" href="register.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-check"></i></div>
                                Registrasi Kredit
                            </a>
                            <a class="nav-link" href="dtbarang keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                               Detail Barang Keluar
                            </a>
                            <a class="nav-link" href="kranjang.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                                Keranjang
                            </a>
                            <a class="nav-link" href="pengiriman.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                                Pengiriman
                            </a>
                           
                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>


                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    </div>
                                </nav>
                            </div>
                </nav>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Barang Keluar</h1>
                        <div class=" card mb-4">
                            <div class="card-header">

                               
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Tambah Barang Keluar
                                    </button>
                                    <a href="export copy.php" class="btn btn-info">Eksport Data</a>
                                    <a href="pengiriman.php" class="btn btn-info"><i class="fas fa-truck"></i>Pengiriman</a>
                                    <a href="konfirmasi.php" class="btn btn-info"><i class="fas fa-hand-holding-usd"></i>Konfirmasi Pembayaran</a>
                                    <br>
                                    <br>
                                   
                                    <a href="kranjang.php" class="btn btn-info"><i class="fas fa-shopping-cart"></i>Keranjang</a>
                                     <a href="register.php" class="btn btn-info"><i class="fas fa-money-check"></i>Registrasi Kredit</a>
                                     

                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                <thead>
                                        <tr>
                                            <th>Tanggal Keluar</th>
                                            <th>Nama Barang</th>
                                            <th>status</th>
                                            <th>pembayaran</th>
                                            <th>Jumlah Barang Keluar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                                <?php

                                                $ambilsemuadatastock = mysqli_query($conn,"select * from barang_keluar k, barang s where s.idbarang =k.idbarang");
                                                while ($data=mysqli_fetch_array($ambilsemuadatastock)){

                                                    $idk = $data['idkeluar'];
                                                    $idb=$data['idbarang'];
                                                    $tanggal= $data['tanggal'];
                                                    $namabarang = $data['namabarang'];
                                                    $statuss = $data['sts'];
                                                    $pembayaraan = $data['pembayaran'];
                                                    $qty = $data['qty'];
                                                    $total_harga =['$total_harga'];
                                                    $harga =['$harga'];

                                                ?>

                                                <tbody>
                                                    <tr>
                                                        <td><?=$tanggal;?></td>
                                                        <td><?=$namabarang;?></td>
                                                        <td><?=$statuss;?></td> 
                                                        <td><?=$pembayaraan;?></td>
                                                        <td><?=$qty;?></td>
                                                        <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idk;?>">
                                                            Edit
                                                     </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idk;?>">
                                                            Delete
                                                        </button>
                                                </td>
                                                        
                                                    </tr>

                                                 <!-- edit Modal -->
                                         <div class="modal fade" id="edit<?=$idk;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Edit Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                            <input type="text " name="pembayaran" value='<?=$pembayaraan;?>' class="form-control" required>
                                            <br>
                                           
                                           <input type="number" name="qty" value="<?=$qty;?>" class="form-control" required>
                                            <br>
                                            <input type='hidden' name='idb' value='<?=$idb;?>'>
                                            <input type='hidden' name='idk' value='<?=$idk;?>'>
                                            <button type="submit" class="btn btn-primary" name="updatebarangkeluar">Update Barang Masuk</button>
                                            </form>
                                            </div>                 
                                        </div>
                                    </div>
                                    </div>


                                                 <!-- Delete Modal -->
                                                 <div class="modal fade" id="delete<?=$idk;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body"> 
                                                Apakah Anda Yakin ingin menghapus <?=$namabarang;?>
                                                <input type='hidden' name='idb' value='<?=$idb;?>'>
                                                <input type='hidden' name='kty' value='<?=$qty;?>'>
                                                <input type='hidden' name='idk' value='<?=$idk;?>'>
                                                <br>
                                                <br>
                                            <button type="submit" class="btn btn-danger" name="delete">Hapus</button>
                                            </form>
                                            </div>                 
                                        </div>
                                    </div>
                                </div>
                                                    <?php

                                                };


                                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
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
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                 <div class="modal-header">
                 <h4 class="modal-title">Tambah Barang Keluar</h4>
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
               <!-- Modal body -->
               <form method="post">
                <div class="modal-body">
                <select name="barangnya" class="form-control"> 
                   <?php
                   $ambilsemuadatanya =mysqli_query($conn,"select * from barang");
                  while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                      $namabarang = $fetcharray['namabarang'];
                      $idbarangnya = $fetcharray['idbarang'];
                    ?>

                    <option value="<?=$idbarangnya;?>"><?=$namabarang;?> </option>
                    <?php

                  }

                   ?>
               </select>
               <br>
               <input type="number" name="qty" placeholder=" Quantitiy" class="form-control" required>
               <br>
               <input type="text" name="statuss" placeholder=" status" class="form-control" required>
               <br>
               <input type="text" name="pembayaran" placeholder=" Pembayaran" class="form-control" required>
               <br>
               <button type="submit" class="btn btn-primary" name="addbarangkeluar">Submit</button>
               </form>
              </div>                 
        </div>
       </div>
     </div>
</html>
