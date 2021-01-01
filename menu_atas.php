<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='index.php';</script>"; // jika belum login, maka dikembalikan ke file form_login.php
  }
if ($id_user=$_SESSION['user_id']) {
    $update = "select * from user where user_id = '$id_user'";
    $hasil =mysqli_query($con, $update) or die (mysqli_error());
    $profil = mysqli_fetch_array($hasil);
    
}
?>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="index.php?file=home" class="navbar-brand">Aplikasi Surat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Database <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="utilitas">
                <a class="dropdown-item" href="index.php?file=backup">Backup</a>
                <a class="dropdown-item" href="index.php?file=restore">Restore</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Utilitas <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="utilitas">
                <a class="dropdown-item" href="index.php?file=identitas">Identitas</a>
                <a class="dropdown-item" href="index.php?file=user">Data User</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Master <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="master">
                <a class="dropdown-item" href="index.php?file=instansi">Instansi</a>
                <a class="dropdown-item" href="index.php?file=jenis">Jenis</a>
                <a class="dropdown-item" href="index.php?file=bagian">Bagian</a>
                <a class="dropdown-item" href="index.php?file=lokasi">Lokasi</a>
                <a class="dropdown-item" href="index.php?file=block_ip">Block IP</a>
                <a class="dropdown-item" href="index.php?file=log_aktifitas">Log Aktifitas</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Transaksi <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="transaksi">
                <a class="dropdown-item" href="index.php?file=surat_masuk">Surat Masuk</a>
                <a class="dropdown-item" href="index.php?file=surat_keluar">Surat Keluar</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Laporan <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="laporan">
                <a class="dropdown-item" href="index.php?file=laporan_instansi">Instansi</a>
                <a class="dropdown-item" href="index.php?file=laporan_jenis">Jenis</a>
                <a class="dropdown-item" href="index.php?file=laporan_bagian">Bagian</a>
                <a class="dropdown-item" href="index.php?file=laporan_lokasi">Lokasi</a>
                <a class="dropdown-item" href="index.php?file=laporan_blockip">Block IP</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?file=laporan_surat_masuk">Surat Masuk</a>
                <a class="dropdown-item" href="index.php?file=laporan_surat_keluar">Surat Keluar</a>
              </div>
            </li>
          </ul>

          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><?php echo $profil['user_id']; ?>[<?php echo $_SESSION['level']; ?>]<span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="user">
                <a class="dropdown-item" href="index.php?file=ubah_profil">Ubah Profil</a>
                <a class="dropdown-item" href="index.php?file=ubah_password">Ubah Password</a>
				        <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php?file=logout">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
