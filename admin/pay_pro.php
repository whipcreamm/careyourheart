<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_order=$_POST["id_order"];
    $id_user=$_POST["id_user"];
    $id_pro=$_POST["id_pro"];
    $coin=$_POST["coin"];
    $coin_user=$_POST["coin_user"];
    $pay_order=$_POST["pay_order"];
    $type_order1=$_POST["type_order1"];
    $type_order2=$_POST["type_order2"];
    $no_order=$_POST["no_order"];
    $net=$_POST["net"];
    if($type_order1!=""){
        $sql="update tb_order set type_order='1',total_order='$net',no_order='$no_order',status_order='y' where id_order='$id_order'";
        $result=mysqli_query($conn,$sql);
    }else if($type_order2!=""){
        $sql="update tb_order set type_order='2',total_order='$net',no_order='$no_order',status_order='y' where id_order='$id_order'";
        $result=mysqli_query($conn,$sql);
    }
        $sql1="select * from tb_product where id_pro='$id_pro'";
        $result1=mysqli_query($conn,$sql1);
        $read=mysqli_fetch_assoc($result1);
        $num_pro=$read["num_pro"];
        $num_pro--;
        $sql2="update tb_product set num_pro='$num_pro' where id_pro='$id_pro'";
        $result2=mysqli_query($conn,$sql2);
        if($pay_order=="1"){
            $total_coin=$coin_user-$coin;
            $sql3="update tb_user set coin_user='$total_coin' where id_user='$id_user'";
            $result3=mysqli_query($conn,$sql3);
        }
        if($pay_order=="2"){
            $sql3="update tb_user set coin_user='$coin_user' where id_user='$id_user'";
            $result3=mysqli_query($conn,$sql3);
        }
        if($pay_order=="3"){
            $sql3="update tb_user set coin_user='$coin_user' where id_user='$id_user'";
            $result3=mysqli_query($conn,$sql3);
        }
    if($result){
        echo"<font color='green'><center><h2><b>อนุมัติคำสั่งซื้อสำเร็จ</b></h2></center></font>";
        echo"<meta http-equiv='refresh' content='1;url=buy_pro.php'>";
    }else{
        echo"<font color='red'><center><h2><b>อนุมัติคำสั่งซื้อไม่สำเร็จ</b></h2></center></font>";
        echo"<meta http-equiv='refresh' content='1;url=buy_pro.php'>";
    }
?>