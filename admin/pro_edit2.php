<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pro=$_POST["id_pro"];
    $del=$_POST["del"];
    $pic_pro=$_POST["pic_pro"];
    $name_pro=$_POST["name_pro"];
    $price_pro=$_POST["price_pro"];
    $type_ques=$_POST["type_ques"];
    $coin=$_POST["coin"];
    $num_pro=$_POST["num_pro"];
    $detail_pro=$_POST["detail_pro"];
    $pic_new=$_FILES["pic_new"]["tmp_name"];
    $pic_new_name=$_FILES["pic_new"]["name"];
        $sql="update tb_product set name_pro='$name_pro',price_pro='$price_pro',type_ques='$type_ques',coin='$coin',num_pro='$num_pro',detail_pro='$detail_pro' where id_pro='$id_pro'";
        $result=mysqli_query($conn,$sql);
        if($del==1){
            $sql1="update tb_product set pic_pro='' where id_pro='$id_pro'";
            $result1=mysqli_query($conn,$sql1);
            unlink("product/$pic_pro");
        }
        if($pic_new!=""){
            $type=strtolower($pic_new_name);
            $ext=strchr($type,".");
            if($ext==".jpg" or $ext==".png" or $ext==".gif"){
                $filename=$id_pro.$ext;
                copy($pic_new,"product/$filename");
                $sql2="update tb_product set pic_pro='$filename' where id_pro='$id_pro'";
                $result2=mysqli_query($conn,$sql2);
            }else{
                echo"<font color='red'><center><h2><b>นามสกุลเอกสารไม่ถูกต้อง</b></h2></center></font>";
                echo"<meta http-equiv='refresh' content='1;url=product.php'>";
            }
        }
        if($result){
            echo"<font color='green'><center><h2><b>แก้ไขข้อมูลสำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=product.php'>";
        }else{
            echo"<font color='red'><center><h2><b>แก้ไขข้อมูลไม่สำเร็จ</b></h2></center></font>";
            echo"<meta http-equiv='refresh' content='1;url=product.php'>";
        }
?>