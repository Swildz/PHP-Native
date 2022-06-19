<script type="text/javascript">
$(document).ready(function () {
$("#jenis").change(function (){
    var jur = $("#user").val();
    $.ajax({
        
        url:"getuser.php",
        data:"user=" + jur,
        success:function(msg) {
            $("#prodi").html(msg);
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
<h2>List User</h2>
<a href=?p=user&aksi=entri class="btn btn-primary"><img src="icons/plus.svg">Entri User</a>
<a href=?p=user&aksi=list class="btn btn-success"><img src="icons/gear.svg">List User</a>
<p>
<!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
	<table class="table table-hover table-bordered">
	<thead class="table-info" align="center">
		<th>No</th>
		<th>User</th>
		<th>Password</th>
		<th>Date Created</th>
		<th>Level</th>
		<?php
		if ($_SESSION['level']=='administrator') {
			echo "<th>aksi</th>";
		}
		?>	
	<thead>
	<?php
	
	$no=1;
	$tampil=mysqli_query($db,"SELECT * FROM `user_1901082003` order by id ASC");
	while ($data=mysqli_fetch_array($tampil)) {
	?>
	<tr>
		<td align="center"><?php echo $data['id']; ?></td>
		<td align="center"><?php echo $data['username']; ?></td>
		<td align="center"><?php echo $data['password']; ?></td>
		<td align="center"><?php echo $data['date_created']; ?></td>
		<td align="center"><?php echo $data['level']; ?></td>
		<?php
		if ($_SESSION['level']=='administrator'){
			?>
		
		<td align="center"><a href=?p=user&aksi=edit&id=<?php echo $data['id']; ?>class="btn btn-success btn-sm"><img src="icons/reply.svg"></a> | 
			<a href="aksi_user.php?page=user&proses=hapus&id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin akan menghapus data ?');" ><img src="icons/trash.svg"></a>
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
</div>

<?php
	break;
case 'entri' :	
?>

<h2>Entri User</h2>

<form role="form" method="POST" action="aksi_user.php?page=user&proses=input">
	<!-- <div class="form-group">
		<label>Id</label>
		<input type="text" name="id" class="form-control" placeholder="Id">
	</div> -->
	<div class="form-group">
		<label>User</label>
		<input type="text" name="user" class="form-control" placeholder="User">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" class="form-control" placeholder="Password">
	</div>
	<div class="form-group">
		<label>Date Created</label>
		<input type="text" name="date_created" class="form-control" placeholder="Date Created">
	</div>
	<div class="form-group">
		<label>Level</label>
	    <input type="text" name="level" class="form-control" placeholder="Level">
		     </div>

	<button type="submit" class="btn btn-primary">Simpan</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>
<?php
	break;
case 'edit' :	
	$tampil=mysqli_query($db,"SELECT * FROM  user_1901082003 order by id ASC");
$r=mysqli_fetch_array($tampil);
?>

<h2>Edit User</h2>

<form role="form" method="POST" action="aksi_user.php?page=user&proses=input">
	<div class="form-group">
		<label>No</label>
		<input type="text" name="id" class="form-control" placeholder="Id" value="<?php echo $r['id'] ?>">
	</div>
	<div class="form-group">
		<label>User</label>
		<input type="text" name="username" class="form-control" placeholder="User" value="<?php echo $r['username'] ?>">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $r['password'] ?>">
	</div>
	<div class="form-group">
		<label>Date Created</label>
		<input type="text" name="date_created" class="form-control" placeholder="Date Created" value="<?php echo $r['date_created'] ?>">
	</div>
	<div class="form-group">
		<label>Level</label>
	    <input type="text" name="level" class="form-control" placeholder="Level" value="<?php echo $r['level'] ?>">
		     </div>

	<button type="submit" class="btn btn-primary">Simpan</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>
<?php
	break;
}
?>
      