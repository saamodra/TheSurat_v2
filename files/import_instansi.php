<?php 
include 'menu_atas.php';
 if(isset($_POST['submit'])) {
     require 'phpexcel/Classes/PHPExcel/IOFactory.php';
		 
		$inputfilename = $_FILES['uploadFile']['tmp_name'];
		$exceldata = array();
		// Check connection
		if (!$con) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		 
		//  Read your Excel workbook
		try
		{
		    $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
		    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
		    $objPHPExcel = $objReader->load($inputfilename);
		}
		catch(Exception $e)
		{
		    die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
		}
		 
		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		 
		//  Loop through each row of the worksheet in turn
		for ($row = 2; $row <= $highestRow; $row++)
		{ 
		    //  Read a row of data into an array
		    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
			
		    //  Insert row data array into your database of choice here
			$sql = "INSERT INTO instansi (nama_instansi, alamat, kota, telp, hp, email, website, kontak_person)
					VALUES ('".$rowData[0][1]."', '".$rowData[0][2]."', '".$rowData[0][3]."', '".$rowData[0][4]."', '".$rowData[0][5]."', '".$rowData[0][6]."', '".$rowData[0][7]."', '".$rowData[0][8]."')";
			
			if (mysqli_query($con, $sql)) {
				$exceldata[] = $rowData[0];
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}
		 mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Instansi","'.$ip.'","Import Data Instansi")');
        write_log('Import Data Instansi');
		mysqli_close($con);
		$berhasil = '<div class="alert alert-success" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data Berhasil Disimpan, <a href="index.php?file=instansi">Lihat Data</a>
		</div>';
}

?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="navbars">Import Data Instansi	<small><small><small><small>Halaman Untuk Import Data Instansi</small></small></small></small></h1><br>
			</div>
		</div>
	</div>
	<?php
		if (isset($berhasil)) {
			echo $berhasil;
		}
	?>
	<div class="row" align="center">
		<div class="col-lg-12">
			<form method="post" enctype="multipart/form-data">
				<h3>File Excel</h3><br>
				<?php echo '<a href="format_import/Format Instansi.xlsx" class="btn btn-primary" target="blank">Download Format</a>'; ?><br><br>
				<input type="file" name="uploadFile">
				<button type="submit" class="btn btn-primary" name="submit">Import</button>
			</form>
		</div>
	</div>
</div>

<?php
include 'menu_bawah.php';
?>