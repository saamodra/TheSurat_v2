<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 
write_log('Buka Halaman Laporan Block IP ('.$id_user.')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','Block IP','$ip','Buka Halaman Laporan Block IP ($id_user)')");
$cari 	= (anti_injection(isset($_GET['cari']))) ? anti_injection($_GET['cari']) : '';
$cari	= str_replace('\'', '', $cari);
$where	= ($cari != '') ? "WHERE ip LIKE '%$cari%' OR keterangan LIKE '%$cari%'" : '';       
$exe 	= mysqli_query($con, "SELECT blockip_id, ip, keterangan FROM block_ip $where ORDER BY ip ASC")or die(mysqli_error());
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="navbars">Block IP	<small><small><small><small>Laporan Block IP</small></small></small></small></h1>
			</div>
		</div>
	</div><br>
	<div class="row">
		<div class="col-lg-6">
			<form class="form-horizontal" method="get" action="index.php">
				<input type="hidden" name="file" value="laporan_blockip">
				<input type="text" name="cari" class="form-control" id="cari" placeholder="Cari data..." value="<?php echo $cari;?>">
			</form>
		</div>
		<div class="col-lg-6" align="right">
			<a href="index.php?file=excel_blockip" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden></i> Export Excel</a>
			<a href="index.php?file=pdf_blockip&cari=" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden></i> PDF</a>
			<a href="index.php?file=print_all_blockip&cari=" class="btn btn-info"><i class="fa fa-print" aria-hidden></i> Cetak</a>
		</div>
	</div><br>
	<div class="row">
		<div class="col-lg-12">				
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col" width="75px">No</th>
						<th scope="col">IP Address</th>
						<th scope="col">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					while ($row = mysqli_fetch_object($exe)) {
					?>
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $row->ip;?></td>
						<td><?php echo $row->keterangan;?></td>
					</tr>
					<?php
					} #_ end while
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
#- sertakan file menu_bawah
include 'menu_bawah.php'; 
?>