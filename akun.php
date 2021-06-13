<?php
require 'funcition.php';



//cek login
if(isset($_POST['register'])){
    $username= $_POST ['username'];
    $password= $_POST ['password']; //inputan user
    $jabatan=$_POST ['jabatan'];
    
    //endkripsi
    $epassword= password_hash($passsword, PASSWORD_DEFAULT);

    //isnsert db

    $insert = mysqli_query($conn,"INSERT INTO login(username,password,jabatan) VALUES ('$username','$epassword','$jabatan') ");
    // hitung data

    if($insert){
        header('location:login.php');
       

    } else{
        echo '
       <script>
       alert("REGISTRASI GAGAL");
       window.location.herf="akun.php";

       </script>
          ';


    }
};

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>REGISTER</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register account</h3></div>
                                    <div class="card-body">
                                        <form method ='post'>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="username" id="inputusername" type="username" placeholder="name@example.com" />
                                                <label for="inputusername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name ="password" id="inputpassword" type="password" placeholder="Password" />
                                                <label for="inputpassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="jabatan" id="inputusername" type="username" placeholder="name@example.com" />
                                                <label for="inputusername">Jabatan</label>
                                            </div>
                                            
                                                <button type="submit" class="btn btn-primary" name="register" >Registrasi account</button>
                                            </div>
                                                 <a class="nav-link" href="login.php">
                                                   Alredy have an account ?
                                                  </a>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
