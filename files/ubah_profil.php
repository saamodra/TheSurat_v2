<?php
#- sertakan file menu_atas
include 'menu_atas.php'; 
?>
<?php
    if ($update_profil=$_SESSION['user_id']) {
        $update = "select * from user where user_id = '$update_profil'";
        $hasil =mysqli_query($con, $update) or die (mysqli_error());
        $baris = mysqli_fetch_array($hasil);
        $level = $baris['level'];
        $nama = $baris['nama'];
        $username = $baris['user_id'];
    }
    if (isset($_POST['update'])) {
    	$user_id = $_SESSION['user_id'];
        $nama = anti_injection($_POST['nama']);
        $update = "update user set nama = '$nama' where user_id = '$user_id'";
        $hasil= mysqli_query($con, $update) or die (mysqli_error());
        mysqli_query($con2, 'insert into log(userid, menu, ip, log) values ("'.$id_user.'","Ubah Profil","'.$ip.'","'.$update.'")');
        write_log($update);
        ?>
         <div class="alert alert-success" align="center">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Profil Berhasil diupdate, <a href="index.php?file=ubah_profil">Refresh</a>
          </div>
         <?php
    }
?>
<div class="mainbody container">
    <div class="row">
        <div style="padding-top:50px;"> </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        	<form method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title pull-left">Basic Profile</h3>
                    <br><br>
                    <div class="form-group">
                       <div class="row col-md-12">
                            <label for="Level">Level</label>
                            <select name="level" class="form-control" disabled="">
                                <option value="Administrator" <?php if($level=='Administrator'){echo 'selected';}?>>Administrator</option>
                                <option value="User" <?php if($level=='User'){echo 'selected';}?>>User</option>
                                
                            </select>
                        </div><br>
                        <div class="row col-md-12">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama; ?>">
                    	</div><br>
                    	<div class="row col-md-12 form-group">
                    		<button class="btn btn-default"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</button>
                    		<button class="btn btn-primary" type="submit" name="update"><i class="fa fa-fw fa fa-send-o" aria-hidden="true"></i> Update Profile</button>
                    	</div>
                </div>
            </div>
        	</form>
        </div>
    </div>
</div>
<?php
#- sertakan file menu_bawah
include 'menu_bawah.php'; 
?>
