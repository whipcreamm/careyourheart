<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name_pack=$_POST["name_pack"];
    $price_pack=$_POST["price_pack"];
    $detail_pack=$_POST["detail_pack"];
    $disc=$_POST["disc"];
        $sql="insert into tb_package values(null,'$name_pack','$price_pack','$detail_pack','$disc')";
        $result=mysqli_query($conn,$sql);
        $sql1="select max(id_pack) as id_pack from tb_package";
        $result1=mysqli_query($conn,$sql1);
        $read=mysqli_fetch_assoc($result1);
        $id_pack=$read["id_pack"];
        $sql2="update tb_package set id_pack='$id_pack' where id_pack='$id_pack'";
        $result2=mysqli_query($conn,$sql2);
        if($result){
            echo"<font color='green'><center><h2><b>บันทึกข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pack.php'>";
        }else{
            echo"<font color='red'><center><h2><b>บันทึกข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pack.php'>";
        }
?>