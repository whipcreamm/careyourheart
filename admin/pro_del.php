<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pro=$_REQUEST["id_pro"];
    $pic_pro=$_REQUEST["pic_pro"];
        $sql="delete from tb_product where id_pro='$id_pro'";
        $result=mysqli_query($conn,$sql);
        unlink("product/$pic_pro");
        if($result){
            echo"<font color='green'><center><h2><b>ลบข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=product.php'>";
        }else{
            echo"<font color='red'><center><h2><b>ลบข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=product.php'>";
        }
?>