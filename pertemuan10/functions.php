<?php

    $db = mysqli_connect("localhost","root","","mahaswa");

function query($mhs){
    global $db ;

        $result = mysqli_query($db, $mhs);
        $rows =[];
        while( $row = mysqli_fetch_assoc($result) ){
            $rows[] = $row ;
        }
    return $rows;
}

?>