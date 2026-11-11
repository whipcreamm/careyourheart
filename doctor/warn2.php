<?php
    session_start();
    include "config.inc.php";
    $day_alert=$_POST["day_alert"];
    $time_alert=$_POST["time_alert"];
    $detail_alert=$_POST["detail_alert"];
    $sql="select * from tb_user where id_user and id_pack='$_SESSION[id_pack]' and status_mem>'1'";
    $result=mysqli_query($conn,$sql);
    while($read=mysqli_fetch_assoc($result)){
        $id_user=$read["id_user"];
        $sql1="insert into tb_alert values(null,'$id_user','$day_alert','$time_alert','$detail_alert','n')";
        $result1=mysqli_query($conn,$sql1);
    }
    echo "<meta http-equiv='refresh' content='0;url=warn.php'>";
    mysqli_close($conn);
?>