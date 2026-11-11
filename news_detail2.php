<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $id_news=$_POST["id_news"];
    $comment=$_POST["comment"];
    $day_com=date("Y-m-d");
    $time_com=date("H:i:s");
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $comment=str_replace(trim($rudeword[$i]),$replace,$comment);
    }
    $sql="insert into tb_comment values(null,'$_SESSION[valid_user]','$id_news','$day_com','$time_com','$comment')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=news_detail.php?id_news=$id_news'>";
?>