<?php  
    $db = mysqli_connect('localhost','root','','inventory_uas');
    if( !$db ){
        die("Gagal terhubung dengan database: " . mysqli_connect_error());
    }
?>
