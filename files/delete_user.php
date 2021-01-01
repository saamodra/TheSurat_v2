<?php
if ($hapus_user=anti_injection($_REQUEST['id'])) {
	$hapus = "delete from user where user_id ='$hapus_user'";
	$result = mysqli_query($con, $hapus);
	if ($result) {
		write_log($hapus);
		mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","User","'.$ip.'","'.$hapus.'")');
		?><div class="alert alert-success" align="center">
			<?php
			header('location:index.php?file=user');
			?>
		</div><?php
	} else {
		?><div class="alert alert-danger" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data masih terkait dengan Table Transaksi, Data Gagal Dihapus! <a href="index.php?file=user">Kembali</a>
		</div><?php
	}
}
?>