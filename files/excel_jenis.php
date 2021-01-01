<?php
session_start();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Tabel.xls");
write_log('Export Excel Jenis');
mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","Jenis","'.$ip.'","Export Excel Jenis")');
?>
<div class="container-fluid" id="container">
	    <div class="col-lg-12" id="myTable">
	            <?php
	              $exe = mysqli_query($con, "SELECT * FROM identitas");
	              $row = mysqli_fetch_object($exe);
	            ?>
	          <table class="table-responsive">
	            <tr>
	              <td align="center" colspan="3"><h2><?php echo $row->nama_identitas; ?></h2></td>
	            </tr>
	            <tr>
	              <td align="center" valign="top" colspan="3"><h6><?php echo $row->alamat; ?></h6></td>
	            </tr>
	            <tr>
					<td colspan="3" align="center" style="vertical-align: middle;"><h4>Data Jenis Surat</h4></td>
				</tr> 
	          </table>
	          
							<table class="table table-hover" border="1">
								<thead>
								<tr>
									<th>No.</th>
									<th>Jenis</th>
									<th>Keterangan</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$query = mysqli_query($con, 'select * from jenis');
										$i = 1;
										
										while ($row = mysqli_fetch_array($query)) {
											echo '<tr>
													<td>'.$i.'</td>
													<td>'.$row['jenis'].'</td>
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