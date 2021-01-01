<?php
session_start();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Tabel.xls");
write_log('Export Excel Surat Keluar');
mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","Surat Keluar","'.$ip.'","Export Excel Surat Keluar")');
?>
<div class="container-fluid" id="container">
    <div class="col-lg-12" id="myTable">
            <?php
              $exe = mysqli_query($con, "SELECT * FROM identitas");
              $row = mysqli_fetch_object($exe);
            ?>
          <table class="table-responsive">
            <tr>
              <td align="center" colspan="14"><h2><?php echo $row->nama_identitas; ?></h2></td>
            </tr>
            <tr>
              <td align="center" valign="top" colspan="14"><h6><?php echo $row->alamat; ?></h6></td>
            </tr>
            <tr>
				<td colspan="14" align="center" style="vertical-align: middle;"><h4>Data Surat Keluar</h4></td>
			</tr> 
          </table>
			<table class="table table-hover" border="1">
				<thead>
				<tr>
					<th>No.</th>
					<th>Nomor Surat</th>
					<th>Bagian Penerima</th>
					<th>Sifat</th>
					<th>Perihal</th>
					<th>Tanggal Surat</th>
					<th>Tanggal Kirim</th>
					<th>No. Agenda</th>
					<th>Lampiran</th>
					<th>Disposisi</th>
					<th>Tembusan</th>
					<th>Instansi Pengirim</th>
					<th>Jenis Surat</th>
					<th>Lokasi Pengarsipan</th>
				</tr>
				</thead>
				<tbody>
					<?php
					$query = mysqli_query($con, "SELECT s.surat_keluar_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_kirim, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, l.lokasi, l.keterangan FROM surat_keluar s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id");
						$i = 1;
						
						while ($row = mysqli_fetch_array($query)) {
							echo '<tr>
									<td>'.$i.'.</td>
									<td>'.$row['nomor_surat'].'</td>
									<td>'.$row['bagian'].'</td>
									<td>'.$row['sifat'].'</td>
									<td>'.$row['perihal'].'</td>
									<td>'.$row['tanggal_surat'].'</td>
									<td>'.$row['tanggal_kirim'].'</td>					
									<td>'.$row['nomor_agenda'].'</td>
									<td><a href="C:/xampp/htdocs/magang_template_surat/lampiran/'.$row['lampiran'].'" target="blank">'.$row['lampiran'].'</a></td>
									<td>'.$row['disposisi'].'</td>
									<td>'.$row['tembusan'].'</td>
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