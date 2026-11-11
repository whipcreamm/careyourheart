<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name_pr=$_POST["name_pr"];
    $tel_pr=$_POST["tel_pr"];
    $type_ques=$_POST["type_ques"];
    $detail_pr=$_POST["detail_pr"];
    $url_pr=$_POST["url_pr"];
    $pic_pr=$_FILES["pic_pr"]["tmp_name"];
    $pic_pr_name=$_FILES["pic_pr"]["name"];
        $sql="insert into tb_pr values(null,'$name_pr','$tel_pr','$type_ques','3500','$url_pr','$detail_pr','')";
        $result=mysqli_query($conn,$sql);
        if($pic_pr!=""){
            $type=strtolower($pic_pr_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql1="select max(id_pr) as id_pr from tb_pr";
                $result1=mysqli_query($conn,$sql1);
                $read=mysqli_fetch_assoc($result1);
                $id_pr=$read["id_pr"];
                $filename=$id_pr.$ext;
                copy($pic_pr,"pr/$filename");
                $sql2="update tb_pr set pic_pr='$filename' where id_pr='$id_pr'";
                $result2=mysqli_query($conn,$sql2);
            }else{
                echo"<font color='red'><center><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></center></font>";
                echo"<meta http-equiv='refresh' content='1;url=pr.php'>";
            }
        }
        if($result){
            echo"<font color='green'><center><h2><b>บันทึกข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pr.php'>";
        }else{
            echo"<font color='red'><center><h2><b>บันทึกข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pr.php'>";
        }
?>