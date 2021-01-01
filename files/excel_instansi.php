<?php
session_start();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Tabel.xls");
write_log('Export Excel Instansi');
mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","Instansi","'.$ip.'","Export Excel Instansi")');
?>
	<div class="container-fluid" id="container">
	    <div class="col-lg-12" id="myTable">
	            <?php
	              $exe = mysqli_query($con, "SELECT * FROM identitas");
	              $row = mysqli_fetch_object($exe);
	            ?>
	          <table class="table-responsive">
	            <tr>
	              <td align="center" colspan="9"><h2><?php echo $row->nama_identitas; ?></h2></td>
	            </tr>
	            <tr>
	              <td align="center" valign="top" colspan="9"><h6><?php echo $row->alamat; ?></h6></td>
	            </tr>
	            <tr>
					<td colspan="9" align="center" style="vertical-align: middle;"><h4>Data Instansi</h4></td>
				</tr> 
	          </table>
	          
							<table class="table table-hover" border="1">
								<thead>
								<tr>
									<th style="background: #3A82C1; color: #fff; border: none;">No.</th>
									<th style="background: #3A82C1; color: #fff; border: none;">Nama</th>
									<th style="background: #3A82C1; color: #fff; border: none;">Alamat</th>
									<th style="background: #3A82C1; color: #fff; border: none;">Kota</th>
									<th style="background: #3A82C1; color: #fff; border: none;">Telp</th>
									<th style="background: #3A82C1; color: #fff; border: none;">HP</th>
									<th style="background: #3A82C1; color: #fff; border: none;">Email</th>
									<th style="background: #3A82C1; color: #fff; border: none;">Website</th>
									<th style="background: #3A82C1; color: #fff; border: none;">Kontak Person</th>
								</tr>
								</thead>
								<tbody>
									<?php
										$query = mysqli_query($con, 'select * from instansi');
										$i = 1;
										
										while ($row = mysqli_fetch_array($query)) {
											echo '<tr>
													<td>'.$i.'</td>
													<td>'.$row['nama_instansi'].'</td>
													<td>'.$row['alamat'].'</td>
													<td>'.$row['kota'].'</td>
													<td>'.$row['telp'].'</td>
													<td>'.$row['hp'].'</td>
													<td>'.$row['email'].'</td>
													<td>'.$row['website'].'</td>
													<td>'.$row['kontak_person'].'</td>
												  </tr>
											';
											$i++;
										}
									?>
								</tbody>
							</table>
				</div>
			</div>