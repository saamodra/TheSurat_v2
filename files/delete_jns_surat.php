<?php
session_start();
if ($id=anti_injection($_REQUEST['id'])) {
	$hapus = "delete from jenis where jenis_id ='$id'";
	$result = mysqli_query($con, $hapus);
	if ($result) {
		write_log($hapus);
		mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","Jenis Surat","'.$ip.'","'.$hapus.'")');
		?><div class="alert alert-success" align="center">
			<?php
			header('location:index.php?file=jenis');
			?>
		</div><?php
	} else {
		?><div class="alert alert-danger" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data masih terkait dengan Table Transaksi, Data Gagal Dihapus! <a href="index.php?file=jenis">Kembali</a>
		</div><?php
	}
}
?>