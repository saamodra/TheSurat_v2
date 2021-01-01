<?php 
#- sertakan file konfigurasi database
require_once('db.php');
    $con = @mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort) or die ('Gagal koneksi ke database.');
    $con2 = @mysqli_connect($dbHost, $dbUser, $dbPass, $dbName2, $dbPort) or die ('Gagal koneksi ke database.');
    $ip = $_SERVER['REMOTE_ADDR'];
  function anti_injection($val){ 
    // Karakter yang sering digunakan untuk sqlInjection 
    $char = array ('-','/','\\',',','#',';','\'','"',"'",'[',']','{','}',')','(','|','`','~','!','%','$','^','&','*','=','?','+'); 

    // Hilangkan karakter yang telah disebutkan di array $char 
    $cleanval = str_replace($char, '', trim($val)); 

    return $cleanval; 
    } 
    define('LOG','log/log.txt');
    function write_log($log){
         $time = @date('[Y-d-m:H:i:s]');
         $op=$time.' '.$log."\n".PHP_EOL;
         $fp = @fopen(LOG, 'a');
         $write = @fwrite($fp, $op);
         @fclose($fp);
         
    }
    if (isset($_SESSION['user_id'])) {
        session_start();
        $id_user = $_SESSION['user_id'];
    }
    // function simpanlog($menu, $pesan){
    //     $con2 = @mysqli_connect($dbHost, $dbUser, $dbPass, $dbName2, $dbPort) or die ('Gagal koneksi ke database.');
    //     $ip = $_SERVER['REMOTE_ADDR'];
    //     $id_user = $_SESSION['user_id'];
    //     mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('$id_user','$menu','$ip','$pesan')");
    // }
#- mysqli_connect : koneksi ke database
#					mysqli_connect(KomputerDatabse, UserNameDatabase, PasswordUser, NamaDatabase, PortDatabase)



#- sertakan file header
include 'header.php'; 
    $ip = $_SERVER['REMOTE_ADDR'];
    $str = "select * from block_ip where ip ='$ip'";
    $exe33 = mysqli_query($con, $str) or die(mysqli_error());
    if (mysqli_num_rows($exe33) > 0) {
        die("<div class='container'><h1>IP Address anda masuk dalam daftar Blacklist!</h1></div>");
    }
#- $_GET : menangkap variabel dari URL
#		   $_GET[NamaVariabel]
$file = isset($_GET['file']) ? $_GET['file'] : '';

#- str_replace : mengganti akrakter tertentu
#				 str_replace(KarakterYangAkanDiganti, KarakterPengganti, Nilai)
$file = str_replace('.', '', $file);
$file = str_replace('/', '', $file);

#- file_exists : cek apakah file yang direquest ada
#				 file_exists(NamaFile);
if (file_exists('files/' . $file . '.php')) {
	#- masukkan yang diakses
	include 'files/' . $file . '.php';
} elseif (file_exists('files/login.php')) {
	#- masukkan yang diakses
	include 'files/login.php';
} else {
	#- masukkan yang yang diakses
	echo '<h2 align="center">Halaman tidak ditemukan.</h2>';
}

#- sertakan file footer
include 'footer.php'; 
