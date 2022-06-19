<?php
include ("koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='jenis' AND $proses=='hapus'){
  mysqli_query($db,"DELETE FROM jenis_1901082003 WHERE id='$_GET[id]'");
  header('location:index.php?p='.$page);
}


elseif ($page=='jenis' AND $proses=='input'){
  mysqli_query($db,"INSERT INTO jenis_1901082003 (jenis_barang,keterangan) 
	                       VALUES(
                                '$_POST[jenis_barang]','$_POST[keterangan]')");
  header('location:index.php?p='.$page);
  }
  
elseif ($page=='jenis' AND $proses=='update'){
    mysqli_query($db,"UPDATE jenis_1901082003 SET
                            jenis_barang    = '$_POST[jenis_barang]',
                            keterangan   	  = '$_POST[keterangan]' WHERE id = '$_POST[id]'");
  header('location:index.php?p='.$page);
  }

?>  