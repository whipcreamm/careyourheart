<?php
    session_start();
    include "config.inc.php";
    $id_meet=$_POST["id_meet"];
    $type_cost=$_POST["type_cost"];
    $total=$_POST["total"];
    $sql="update tb_meet set type_cost='$type_cost',total='$total' where id_meet='$id_meet'";
    $result=mysqli_query($conn,$sql);
    echo "<center><h2><font color='green'><b>ยืนยันสถานะการเลือกบริการขนส่งเรียบร้อย</b></font></h2></center>";
    echo "<meta http-equiv='refresh' content='2;url=meet.php'>";
?>