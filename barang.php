<?php
include ("koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
?>

<h2>List Barang</h2>
<a href="?p=barang&aksi=entri" class="btn btn-primary"><img src="icons/plus.svg"> Entri Barang</a>
<a href="?p=barang&aksi=list" class="btn btn-success"><img src="icons/gear.svg">List Barang</a>
<p>
<!-- <table class="table table-striped"> -->
		<table class="table table-hover table-bordered">
		<thead class="table-info" align="center">
		<th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Satuan</th>
		<th>Id Jenis</th>
		<th>Harga</th>
		<th>Stok</th>
		<th>Keterangan</th>
		<?php
		if ($_SESSION['level']=='administrator') {
			echo "<th>aksi</th>";
		}
		?>
		</thead>
	<?php
	
	$no=1;
	$tampil=mysqli_query($db,"SELECT * FROM barang_1901082003 order by id ASC");
	while ($data=mysqli_fetch_array($tampil)) {
	?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $data['kode_barang']; ?></td>
		<td align="center"><?php echo $data['nama_barang']; ?></td>
		<td align="center"><?php echo $data['satuan']; ?></td>
		<td align="center"><?php echo $data['id_jenis']; ?></td>
		<td align="center"><?php echo $data['harga']; ?></td>
		<td align="center"><?php echo $data['stok']; ?></td>
		<td align="center"><?php echo $data['keterangan']; ?></td>
		<?php
		if ($_SESSION['level']=='administrator'){
			?>
		<td align="center"><a href=?p=barang&aksi=edit&id=<?php echo $data['id']; ?>class="btn btn-success btn-sm"><img src="icons/reply.svg"></a> | 
			<a href="aksi_barang.php?page=barang&proses=hapus&id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin akan menghapus data ?');" ><img src="icons/trash.svg"></td> </a>
			<?php
				}
			?>
	</tr>
	<?php
		$no++;
	}
	?>
</table>
</p>
<?php
	break;
case 'entri' :			
?>

<h1>Entri Barang</h1>
	<div class="container">
		<form method="post" action="">
		 <div class="form-group">
			<label>No</label>
      	    <input type="text" class="form-control" name="id" placeholder="Id">
	    </div> 
	 
	       <div class="form-group">
			 <label>Kode Barang</label>
		 	 <div class="">
	      	   <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang">
		     </div>
	        </div>

	         <div class="form-group">
			 <label>Nama Barang</label>
		 	 <div class="">
	      	   <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang">
		     </div>
	         </div>

	    	 <div class="form-group">
			 <label>Satuan</label>
	      	   <input type="text" name="satuan" class="form-control" placeholder="Satuan">
		     </div>
	
        	 <div class="form-group">
			 <label>Id Jenis</label>
	      	   <input type="text" name="id_jenis" class="form-control" placeholder="Id Jenis">
		     </div>

        	 <div class="form-group">
			 <label>Harga</label>
	      	   <input type="text" name="harga" class="form-control" placeholder="Harga">
		     </div>

  			 <div class="form-group">
			 <label>Stok</label>
	      	   <input type="text" name="stok" class="form-control" placeholder="Stok">
		     </div>

	         <div class="form-group">
			 <label>Keterangan</label>
	      	   <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
		     </div>

	         <div class="form-group row">
	    	 <label></label>
						<div class="form-group>">
							<button type="submit" value="update" name="submit" class="btn btn-primary">Proses</button>
						</div>
		     </div>
	 </div>
		
</form>
	</div>
<?php

		if(isset($_POST['submit'])){
		include 'koneksi.php'; 
			$q=mysqli_query($db, "INSERT into barang_1901082003(id,kode_barang,nama_barang,satuan,id_jenis,harga,stok,keterangan) values('$_POST[id]','$_POST[kode_barang]','$_POST[nama_barang]','$_POST[satuan]','$_POST[id_jenis]','$_POST[harga]','$_POST[stok]','$_POST[keterangan]')");
			if ($q) {
	echo "<script>window.location='index.php?p=barang'</script>";
	}

		}
?>
<?php

		if (isset($_POST['submit'])) {
		$update=mysqli_query($db,"UPDATE barang_1901082003 SET id='$_POST[id]', kode_barang='$_POST[kode_barang]',nama_barang='$_POST[nama_barang]',satuan='$_POST[satuan]',id_jenis='$_POST[id_jenis]', harga='$_POST[harga]',notelp='$_POST[notelp]', alamat='$_POST[alamat]' WHERE id='$_GET[id]'");
		if ($update) {
	echo "<script>window.location='?p=barang'</script>";
	}
}
?>
</div>
<?php
	break;
}
?>