<?php
session_start();
ob_start();
?>

<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
  table.page_header {width: 1020px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
  h1 {color: #000033}
  h2 {color: #000055}
  h3 {color: #000077}

</style>
<!-- Setting Margin header/ kop -->
<page backtop="14mm" backbottom="14mm" backleft="1mm" backright="10mm">
  <page_header>
    <!-- Setting Header -->
    <table class="page_header">
      <tr>
        <td style="text-align: left;    width: 10%">STMJ</td>
        <td style="text-align: center;    width: 80%">LAPORAN SURAT KELUAR</td>
        <td style="text-align: right;    width: 10%"><?php echo date('d/m/Y'); ?></td>
      </tr>
    </table>
  </page_header>
  <!-- Setting Footer -->
  <page_footer>
    <table class="page_footer">
      <tr>
        <td style="width: 33%; text-align: left">
          <?php echo "" ?>
        </td>
        <td style="width: 34%; text-align: center">
          Dicetak oleh: <?php echo $_SESSION['user_id']; ?>
        </td>
        <td style="width: 33%; text-align: right">
          Halaman [[page_cu]]/[[page_nb]]
        </td>
      </tr>
    </table>
  </page_footer>
  <!-- Setting CSS Tabel data yang akan ditampilkan -->
  <style type="text/css">
 
  
  .fit {
      max-width: 200px; max-height: 200px; width: auto; height: auto;
    }
  </style>
  <?php
    $exe = mysqli_query($con, "SELECT * FROM identitas");
    $row = mysqli_fetch_object($exe);
  ?>
  <div class="container">
    <div class="col-lg-12">
<table class="table-responsive">
  <tr>
    <td rowspan="2" style="border: none; padding-right: 245px;"><?php echo "<img src='images/".$row->logo_kiri."' width='100' height='100'>"; ?></td>
    <td style="border: none; text-align: center;"><h2><?php echo $row->nama_identitas; ?></h2></td>
    <td rowspan="2" style="border: none; padding-left: 245px;"><?php echo "<img src='images/".$row->logo_kanan."' width='100' height='100'>"; ?></td>
  </tr>
  <tr>
    <td style="border: none; text-align: center;"><h4><?php echo $row->alamat; ?></h4></td>
  </tr> 
</table>
  <hr><br><br>
  <div class="table-responsive">
  <table class="tabel2" style="border-collapse: collapse;" border="1">
    <thead>
      <tr>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>No.</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Nomor Surat</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Bagian Penerima</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Sifat</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Prihal</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Tanggal Surat</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Tanggal Kirim</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Disposisi</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Tembusan</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Instansi Pengirim</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Jenis Surat</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd"><b>Lokasi</b></td>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = mysqli_query($con, "SELECT s.surat_keluar_id, s.nomor_surat, b.bagian, s.sifat, s.perihal, s.tanggal_surat, s.tanggal_kirim, s.nomor_agenda, s.lampiran, s.disposisi, s.tembusan, i.nama_instansi, j.jenis, l.lokasi, l.keterangan FROM surat_keluar s LEFT JOIN bagian b ON s.bagian_id=b.bagian_id LEFT JOIN instansi i ON s.instansi_id=i.instansi_id LEFT JOIN jenis j ON s.jenis_id=j.jenis_id LEFT JOIN lokasi l ON s.lokasi_id=l.lokasi_id");  
      $i   = 1;
      while($data=mysqli_fetch_array($sql))
      {
      ?>
      <tr>
        <td style="text-align: center; padding: 5px;"><?php echo $i; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['nomor_surat']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['bagian']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['sifat']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['perihal']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['tanggal_surat']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['tanggal_kirim']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['disposisi']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['tembusan']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['nama_instansi']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['jenis']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['lokasi']; ?></td>
      </tr>
    <?php
    $i++;
    }
    ?>
    </tbody>
  </table>
  </div>
</div>
</div>
</page>
<!-- Memanggil fungsi bawaan HTML2PDF -->
<?php
$content = ob_get_clean();
include 'html2pdf/html2pdf.class.php';
 try
{
    $html2pdf = new HTML2PDF('L', 'A4', 'en', false, 'UTF-8', array(10, 10, 4, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    ob_end_clean();
    $html2pdf->Output('Laporan_Surat_Keluar.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>