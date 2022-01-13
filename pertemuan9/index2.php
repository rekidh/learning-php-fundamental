<?php
// buat koneksi ke databases
// urutannya : namaHost database kita, userName MySQL, paswordnya, nama databasesnya;
        $db = mysqli_connect("localhost","root","","mahaswa");

// get data data dari database/ query data 
// mysqli_query($conection ,"select * from tabel")
        $result = mysqli_query($db,"SELECT * FROM mahasiswa");
        
//ambil (fetch) data dari objec result
// mysqli_fetch_row()  => Mengembalikan array dengan index nya berbentuk angka / sama hal nya seperti array biaasa
//mysqli_fetch_assoc() => mengembalikan array dengan index nya adalah key berbentuk tulisan 
//mysqli_fetch_array() => data yang diberi kan doubel " dia mengirimkan array numeric(angka)&array assosiatif(tulisan)
//mysqli_fetch_object() => dengan mengembalikan kan objec untuk mengakses index nya ($mhs->nama) 

    // while( $mhs = mysqli_fetch_assoc($result) ) {
    // var_dump($mhs);
        
    //     }

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
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>no.</th>
            <th>aksi</th>
            <th>gambar</th>
            <th>nrp</th>
            <th>nama</th>
            <th>email</th>
            <th>jurusan </th>
        </tr>
        <?php $i = 1 ;?> <!-- var ini untuk memberikan nomor urut pada colum nomor -->
<!-- while di bawah ini adalah untuk mengulang tabel row nya -->
    <?php while( $row = mysqli_fetch_assoc($result) ):?> <!-- fetch data (ambil) $result <= adalah tabel -->
        <tr>
            <td><?php echo($i); ?></td>
            <td>
                <a href="">edit</a>
                <a href="">hapus</a>
            </td>
            <td><img src="<?php echo($row["gambar"]); ?>" alt="gambar" width="50px"></td>
            <td><?= $row["nama"]; ?></td>
            <td><?php echo($row["nrp"]); ?></td>
            <td><?php echo($row["email"]); ?></td>
            <td><?php echo($row["jurusan"]); ?></td>
        </tr>
        <?php $i++ ?>
    <?php endwhile;?>
    </table>
</body>
</html>