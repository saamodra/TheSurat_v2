<?php
$database = 'db_surat2';
include 'menu_atas.php';
write_log('Buka Halaman Backup ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Backup','$ip','Buka Halaman Backup ($id_user)')");
if(isset($_POST['backup'])){
    EXPORT_TABLES();
    $berhasil = '<div class="alert alert-success" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Backup Data Berhasil<br>Backup <a href="backup/'.$database.'_('.date('H-i-s').'_'.date('d-m-Y').').sql">'.$database.'_('.date('H-i-s').'_'.date('d-m-Y').')</a> Disimpan di folder backup</div>';
  }
function EXPORT_TABLES(){ 
	//host
$host = 'localhost';
//user
$user = 'root';
//pass
$pass = '';
//lokasi penyimpanan backup file
$drive = 'C:/xampp/htdocs/magang_template_surat/backup';
$conn=mysqli_connect($host,$user,$pass);
if (mysqli_connect_errno()) {
	echo "Koneksi Gagal : " . mysqli_connect_error();
}
$null = null; $hitung = time();
$database = 'db_surat2';
	if (isset($database)) {
		exec("c:/xampp/mysql/bin/mysqldump  -u $user --password=$pass $database -c>{$drive}/$database"."_(".date("H-i-s")."_".date("d-m-Y").").sql 2>&1", $null, $hasil);
	}
}
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="navbars">Backup	<small><small><small><small>Halaman Untuk Backup Data</small></small></small></small></h1>
			</div>
		</div>
	</div>
	<?php
		if (isset($berhasil)) {
			echo $berhasil;
		}
	?>
	<div class="row" align="center">
		<div class="col-lg-12">
			<form method="post" enctype="multipart/form-data">
				<button type="submit" class="btn btn-primary" name="backup">Backup</button>
			</form>
		</div>
	</div>
</div>
<?php
include 'menu_bawah.php';
?>