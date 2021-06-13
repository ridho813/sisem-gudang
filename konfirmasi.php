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
        <title>Konfirmasi Pembayaran</title>
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
                           
                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                                </nav>
                            </div>   
                </nav>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid md-4">
                        <h1 class="mt-4">Konfirmasi Pembayaran</h1>
                        
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
                                        Konfirmasi Pembayaran
                                    </button>

                            </div>
                            <div class="card-body">
                             <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>tanggal</th>
                                            <th>pembayaraan</th>
                                            <th>Nama  Penyetor</th>
                                            <th>Jumlah Transfer</th>
                                            <th>Bank Tujuan</th>
                                    
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    

                                    <!-- looping-->
                                    <?php

                                $ambilsemuadatastock = mysqli_query($conn,"select * from pembayaran p, barang_keluar s where s.idkeluar=p.idkeluar ");
                                $i= 1;
                                while ($data=mysqli_fetch_array($ambilsemuadatastock)){
  
                                      

                                        $idm = $data['id_konfir'];
                                        $idk= $data['idkeluar'];
                                        $nama_penyetor =$data['nama_penyetor'];
                                        $jumlah_transfer = $data['jumlah_transfer'];
                                        $tgl_bayar = $data['tgl_bayar'];
                                        $bank = $data['bank'];
                                        $pembayaran = $data['pembayaran'];
                                      


                                    ?>
                                     <tbody>
                                    <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$tgl_bayar;?></td>
                                            <td><?=$pembayaran;?></td>
                                            <td><?=$nama_penyetor;?></td>
                                            <td><?=$jumlah_transfer;?></td>
                                            <td><?=$bank;?></td>
                                            

                                            
                                   
                                        
                                    <td>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idm;?>">
                                                            Delete
                                                        </button>
                                                </td>
                                                </tr>


                                                 <!-- Delete Modal -->
                                                 <div class="modal fade" id="delete<?=$idm;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body"> 
                                                Apakah Anda Yakin ingin menghapus Konfirmasi Konfirmasi Pembayaran ?
                                                <input type='hidden' name='id_konfir' value='<?=$idm;?>'>
                                            <button type="submit" class="btn btn-danger" name="haapuss">Hapus</button>
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
             <h4 class="modal-title">Registrasi</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
                  <!-- Modal body -->
                     <form method="post">
                       <div class="modal-body">

                       <select name="barangnya" class="form-control"> 
                   <?php
                   $ambilsemuadatanya =mysqli_query($conn,"select * from barang_keluar");
                  while ($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                   $pembayaran = $fetcharray['pembayaran'];
                    $idkeluar = $fetcharray['idkeluar'];
                   
                      $idkeluar = $fetcharray['idkeluar'];
                     
                    ?>

                    <option value="<?=$idkeluar;?>"><?=$pembayaran;?> </option>
                    <?php

                  }

                   ?>
               </select>
               <input type="text " name="bank" placeholder="Bank Tujuan" class="form-control" required>
                        <br>
                        <input type="text " name="nama_penyetor" placeholder="Nama Penyetor" class="form-control" required>
                        <br>
                        <input type="number" name="jumlah_transfer" placeholder='Jumlah Transfer' class="form-control" required>
                          <br>
                           
                         <button type="submit" class="btn btn-primary" name="konfirmasi">Submit</button>
                       </form>
               </div>                 
           </div>
         </div>
 </div>

</html>
