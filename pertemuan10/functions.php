<?php

    $db = mysqli_connect("localhost","root","","mahaswa"); // <=var connection to DB
    $mhs = query("SELECT * FROM mahasiswa"); //<= untuk mengambil tabel dari DB

function query($mhs){
    global $db ;                                // <= use Global variabel
        $result = mysqli_query($db, $mhs);      //<= [ QUERY <(artinya tanyakan), dan tampung nilai nya ke var RESULT]
        $rows =[];                              //<=  var dengan isi array namun di kosongkan 
    while($row = mysqli_fetch_assoc($result)){ // <= ulangi permintaan "mysqli_fetch_assoc" ke var $result dan tampung ke $row
            $rows[] = $row ;                   // <= 
        }
    return $rows;
}

function tambah ($data){ //<= Function create new data table
    global $db ;
        $nama= htmlspecialchars($data["nama"]) ;    // htmlspecialchars() adalah secure agar user tidak bisa injec script
        $nrp=htmlspecialchars($data["nrp"]);
        $email= htmlspecialchars ($data["email"]);
        $jurusan= htmlspecialchars ($data["jurusan"]);
        $gambar= htmlspecialchars ($data["gambar"]);
    
    $query ="INSERT INTO mahasiswa VALUE ('','$nama','$nrp','$email','$jurusan','$gambar')";  //<= sintax cmd to DBMS

        mysqli_query($db,"$query"); // <= query data kedata bases dengan CMD

    return mysqli_affected_rows($db);  //<= retrun nilai sebuah koneksi gagal atau berhasil
}


function hapus($id){
    global $db ;
    mysqli_query($db,"DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($db);
}



?>