<?php
require 'functions.php';  // untuk mengimport file function.php

    $mhs = query("SELECT * FROM mahasiswa "); // query ini akan menampilkan data dari tabel mahasiswa 

                                            // ASC = dari kecil ke besar ,DESC = dari besar ke kecil
                                            // SELECT * FROM mahasiswa  WHERE nrp ='1303081134' 

    if( isset ( $_POST["submit_search"]) ){

        $mhs = search($_POST["keyword_search"]);  // $mhs ini akan menimpa $mhs di atas dan aakan kita modifikasi untuk search
    }else{
    
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">tambah data mahasiswa</a>
    <br> <br>
    <form action="" method="post">
        <input type="search" name="keyword_search" placeholder="cari sesuatu" autocomplete="off">
        <button type="submit" name="submit_search">cari</button>
    </form>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>no.</th>
            <th>aksi</th>
            <th>gambar</th>
            <th>nama</th>
            <th>nrp</th>
            <th>email</th>
            <th>jurusan </th>
        </tr>
        <?php $i = 1 ;?> <!-- var ini untuk memberikan nomor urut pada colum nomor -->
<!-- while di bawah ini adalah untuk mengulang tabel row nya -->
    <?php foreach ( $mhs as $row) :?>
        <tr>
            <td><?php echo($i); ?></td>
            <td>
                <a href="edit.php?id=<?= $row["id"]; ?>">edit</a>
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm ('yakin') "> hapus</a> <!-- php?id= php akan mengirimkan id ke halaman yang di tuju-->
            </td>
            <td>
                <img src="<?php echo($row["gambar"]); ?>" alt="gambar" width="50px">
            </td>
            <td><?= $row["nama"]; ?></td>
            <td><?php echo($row["nrp"]); ?></td>
            <td><?php echo($row["email"]); ?></td>
            <td><?php echo($row["jurusan"]); ?></td>
        </tr>
        <?php $i++; ?>          <!-- ingkremen untuk variabel $i yang akan din gunakan untuk penomoran  -->
    <?php endforeach ;?>         <!-- seperti namanya dia dalah penutup oengulangan-->
    </table>
</body>
</html>
