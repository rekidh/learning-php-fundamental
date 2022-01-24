<?php 
require 'functions.php';

$id= $_GET["id"];       // $_GET adalah function global yang merupakan array assosiatif 
                        // dan kita ambil "id" dari assos dan kita tampung ke var $id 

if( hapus($id) > 0){   // sebuah function ketika di pangil harus mengirimkan parameter
                        // dan parameter yang di kirimkan adalah $id
        echo "
        <script> 
            alert ('data berhasil') 
            document.location.href = 'index.php';  
        </script>" ;
    }else{
        echo "
        <script> 
            alert ('data GAGAL') 
            document.location.href = 'index.php';  
        </script>" ;
}

?>