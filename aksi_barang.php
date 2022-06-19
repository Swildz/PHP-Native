<?php
include ("koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='barang' AND $proses=='hapus'){
  mysqli_query($db,"DELETE FROM barang_1901082003 WHERE id='$_GET[id]'");
  header('location:index.php?p='.$page);
}


elseif ($page=='barang' AND $proses=='input'){
  mysqli_query($db,"INSERT INTO barang_1901082003 (id,kode_barang,nama_barang,satuan,id_jenis,harga,stok,keterangan) 
                         VALUES(
                                '$_POST[id]','$_POST[kode_barang]','$_POST[nama_barang]','$_POST[satuan]','$_POST[id_jenis]','$_POST[harga]','$_POST[stok]','$_POST[keterangan]')");
  header('location:index.php?p='.$page);
  }
  
elseif ($page=='barang' AND $proses=='update'){
    mysqli_query($db,"UPDATE barang_1901082003 SET
                            id              = '$_POST[id]',
                            kode_barang     = '$_POST[kode_barang]',
                            nama_barang     = '$_POST[nama_barang]',
                            satuan          = '$_POST[satuan]',
                            id_jenis        = '$_POST[id_jenis]',
                            harga           = '$_POST[harga]',
                            stok            = '$_POST[stok]',
                            keterangan       = '$_POST[keterangan]' WHERE id = '$_POST[id]'");
  header('location:index.php?p='.$page);
  }
  ?>