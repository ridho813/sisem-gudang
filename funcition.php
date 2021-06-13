<?php
    session_start();

    //membuat koneksi
    $conn= mysqli_connect("localhost","root","","stockbarang");


    //menambah barang
    if(isset($_POST['addnewbarang'])){
        $namabarang= $_POST['namabarang'];
        $harga= $_POST['harga'];
        $stock = $_POST['stock'];
        $satuan = $_POST['satuan'];
        $jenisbarang= $_POST['jenisbarang'];

        $addtable = mysqli_query($conn,"INSERT INTO barang(namabarang, harga, stock, satuan, jenisbarang) VALUES ('$namabarang','$harga','$stock','$satuan','$jenisbarang')");

        if($addtable){
            header('location:index.php');
        }else{
        echo 'GAgall';
        header('location:index.php');
    }
    
};



    //menambah data barang masuk
    if(isset($_POST['barangmasuk'])){
       $barangnya = $_POST['barangnya'];
       $penerima = $_POST['penerima'];
       $qty =$_POST['qty'];
      

        $cekstocksekarang = mysqli_query($conn,"SELECT * FROM barang where idbarang  ='$barangnya' ");
        $ambildatanya = mysqli_fetch_array($cekstocksekarang);

         $stocksekarang = $ambildatanya['stock'];
        $tambahkanstocksekarang = $stocksekarang + $qty;

        $addmasuk = mysqli_query($conn,"INSERT INTO  barang_masuk (idbarang,keterangan, qty) VALUES('$barangnya','$penerima','$qty')");
        $updetstockmasuk =mysqli_query($conn,"UPDATE barang SET stock ='$tambahkanstocksekarang' where idbarang ='$barangnya'");
        if($addmasuk&&$updetstockmasuk){
           header('location:masuk.php');
            }else{
             echo 'GAgall';
     header('location:masuk.php');
    }
};




    //menambah barang keluar
    if(isset($_POST['addbarangkeluar'])){
        $barangnya = $_POST['barangnya'];
        $statuss = $_POST['statuss'];
        $pembayaraan = $_POST['pembayaraan'];
        $qty =$_POST['qty'];
 
         $cekstocksekarang = mysqli_query($conn,"SELECT * FROM barang where idbarang  ='$barangnya' ");
         $ambildatanya = mysqli_fetch_array($cekstocksekarang);
 
          $stocksekarang = $ambildatanya['stock'];

    if($stocksekarang>=$qty){
        //barang cukup


         $tambahkanstocksekarang = $stocksekarang - $qty;
 
         $addkeluar = mysqli_query($conn,"INSERT INTO barang_keluar (idbarang,sts, pembayaran, qty) VALUES('$barangnya','$statuss','$pembayaraan','$qty')");
         $updetstockmasuk =mysqli_query($conn,"UPDATE barang SET stock ='$tambahkanstocksekarang' where idbarang ='$barangnya'");
         if($addkeluar&&$updetstockmasuk){
            header('location:keluar.php');
             }else{
              echo 'GAgall';
      header('location:keranjang.php');
     }
    } else {
        //kalau tidak cukup
        echo'
        <script>
            alert("stock saat ini tidak mencukupi"):
            window.location.href="index.php";
        </script>
        ';

    }
 
};

    //updet barang
    if(isset($_POST['updatebarang'])){
        $idb = $_POST['idb'];
        $namabarang = $_POST['namabarang'];
        $harga = $_POST['harga'];
        $stock = $_POST['stock'];
        $satuan = $_POST ['satuan'];
        $jenisbarang = $_POST['jenisbarang'];

        $update = mysqli_query ($conn,"UPDATE barang SET namabarang = '$namabarang', harga ='$harga',stock ='$stock', satuan ='$satuan',jenisbarang=' $jenisbarang' where idbarang='$idb' ");
        if($update){
            header('location:index.php');
             }else{
              echo 'GAgall';
      header('location:index.php');
        }

    }

    //hapus barang
    if(isset($_POST['hapusbarang'])){
        $idb = $_POST['idb'];

        $hapus = mysqli_query($conn," DELETE FROM barang WHERE idbarang ='$idb' ");

        if($hapus){
            header('location:index.php');
             }else{
              echo 'GAgall';
      header('location:index.php');
        }

    }

    //mengubah data barang masuk
    if(isset($_POST['updatebarangmasuk'])){
        $idb =$_POST['idb'];
        $idm =$_POST['idm'];
        $keterangan = $_POST['keterangan'];
        $qty = $_POST ['qty'];


        $lihatstock = mysqli_query($conn,"SELECT * FROM barang where idbarang='$idb' ");
        $stocknya= mysqli_fetch_array($lihatstock);
        $stockskrg = $stocknya['stock'];


        $qtyskrg = mysqli_query($conn,"SELECT * FROM barang_masuk where idmasuk='$idm' ");
        $qtynya = mysqli_fetch_array($qtyskrg);
        $qtyskrg= $qtynya['qty'];



        if($qty>$qtyskrg){
            $selisih= $qty-$qtyskrg;
            $kurangin= $stockskrg - $selisih;
            $kurangistocknya = mysqli_query($conn,"UPDATE barang set stock = '$kurangin' where idbarang='$idb'");


            $updatenya = mysqli_query($conn,"UPDATE barang_masuk set qty='$qty',keterangan='$keterangan' where 	idmasuk='$idm' ");


            if($kurangistocknya&&$updatenya){
                    header('location:masuk.php');
                     }else{
                      echo 'GAgall';
              header('location:masuk.php');
                }

            }else{
            $selisih= $qtyskrg-$qty;
            $kurangin= $stockskrg+$selisih;
            $kurangistocknya = mysqli_query($conn,"UPDATE barang set stock = '$kurangin' where idbarang='$idb' ");


            $update = mysqli_query($conn,"UPDATE barang_masuk set qty='$qty',keterangan='$keterangan' where idmasuk='$idm' ");
            if($kurangistocknya&&$updatenya){
                header('location:masuk.php');
                 }else{
                  echo 'GAgall';
          header('location:masuk.php');
            }

            }
    };

         //delete barang masuk
         if(isset($_POST['delete'])){
            $idb = $_POST['idb'];
            $qty = $_POST['kty'];
            $idm = $_POST['idm'];

            $getdatastock= mysqli_query($conn,"SELECT * FROM barang where idbarang='$idb' ");
            $data = mysqli_fetch_array($getdatastock);
            $stock = $data['stock'];

            $selisih=$stock-$qty;

            $update =mysqli_query($conn,"UPDATE barang SET stock='$selisih' where idbarang='$idb' ");
            $hapus =mysqli_query($conn," DELETE FROM barang_masuk WHERE idmasuk ='$idm' ");

            if($update&&$hapus){
                header('location:masuk.php');
            }else{
               header('location:masuk.php');
            }


        };


      



         //mengubah data barang keluar 
         if(isset($_POST['updatebarangkeluar'])){
            $idb =$_POST['idb'];
            $idk =$_POST['idk'];
            $pembayaran = $_POST['pembayaran'];
            $qty = $_POST ['qty'];

    
    
            $lihatstock = mysqli_query($conn,"SELECT * FROM barang where idbarang='$idb' ");
            $stocknya= mysqli_fetch_array($lihatstock);
            $stockskrg = $stocknya['stock'];
    
    
            $qtyskrg = mysqli_query($conn,"SELECT * FROM barang_keluar where idkeluar='$idk' ");
            $qtynya = mysqli_fetch_array($qtyskrg);
            $qtyskrg= $qtynya['qty'];

            
            
        if($qty>$qtyskrg){
            $selisih= $qty-$qtyskrg;
            $kurangin= $stockskrg - $selisih;
            $kurangistocknya = mysqli_query($conn,"UPDATE barang set stock = '$kurangin' where idbarang='$idb'");


            $updatenya = mysqli_query($conn,"UPDATE barang_keluar set qty='$qty',pembayaran='$pembayaran' where idkeluar='$idk' ");


            if($kurangistocknya&&$updatenya){
                    header('location:keluar.php');
                     }else{
                      echo 'GAgall';
              header('location:keluar.php');
                }

            }else{
            $selisih= $qtyskrg-$qty;
            $kurangin= $stockskrg+$selisih;
            $kurangistocknya = mysqli_query($conn,"UPDATE barang set stock = '$kurangin' where idbarang='$idb' ");


            $update = mysqli_query($conn,"UPDATE barang_keluar set qty='$qty',pembayaran='$pembayaran' where idkeluar='$idk' ");
            if($kurangistocknya&&$updatenya){
                header('location:keluar.php');
                 }else{
                  echo 'GAgall';
          header('location:keluar.php');
            }

            }
        };
    
             //delete barang keluar   
             if(isset($_POST['delete'])){
                $idb = $_POST['idb'];
                $qty = $_POST['kty'];
                $idk = $_POST['idk'];
   
                $getdatastock= mysqli_query($conn,"SELECT * FROM barang where idbarang='$idb' ");
                $data = mysqli_fetch_array($getdatastock);
                $stock = $data['stock'];
   
                $selisih=$stock+$qty;
   
                $update =mysqli_query($conn,"UPDATE barang SET stock='$selisih' where idbarang='$idb' ");
                $hapus =mysqli_query($conn," DELETE FROM barang_keluar WHERE idkeluar ='$idk' ");
   
                if($update&&$hapus){
                    header('location:keluar.php');
                }else{
                   header('location:keluar.php');
                }
   
   
            };


            //menambah data pelanggan

            if(isset($_POST['pelanggan'])){
                $namapelanggan= $_POST['nama_pel'];
                $alamat= $_POST['alamat'];
                $kota = $_POST['kota'];
                $no_tlp = $_POST['no_tlp'];
                $username=$_POST['username'];
                $pass =$_POST['pass'];

                $addtable = mysqli_query($conn,"INSERT INTO pelanggan(nama_pel, alamat, kota, no_tlp,username,pass) VALUES ('$namapelanggan','$alamat','$kota','$no_tlp','$username','$pass')");
        
                if($addtable){
                    header('location:pelanggan.php');
                }else{
                echo 'GAgall';
                header('location:pelanggan.php');
            }
            
        };
        //edit pelanggan 
        if(isset($_POST['pelanggan'])){

            $id_pel = $_POST['id_pel'];
            $namapelanggan = $_POST['nama_pel'];
        $alamat = $_POST['alamat'];
            $kota = $_POST['kota'];
            $no_tlp = $_POST ['no_tlp'];
            $username=$_POST['username'];
            $pass =$_POST['pass'];
        
            $upload = mysqli_query ($conn,"UPDATE pelanggan SET  username='$username', pass ='$pass' where id_pel ='$id_pel' ");
            if($upload){
                header('location:pelanggan.php');
                 }else{
                  echo 'GAgall';
          header('location:pelanggan.php');
            }
    
        };
    
        //hapus pelanggan
        if(isset($_POST['phapus'])){
           $id_pel=$_POST['id_pel'];
    
            $dhapus = mysqli_query($conn," DELETE FROM pelanggan WHERE id_pel ='$id_pel' ");
    
            if($dhapus){
                header('location:pelanggan.php');
                 }else{
                  echo 'GAgall';
          header('location:pelanggan.php');
            }
    
        };






            //data Pengiriman???????????
            if(isset($_POST['kirim'])){
               
                $barangnya =$_POST['barangnya'];
                $no_faktur = $_POST['no_faktur'];
                $sts =$_POST['sts'];
         
                $kirim = mysqli_query($conn,"INSERT INTO pengiriman(idkurir,no_faktur, sts) VALUES ('$barangnya','$no_faktur','$sts')");

                 if($kirim){
                    header('location:pengiriman.php');
                     }else{
                      echo 'GAgall';
              header('location:pengiriman.php');
             }
         };
         
    
        //hapus pelngiriman
        if(isset($_POST['shapus'])){
            $idp = $_POST['id_pengirim'];
    
            $shapus = mysqli_query($conn," DELETE FROM pengiriman WHERE id_pengirim ='$idp' ");
    
            if($shapus){
                header('location:pengiriman.php');
                 }else{
                  echo 'GAgall';
          header('location:pengiriman.php');
            }
    
        };



    //data kurir


    if(isset($_POST['kurir'])){
        $nama_kurir= $_POST['nama_kurir'];
        $alamat= $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $username = $_POST['username'];
        $pass= $_POST['pass'];

        $addtable = mysqli_query($conn,"INSERT INTO kurir(nama_kurir, alamat, no_hp, username, pass) VALUES ('$nama_kurir','$alamat','$no_hp','$username','$pass')");

        if($addtable){
            header('location:kurir.php');
        }else{
        echo 'GAgall';
        header('location:index.php');
    }
    
};
    //edit data kurir ????????
    if(isset($_POST['ekurir'])){

        $id_kurir = $_POST['id_kurir'];
        $nama_kurir = $_POST['nama_kurir'];
        $username = $_POST ['username'];
        $pass = $_POST ['pass'];
        
    
        $upload = mysqli_query ($conn,"UPDATE kurir SET nama_kurir = '$nama_kurir', username ='$username', pss ='$pss'  where id_kurir ='$id_kurir' ");
        if($upload){
            header('location:kurir.php');
             }else{
              echo 'GAgall';
      header('location:kurir.php');
        }

    };

    //hapus data kurir
    if(isset($_POST['hapus'])){
        $idkurir = $_POST['idkurir'];

        $hapus = mysqli_query($conn," DELETE FROM kurir WHERE idkurir ='$idkurir' ");

        if($hapus){
            header('location:kurir.php');
             }else{
              echo 'GAgall';
      header('location:kurir.php');
        }

    };

//kelola admin
if(isset($_POST ['updetadmin'])){
    $username =$_POST['username'];
    $password =$_POST['password'];
    $jabatan =$_POST['jabatan'];

    $ada= mysqli_query($conn,"INSERT INTO login (username,password,jabatan) VALUES ('$username', '$password','$jabatan')");

    if($ada){
        //berhasil
        header('location:admin.php');
    } else{
        header('location:admin.php');

    }

};
//updet admin
if(isset($_POST['updateadmin'])){

    $iduser = $_POST['iduser'];
    $username = $_POST['username'];
    $password = $_POST ['password'];
    $jabatan = $_POST ['jabatan'];
    

    $upload = mysqli_query ($conn,"UPDATE login SET username = '$username', password ='$password', jabatan ='$jabatan'  where iduser ='$iduser' ");
    if($upload){
        header('location:admin.php');
         }else{
          echo 'GAgall';
  header('location:admin.php');
    }

};

//delete admin
if(isset($_POST['hapusbadmin'])){
    $iduser = $_POST['iduser'];

    $hapus = mysqli_query($conn," DELETE FROM login WHERE iduser ='$iduser' ");

    if($hapus){
        header('location:admin.php');
         }else{
          echo 'GAgall';
  header('location:admin.php');
    }

};

//menambah data register

if(isset($_POST['register'])){
    $barangnya = $_POST['barangnya'];
    $nama_pj = $_POST['nama_pj'];
    $alamat=$_POST['alamat'];
    $no_tlp=$_POST['no_tlp'];
    $jumlah =$_POST['jumlah'];
  

     $addmasuk = mysqli_query($conn,"INSERT INTO  registrasi (id_pel,nama_pj,alamat,no_tlp,jumlah) VALUES('$barangnya','$nama_pj','$alamat','$no_tlp','$jumlah')");
    
     if($addmasuk){
         echo 'beerhasilll';
    header('location:register.php');
         }else{
          echo 'GAgall';
  header('location:register.php');
 }
};

//hapuss register
if(isset($_POST['rhapus'])){
    $idr= $_POST['id_kredit'];

    $shapus = mysqli_query($conn," DELETE FROM registrasi WHERE id_kredit = $idr");

    if($shapus){
        header('location:register.php');
         }else{
          echo 'GAgall';
  header('location:register.php');
    }

};

// Konfirmasi Pembayaraan


if(isset($_POST['konfirmasi'])){
   
    
    $barangnya=$_POST['barangnya'];
    $nama_penyetor = $_POST['nama_penyetor'];
    $jumlah_transfer=$_POST['jumlah_transfer'];
    $bank=$_POST['bank'];

   

     $addmasuk = mysqli_query($conn,"INSERT INTO  pembayaran (idkeluar,nama_penyetor,jumlah_transfer,bank) VALUES('$barangnya','$nama_penyetor','$jumlah_transfer','$bank')");
    
     if($addmasuk){
         echo 'beerhasilll';
    header('location:konfirmasi.php');
         }else{
          echo 'GAgall';
  header('location:konfirmasi.php');
 }
};

//DELETE KONFIRMASI

if(isset($_POST['haapuss'])){
    $idm= $_POST['id_konfir'];

    $ahapus = mysqli_query($conn," DELETE FROM pembayaran WHERE id_konfir =$idm");

    if($ahapus){
        header('location:konfirmasi.php');
         }else{
          echo 'GAgall';
  header('location:konfirmasi.php');
    }
};





?>