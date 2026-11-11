<?php
    session_start();
    include "config.inc.php";
    $id_pro=$_POST["id_pro"];
    $coin_user=$_POST["coin_user"];
    $coin=$_POST["coin"];
    $total_order=$_POST["total_order"];
    $pay_order1=$_POST["pay_order1"];
    $pay_order2=$_POST["pay_order2"];
    $pay_order3=$_POST["pay_order3"];
    $day_order=date("Y-m-d");
        if($pay_order1!=""){
            $sql="insert into tb_order values(null,'$_SESSION[valid_user]','$id_pro','$day_order','1','1','0','$total_order','','n')";
            $result=mysqli_query($conn,$sql);
        }else if($pay_order2!=""){
            $sql="insert into tb_order values(null,'$_SESSION[valid_user]','$id_pro','$day_order','2','1','0','$total_order','','n')";
            $result=mysqli_query($conn,$sql);
        }else if($pay_order3!=""){
            $sql="insert into tb_order values(null,'$_SESSION[valid_user]','$id_pro','$day_order','3','1','0','$total_order','','n')";
            $result=mysqli_query($conn,$sql);
        }
        echo "<center><h2><font color='green'><b>ยืนยันคำสั่งซื้อสำเร็จ <br> โปรดรอแอดมินติดต่อกลับเพื่ออนุมัติคำสั่งซื้อ</b></font></h2></center>";
        echo "<meta http-equiv='refresh' content='2;url=product.php'>";
?>