<?php
    require 'functions.php';                            // import code from file function.php
                                                        // cek apakah tombol submit telah di pencet menggunakan if pengkondisian 
    if( isset($_POST["submit"]) ) {                     // setelah di submit baru code ini akan di jalankan 

        if( tambah($_POST) > 0){                        // cek keberhasilan data
                                                        // document.location.href = 'index.php'; adalah sintax js untuk redireq
            echo "
            <script> 
                alert ('data berhasil') 
                document.location.href = 'index.php';  
            </script>" ;
        }else {
            echo "
            <script> 
                alert ('data GAGAL') 
            </script>" ;
        }
} ?>
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
            <li>
                <label for="nama">nama:</label>
                <input type="text" name="nama" id="nama" required> <!-- require adalah adtribut html5 agar imputan tidak boleh kosong--> 
            </li>
            <br>
            <li>
                <label for="nrp">nrp:</label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <br>
            <li>
                <label for="email">email:</label>
                <input type="text" name="email" id="email" required>
            </li>
            <br>
            <li>
                <label for="jurusan">jurusan:</label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <br>
            <li>
                <label for="gambar">gambar:</label>
                <input type="text" name="gambar" id="gambar" require>
            </li>
            <br>
            <li>
                <button type="submit" name="submit">tambah data</button>
            </li>
    </ul>

    </form>


</body>
</html>