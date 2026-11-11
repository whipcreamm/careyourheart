<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pr=$_REQUEST["id_pr"];
    $pic_pr=$_REQUEST["pic_pr"];
        $sql="delete from tb_pr where id_pr='$id_pr'";
        $result=mysqli_query($conn,$sql);
        unlink("pr/$pic_pr");
        if($result){
            echo"<font color='green'><center><h2><b>ลบข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pr.php'>";
        }else{
            echo"<font color='red'><center><h2><b>ลบข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pr.php'>";
        }
?>