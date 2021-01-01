<?php
include 'menu_atas.php';
if(isset($_POST['import'])){
	$sql_file_OR_content = $_FILES['restore']['tmp_name'];
	$tmp = explode('.', $_FILES['restore']['name']);
	$valid_ext = array('sql');
	$ext = strtolower(end($tmp));
	if(in_array($ext, $valid_ext)){
		IMPORT_TABLES($dbHost,$dbUser,$dbPass,$dbName, $sql_file_OR_content);
	    write_log('Restore Database ('.$_SESSION['user_id'].')');
	    mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('".$_SESSION['user_id']."','Restore','$ip','Restore Database ('".$_SESSION['user_id']."')')");
    	$berhasil = '<div class="alert alert-success" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Restore Data Berhasil</div>';
	}else{
		$berhasil = '<div class="alert alert-danger" align="center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Hanya file sql yang boleh dipilih
         </div>';
	}	
  }
write_log('Buka Halaman Restore Database ('.$_SESSION['user_id'].')');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('".$_SESSION['user_id']."','Restore','$ip','Buka Halaman Restore Database ('".$_SESSION['user_id']."')')");
function IMPORT_TABLES($dbHost,$dbUser,$dbPass,$dbName, $sql_file_OR_content){
	set_time_limit(3000);
	$SQL_CONTENT = (strlen($sql_file_OR_content) > 300 ?  $sql_file_OR_content : file_get_contents($sql_file_OR_content)  );  
	$allLines = explode("\n",$SQL_CONTENT); 
	$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName); if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();} 
		$zzzzzz = $mysqli->query('SET foreign_key_checks = 0');	        preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n". $SQL_CONTENT, $target_tables); foreach ($target_tables[2] as $table){$mysqli->query('DROP TABLE IF EXISTS '.$table);}         $zzzzzz = $mysqli->query('SET foreign_key_checks = 1');    $mysqli->query("SET NAMES 'utf8'");	
	$templine = '';	// Temporary variable, used to store current query
	foreach ($allLines as $line)	{											// Loop through each line
		if (substr($line, 0, 2) != '--' && $line != '') {$templine .= $line; 	// (if it is not a comment..) Add this line to the current segment
			if (substr(trim($line), -1, 1) == ';') {		// If it has a semicolon at the end, it's the end of the query
				if(!$mysqli->query($templine)){ print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');  }  $templine = ''; // set variable to empty, to start picking up the lines after ";"
			}
		}
	}	return 'Importing finished. Now, Delete the import file.';
}   //see also export.php 
?>

<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="navbars">Restore	<small><small><small><small>Halaman Untuk Restore Data</small></small></small></small></h1>
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
					<input type="file" name="restore" accept=".sql">
					<button type="submit" class="btn btn-primary" name="import">Restore</button>
				</form>
			</div>
		</div>
	</div>
<?php
include 'menu_bawah.php';
?>