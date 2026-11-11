<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $type_ques=$_POST["type_ques"];
    $detail_ques=$_POST["detail_ques"];
    $day_ques=date("Y-m-d");
    $time_ques=date("H:i:s");
    $pic_ques=$_FILES["pic_ques"]["tmp_name"];
    $pic_ques_name=$_FILES["pic_ques"]["name"];
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $detail_ques=str_replace(trim($rudeword[$i]),$replace,$detail_ques);
    }
    $sql="insert into tb_webques values(null,'$_SESSION[valid_user]','$day_ques','$time_ques','$detail_ques','$type_ques','')";
    $result=mysqli_query($conn,$sql);
    if($pic_ques!=""){
        $type=strtolower($pic_ques_name);
        $ext=strchr($type,".");
        if($ext==".jpg" or $ext==".png" or $ext==".gif"){
            $sql2="select max(id_wques) as id_wques from tb_webques";
            $result2=mysqli_query($conn,$sql2);
            $read2=mysqli_fetch_assoc($result2);
            $id_wques=$read2["id_wques"];
            $filename=$id_wques.$ext;
            copy($pic_ques,"admin/ques/$filename");
            $sql3="update tb_webques set pic_ques='$filename' where id_wques='$id_wques'";
            $result3=mysqli_query($conn,$sql3);
        }else{
            echo "<center><h2><font color='red'><b>นามสกุลเอกสารไม่ถูกต้อง</b></font></h2></center>";
            echo "<meta http-equiv='refresh' content='2;url=online.php?type_ques=$type_ques'>";
        }
    }
    echo "<meta http-equiv='refresh' content='0;url=online.php?type_ques=$type_ques'>";
?>