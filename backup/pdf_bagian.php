<?php
session_start();
ob_start();
?>

<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
  table.page_header {width: 700px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 700px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
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
        <td style="text-align: center;    width: 80%">LAPORAN BAGIAN</td>
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
    <td rowspan="2" style="border: none; padding-right: 87px;"><?php echo "<img src='images/".$row->logo_kiri."' width='100' height='100'>"; ?></td>
    <td style="border: none; text-align: center;"><h2><?php echo $row->nama_identitas; ?></h2></td>
    <td rowspan="2" style="border: none; padding-left: 87px;"><?php echo "<img src='images/".$row->logo_kanan."' width='100' height='100'>"; ?></td>
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
        <td style="text-align: center; padding: 5px; background: #ddd; width: 5%;"><b>No.</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd; width: 45%"><b>Bagian</b></td>
        <td style="text-align: center; padding: 5px; background: #ddd; width: 50%"><b>Keterangan</b></td>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = mysqli_query($con, "SELECT bagian_id, bagian, keterangan FROM bagian");  
      $i   = 1;
      while($data=mysqli_fetch_array($sql))
      {
      ?>
      <tr>
        <td style="text-align: center; padding: 5px;"><?php echo $i.'.'; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['bagian']; ?></td>
        <td style="text-align: center; padding: 5px;"><?php echo $data['keterangan']; ?></td>
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
    $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 10, 4, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    ob_end_clean();
    $html2pdf->Output('Laporan_Bagian.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>