<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_user=$_REQUEST["id_user"];
    $pic_user=$_REQUEST["pic_user"];
        $sql="delete from tb_user where id_user='$id_user'";
        $result=mysqli_query($conn,$sql);
        unlink("user/$pic_user");
        if($result){
            echo"<font color='green'><center><h2><b>ลบข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=user.php'>";
        }else{
            echo"<font color='red'><center><h2><b>ลบข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=user.php'>";
        }
?>