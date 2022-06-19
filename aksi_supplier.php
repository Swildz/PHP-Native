<?php
include ("koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='supplier' AND $proses=='hapus'){
  mysqli_query($db,"DELETE FROM supplier_1901082003 WHERE id='$_GET[id]'");
  header('location:index.php?p='.$page);
}


elseif ($page=='supplier' AND $proses=='input'){
  mysqli_query($db,"INSERT INTO supplier_1901082003 (id,nama_supplier,email,notelp,alamat) 
	                       VALUES(
                                '$_POST[id]','$_POST[nama_supplier]','$_POST[email]',
'$_POST[notelp]','$_POST[alamat]')");
  header('location:index.php?p='.$page);
  }
  
elseif ($page=='supplier' AND $proses=='update'){
    mysqli_query($db,"UPDATE supplier_1901082003 SET
                            nama_supplier   = '$_POST[nama_supplier]',
                            email           = '$_POST[email]',
                            notelp          = '$_POST[notelp]',
                            alamat   	      = '$_POST[alamat]' WHERE id = '$_POST[id]'");
  header('location:index.php?p='.$page);
  }

?>