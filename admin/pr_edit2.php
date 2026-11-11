<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pr=$_POST["id_pr"];
    $del=$_POST["del"];
    $pic_pr=$_POST["pic_pr"];
    $name_pr=$_POST["name_pr"];
    $tel_pr=$_POST["tel_pr"];
    $type_ques=$_POST["type_ques"];
    $detail_pr=$_POST["detail_pr"];
    $url_pr=$_POST["url_pr"];
    $pic_new=$_FILES["pic_new"]["tmp_name"];
    $pic_new_name=$_FILES["pic_new"]["name"];
        $sql="update tb_pr set name_pr='$name_pr',tel_pr='$tel_pr',type_ques='$type_ques',url_pr='$url_pr',detail_pr='$detail_pr' where id_pr='$id_pr'";
        $result=mysqli_query($conn,$sql);
        if($del==1){
            $sql1="update tb_pr set pic_pr='' where id_pr='$id_pr'";
            $result1=mysqli_query($conn,$sql1);
            unlink("pr/$pic_pr");
        }
        if($pic_new!=""){
            $type=strtolower($pic_new_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $filename=$id_pr.$ext;
                copy($pic_new,"pr/$filename");
                $sql2="update tb_pr set pic_pr='$filename' where id_pr='$id_pr'";
                $result2=mysqli_query($conn,$sql2);
            }else{
                echo"<font color='red'><center><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></center></font>";
                echo"<meta http-equiv='refresh' content='1;url=pr.php'>";
            }
        }
        if($result){
            echo"<font color='green'><center><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pr.php'>";
        }else{
            echo"<font color='red'><center><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=pr.php'>";
        }
?>