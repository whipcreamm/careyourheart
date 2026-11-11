<?php
    session_start();
    include "config.inc.php";
    $sql="update tb_alert set status_alert='y' where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    echo "<center><h2><font color='green'><b>ยืนยันสถานะการรับประทานยาเรียบร้อย</b></font></h2></center>";
    echo "<meta http-equiv='refresh' content='2;url=index.php'>";
?>