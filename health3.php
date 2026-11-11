<?php
    session_start();
    include "config.inc.php";
    $sys=$_POST["sys"];
    $dia=$_POST["dia"];
    $heart=$_POST["heart"];
    $detail=$_POST["detail"];
    $day_in=date("Y-m-d");
    $sql="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $coin_user=$read["coin_user"];
    if($sys>=160 and $dia>=100){
        $status_mem=7;
        $cu=$coin_user-1;
        $coin_user=-1;
    }else if($sys>=140 and $dia>=90){
        if($heart>60 and $heart<=100){
            $status_mem=5;
            $cu=$coin_user+1;
            $coin_user=1;
        }else{
            $status_mem=6;
            $cu=$coin_user+0;
            $coin_user=0;
        }
    }else if($sys>=120 and $dia>=80){
        if($heart>60 and $heart<=100){
            $status_mem=3;
            $cu=$coin_user+3;
            $coin_user=3;
        }else{
            $status_mem=4;
            $cu=$coin_user+2;
            $coin_user=2;
        }
    }else{
        if($heart>60 and $heart<=100){
            $status_mem=1;
            $cu=$coin_user+5;
            $coin_user=5;
        }else{
            $status_mem=2;
            $cu=$coin_user+4;
            $coin_user=4;
        }
    }
    $sql1="update tb_user set sys='$sys',dia='$dia',heart='$heart',status_mem='$status_mem',coin_user='$cu' where id_user=$_SESSION[valid_user]";
    $result1=mysqli_query($conn,$sql1);
    $sql2="insert into tb_his values(null,'$_SESSION[valid_user]','$sys','$dia','$heart','$detail','$status_mem','$coin_user','$day_in','n')";
    $result2=mysqli_query($conn,$sql2);
    echo "<meta http-equiv='refresh' content='0;url=health.php'>";
?>