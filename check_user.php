<?php
    session_start();
    include "config.inc.php";
    $user=$_REQUEST["user"];
    $pass=$_REQUEST["pass"];
    $url=$_REQUEST["url"];
    $sql="select * from tb_user where user='$user' and pass='$pass'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0){
        $read=mysqli_fetch_assoc($result);
        $id_user=$read["id_user"];
        $id_pack=$read["id_pack"];
        $name_user=$read["name_user"];
        $sname_user=$read["sname_user"];
        $status_pack=$read["status_pack"];
        $pic_user=$read["pic_user"];
        $_SESSION["valid_user"]=$id_user;
        $_SESSION["id_pack"]=$id_pack;
        $_SESSION["name_user"]=$name_user;
        $_SESSION["sname_user"]=$sname_user;
        $_SESSION["status_pack"]=$status_pack;
        $_SESSION["pic_user"]=$pic_user;
        if($url==1){
            echo"<meta http-equiv='refresh' content='0;url=recom.php'>";
        }else{
            $sql1="update tb_user set status_on='y' where id_user='$_SESSION[valid_user]'";
            $result1=mysqli_query($conn,$sql1);
            echo"<font color='green'><center><h2><b>เข้าสู่ระบบสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='2;url=index.php'>";
        }
    }else{
        echo"<font color='red'><center><h2><b>เข้าสู่ระบบไม่สำเร็จ</b></h2></center></font>";
        echo"<meta http-equiv='refresh' content='2;url=index.php'>";
    }
?>