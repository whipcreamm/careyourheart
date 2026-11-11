<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_user"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="update tb_user set status_on='n' where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    unset($_SESSION["valid_user"]);
    unset($_SESSION["name_user"]);
    unset($_SESSION["sname_user"]);
    unset($_SESSION["id_pack"]);
    unset($_SESSION["status_pack"]);
    unset($_SESSION["pic_user"]);
    session_destroy();
    echo"<meta http-equiv='refresh' content='0;url=index.php'>";
?>