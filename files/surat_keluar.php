<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 
write_log('Buka Halaman Surat Keluar ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Surat Keluar','$ip','Buka Halaman Surat Keluar ($id_user)')");
$cari 	= (anti_injection(isset($_GET['cari']))) ? anti_injection($_GET['cari']) : '';
$cari	= str_replace('\'', '', $cari);
$where	= ($cari != '') ? "WHERE i.nama_instansi LIKE '%$cari%' or b.bagian LIKE '%$cari%' or s.nomor_surat LIKE '%$cari%' or s.sifat LIKE '%$cari%' or s.perihal LIKE '%$cari%' or s.tanggal_surat LIKE '%$cari%' or s.tanggal_kirim LIKE '%$cari%' or s.nomor_agenda LIKE '%$cari%' or s.lampiran LIKE '%$cari%' or s.disposisi LIKE '%$cari%' or s.tembusan LIKE '%$cari%' or j.jenis LIKE '%$cari%' or l.lokasi LIKE '%$cari%' or l.keterangan LIKE '%$cari%'" : '';
$data	= 5;
$page 	= anti_injection(isset($_GET['hal'])) ? (int)anti_injection($_GET['hal']) : 1;
$mulai 	= ($page > 1) ? ($page * $data) - $data : 0;
$result = mysqli_query($con, "SELECT s.surat_keluar_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_kirim, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, l.lokasi, l.keterangan FROM surat_keluar s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id $where");
$total 	= mysqli_num_rows($result);
$pages 	= ceil($total/$data);            
$exe 	= mysqli_query($con, "SELECT s.surat_keluar_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_kirim, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, l.lokasi, l.keterangan FROM surat_keluar s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id $where LIMIT $mulai, $data")or die(mysqli_error());
$no 	= $mulai + 1;
?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="navbars">Surat Keluar	<small><small><small><small>Master Surat Keluar</small></small></small></small></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<form class="form-horizontal" method="get" action="index.php">
					<input type="hidden" name="file" value="surat_keluar">
					<input type="text" name="cari" class="form-control col-sm-4" id="cari" placeholder="Cari data.." value="<?php echo $cari;?>">
				</form>
			</div>
			<div class="col-lg-4" align="right">
				<a href="index.php?file=add_srt_keluar" class="btn btn-primary"><i class="fa fa-plus" aria-hidden></i> Tambah Data</a>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-12">				
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">No.</th>
							<th scope="col">Nomor Surat</th>
							<th scope="col">Bagian Penerima</th>
							<th scope="col">Sifat</th>
							<th scope="col">Perihal</th>
							<th scope="col">Tanggal Surat</th>
							<th scope="col">Tanggal Kirim</th>
							<th scope="col">Lampiran</th>
							<th scope="col">Instansi Pengirim</th>
							<th scope="col">Jenis Surat</th>
							<th scope="col">Lokasi Pengarsipan</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = mysqli_fetch_array($exe)) {
						?>
						<tr>
							<td><?php echo $no++;?></td>
							<?php echo  '<td>'.$row['nomor_surat'].'</td>
							<td>'.$row['bagian'].'</td>
							<td>'.$row['sifat'].'</td>
							<td>'.$row['perihal'].'</td>
							<td>'.$row['tanggal_surat'].'</td>
							<td>'.$row['tanggal_kirim'].'</td>
							<td><a href="lampiran/'.$row['lampiran'].'" target="blank">'.$row['lampiran'].'</a></td>
							<td>'.$row['nama_instansi'].'</td>
							<td>'.$row['jenis'].'</td>
							<td>'.$row['lokasi']." ".$row['keterangan'].'</td>'
							?>
							<td>
								<a href="index.php?file=update_surat_keluar&id=<?php echo $row['surat_keluar_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Ubah</a>
								<a href="index.php?file=delete_surat_keluar&id=<?php echo $row['surat_keluar_id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
								<a href="index.php?file=print_srt_keluar&id=<?php echo $row['surat_keluar_id'];?>" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> Print</a>
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
							<a class="page-link" href="index.php?file=surat_keluar&cari=<?php echo $cari;?>&hal=<?php echo $i;?>"><?php echo $i;?></a>
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
