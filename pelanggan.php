
<?php
require 'funcition.php';



?>   
<html>
  <head>
    <title> Form Login Type 1 </title>
    <link href="assets/kurir.css" rel="stylesheet" type="text/css" >
  </head>

  <body>
    <div id="utama">

      <div class="header">
       

        <div class="header_isi">
          <div class="gambar">
           
                                    <!-- looping-->
                                    <?php

                                    $ambilsemuadatastock = mysqli_query($conn,"select * from pelanggan");
                                    $i= 1;
                                    while ($data=mysqli_fetch_array($ambilsemuadatastock)){
                                      
                                        $id_pel = $data['id_pel'];
                                        $namapelanggan= $data['nama_pel'];
                                        $alamat =$data['alamat'];
                                        $kota = $data['kota'];
                                        $no_tlp = $data['no_tlp'];
                                        $username =$data['username'];
                                        $pass =$data['pass'];

                                    ?>  
                                        <?php

                                    };


                                        ?>

            <form action="pelanggan.php" method="POST">
              
            <div class="center">
                                        <!-- The Modal -->
      <div class="modal fade" id="myModal">
     <div class="modal-dialog">
     <div class="modal-content">
        <!-- Modal Header -->
           <div class="modal-header">
             <h4 class="modal-title">Create account Pelanggan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
                  <!-- Modal body -->
                     <form method="post">
                       <div class="modal-body">
                       
                       <br>
                       <input type="text " name="nama_pel" placeholder="nama pelanggan" class="form-control" required>
                        <br>
                        
                          <input type="text" name="alamat" placeholder='alamat' class="form-control" required>
                          <br>
                          
                          <input type="text" name="kota" placeholder=" kota" class="form-control" required>
                           <br>
                            <input type="number" name="no_tlp" placeholder='nomor telepon'  class="form-control" required>
                           <br>
                            <input type="text" name="username" placeholder=' Username' class="form-control" required>
                           <br>
                           <input type="password" name="pass" placeholder=' Password' class="form-control" required>
                           <br>
                         <button type="submit" class="btn btn-primary" name="pelanggan">submit</button>
                     <br>
                     <a class="nav-link" href="login.php">
                      Login
                      </a> 
                       </form>
               </div>                 
           </div>
         </div>
 </div>
 </div>        
    </div>
  </body>
</html>