<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $head_news=$_POST["head_news"];
    $detail_news=$_POST["detail_news"];
    $day_up=date("Y-m-d");
    $pic_news=$_FILES["pic_news"]["tmp_name"];
    $pic_news_name=$_FILES["pic_news"]["name"];
        $sql="insert into tb_news values(null,'$head_news','$detail_news','$day_up','','0')";
        $result=mysqli_query($conn,$sql);
        if($pic_news!=""){
            $type=strtolower($pic_news_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql1="select max(id_news) as id_news from tb_news";
                $result1=mysqli_query($conn,$sql1);
                $read=mysqli_fetch_assoc($result1);
                $id_news=$read["id_news"];
                $filename=$id_news.$ext;
                copy($pic_news,"news/$filename");
                $sql2="update tb_news set pic_news='$filename' where id_news='$id_news'";
                $result2=mysqli_query($conn,$sql2);
            }else{
                echo"<font color='red'><center><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></center></font>";
                echo"<meta http-equiv='refresh' content='1;url=news.php'>";
            }
        }
        if($result){
            echo"<font color='green'><center><h2><b>บันทึกข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=news.php'>";
        }else{
            echo"<font color='red'><center><h2><b>บันทึกข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=news.php'>";
        }
?>