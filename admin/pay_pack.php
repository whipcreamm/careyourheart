<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_user=$_REQUEST["id_user"];
        $sql="update tb_user set status_pack='y' where id_user='$id_user'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo"<font color='blue'><center><h2><b>อนุมัติคำสั่งซื้อสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=buy_pack.php'>";
        }else{
            echo"<font color='red'><center><h2><b>อนุมัติคำสั่งซื้อไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=buy_pack.php'>";
        }
?>