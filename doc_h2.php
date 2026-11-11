<?php
    session_start();
    include "config.inc.php";
    include "check_word.php";
    $id_his=$_POST["id_his"];
    $detail_chat=$_POST["detail_chat"];
    $day_chat=date("Y-m-d");
    $time_chat=date("H:i:s");
    $replace="<font color=red>***</font>";
    for($i=1;$i<count($rudeword);$i++){
        $detail_chat=str_replace(trim($rudeword[$i]),$replace,$detail_chat);
    }
    $sql="insert into tb_chat values(null,'$_SESSION[valid_user]','$id_his','$day_chat','$time_chat','$detail_chat','1','n')";
    $result=mysqli_query($conn,$sql);
    echo "<meta http-equiv='refresh' content='0;url=doc_h.php?id_his=$id_his'>";
?>