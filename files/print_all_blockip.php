<!DOCTYPE html>
<html>
<head>
	<title>Laporan Block IP</title>
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
              session_start();
              $exe = mysqli_query($con, "SELECT * FROM identitas");
              $row = mysqli_fetch_object($exe);
              write_log('Print Data Block IP ('.$_SESSION['user_id'].')');
			    mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('".$_SESSION['user_id']."','Block IP','$ip','Print Data Block IP (".$_SESSION['user_id'].")')");
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
            <center><h3 align="center">Data Block IP</h3></center>
						<div class="table-responsive">
							<table class="table table-hover table-list-search" id="myTable" style="border-collapse: collapse;">
								<thead>
								<tr>
									<th>No.</th>
									<th>IP Address</th>
									<th>Keterangan</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$query = mysqli_query($con, 'select * from block_ip');
										$i = 1;
										
										while ($row = mysqli_fetch_array($query)) {
											echo '<tr>
													<td>'.$i.'.</td>
													<td>'.$row['ip'].'</td>
													<td>'.$row['keterangan'].'</td>
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