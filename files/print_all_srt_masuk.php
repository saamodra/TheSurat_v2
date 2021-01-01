<!DOCTYPE html>
<html>
<head>
  <title>Laporan Surat Keluar</title>
  <style type="text/css">
    #myTable, th, td{border: 1px solid black;}
  </style>
</head>
<body onload="printData();">
  <div class="container-fluid" id="container">
    <div class="col-lg-12">
        <?php
          $exe = mysqli_query($con, "SELECT * FROM identitas");
          $row = mysqli_fetch_object($exe);
          session_start();
          write_log('Print Data Surat Masuk ('.$_SESSION['user_id'].')');
          mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('".$_SESSION['user_id']."','Surat Masuk','$ip','Print Data Surat Masuk (".$_SESSION['user_id'].")')");
        ?>
      <table class="table-responsive">
        <tr>
          <td rowspan="2" style="border: none;"><?php echo "<img src='images/".$row->logo_kiri."' class='fit'>"; ?></td>
          <td style="border: none;"><h2><?php echo $row->nama_identitas; ?></h2></td>
          <td rowspan="2" style="border: none;"><?php echo "<img src='images/".$row->logo_kanan."' class='fit'>"; ?></td>
        </tr>
        <tr>
          <td style="border: none;"><h4><?php echo $row->alamat; ?></h4></td>
        </tr> 
      </table>
		<hr style="border-color: black"><br>
        <center><h3 align="center">Data Surat Keluar</h3></center>
        <div class="table-responsive">
          	<table class="table table-hover table-list-search" id="myTable" style="border-collapse: collapse;">
				<thead>
				<tr>
					<th>No.</th>
					<th>No. Surat</th>
					<th>Bagian</th>
					<th>Sifat</th>
					<th>Prihal</th>
					<th>Tanggal Surat</th>
					<th>Instansi Pengirim</th>
					<th>Jenis Surat</th>
					<th>Lokasi</th>
				</tr>
				</thead>
				<tbody>
					<?php
						$query = mysqli_query($con, "SELECT s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_terima, s.tanggal_expired, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, s.tindak_lanjut, l.lokasi, l.keterangan FROM surat_masuk s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id");
						$i = 1;
						
						while ($row = mysqli_fetch_array($query)) {
							echo '<tr>
									<td>'.$i.'.</td>
									<td>'.$row['nomor_surat'].'</td>
									<td>'.$row['bagian'].'</td>
									<td>'.$row['sifat'].'</td>
									<td>'.$row['perihal'].'</td>
									<td>'.$row['tanggal_surat'].'</td>
									<td>'.$row['nama_instansi'].'</td>
									<td>'.$row['jenis'].'</td>
									<td>'.$row['lokasi']." ".$row['keterangan'].'</td>
								  </tr>
							';
							$i++;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
  </div>
<?php
include 'function.php';
?>
</body>
</html>