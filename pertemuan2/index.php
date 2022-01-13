<?php
// ini adalah komentar
/* ini adalah comentar
daubel line
*/
// SINTAK PHP DASAR DAN STANDAR UOTPUT
// echo , print
// print_r()
// var_dump()
// contoh 

// echo "reki desmahaldi";
// print_r("reki");

// var_dump("reki de") // samahal nya dengan console.log namun menampilkan pajang data dan jenis data nya

// penulisan sintak php
// 1.php di dalam html
// 2.html di dalam php 


// variabel dan tipe data di php
$nama = "reki desma";

// operator dalam php
// aritmatika
// + - * / %
// aritmatika mengunkan variabel
$x = 10 ;
$y = 20 ;
$hasil = $x + $y ;

// operator sring / concatenation / concat 
// . 
$nama_depan = "reki";
$nama_belakang="desma";
echo $nama_depan. " ".$nama_belakang;

// Assingnment
// = , += , -= , /=, %= , .=
// $nama = "reki";
// $nama .= " ";
// $nama .= "desma"
// echo $nama; //output sama seperti di atas


// OPERATOR PERBANDINGAN
// < , > ,<=, >= , ==

// OPERATOR IDENTITAS
// === , !==

//OPOERATOR LOGIKA
/*
&&  => dan kedua data harus bernilai true baru ditampikan hasilnya true 
,
|| => or walau salah satu data bernilai true hasil nya akan bernilai true

*/



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
    <h1> halo <?php echo $hasil; ?></h1>
</body>
</html>
