<?php
if (isset($_POST['submit'])) {
	require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/SMTP.php';
  $email=$_POST["email"];
  $query=mysqli_query($con, "select * from user where user_id='$email'");
  $row=mysqli_fetch_array($query);
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->SMTPDebug = 0;
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  $mail->SMTPAuth = TRUE;
  $mail->Username = "hijikatato23@gmail.com";
  $mail->Password = "Samodra1234";
  $mail->SMTPSecure = "tls";
  $mail->Port = 587;
  $mail->From = "hijikatato23@gmail.com";
  $mail->FromName = "Samodra";
  $mail->addAddress($row["user_id"]);
  $mail->isHTML(true);
  $mail->Subject = "Password Akun Aplikasi Surat Masuk & Keluar";
  $mail->Body = "<br><br><h4>Password Anda adalah : ".$row["password"]."</h4><br><br><h5>Catatan : Password masih dalam bentuk MD5, Decrypt dulu MD5 diatas<br><br><br>";
  $mail->AltBody = "Password Anda adalah : ".$row["password"]."<br>";
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
  	$email = $_POST['email'];
    $berhasil = '<div class="alert alert-success" align="center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Password berhasil dikirim</div>';
  }
}
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="navbars">Lupa Pasword	<small><small><small><small>Halaman Lupa Password</small></small></small></small></h1><br>
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
				<input type="text" name="email" placeholder="Masukkan Email Anda" class="form-control col-lg-6"><br>
				<button type="submit" class="btn btn-primary" name="submit">Kirim Password</button>
			</form>
		</div>
	</div>
</div>
<?php
include 'menu_bawah.php';
?>