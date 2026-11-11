<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_webques order by id_wques desc";
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
            <a class="btn btn-primary" href="reweb2.php" onclick="window.print()">พิมพ์รายงานผลข้อมูล</a><hr>
            <center><h2><b>รายงานผลสังคมออนไลน์</b></h2></center>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>หัวข้อ</th>
                    <th>วันที่โพสต์</th>
                    <th>ยอด Like</th>
                    <th>คอมเมนต์</th>
                    <th>ยอดเข้าชม</th>
                    <th>ประเภท</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_wques=$read["id_wques"];
                        $detail_ques=$read["detail_ques"];
                        $day_ques=$read["day_ques"];
                        $day_ques=displaydate($day_ques);
                        $type_ques=$read["type_ques"];
                        if($type_ques==1){
                            $type_ques="สุขภาพ";
                        }else if($type_ques==2){
                            $type_ques="เวชสำอาง";
                        }else{
                            $type_ques="ทั่วไป";
                        }
                        $sql1="select * from tb_webanswer where id_wques='$id_wques'";
                        $result1=mysqli_query($conn,$sql1);
                        $num1=mysqli_num_rows($result1);
                        $sql2="select * from tb_like where id_wques='$id_wques' and status_like='y'";
                        $result2=mysqli_query($conn,$sql2);
                        $num2=mysqli_num_rows($result2);
                        $total=$num1+$num2;
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td align="left"><?php echo"$detail_ques";?></td>
                    <td><?php echo"$day_ques";?></td>
                    <td><?php echo"$num2";?> Like</td>
                    <td><?php echo"$num1";?> รายการ</td>
                    <td><?php echo"$total";?> ครั้ง</td>
                    <td><?php echo"$type_ques";?></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </table>
            <?php } ?>
        </div>
</body>
<br><br><br><br>