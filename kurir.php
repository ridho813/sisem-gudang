
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

$ambilsemuadatastock = mysqli_query($conn,"select * from kurir ");
$i= 1;
while ($data=mysqli_fetch_array($ambilsemuadatastock)){
  
    $idkurir = $data['idkurir'];
    $nama_kurir= $data['nama_kurir'];
    $alamat =$data['alamat'];
    $no_hp = $data['no_hp'];
    $username = $data['username'];
    $pass = $data['pass'];

?>

    <?php

};


    ?>
                       
                        <!-- The Modal -->
      <div class="modal fade" id="myModal">
     <div class="modal-dialog">
     <div class="modal-content">
        <!-- Modal Header -->
           <div class="modal-header">
             <h4 class="modal-title">Create accon kurir</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
                  <!-- Modal body -->
                     <form method="post">
                       <div class="modal-body">
                       <input type="text " name="nama_kurir" placeholder="nama kurir" class="form-control" required>
                        <br>
                        <br>
                          <input type="text" name="alamat" placeholder='alamat' class="form-control" required>
                          <br>
                          <br>
                          <input type="text" name="no_hp" placeholder=" no telepon " class="form-control" required>
                           <br>
                           <br>
                            <input type="text" name="username" placeholder='Username'  class="form-control" required>
                           <br>
                           <br>
                            <input type="password" name="pass" placeholder='Password'  class="form-control" required>
                           <br>
                           <br>
                        
                         <button type="submit" class="btn btn-primary" name="kurir">Submit</button>
                      <br>
                      <a class="nav-link" href="login.php">
                      Login
                      </a> 
                      <br>
                       </form>
               </div>                 
           </div>
         </div>


                     
                       </form>
               </div>                 
           </div>
         </div>
 </div>
 </div>        
    </div>
  </body>
</html>