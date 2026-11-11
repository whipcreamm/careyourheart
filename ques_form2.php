<?php
    session_start();
    include "config.inc.php";
    $i=$_POST["i"];
    $num=(int)$i;
    $a=1;
    while($a<$num){
        $id_ques=$_POST["id_ques"];
        $answer=$_POST["answer"];
        $sql="insert into tb_answer values(null,'$id_ques[$a]','$_SESSION[id_ques_n]','1','$answer[$a]')";
        $result=mysqli_query($conn,$sql);
        $sql1="update tb_ques_n set status_n='y' where id_ques_n='$_SESSION[id_ques_n]'";
        $result1=mysqli_query($conn,$sql1);
        $a++;
    }
    unset($_SESSION["id_ques_n"]);
    echo "<center><h2><font color='green'><b>ขอบคุณสำหรับการตอบกลับแบบประเมิน</b></font></h2></center>";
    echo "<meta http-equiv='refresh' content='2;url=index.php'>";
?>