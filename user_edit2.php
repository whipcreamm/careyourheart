<?php
    session_start();
    include "config.inc.php";
    $del=$_POST["del"];
    $name_user=$_POST["name_user"];
    $sname_user=$_POST["sname_user"];
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    $born=$_POST["born"];
    $sex=$_POST["sex"];
    $tel=$_POST["tel"];
    $addr=$_POST["addr"];
    $sys=$_POST["sys"];
    $dia=$_POST["dia"];
    $heart=$_POST["heart"];
    $dise=$_POST["dise"];
    $pic_user=$_POST["pic_user"];
    $pic_new=$_FILES["pic_new"]["tmp_name"];
    $pic_new_name=$_FILES["pic_new"]["name"];
    if($sys>=160 and $dia>=100){
        $status_mem=7;
    }else if($sys>=140 and $dia>=90){
        if($heart>60 and $heart<=100){
            $status_mem=5;
        }else{
            $status_mem=6;
        }
    }else if($sys>=120 and $dia>=80){
        if($heart>60 and $heart<=100){
            $status_mem=3;
        }else{
            $status_mem=4;
        }
    }else{
        if($heart>60 and $heart<=100){
            $status_mem=1;
        }else{
            $status_mem=2;
        }
    }
    $sql="update tb_user set name_user='$name_user',sname_user='$sname_user',user='$user',pass='$pass',born='$born',sex='$sex',tel='$tel',addr='$addr',sys='$sys',dia='$dia',heart='$heart',dise='$dise',status_mem='$status_mem' where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    if($del==1){
        $sql1="update tb_user set pic_user='' where id_user='$_SESSION[valid_user]'";
        $result1=mysqli_query($conn,$sql1);
        unlink("admin/user/$_SESSION[pic_user]");
    }
    if($pic_new!=""){
        $type=strtolower($pic_new_name);
        $ext=strchr($type,".");
        if($ext==".jpg" or $ext==".png" or $ext==".gif"){
            $sql2="select * from tb_user where id_user='$_SESSION[valid_user]'";
            $result2=mysqli_query($conn,$sql2);
            $read2=mysqli_fetch_assoc($result2);
            $id_user=$read2["id_user"];
            $filename=$id_user.$ext;
            copy($pic_new,"admin/user/$filename");
            $sql3="update tb_user set pic_user='$filename' where id_user='$_SESSION[valid_user]'";
            $result3=mysqli_query($conn,$sql3);
        }else{
            echo "<center><h2><font color='red'><b>นามสกุลเอกสารไม่ถูกต้อง</b></font></h2></center>";
            echo "<meta http-equiv='refresh' content='2;url=user_edit.php'>";
        }
    }
    if($result){
        echo "<center><h2><font color='green'><b>แก้ไขข้อมูลสำเร็จ</b></font></h2></center>";
        echo "<meta http-equiv='refresh' content='2;url=logout.php'>";
    }else{
        echo "<center><h2><font color='red'><b>แก้ไขข้อมูลไม่สำเร็จ</b></font></h2></center>";
        echo "<meta http-equiv='refresh' content='2;url=user_edit.php'>";
    }
?>