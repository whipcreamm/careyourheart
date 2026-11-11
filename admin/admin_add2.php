<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pack=$_POST["id_pack"];
    $name_ad=$_POST["name_ad"];
    $sname_ad=$_POST["sname_ad"];
    $user_ad=$_POST["user_ad"];
    $pass_ad=$_POST["pass_ad"];
    $tel_ad=$_POST["tel_ad"];
    $type_ad=$_POST["type_ad"];
    $pic_ad=$_FILES["pic_ad"]["tmp_name"];
    $pic_ad_name=$_FILES["pic_ad"]["name"];
        $sql="insert into tb_admin values(null,'$id_pack','$name_ad','$sname_ad','$user_ad','$pass_ad','$tel_ad','$type_ad','')";
        $result=mysqli_query($conn,$sql);
        if($pic_ad!=""){
            $type=strtolower($pic_ad_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql1="select max(id_ad) as id_ad from tb_admin";
                $result1=mysqli_query($conn,$sql1);
                $read=mysqli_fetch_assoc($result1);
                $id_ad=$read["id_ad"];
                $filename=$id_ad.$ext;
                copy($pic_ad,"admin/$filename");
                $sql2="update tb_admin set pic_ad='$filename' where id_ad='$id_ad'";
                $result2=mysqli_query($conn,$sql2);
            }else{
                echo"<font color='red'><center><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></center></font>";
                echo"<meta http-equiv='refresh' content='1;url=admin.php'>";
            }
        }
        if($result){
            echo"<font color='green'><center><h2><b>บันทึกข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=admin.php'>";
        }else{
            echo"<font color='red'><center><h2><b>บันทึกข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=admin.php'>";
        }
?>