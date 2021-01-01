
<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 

?>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 id="navbars">Home	<small><small><small><small>Selamat Datang</small></small></small></small></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-success" align="center">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    <h5>Selamat Datang, <?php echo $_SESSION['nama']; ?>!</h5>
      				<h5>Level : <?php echo $_SESSION['level']; ?></h5>
				</div>
			</div>
		</div>
	</div>
<?php
#- sertakan file menu_bawah
include 'menu_bawah.php'; 
?>
