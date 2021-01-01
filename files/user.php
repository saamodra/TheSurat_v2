
<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 
write_log('Buka Halaman User ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Surat Masuk','$ip','Buka Halaman User ($id_user)')");
$cari 	= (anti_injection(isset($_GET['cari']))) ? anti_injection($_GET['cari']) : '';
$cari	= str_replace('\'', '', $cari);
$where	= ($cari != '') ? "WHERE nama LIKE '%$cari%' OR level LIKE '%$cari%'" : '';
$data	= 5;
$page 	= anti_injection(isset($_GET['hal'])) ? (int)anti_injection($_GET['hal']) : 1;
$mulai 	= ($page > 1) ? ($page * $data) - $data : 0;
$result = mysqli_query($con, "SELECT user_id, level, nama, password FROM user $where ORDER BY nama ASC");
$total 	= mysqli_num_rows($result);
$pages 	= ceil($total/$data);            
$exe 	= mysqli_query($con, "SELECT user_id, level, nama, password FROM user $where ORDER BY nama ASC LIMIT $mulai, $data")or die(mysqli_error());
$no 	= $mulai + 1;
#cek user
if ($_SESSION['level']=='User') {
	echo "<script>
	window.location.href='index.php?file=home';
	alert('User tidak diperbolehkan mengakses halaman ini!');</script>";
}
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="navbars">User	<small><small><small><small>Master User</small></small></small></small></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<form class="form-horizontal" method="get" action="index.php">
					<input type="hidden" name="file" value="user">
					<input type="text" name="cari" class="form-control" id="cari" placeholder="Cari data..." value="<?php echo $cari;?>">
				</form>
			</div>
			<div class="col-lg-6" align="right">
				<a href="index.php?file=add_user" class="btn btn-primary"><i class="fa fa-plus" aria-hidden></i> Tambah Data</a>
				<a href="index.php?file=excel_user" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden></i> Export Excel</a>
				<a href="index.php?file=print_all_user&cari=" class="btn btn-info"><i class="fa fa-print" aria-hidden></i> Cetak</a>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-12">				
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col" width="75px">No.</th>
							<th scope="col">User ID</th>
							<th scope="col">Level</th>
							<th scope="col">Nama User</th>
							<th scope="col" width="170px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = mysqli_fetch_object($exe)) {
						?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $row->user_id;?></td>
							<td><?php echo $row->level;?></td>
							<td><?php echo $row->nama;?></td>
							<td>
								<a href="index.php?file=update_user&id=<?php echo $row->user_id;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
								<a href="index.php?file=delete_user&id=<?php echo $row->user_id;?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
							</td>
						</tr>
						<?php
						} #_ end while
						?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-12">				
				<div>
					<ul class="pagination">
						<?php
						for ($i=1; $i<=$pages ; $i++){ 
							if ($i == $page) {
								
						?>
						<li class="page-item active">
							<a class="page-link" href="#"><?php echo $i;?></a>
						</li>
							<?php
							} else {
							?>
						<li class="page-item">
							<a class="page-link" href="index.php?file=user&cari=<?php echo $cari;?>&hal=<?php echo $i;?>"><?php echo $i;?></a>
						</li>
						<?php
							} #_end IF
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php
#- sertakan file menu_bawah
include 'menu_bawah.php'; 
?>
