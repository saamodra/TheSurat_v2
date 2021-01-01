<?php
session_start();
write_log('User ('.$_SESSION['user_id'].') Logout');
mysqli_query($con2, "insert into log(userid, menu, ip, log) values ('".$_SESSION['user_id']."','Logout','$ip','User (".$_SESSION['user_id'].") Logout')");
session_destroy();
header('location:index.php');
?>