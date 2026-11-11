<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pack=$_REQUEST["id_pack"];
        $sql="delete from tb_package where id_pack='$id_pack'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo"<font color='green'><center><h2><b>ลบข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pack.php'>";
        }else{
            echo"<font color='red'><center><h2><b>ลบข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pack.php'>";
        }
?>