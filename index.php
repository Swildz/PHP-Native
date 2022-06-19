<?php
    session_start();
    if (!isset($_SESSION['user'])) {
      header('location:login.php');
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
	  <title></title>
</head>
<style>
.dropbtn {
  background-color: #CCCCFF;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #CCCCFF;
}
  body {
    background-image: url("belakang.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
     background-position: center;
     background-size : 100%;
  }
</style>
<body>
<nav class="navbar fixed-top navbar-expand-lg  navbar-dark bg-dark" >
  <a class="navbar-brand" href="#">Ahmad Siddiq</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=jenis">Jenis</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=user">User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=barang">Barang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=supplier">Supplier</a>
      </li>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?p=profil"><img src="icons/tablet.svg"> Profil</a>
          <a class="dropdown-item" href="index.php?p=login"><img src="icons/Lock.svg"> Login</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="container" style="padding-top: 70px" > 
  <div class="row flex-xl-nowrap">
    <div class="col-sm-2">
      <h4>Menu</h4>
      <ul style="list-style-type:none;padding: 0 ">
      	<li ><a href="index.php"> <img src="icons/house.svg"> Home</a></li>
        <li><a href="index.php?p=jenis"> <img src="icons/cloud.svg"> Jenis</a></li>
        <li><a href="index.php?p=barang"> <img src="icons/people.svg"> Barang</a></li>
        <li><a href="index.php?p=supplier"> <img src="icons/people.svg"> Supplier</a></li>
        <?php
        if ($_SESSION['level']=='administrator') {
          echo '<li><a href="index.php?p=user"> <img src="icons/people.svg"> User</li>';}
        
        ?>
		    <li><a href="index.php?p=profil"> <img src="icons/tablet.svg"> Profil</a></li>
			  <li><a href="logout.php"> <img src="icons/Lock.svg"> Logout</a></li>
      </ul>
      </nav>
    </div>
    <div class="col-sm">
     <?php
      $page=isset($_GET['p']) ? $_GET['p'] : '';
      if ($page=='') include 'home.php';	  
      if ($page=='user') include 'user.php';
	    if ($page=='jenis') include 'jenis.php';
      if ($page=='barang') include 'barang.php';
      if ($page=='supplier') include 'supplier.php';
      if ($page=='profil') include 'profil.php';
      if ($page=='login') include 'login.php';
     ?>
    </div>
  </div>
  <div class="row" style="padding-top: 70px">    
    <div class="navbar navbar-expand-lg  fixed-bottom col-sm navbar-primary bg-secondary">
      <marquee><div class="text-white">Copyright &copy; 2021 - Politeknik Negeri Padang</div></marquee>
    </div>
  </div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>