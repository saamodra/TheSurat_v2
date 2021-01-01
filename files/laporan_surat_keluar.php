<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 
write_log('Buka Halaman Laporan Surat Keluar ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Surat Keluar','$ip','Buka Halaman Laporan Surat Keluar ($id_user)')");
$cari1 	= (isset($_GET['cari1'])) ? $_GET['cari1'] : '';
$cari1	= str_replace('\'', '', $cari1);
$cari2 	= (isset($_GET['cari2'])) ? $_GET['cari2'] : '';
$cari2	= str_replace('\'', '', $cari2);
$where	= ($cari1 and $cari2 != '') ? "WHERE tanggal_surat between '$cari1' and '$cari2'" : '';
$data	= 5;
$page 	= isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
$mulai 	= ($page > 1) ? ($page * $data) - $data : 0;
$result = mysqli_query($con, "SELECT s.surat_keluar_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_kirim, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, l.lokasi, l.keterangan FROM surat_keluar s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id $where");
$total 	= mysqli_num_rows($result);
$pages 	= ceil($total/$data);            
$exe 	= mysqli_query($con, "SELECT s.surat_keluar_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_kirim, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, l.lokasi, l.keterangan FROM surat_keluar s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id $where ORDER BY tanggal_surat ASC LIMIT $mulai, $data")or die(mysqli_error());
$no 	= $mulai + 1;
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="navbars">Laporan Surat Keluar	<small><small><small><small>Laporan Surat Keluar</small></small></small></small></h1>
			</div>
		</div>
	</div><br>
	<div class="row">
		<div class="col-lg-6">
			<form class="form-horizontal" method="get" action="index.php">
				<input type="hidden" name="file" value="laporan_surat_keluar">
				<table>
					<tr>
						<fieldset><legend>Pilih Tanggal Surat</legend>
						<td>
							<label>Dari Tanggal</label>
						</td>
						<td>
							<input type="date" name="cari1" class="form-control" id="cari1" value="<?php echo $cari1;?>">
						</td>
						<td>
							<label>Sampai</label>
						</td>
						<td>
							<input type="date" name="cari2" class="form-control" id="cari2" value="<?php echo $cari2;?>">
						</td>
						<td>
							<button class="btn btn-outline-success" type="submit"><i class="fa fa-refresh" aria-hidden></i> Refresh</button>
						</td>
						</fieldset>
						</div>
					</tr>
				</table>
			</form>
		</div>
		<div class="col-lg-6" align="right">
			<a href="index.php?file=excel_srt_keluar" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden></i> Export Excel</a>
			<a href="index.php?file=pdf_srt_keluar&cari=" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden></i> PDF</a>
			<a href="index.php?file=print_all_srt_keluar&cari=" class="btn btn-info"><i class="fa fa-print" aria-hidden></i> Cetak</a>
		</div>
	</div><br>
	<div class="row">
		<div class="col-lg-12">				
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No.</th>
						<th scope="col">Nomor Surat</th>
						<th scope="col">Bagian Pengirim</th>
						<th scope="col">Sifat</th>
						<th scope="col">Perihal</th>
						<th scope="col">Tanggal Surat</th>
						<th scope="col">Tanggal Kirim</th>
						<th scope="col">No. Agenda</th>
						<th scope="col">Lampiran</th>
						<th scope="col">Disposisi</th>
						<th scope="col">Tembusan</th>
						<th scope="col">Instansi Penerima</th>
						<th scope="col">Jenis Surat</th>
						<th scope="col">Lokasi Pengarsipan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($row = mysqli_fetch_object($exe)) {
					?>
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $row->nomor_surat;?></td>
						<td><?php echo $row->bagian;?></td>
						<td><?php echo $row->sifat;?></td>
						<td><?php echo $row->perihal;?></td>
						<td><?php echo $row->tanggal_surat;?></td>
						<td><?php echo $row->tanggal_kirim;?></td>
						<td><?php echo $row->nomor_agenda;?></td>
						<td><?php echo '<a href="lampiran/'.$row->lampiran.'" target="blank">'.$row->lampiran.'</a>'; ?></td>
						<td><?php echo $row->disposisi;?></td>
						<td><?php echo $row->tembusan;?></td>
						<td><?php echo $row->nama_instansi;?></td>
						<td><?php echo $row->jenis;?></td>
						<td><?php echo $row->lokasi;?></td>
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
						<a class="page-link" href="index.php?file=laporan_surat_keluar&cari1=<?php echo $cari1;?>&cari2=<?php echo $cari2;?>&hal=<?php echo $i;?>"><?php echo $i;?></a>
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
