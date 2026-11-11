<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_news=$_REQUEST["id_news"];
    $pic_news=$_REQUEST["pic_news"];
        $sql="delete from tb_news where id_news='$id_news'";
        $result=mysqli_query($conn,$sql);
        unlink("news/$pic_news");
        if($result){
            echo"<font color='green'><center><h2><b>ลบข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=news.php'>";
        }else{
            echo"<font color='red'><center><h2><b>ลบข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=news.php'>";
        }
?>