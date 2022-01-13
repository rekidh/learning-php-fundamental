<?php
// konrksi 
$db = mysqli_connect("localhost","root","","mahaswa");

// cek apakah tombol submit telah di pencet menggunakan if pengkondisian 

    if( isset($_POST["submit"]) ) {
    $nama= $_POST["nama"];
    $nrp=$_POST["nrp"];
    $email=$_POST["email"];
    $jurusan=$_POST["jurusan"];
    $gambar=$_POST["gambar"];


    $query ="INSERT INTO mahasiswa VALUE ('','$nama','$nrp','$email','$jurusan','$gambar')";
    mysqli_query($db,"$query");

// keberhasilan data 

        if(mysqli_affected_rows($db) > 0){
            echo " berhasil";
        }else {
            echo "gagal";
            echo mysqli_error($db);
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
        <li>
            <label for="nama">nama:</label>
            <input type="text" name="nama" id="nama">
        </li>
        <br>
        <li>
            <label for="nrp">nrp:</label>
            <input type="text" name="nrp" id="nrp">
        </li>
        <br>
        <li>
            <label for="email">email:</label>
            <input type="text" name="email" id="email">
        </li>
        <br>
        <li>
            <label for="jurusan">jurusan:</label>
            <input type="text" name="jurusan" id="jurusan">
        </li>
        <br>
        <li>
            <label for="gambar">gambar:</label>
            <input type="text" name="gambar" id="gambar">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">tambah data</button>
        </li>
    </ul>

    </form>


</body>
</html>