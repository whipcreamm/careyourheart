<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_ques_n where type_ques_n='2' and status_n='y'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Your Heart</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script>
        function cal_num(){
            var disc=parseInt(document.form1.disc.value);
            var pay=parseInt(document.form1.pay.value);
            var cost=parseInt(document.form1.cost.value);
            var type_cost=document.form1.type_cost.value;
            var total;
            var discount;
            discount=(pay+cost)*disc/100;
            if(type_cost=="1"){
                total=(pay+cost+500)-discount;
            }else{
                total=(pay+cost+0)-discount;
            }
            document.form1.total.value=total;
            document.form1.discount.value=discount;
        }
        function showHideTable(type,num){
            console.log("num :" + num);
            document.getElementById(num).style.display=type;
        }
    </script>
    <script language="javascript">
        function resizeText(multiplier) {
            multiplyText(50, document.getElementById('myContent'));    
        }
        function multiplyText(multiplier, txtobj) {
            if (txtobj.style.fontSize == '') {
                txtobj.style.fontSize = "100%";
            }
            if (multiplier == 0) {
                txtobj.style.fontSize = "100%";
            } 
            else { 
            txtobj.style.fontSize = parseFloat(txtobj.style.fontSize) - multiplier + "%";
            }
        }
        function resizeText2(multiplier) {
            multiplyText2(50, document.getElementById('myContent'));    
        }
        function multiplyText2(multiplier, txtobj) {
            if (txtobj.style.fontSize == '') {
                txtobj.style.fontSize = "100%";
            }
            if (multiplier == 0) {
                txtobj.style.fontSize = "100%";
            } 
            else { 
            txtobj.style.fontSize = parseFloat(txtobj.style.fontSize) + multiplier + "%";
            }
        }
    </script>
</head>
<style>
    .navbar{
        background: linear-gradient(90deg, #096c72, #1f86a0, #20bde4);
        font-size: 20px;
    }
    .footer{
        background: linear-gradient(90deg, #096c72, #1f86a0, #20bde4);
        font-size: 20px;
        color: #fff;
        padding-top: 70px;
        padding-bottom: 20px;
    }
    .footer ul li{
        list-style: none;
    }
    .body{
        font-size: 16px;
    }
    .bg-1{
        background: #ececec;
    }
    .bg-p{
        background: #20bde4;
        color: #fff;
    }
    .f-block{
        transition: all 0.5s ease;
        text-align: center;
        min-height: 200px;
        padding: 15px;
    }
    .f-block:hover{
        background: #fff;
        border-radius: var(--border-radius-medium);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175);
    }
    .f-block:hover .f-block-img{
        transform: scale(0.75);
    }
    .f-block-img{
        display: block;
        margin: auto;
        transition: all 0.5s;
    }
    .f-block:hover .f-block-text{
        margin-top: 0px;
    }
    .f-block-text{
        font-size: 20px;
        margin-top: 0px;
        transition: all 0.5s;
    }
    .close{
        background: #20bde4;
        border: none;
        font-size: 30px;
        font-weight: bold;
        color: #fff;
    }
</style>
<body>
        <div class="container"><br>
            <a class="btn btn-primary" href="redoc2.php" onclick="window.print()">พิมพ์รายงานผลแบบประเมิน</a><hr>
            <center><h2><b>
                รายงานผลแบบประเมินความพึงพอใจ <br>
                เกี่ยวกับการให้บริการของแพทย์
            </b></h2></center><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>คำถาม</th>
                    <th>ค่าเฉลี่ยความพึงพอใจ <br> จากคะแนนเต็ม 5</th>
                    <th>ระดับความพึงพอใจ</th>
                </tr>
                <?php
                    $i=1;
                    $sql1="select * from tb_question where type_ques_n='2'";
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
</body>
<br><br><br><br>