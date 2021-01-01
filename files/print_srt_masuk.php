<?php
if ($id=$_REQUEST['id']) {
    $query = mysqli_query($con, "SELECT s.surat_masuk_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_terima, s.tanggal_expired, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, s.tindak_lanjut, l.lokasi, l.keterangan FROM surat_masuk s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id where surat_masuk_id='$id'");
    $row2 = mysqli_fetch_object($query);
}
session_start();
write_log('Print Data Surat Masuk ('.$_SESSION['user_id'].')');
mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","Surat Masuk","'.$ip.'","SELECT s.surat_masuk_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_terima, s.tanggal_expired, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, s.tindak_lanjut, l.lokasi, l.keterangan FROM surat_masuk s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id where surat_masuk_id=$id")');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Bagian</title>
	<style type="text/css">
		#myTable, th, td{
			border: 1px solid black;
		}
	</style>
</head>
<body onload="printData();">
	<div class="container-fluid" id="container">
    <div class="col-lg-12">
            <?php
              $exe = mysqli_query($con, "SELECT * FROM identitas");
              $row = mysqli_fetch_object($exe);
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
            <center><h3 align="center">Data Surat Masuk</h3></center><br><br>
          <table class="table-responsive" style="text-align: left; font-size: 20px;">
            <tr>
              <td style="padding-left: 100px; border: none;">Nomor Surat</td>
              <td style="border: none; padding-right: 50px;">:</td>
              <td style="border: none; padding-right: 80px;"><?php echo $row2->nomor_surat; ?></td>
            </tr>
            <tr>
              <td style="padding-left: 100px; border: none;">Bagian Penerima</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->bagian; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Sifat</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->sifat; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Perihal</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->perihal; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Tanggal Surat</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->tanggal_surat; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Tanggal Terima</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->tanggal_terima; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Tanggal Expired</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->tanggal_expired; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Nomor Agenda</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->nomor_agenda; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Lampiran</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->lampiran; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Disposisi</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->disposisi; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Tembusan</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->tembusan; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Instansi Pengirim</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->nama_instansi; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Jenis Surat</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->jenis; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Tindak Lanjut</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->tindak_lanjut; ?></td>
            </tr> 
            <tr>
              <td style="padding-left: 100px; border: none;">Lokasi Pengarsipan</td>
              <td style="border: none;">:</td>
              <td style="border: none;"><?php echo $row2->lokasi; ?></td>
            </tr> 
          </table>
			      
		</div>
	</div>
<?php
include 'function.php';
?>
</body>
</html>