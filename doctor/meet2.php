<?php
    session_start();
    include "config.inc.php";
    $id_user=$_POST["id_user"];
    $day_meet=$_POST["day_meet"];
    $time_meet=$_POST["time_meet"];
    $detail_meet=$_POST["detail_meet"];
    $sql="insert into tb_meet values(null,'$id_user','$day_meet','$time_meet','$detail_meet','n','0','0')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=meet.php'>";
?>