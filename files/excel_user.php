<?php
session_start();
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Tabel.xls");
write_log('Export Excel User');
mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$_SESSION['user_id'].'","User","'.$ip.'","Export Excel User")');
?>
<div class="container-fluid" id="container">
	<div class="col-lg-12" id="myTable">
    <?php
      $exe = mysqli_query($con, "SELECT * FROM identitas");
      $row = mysqli_fetch_object($exe);
    ?>
      <table class="table-responsive">
        <tr>
          <td align="center" colspan="4"><h2><?php echo $row->nama_identitas; ?></h2></td>
        </tr>
        <tr>
          <td align="center" valign="top" colspan="4"><h6><?php echo $row->alamat; ?></h6></td>
        </tr>
        <tr>
			<td colspan="4" align="center" style="vertical-align: middle;"><h4>Data User</h4></td>
		</tr> 
      </table>
	          
		<table class="table table-hover" border="1">
			<thead>
			<tr>
				<th style="background: #3A82C1; color: #fff; border: none;">No.</th>
				<th style="background: #3A82C1; color: #fff; border: none;">User ID</th>
				<th style="background: #3A82C1; color: #fff; border: none;">Level</th>
				<th style="background: #3A82C1; color: #fff; border: none;">Nama</th>
				<th style="background: #3A82C1; color: #fff; border: none;">Password</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$query = mysqli_query($con, 'select * from user');
				$i = 1;
				
				while ($row = mysqli_fetch_array($query)) {
					echo '<tr>
							<td>'.$i.'</td>
							<td>'.$row['user_id'].'</td>
							<td>'.$row['level'].'</td>
							<td>'.$row['nama'].'</td>
							<td>'.$row['password'].'</td>
						  </tr>
					';
					$i++;
				}
			?>
			</tbody>
		</table>
	</div>
</div>