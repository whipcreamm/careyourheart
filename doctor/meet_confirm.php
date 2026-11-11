<?php
    session_start();
    include "config.inc.php";
    $id_meet=$_POST["id_meet"];
    $sql="update tb_meet set status_meet='y' where id_meet='$id_meet'";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=meet.php'>";
?>