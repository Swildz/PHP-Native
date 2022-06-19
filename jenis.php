<?php
	include ("koneksi.php");
	$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
?>

<h2>List Jenis</h2>
<a href=?p=jenis&aksi=entri class="btn btn-primary"><img src="icons/plus.svg">Entri Jenis</a>
<a href=?p=jenis&aksi=list class="btn btn-success"><img src="icons/gear.svg">List Jenis</a></rb>
<p>
		<table class="table table-hover table-bordered">
		<thead class="table-info" align="center">
		<th>No</th>
		<th>Jenis Barang</th>
		<th>Keterangan</th>
		<?php
		if ($_SESSION['level']=='administrator') {
			echo "<th>aksi</th>";
		}
		?>
		</thead>
	<?php
	
	$no=1;
	$tampil=mysqli_query($db,"SELECT * FROM `jenis_1901082003` order by `id` ASC");

	while ($data=mysqli_fetch_array($tampil)) {
	?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $data['jenis_barang']; ?></td>
		<td align="center"><?php echo $data['keterangan']; ?></td>
		<?php
		if ($_SESSION['level']=='administrator'){
			?>
		<td align="center"><a href=?p=jenis&aksi=edit&id=<?php echo $data['id']; ?>class="btn btn-success btn-sm"><img src="icons/reply.svg"></a> | 
			<a href="aksi_jenis.php?page=jenis&proses=hapus&id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin akan menghapus data ?');" ><img src="icons/trash.svg"></td></a>
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

<h2>Entri Jenis</h2>

<form role="form" class="form-horizontal" method="POST" action="aksi_jenis.php?page=jenis&proses=input">
	
	<div class="form-group">
		<label class="col-lg-2 control-label">Jenis Barang</label>
		<div class="col-lg-10">
		<input type="text" name="jenis_barang" class="form-control" placeholder="Jenis Barang">
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-lg-2 control-label">Keterangan</label>
		<div class="col-lg-10">
		<textarea name="keterangan" class="form-control" rows="3"></textarea>
		</div>
	</div>
	<div class="col-lg-offset-2 col-lg-10">
	<button type="submit" class="btn btn-primary">Simpan</button>
	<button type="reset" class="btn btn-default">Reset</button>
	</div>
</form>
<?php
	break;
case 'edit' :	
$ambil=mysqli_query($db,"SELECT * FROM jenis_1901082003 WHERE id='$_GET[id]'");
$r=mysqli_fetch_array($ambil);
?>
<h2>Edit Jenis</h2>

<form role="form" method="POST" action="aksi_jenis.php?page=jenis&proses=update">
	<div class="form-group">
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $r['id'];?>" class="form-control" >
		</div>
	</div>
	<div class="form-group">
		<label>Jenis Barang</label>
		<input type="text" name="jenis_barang" value="<?php echo $r['jenis_barang'];?>" class="form-control">
	</div>

	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control" rows="3"><?php echo $r['keterangan']; ?></textarea>
	</div>

	<button type="submit" class="btn btn-primary">Simpan</button>
	<button type="reset" >Reset</button>
</form>
<?php
	break;
}
?>
