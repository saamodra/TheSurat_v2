<?php
include 'menu_atas.php';
write_log('Buka Halaman Tambah Surat Keluar ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Surat Keluar','$ip','Buka Halaman Tambah Surat Keluar ($id_user)')");
if ((isset($_POST['add']))) {
		$nomor_surat = anti_injection($_POST['nomor_surat']);
		$pengirim = anti_injection($_POST['pengirim']);
		$sifat = anti_injection($_POST['sifat']);
		$prihal = anti_injection($_POST['prihal']);
		$tanggal_surat = anti_injection($_POST['tanggal_surat']);
		$tanggal_kirim = anti_injection($_POST['tanggal_kirim']);
		$nomor_agenda = anti_injection($_POST['nomor_agenda']);
		$disposisi = anti_injection($_POST['disposisi']);
		$tembusan = anti_injection($_POST['tembusan']);
		$ins_penerima = anti_injection($_POST['ins_penerima']);
		$jenis = anti_injection($_POST['jenis']);
		$lokasi_pengarsipan = anti_injection($_POST['lokasi_pengarsipan']);
		$user = $_SESSION['user_id'];	
		$lampiran = anti_injection($_FILES['lampiran']['name']);
		$tmp = explode('.', $_FILES['lampiran']['name']);
		$valid_ext = array('xls','xlsx','csv','docx','pdf','doc','ppt','txt');
		$ext = strtolower(end($tmp));
	if(in_array($ext, $valid_ext)){
		move_uploaded_file($_FILES['lampiran']['tmp_name'] , "lampiran/".$lampiran);
		$insert = "insert into surat_keluar(nomor_surat, bagian_id, sifat, perihal, tanggal_surat, tanggal_kirim, nomor_agenda, lampiran, disposisi, tembusan, instansi_id, jenis_id, lokasi_id, user_id) values ('$nomor_surat','$pengirim', '$sifat', '$prihal', '$tanggal_surat', '$tanggal_kirim', '$nomor_agenda', '$lampiran', '$disposisi', '$tembusan', '$ins_penerima', '$jenis', '$lokasi_pengarsipan','$user')";
		$hasil= mysqli_query($con,$insert);
		write_log($insert);
		mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Surat Keluar","'.$ip.'","'.$insert.'")');
		?><div class="alert alert-success" align="center">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			Data Berhasil Disimpan, <a href="index.php?file=surat_keluar">Lihat Data</a>
		</div><?php
	}else{
		?><div class="alert alert-danger" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Hanya dokumen yang boleh dilampirkan diupload
         </div><?php
	}	
}
?>
<div class="page-header" align="center">
	<h3>Input Data Surat Keluar</h3>
</div>
<div class="container">
<div class="col-md-12">
			<form method="post" id="form1" action="" enctype="multipart/form-data">
				<div class="row">
					<div class="form-group col-md-12">
						<label for="no_surat">Nomor Surat</label>
	            		<input type="text" class="form-control" name="nomor_surat" placeholder="Nomor Surat">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputBagian">Bagian Pengirim</label>
	            		<select name="pengirim" class="form-control">
	            			<option value="Bagian Pengirim" hidden="">Bagian Pengirim</option>
								<?php 
									$query = "SELECT * FROM bagian";
									$hasil = mysqli_query($con, $query);
									while ($data = mysqli_fetch_array($hasil)) {
										echo "<option value='".$data['bagian_id']."'>".$data['bagian']."</option>";
									}
								?>
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputSifat">Sifat</label>
	            		<select name="sifat" class="form-control">
	            			<option value="Sifat" hidden="">Sifat</option>
	            			<option value="BIASA">BIASA</option>
	            			<option value="RAHASIA">RAHASIA</option>
	            			<option value="SANGAT RAHASIA">SANGAT RAHASIA</option>
	            			<option value="KONFIDENSIAL">KONFIDENSIAL</option>
	            			<option value="LAIN-LAIN">LAIN-LAIN</option>
	            		</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputPrihal">Prihal</label>
	            		<input type="text" class="form-control" name="prihal" placeholder="Prihal">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputTglSurat">Tanggal Surat</label>
	            		<input type="date" class="form-control" name="tanggal_surat">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputTglKirim">Tanggal Kirim</label>
	            		<input type="date" class="form-control" name="tanggal_kirim">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputNoAg">Nomor Agenda</label>
	            		<input type="text" class="form-control" name="nomor_agenda" placeholder="Nomor Agenda">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputLampiran">Lampiran</label>
	            		<input type="file" class="form-control" name="lampiran" placeholder="Lampiran" accept=".xlsx, .docx, .pdf, .ppt, .txt, .xls, .csv">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputDisposisi">Disposisi</label>
	            		<input type="text" class="form-control" name="disposisi" placeholder="Disposisi">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputTembusan">Tembusan</label>
	            		<input type="text" class="form-control" name="tembusan" placeholder="Tembusan">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputJenis">Instansi Penerima</label>
	            		<select name="ins_penerima" class="form-control">
	            			<option value="Instansi Penerima" hidden="">Instansi Penerima</option>
								<?php 
									$query = "SELECT * FROM instansi";
									$hasil = mysqli_query($con, $query);
									while ($data = mysqli_fetch_array($hasil)) {
										echo "<option value='".$data['instansi_id']."'>".$data['nama_instansi']."</option>";
									}
								?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputJenis">Jenis Surat</label>
	            		<select name="jenis" class="form-control">
	            			<option value="Jenis Surat" hidden="">Jenis Surat</option>
								<?php 
									$query = "SELECT * FROM jenis";
									$hasil = mysqli_query($con, $query);
									while ($data = mysqli_fetch_array($hasil)) {
										echo "<option value='".$data['jenis_id']."'>".$data['jenis']."</option>";
									}
								?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="exampleInputJenis">Lokasi Pengarsipan</label>
	            		<select name="lokasi_pengarsipan" class="form-control">
	            				<option value="Lokasi Pengarsipan" hidden="">Lokasi Pengarsipan</option>
								<?php 
									$query = "SELECT * FROM lokasi";
									$hasil = mysqli_query($con, $query);
									while ($data = mysqli_fetch_array($hasil)) {
										echo "<option value='".$data['lokasi_id']."'>".$data['lokasi']. " " .$data['keterangan']. "</option>";
									}
								?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<button class="btn btn-info ion-checkmark-round" type="submit" name="add"> Simpan</button>
						<button class="btn btn-danger ion-close-round" type="reset"> Batal</button>
					</div>
				</div>
			</form>
		</div>
</div>

<?php
include 'menu_bawah.php';
?>