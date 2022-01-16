<?php

    $db = mysqli_connect("localhost","root","","mahaswa"); // <=var connection to DB
    // $mhs = query("SELECT * FROM mahasiswa");               //<= untuk mengambil tabel dari DB

    function query($mhs){
            global $db ;                                // <= use Global variabel
                $result = mysqli_query($db, $mhs);      //<= [ QUERY <(artinya tanyakan), dan tampung nilai nya ke var RESULT]
                $rows =[];                              //<=  var dengan isi array namun di kosongkan 
            while($row = mysqli_fetch_assoc($result)){ // <= ulangi permintaan "mysqli_fetch_assoc" ke var $result dan tampung ke $row
                    $rows[] = $row ;                   // <= 
                }
            return $rows;
    }

    function tambah ($data){                            //<= Function create new data table
            global $db ;
                $nama= htmlspecialchars($data["nama"]) ; // htmlspecialchars() adalah secure agar user tidak bisa injec script
                $nrp=htmlspecialchars($data["nrp"]);
                $email= htmlspecialchars ($data["email"]);
                $jurusan= htmlspecialchars ($data["jurusan"]);
                $gambar= htmlspecialchars ($data["gambar"]);
            
            $query ="INSERT INTO mahasiswa VALUE ('','$nama','$nrp','$email','$jurusan','$gambar')";  //<= sintax cmd to DBMS

                mysqli_query($db,"$query"); // <= query data kedata bases dengan CMD

            return mysqli_affected_rows($db);  //<= retrun nilai sebuah koneksi gagal atau berhasil
    }


    function hapus($id){               // <= parameter pada function ini akan dikirim dari mana function ini di pangil 
            global $db ;
            mysqli_query($db,"DELETE FROM mahasiswa WHERE id = $id"); // <= query data kedata bases dengan CMD
            return mysqli_affected_rows($db); //<= retrun nilai sebuah koneksi gagal atau berhasil bernilai -1 sampai 1
    }

    function edit($data){               // <= parameter pada function ini akan dikirim dari mana function ini di pangil 

            global $db ;
            global $id ;
            $nama= htmlspecialchars($data["nama"]) ;    // htmlspecialchars() adalah secure agar user tidak bisa injec script
            $nrp=htmlspecialchars($data["nrp"]);
            $email= htmlspecialchars ($data["email"]);
            $jurusan= htmlspecialchars ($data["jurusan"]);
            $gambar= htmlspecialchars ($data["gambar"]);

            $query= "UPDATE mahasiswa SET nama='$nama',nrp='$nrp',email='$email',jurusan='$jurusan',gambar='$gambar' WHERE id=$id";
            mysqli_query($db,$query);
            return mysqli_affected_rows($db);
            var_dump($query);
    }


    function search($search_key){           // function untuk mancari
        // opsi : WHERE nama='$search_key' <= harus benar@ sama
        // opsi : nama LIKE '%$search_key%' <= harus di ikuti tanda % tanda itu memprentasikan APAPUN
        // contoh nya : '$kataKunci%' <= mencari $kataKunci+ data yang ada begitupun sebalik nya

        $query= " SELECT * FROM mahasiswa WHERE nama LIKE'%$search_key%' 
                OR nrp LIKE '%$search_key%'                              
                OR email LIKE '%$search_key%'                            
                OR jurusan LIKE '%$search_key%'   
                ";                                                     
        return query($query);


    }








?>