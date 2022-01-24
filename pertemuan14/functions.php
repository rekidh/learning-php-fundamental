<?php

$db = mysqli_connect("localhost", "root", "", "mahaswa"); // <=var connection to DB
// $mhs = query("SELECT * FROM mahasiswa");               //<= untuk mengambil tabel dari DB

function query($mhs)
{
    global $db;                                // <= use Global variabel
    $result = mysqli_query($db, $mhs);        //<= [ QUERY <(artinya tanyakan), dan tampung nilai nya ke var RESULT]
    $rows = [];                              //<=  var dengan isi array namun di kosongkan 
    while ($row = mysqli_fetch_assoc($result)) { // <= ulangi permintaan "mysqli_fetch_assoc" ke var $result dan tampung ke $row
        $rows[] = $row;                   // <= 
    }
    return $rows;
}

function tambah($data)
{                            //<= Function create new data table
    global $db;
    $nama = htmlspecialchars($data["nama"]); // htmlspecialchars() adalah secure agar user tidak bisa injec script
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    // $gambar= htmlspecialchars ($data["gambar"]);     <= tidak lagi di pakai karna kita merubah form menjadi upload
    $gambar = upload();
    if (!$gambar) {                                   //  if ( $gambar === false)
        return false;
    }


    $query = "INSERT INTO mahasiswa VALUE ('','$nama','$nrp','$email','$jurusan','$gambar')";  //<= sintax cmd to DBMS

    mysqli_query($db, "$query"); // <= query data kedata bases dengan CMD

    return mysqli_affected_rows($db);  //<= retrun nilai sebuah koneksi gagal atau berhasil
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $fileSize = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {                          //pengecekan untuk file gambar sudah di upload atau belum
        echo "
        <script>
            alert('upload dulu gambar nya guys')
        </script>
        ";
        return false;                            // return false untuk memberhentikan function di baris code ini
    }
    $extensiBenar = ['jpg', 'jpeg', 'png'];      // variabel yang di buat untuk menampung extensi file apa saja yang bisa di tanpung 
    $extensiGambar = explode('.', $namaFile);  // explode(delimiter,string) <= adalah function untuk memecah sebuah rangkaian string menjadi ARRAY
    $extensiGambar = strtolower(end($extensiGambar));  // End adalah selector [index ke END] untuk mengambil array dari $ dengan index terakhir
    //  strtolower() untuk mensortir jenis tulisan huruf besar maupun huruf kecil dan di paksa menjadi lower ata kecil
    if (!in_array($extensiGambar, $extensiBenar)) { //  in_array($jarum,$jerami) <= untuk mengecek adakah sebuah sring di dalah array
        echo "
        <script>
            alert('yang anda upload bukan gambar ')
        </script>
        ";
        return false;
    }

    if ($fileSize > 1000000) {
        echo "
        <script>
            alert('gambar nya terlalu besar boss')
        </script>
        ";
        return false;
    }

    $nameFileBaru = uniqid();   // ini adalah sebuah function php untuk memunculkan bilangan random
    // contoh : $nameFileBaru= '2b3i44iur' <= angka inilah yang akan kita pakai untuk penamaan sebuah file foto

    $nameFileBaru .= ".";  // dengan operator pengabungan sehinga string titik menjadi $nameFileBaru ='2b3i44iur'+'.'
    $nameFileBaru .= $extensiGambar;  // lalu kita gabungkan juga nilai di atas dengan $extensiGambar = 'JPG'
    // dengan begitu $nameFileBaru= '2b3i44iur.JPG'


    // jika IF di atas terpenuhi ita lanjukan exsekusi code di bawah ini
    move_uploaded_file($tmpName, 'img/' . $nameFileBaru);  // move_uploaded_file('fileNow', 'destination') <= sebuah function untuk memindahkan file ke tempat yang baru
    // move_uploaded_file($tmpName='XAMPP/php/bin' ,'img/ . $nameFileBaru='2b3i44iur.JPG'  )

    return $nameFileBaru;  // return 'b3i44iur.JPG'
}




function hapus($id)
{               // <= parameter pada function ini akan dikirim dari mana function ini di pangil 
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = $id"); // <= query data kedata bases dengan CMD
    return mysqli_affected_rows($db); //<= retrun nilai sebuah koneksi gagal atau berhasil bernilai -1 sampai 1
}




function edit($data)
{               // <= parameter pada function ini akan dikirim dari mana function ini di pangil 

    global $db;
    global $id;
    $nama = htmlspecialchars($data["nama"]);    // htmlspecialchars() adalah secure agar user tidak bisa injec script
    $nrp = htmlspecialchars($data["nrp"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambar"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    // $gambar = htmlspecialchars($data["gambar"]);
    $query = "UPDATE mahasiswa SET nama='$nama',nrp='$nrp',email='$email',jurusan='$jurusan',gambar='$gambar' WHERE id=$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
    var_dump($query);
}


function search($search_key)
{           // function untuk mancari
    // opsi : WHERE nama='$search_key' <= harus benar2 sama
    // opsi : nama LIKE '%$search_key%' <= harus di ikuti tanda % tanda itu memprentasikan APAPUN
    // contoh nya : '$kataKunci%' <= mencari $kataKunci+ data yang ada begitupun sebalik nya

    $query = " SELECT * FROM mahasiswa WHERE nama LIKE'%$search_key%' 
                OR nrp LIKE '%$search_key%'                              
                OR email LIKE '%$search_key%'                            
                OR jurusan LIKE '%$search_key%'   
                ";
    return query($query);
}


function queryUser($user)
{
    global $db;
    $userr = mysqli_query($db, $user);
    return $userr;
}



function register($dataUser)
{
    global $db;
    $userName = strtolower(stripslashes($dataUser['username'])); // stripslashes() adalah sebuah function untujk tidak mengizinkan user mengimput karater /\^~`'<> spesial semacam nya
    $password = mysqli_real_escape_string($db, $dataUser["password"]); //mysqli_real_escape_string() 
    $password2 = mysqli_real_escape_string($db, $dataUser["password2"]);

    //cek konfirmasin pasword
    if ($password !== $password2) {
        echo "<script> alert('password tidak sesui !') </script>";
        return false;
    }
    // cek username sudah ada di databases
    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$userName'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> alert('usename sudah ada !') </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, " INSERT INTO users VALUES ('','$userName','$password') ");


    return mysqli_affected_rows($db);
}
