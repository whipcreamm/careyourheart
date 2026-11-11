<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_admin order by id_ad desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $per=($num*100)/100;
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
            <a class="btn btn-primary" href="read2.php" onclick="window.print()">พิมพ์รายงานผลข้อมูล</a>
            <center><h2><b>รายงานผลข้อมูลแอดมิน/แพทย์</b></h2></center>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?>
            <hr>
            <h5><b>ยอดแอดมิน/แพทย์ในระบบ</b></h5>
            <div class="progress" style="height:60px">
                <div class="progress-bar bg-danger progress-bar-animated progress-bar-striped" aria-valuenow="<?php echo"$per";?>" aria-valuemin="0" aria-valuemax="100" style="width:%">
                    <h6><b><?php echo"$per"?> คน</b></h6>
                </div>
            </div>
            <hr>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-สกุล</th>
                    <th>แพ็คเกจ</th>
                    <th>เบอร์โทรติดต่อ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_ad=$read["id_ad"];
                        $id_pack=$read["id_pack"];
                        $name_ad=$read["name_ad"];
                        $sname_ad=$read["sname_ad"];
                        $pic_ad=$read["pic_ad"];
                        $tel_ad=$read["tel_ad"];
                        $type_ad=$read["type_ad"];
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];
                        if($pic_ad==""){
                            $pic_ad="admin.png";
                        }
                        if($type_ad==1){
                            $show="Admin";
                        }else{
                            $show="$name_pack";
                        }
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td><?php echo"<img src='admin/$pic_ad' class='rounded-pill' width='100' height='100'><br>$name_ad $sname_ad";?></td>
                    <td><?php echo"$show";?></td>
                    <td><font color="green"><b><?php echo substr($tel_ad,0,3).'-'.substr($tel_ad,3,7);?></b></font></td>
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