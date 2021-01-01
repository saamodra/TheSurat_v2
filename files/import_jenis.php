<?php  
include 'menu_atas.php';
 if(isset($_POST['submit'])) {
     require 'phpexcel/Classes/PHPExcel/IOFactory.php';
		 
		$inputfilename = $_FILES['uploadFile']['tmp_name'];
		$exceldata = array();
		if (!$con) {
		    die("Connection failed: " . mysqli_connect_error());
		}
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
		 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); 
		$highestColumn = $sheet->getHighestColumn();
		for ($row = 2; $row <= $highestRow; $row++)
		{ 
		    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
			
			$sql = "INSERT INTO jenis (jenis, keterangan)
					VALUES ('".$rowData[0][1]."', '".$rowData[0][2]."')";
			
			if (mysqli_query($con, $sql)) {
				$exceldata[] = $rowData[0];
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}
		 mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Jenis","'.$ip.'","Import Data Jenis")');
        write_log('Import Data Jenis');
		mysqli_close($con);
		$berhasil = '<div class="alert alert-success" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data Berhasil Diimport, <a href="index.php?file=jenis">Lihat Data</a>
		</div>';
}

?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="navbars">Import Data Jenis	<small><small><small><small>Halaman Untuk Import Data Jenis Surat</small></small></small></small></h1><br>
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
				<?php echo '<a href="format_import/Format Jenis Surat.xlsx" class="btn btn-primary" target="blank">Download Format</a>'; ?><br><br>
				<input type="file" name="uploadFile">
				<button type="submit" class="btn btn-primary" name="submit">Import</button>
			</form>
		</div>
	</div>
</div>

<?php
include 'menu_bawah.php';
?>