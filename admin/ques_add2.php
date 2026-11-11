<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $question=$_POST["question"];
    $type_ques_n=$_POST["type_ques_n"];
        $sql="insert into tb_question values(null,'$question','$type_ques_n')";
        $result=mysqli_query($conn,$sql);
        $sql1="select max(id_ques) as id_ques from tb_question";
        $result1=mysqli_query($conn,$sql1);
        $read=mysqli_fetch_assoc($result1);
        $id_ques=$read["id_ques"];
        $sql2="update tb_question set id_ques='$id_ques' where id_ques='$id_ques'";
        $result2=mysqli_query($conn,$sql2);
        if($result){
            echo"<font color='green'><center><h2><b>บันทึกข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=ques.php'>";
        }else{
            echo"<font color='red'><center><h2><b>บันทึกข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=ques.php'>";
        }
?>