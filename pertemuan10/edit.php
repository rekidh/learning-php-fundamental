<?php
    require 'functions.php';                            // import code from file function.php
                                                        // cek apakah tombol submit telah di pencet menggunakan if pengkondisian 
    $id = $_GET["id"];
    var_dump($mhs);

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
    
    <?php foreach ( $mhs as $row) :?>
    <form action="" method="post">
            <input type="hidden" value="<?=$row["id"]?>" >
        <ul> 
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
                <button type="submit" name="submit">tambah data</button>
            </li>
    </ul>
<?php endforeach ; ?>
    </form>


</body>
</html>