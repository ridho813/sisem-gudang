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
        <title>Kelola Admin</title>
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
                            <a class="nav-link" href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Pelanggan
                            </a>
                            <a class="nav-link" href="pengiriman.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                                Pengiriman
                            </a>
                            <a class="nav-link" href="kurir.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Kurir
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
                    <div class="container-fluid md-4">
                        <h1 class="mt-4">Kelola admin</h1>
                        
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
                                        Tambah Admin
                                    </button>
                                    <a href="export.php" class="btn btn-info">Eksport Data</a>

                            </div>
                            <div class="card-body">

                                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    

                                    <!-- looping-->
                                    <?php

                                    $ambilsemuadataasdmin = mysqli_query($conn,"select * from login");
                                    $i= 1;
                                    while ($data=mysqli_fetch_array($ambilsemuadataasdmin)){
                                      
                                        $iduser = $data['iduser'];
                                        $username= $data['username'];
                                        $password = $data['password'];
                                        $jabatan = $data['jabatan'];
                                       
                                    ?>
                                    
                                    <tbody>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$username;?></td>
                                            <td><?=$password;?></td>
                                            <td><?=$jabatan;?></td>
                                            
                                            <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$iduser;?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$iduser;?>">
                                        Delete
                                    </button>
                                            </td>
                                        </tr>

                                                 <!-- edit Modal -->
                                    <div class="modal fade" id="edit<?=$iduser;?>">
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
                                            <input type="text " name="username" value='<?=$username;?>' class="form-control" placeholder="Username" required>
                                            <br>
                                           <input type="password" name="password" placeholder="Password" class="form-control">
                                            <br>
                                            <input type="text " name="jabatan" value='<?$jabatan?>' class="form-control" placeholder="Jabatan" required>
                                            <br>
                                            <input type='hidden' name='iduser' value='<?=$iduser;?>'>
                                            <button type="submit" class="btn btn-primary" name="updateadmin">Update Admin</button>
                                            </form>
                                            </div>                 
                                        </div>
                                    </div>
                                    </div>


                                                 <!-- Delete Modal -->
                                                 <div class="modal fade" id="delete<?=$iduser;?>">
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
                                                Apakah Anda Yakin ingin menghapus <?=$username;?> ?
                                                <input type='hidden' name='iduser' value='<?=$iduser;?>'>
                                                <br>
                                                <br>
                                            <button type="submit" class="btn btn-danger" name="hapusbadmin">Hapus</button>
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
             <h4 class="modal-title">Tambah Barang</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
                  <!-- Modal body -->
                     <form method="post">
                       <div class="modal-body">
                       <input type="text " name="username" placeholder="Username" class="form-control" require>
                        <br>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                         <br>
                         <input type="text" name="jabatan" placeholder="Jabatan" class="form-control">
                         <br>
                         <button type="submit" class="btn btn-primary" name="updetadmin">Submit</button>
                       </form>
               </div>                 
           </div>
         </div>
 </div>

</html>
