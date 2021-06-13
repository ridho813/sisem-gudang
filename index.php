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
        <title>Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark" >
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Sistem Integrasi persediaan dan Ekspedisi Barang</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-3 me-lg-9" id="sidebarToggle" href="#!"><br><i class="fas fa-bars mt-4"></i></button>
           
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
                            <a class="nav-link" href="kranjang.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Keranjang
                            </a>
                            <a class="nav-link" href="konfirmasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hand-holding-usd"></i></div>
                                Konfirmasi Pembayaran
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
                                </nav>
                            </div>   
                </nav>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid md-4">
                        <h1 class="mt-4">Stock Barang</h1>
                        
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
                                        Tambah Barang
                                        </button>
                                    <a href="export.php" class="btn btn-info">Eksport Data</a>
                                    
                                   
                            </div>
                            <div class="card-body">
                                    <?php
                                    $ambilsemuadatastock = mysqli_query($conn,"select * from barang where stock > 1");
                                    while($fetch=mysqli_fetch_array($ambilsemuadatastock)){
                                        $barang= $fetch['stock'];

                                       

                                    ?>
                                            <div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
                                        </div>
                                         <?php
                                     };
                                         ?>

                                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>harga</th>
                                            <th>stock</th>
                                            <th>satuan</th>
                                            <th>Jenis Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    

                                    <!-- looping-->
                                    <?php

                                    $ambilsemuadatastock = mysqli_query($conn,"select * from barang");
                                    $i= 1;
                                    while ($data=mysqli_fetch_array($ambilsemuadatastock)){
                                      
                                        $namabarang= $data['namabarang'];
                                        $harga =$data['harga'];
                                        $stock = $data['stock'];
                                        $satuan = $data['satuan'];
                                        $jenisbarang= $data ['jenisbarang'];
                                        $idb = $data['idbarang'];

                                    ?>
                                    
                                    <tbody>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><strong><a href="kranjang.php?id=<?=$idb?>"><?=$namabarang;?></a></strong></td>
                                            <td><?=$harga;?></td>
                                            <td><?=$stock;?></td>
                                            <td><?=$satuan;?></td>
                                            <td><?=$jenisbarang;?></td>
                                            <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                        Delete
                                    </button>
                                            </td>
                                        </tr>

                                                 <!-- edit Modal -->
                                    <div class="modal fade" id="edit<?=$idb;?>">
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
                                            <input type="text " name="namabarang" value='<?=$namabarang;?>' class="form-control" required>
                                            <br>
                                           <input type="number" name="harga" placeholder="harga" class="form-control" required>
                                            <br>
                                            <input type="number" name="stock" placeholder="stock" class="form-control" required>
                                            <br>
                                            <input type="text" name="satuan" value='<?=$satuan;?>' class="form-control" required>
                                            <br>
                                            <input type="text" name="jenisbarang" value='<?=$jenisbarang;?>'  class="form-control" required>
                                            <br>
                                            <input type='hidden' name='idb' value='<?=$idb;?>'>
                                            <button type="submit" class="btn btn-primary" name="updatebarang">Update Barang</button>
                                            </form>
                                            </div>                 
                                        </div>
                                    </div>
                                    </div>


                                                 <!-- Delete Modal -->
                                                 <div class="modal fade" id="delete<?=$idb;?>">
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
                                                Apakah Anda Yakin ingin menghapus <?=$namabarang;?> ?
                                                <input type='hidden' name='idb' value='<?=$idb;?>'>
                                                <br>
                                                <br>
                                            <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
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
             <h4 class="modal-title">Tambah Barang</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
                  <!-- Modal body -->
                     <form method="post">
                       <div class="modal-body">
                       <input type="text " name="namabarang" placeholder="namabarang" class="form-control" required>
                        <br>
                          <input type="number" name="harga" placeholder='harga' class="form-control" required>
                          <br>
                          <input type="number" name="stock" placeholder=" stock" class="form-control" required>
                           <br>
                            <input type="text" name="satuan" placeholder='satuan'  class="form-control" required>
                           <br>
                           <input type="text" name="jenisbarang" placeholder='jenisbarang'  class="form-control" required>
                          <br>
                         <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
                       </form>
               </div>                 
           </div>
         </div>
 </div>

</html>
