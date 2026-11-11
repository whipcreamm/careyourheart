<?php
    $serv="localhost";
    $user="root";
    $pass="";
    $data="test8";
    $conn=mysqli_connect($serv,$user,$pass,$data);
    if(!$conn){
        die("Connect Error!".mysqli_connect_error());
    }
    mysqli_set_charset($conn,"utf8");
    date_default_timezone_set("Asia/Bangkok");
    // error_reporting(~E_NOTICE);
    error_reporting(0);
;?>