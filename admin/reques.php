<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_ques_n where type_ques_n='1' and status_n='y'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <a class="btn btn-primary" href="reques2.php" target="_blank">พิมพ์รายงานผลแบบประเมิน</a><hr>
            <center><h2><b>
                รายงานผลแบบประเมินความพึงพอใจ <br>
                เกี่ยวกับการใช้งานเว็บไซต์
            </b></h2></center><br>
            <table class="table table-holver table-striped">
                <tr align="center" class="bg-p text-light">
                    <th>ลำดับที่</th>
                    <th>คำถาม</th>
                    <th>ค่าเฉลี่ยความพึงพอใจ <br> จากคะแนนเต็ม 5</th>
                    <th>ระดับความพึงพอใจ</th>
                </tr>
                <?php
                    $i=1;
                    $sql1="select * from tb_question where type_ques_n='1'";
                    $result1=mysqli_query($conn,$sql1);
                    while($read=mysqli_fetch_assoc($result1)){
                        $id_ques=$read["id_ques"];
                        $question=$read["question"];
                        $sum[$i]=totalscor($id_ques,$num);
                        if($sum[$i]<=5 and $sum[$i]>=4.50){
                            $b="<font color='gren'><b>มากที่สุด</b></font>";
                        }else if($sum[$i]<=4.49 and $sum[$i]>=3.50){
                            $b="<font color='gren'><b>มาก</b></font>";
                        }else if($sum[$i]<=3.49 and $sum[$i]>=2.50){
                            $b="<font color='orange'><b>ปานกลาง</b></font>";
                        }else if($sum[$i]<=2.49 and $sum[$i]>=1.50){
                            $b="<font color='red'><b>น้อย</b></font>";
                        }else{
                            $b="<font color='red'><b>น้อยที่สุด</b></font>";
                        }
                        $total=$total+$sum[$i];
                        $net=$total/$i;
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td align="left"><?php echo"$question";?></td>
                    <td><?php echo"".number_format($sum[$i],2,'.',',')."";?></td>
                    <td><?php echo"$b";?></td>
                </tr>
                <?php
                    $i++;
                    }
                    if($net<=5 and $net>=4.50){
                        $b="<font color='gren'><b>มากที่สุด</b></font>";
                    }else if($net<=4.49 and $net>=3.50){
                        $b="<font color='gren'><b>มาก</b></font>";
                    }else if($net<=3.49 and $net>=2.50){
                        $b="<font color='orange'><b>ปานกลาง</b></font>";
                    }else if($net<=2.49 and $net>=1.50){
                        $b="<font color='red'><b>น้อย</b></font>";
                    }else{
                        $b="<font color='red'><b>น้อยที่สุด</b></font>";
                    }
                ?>
                <tr align="center">
                    <th colspan="2">รวมคะแนนความพึงพอใจ</th>
                    <th><?php echo"".number_format($net,2,'.',',')."";?></th>
                    <th><?php echo"$b";?></th>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php include "footer.php";?>