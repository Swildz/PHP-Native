<?php
include ("koneksi.php");
$page=$_GET['page'];
$proses=$_GET['proses'];

if ($page=='user' AND $proses=='hapus'){
  mysqli_query($db,"DELETE FROM user_1901082003 WHERE id='$_GET[id]'");
  header('location:index.php?p='.$page);
}


elseif ($page=='user' AND $proses=='input'){
  mysqli_query($db,"INSERT INTO user_1901082003 (id,username,password,date_created,level) 
	                       VALUES(
                                '$_POST[id]','$_POST[username]','$_POST[password]',
'$_POST[date_created]','$_POST[level]')");
  header('location:index.php?p='.$page);
  }
  
elseif ($page=='user' AND $proses=='update'){
    mysqli_query($db,"UPDATE user_1901082003 SET 
                            username      = '$_POST[username]',
                            password      = '$_POST[password]',
                            date_created  = '$_POST[date_created]',
                            level   	    = '$_POST[level]' WHERE id = '$_POST[id]'");
  header('location:index.php?p='.$page);
  }

?>