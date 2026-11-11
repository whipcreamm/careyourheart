<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    unset($_SESSION["valid_admin"]);
    unset($_SESSION["id_pack"]);
    unset($_SESSION["name_ad"]);
    unset($_SESSION["sname_ad"]);
    unset($_SESSION["tel_ad"]);
    unset($_SESSION["type_ad"]);
    unset($_SESSION["pic_ad"]);
    session_destroy();
    echo"<meta http-equiv='refresh' content='0;url=index.php'>";
?>