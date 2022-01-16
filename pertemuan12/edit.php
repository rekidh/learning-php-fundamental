<?php

    $id= $_GET["id"];                   // <= menangkap id yang di kirim saat a href di click {kenpa saya taro di atas
                                        // agar saya tidak membuat form imput untuk id dan saya bisa menggunakan nya di function}

    require 'functions.php';           // import code from file function.php


    $row = query("SELECT * FROM mahasiswa WHERE id = $id")[0];  //<= menjalakan function query namun mengubah parameter 
                                                                //nya dan meminta nilai index ke 0 nya
    // var_dump($row);
    // var_dump($id);
    // var_dump($data);


                                                        // cek apakah tombol submit telah di pencet menggunakan if pengkondisian 
    if( isset($_POST["submit"]) ) {                     // setelah di submit baru code ini akan di jalankan 

        if( edit($_POST) > 0){                        // cek keberhasilan data
            
                                                        // document.location.href = 'index.php'; adalah sintax js untuk redireq
            echo "
            <script> 
                alert ('data di edit berhasil') 
                document.location.href = 'index.php';  
            </script>" ;
        }else {
            echo "
            <script> 
                alert ('data GAGAL di ubah') 
            </script>" ;
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>tambah data mahasiswa</h1>
    
    <form action="" method="post">
        <ul> 
            
        <!-- <input type="hidden" value=" <?php //$row["id"]?>" >//  <=baris ini tidak perlu saya tulis karena Id sudah di
                                                                // GET di bagian atas -->
            <li>
                <label for="nama">nama:</label>
                <input type="text" name="nama" id="nama" value="<?=$row["nama"]?>" required> <!-- require adalah adtribut html5 agar imputan tidak boleh kosong--> 
            </li>
            <br>
            <li>
                <label for="nrp">nrp:</label>
                <input type="text" name="nrp" id="nrp" value="<?=$row["nrp"]?>"  required>
            </li>
            <br>
            <li>
                <label for="email">email:</label>
                <input type="text" name="email" id="email" value="<?=$row["email"]?>"  required>
            </li>
            <br>
            <li>
                <label for="jurusan">jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" value="<?=$row["jurusan"]?>"  required>
            </li>
            <br>
            <li>
                <label for="gambar">gambar:</label>
                <input type="text" name="gambar" id="gambar" value="<?=$row["gambar"]?>"  require>
            </li>
            <br>
            <li>
                <button type="submit" name="submit">edit data</button>
            </li>
    </ul>
    </form>


</body>
</html>