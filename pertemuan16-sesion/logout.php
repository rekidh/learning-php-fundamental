<?php

session_start();
$_SESSION = [];             // untuk logout yang sempurna $_SESSION di isi dengan array kosong sehinga nilai nya nya menjadi berubah
session_unset();         // untuk menghapus sesion dalam artion JANAGAN SET SESION
session_destroy();      // function untuk menghapus sesion yang telah ada

header('location:login.php');
exit;
