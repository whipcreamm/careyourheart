<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name_pro=$_POST["name_pro"];
    $price_pro=$_POST["price_pro"];
    $type_ques=$_POST["type_ques"];
    $coin=$_POST["coin"];
    $num_pro=$_POST["num_pro"];
    $detail_pro=$_POST["detail_pro"];
    $pic_pro=$_FILES["pic_pro"]["tmp_name"];
    $pic_pro_name=$_FILES["pic_pro"]["name"];
        $sql="insert into tb_product values(null,'$name_pro','$price_pro','$type_ques','$coin','$num_pro','$detail_pro','')";
        $result=mysqli_query($conn,$sql);
        if($pic_pro!=""){
            $type=strtolower($pic_pro_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $sql1="select max(id_pro) as id_pro from tb_product";
                $result1=mysqli_query($conn,$sql1);
                $read=mysqli_fetch_assoc($result1);
                $id_pro=$read["id_pro"];
                $filename=$id_pro.$ext;
                copy($pic_pro,"product/$filename");
                $sql2="update tb_product set pic_pro='$filename' where id_pro='$id_pro'";
                $result2=mysqli_query($conn,$sql2);
            }else{
                echo"<font color='red'><center><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></center></font>";
                echo"<meta http-equiv='refresh' content='1;url=product.php'>";
            }
        }
        if($result){
            echo"<font color='green'><center><h2><b>บันทึกข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=product.php'>";
        }else{
            echo"<font color='red'><center><h2><b>บันทึกข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=product.php'>";
        }
?>