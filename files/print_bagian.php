<?php
if ($id=$_REQUEST['id']) {
    $query = mysqli_query($con, "SELECT * FROM bagian where bagian_id='$id'");
    $row2 = mysqli_fetch_object($query);
    
}
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
            <center><h3 align="center">Data Bagian</h3></center>
			<div class="row">
                <div class="form-group center">
                    <label for="bagian">Bagian</label>
                    <input type="text" class="form-control" name="bagian" value="<?php echo $row2->bagian;?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group center">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="<?php echo $row2->keterangan;?>">
                </div>
            </div>
		</div>
	</div>
<?php
include 'function.php';
?>
</body>
</html>