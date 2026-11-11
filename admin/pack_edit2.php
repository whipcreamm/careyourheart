<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pack=$_POST["id_pack"];
    $name_pack=$_POST["name_pack"];
    $price_pack=$_POST["price_pack"];
    $detail_pack=$_POST["detail_pack"];
    $disc=$_POST["disc"];
        $sql="update tb_package set name_pack='$name_pack',price_pack='$price_pack',detail_pack='$detail_pack',disc='$disc' where id_pack='$id_pack'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo"<font color='green'><center><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pack.php'>";
        }else{
            echo"<font color='red'><center><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pack.php'>";
        }
?>