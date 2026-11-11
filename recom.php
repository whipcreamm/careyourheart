<?php
    include "head.php";
    $sql="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $id_pack=$read["id_pack"];
    $status_pack=$read["status_pack"];
    $coin_user=$read["coin_user"];
    if($coin_user>0){
        $c="<font color='green'><b>$coin_user แต้ม</b></font>";
    }else{
        $c="<font color='red'><b>$coin_user แต้ม</b></font>";
    }
    $status_mem=$read["status_mem"];
    if($status_mem==7){
        $show="<font color='red'><b>พบแพทย์</b></font>";
    }else if($status_mem==6){
        $show="<font color='orange'><b>อัตราความดันสูง<br/>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
    }else if($status_mem==5){
        $show="<font color='orange'><b>อัตราความดันสูง<br/>อัตราการเต้นของหัวใจปกติ</b></font>";
    }else if($status_mem==4){
        $show="<font color='orange'><b>อัตราความดันเริ่มสูง<br/>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
    }else if($status_mem==3){
        $show="<font color='orange'><b>อัตราความดันเริ่มสูง<br/>อัตราการเต้นของหัวใจปกติ</b></font>";
    }else if($status_mem==2){
        $show="<font color='orange'><b>อัตราความดันปกติ<br/>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
    }else{
        $show="<font color='green'><b>ท่านมีสุขภาพร่างกายที่ดี</b></font>";
    }
    $sql1="select * from tb_package where id_pack limit 2,10";
    $result1=mysqli_query($conn,$sql1);
?>
<div class="bg-1"><br/><br/><br/><br/><br/><br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-12">
                <h2><b>สวัสดี, คุณ<?php echo "$_SESSION[name_user] $_SESSION[sname_user]"; ?></b></h2>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
                <h2><b>สถานะอาการปัจจุบัน : <?php echo "$show"; if($status_mem==7){ echo "&nbsp;&nbsp;&nbsp;<a href='tel:1669' class='btn btn-danger'>1669</a>"; } ?></b></h2>
            </div>
        </div>
    </div><br/><br/>
</div>
<div class="bg"><br/><br/>
    <div class="container">
        <h4><b><img src="img/coin.png" class="img-fluid" width="25">&nbsp;&nbsp;จำนวนแต้มแลกซื้อของท่าน : <?php echo "$c"; ?></b></h4><br/>
        <center><h2><b>รายการแนะนำ</b></h2></center><hr><br/>
        <form name="form1" method="post" action="recom2.php">
            <?php
                $chk=1;
                while($read1=mysqli_fetch_assoc($result1)){
                    $id_pack=$read1["id_pack"];
                    $name_pack=$read1["name_pack"];
                    $detail_pack=$read1["detail_pack"];
                    $price_pack=$read1["price_pack"];
                    if($chk%2==1){
                        echo "<div class='row'>";
                    }
            ?>
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="card" style="border-radius:30px">
                    <div class="card-body">
                        <div class="card-title"><h4 class="border-bottom"><b><?php echo "$name_pack"; ?></b></h4></div>
                        <div class="card-text"><?php echo "$detail_pack"; ?></div><br/><br/><br/>
                        <div align="right"><span class="badge bg-success">ราคา <?php echo "".number_format($price_pack).""; ?> บาท</span></div>
                        <h2><input type="radio" class="form-check-input" name="id_pack" id="id_pack" value="<?php echo "$id_pack"; ?>"></h2>
                    </div>
                </div>
            </div>
            <?php
                if($chk%2==0){
                    echo "</div><br/>";
                }
                $chk++;
                }
            ?>
            <center>
                <button type="submit" class="btn btn-lg btn-success" style="border-radius:30px">เลือกแพ็คเกจ</button>&nbsp;&nbsp;&nbsp;
                <a href="index.php" class="btn btn-lg btn-outline-primary" style="border-radius:30px">ไว้ภายหลัง</a>
            </center>
        </form>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>