<script type="text/javascript">
$(document).ready(function () {
$("#jenis").change(function (){
    var jur = $("#jenis").val();
    $.ajax({
        
        url:"getuser.php",
        data:"jenis=" + jur,
        success:function(msg) {
            $("#user").html(msg);
        }
    });
});
});
</script>
<?php
include ("koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
?>

<h2>List Supplier</h2>
<a href=?p=supplier&aksi=entri class="btn btn-primary"><img src="icons/plus.svg">Entri Supplier</a>
<a href=?p=supplier&aksi=list class="btn btn-success"><img src="icons/gear.svg">List Supplier</a>
<p>
<!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead> -->
	<table class="table table-hover table-bordered">
	<thead class="table-info" align="center">
		<th>No</th>
		<th>Nama Supplier</th>
		<th>Email</th>
		<th>No Telp</th>
		<th>Alamat</th>
		<?php
		if ($_SESSION['level']=='administrator') {
			echo "<th>aksi</th>";
		}
		?>
	</thead>
	<?php
	
	$no=1;
	$tampil=mysqli_query($db,"SELECT * FROM `supplier_1901082003` order by `id` ASC");
	while ($data=mysqli_fetch_array($tampil)) {
	?>
	<tr>
		<td align="center"><?php echo $no++; ?></td>
		<td align="center"><?php echo $data['nama_supplier']; ?></td>
		<td align="center"><?php echo $data['email']; ?></td>
		<td align="center"><?php echo $data['notelp']; ?></td>
		<td align="center"><?php echo $data['alamat']; ?></td>
		<?php
		if ($_SESSION['level']=='administrator'){
			?>
		
		<td align="center"><a href=?p=supplier&aksi=edit&id=<?php echo $data['id']; ?>class="btn btn-success btn-sm"><img src="icons/reply.svg"></a> | 
			<a href="aksi_supplier.php?page=supplier&proses=hapus&id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin akan menghapus data ?');" ><img src="icons/trash.svg"></td></a>
			<?php
				}
			?>
	</tr>
	<?php
		$no++;
	}
	?>
	</tbody>
</table>
</p>
</div>

<?php
	break;
case 'entri' :	
?>

<h2>Entri Supplier</h2>

<form role="form" method="POST" action="aksi_supplier.php?page=supplier&proses=input">
	<div class="form-group">
		<label>Id</label>
		<input type="text" name="id" class="form-control" placeholder="Id">
	</div>
	<div class="form-group">
		<label>Nama Supplier</label>
		<input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" placeholder="Email">
	</div>
	<div class="form-group">
		<label>No Telp</label>
		<input type="text" name="notelp" class="form-control" placeholder="No Telp">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control" rows="5"></textarea>
	</div>

	<button type="submit" class="btn btn-primary">Simpan</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>
<?php
	break;
case 'edit' :	
	$tampil=mysqli_query($db,"SELECT * FROM supplier_1901082003 order by id ASC");
$r=mysqli_fetch_array($tampil);
?>

<h2>Edit Supplier</h2>

<form role="form" method="POST" action="aksi_supplier.php?page=supplier&proses=update">
<div class="form-group">
		<label>Id</label>
		<input type="text" name="id" class="form-control" placeholder="Id" value="<?php echo $r['id'] ?>">
	</div>
	<div class="form-group">
		<label>Nama Supplier</label>
		<input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier" value="<?php echo $r['nama_supplier'] ?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $r['email'] ?>">
	</div>
	<div class="form-group">
		<label>No Telp</label>
		<input type="text" name="notelp" class="form-control" placeholder="No Telp" value="<?php echo $r['notelp'] ?>">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control" rows="5"><?php echo $r['alamat'] ?></textarea>
	</div>

	<button type="submit" class="btn btn-primary">Simpan</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>
<?php
	break;
}
?>
      