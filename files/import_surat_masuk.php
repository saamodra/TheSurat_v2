<?php 
/* Developer: Ehtesham Mehmood Site: PHPCodify.com Script: Import Excel to MySQL using PHP and Bootstrap File: import.php */ 
// Including database connections 
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
			$sql = "INSERT INTO surat_masuk(nomor_surat, bagian_id, sifat, perihal, tanggal_surat, tanggal_terima, tanggal_expired, nomor_agenda, lampiran, disposisi, tembusan, instansi_id, jenis_id, tindak_lanjut, lokasi_id, user_id)
					VALUES ('".$rowData[0][0]."', '".$rowData[0][1]."', '".$rowData[0][2]."', '".$rowData[0][3]."', '".$rowData[0][4]."', '".$rowData[0][5]."', '".$rowData[0][6]."', '".$rowData[0][7]."', '".$rowData[0][8]."', '".$rowData[0][9]."', '".$rowData[0][10]."', '".$rowData[0][11]."', '".$rowData[0][12]."', '".$rowData[0][13]."', '".$rowData[0][14]."', '".$rowData[0][15]."')";
			
			if (mysqli_query($con, $sql)) {
				$exceldata[] = $rowData[0];
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}
		 mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Surat Masuk","'.$ip.'","Import Data Surat Masuk")');
        write_log('Import Data Surat Masuk');
		mysqli_close($con);
		$berhasil = '<div class="alert alert-success" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Data Berhasil Diimport, <a href="index.php?file=surat_masuk">Lihat Data</a>
		</div>';
}

?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="navbars">Import Data Surat Masuk	<small><small><small><small>Halaman Untuk Import Data Surat Masuk</small></small></small></small></h1><br>
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
				<?php echo '<a href="format_import/Format Surat Masuk.xlsx" class="btn btn-primary" target="blank">Download Format</a>'; ?><br><br>
				<input type="file" name="uploadFile">
				<button type="submit" class="btn btn-primary" name="submit">Import</button>
			</form>
		</div>
	</div>
</div>

<?php
include 'menu_bawah.php';
?>