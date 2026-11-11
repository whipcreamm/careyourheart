<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_pro=$_POST["id_pro"];
    $sql="select * from tb_product where id_pro='$id_pro'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $pic_pro=$read["pic_pro"];
    $name_pro=$read["name_pro"];
    $detail_pro=$read["detail_pro"];
    $num_pro=$read["num_pro"];
    if($num_pro=="0"){
        $np="<font color='red'><b>สินค้าหมด</b></font>";
    }else{
        $np="<font><b>สินค้าเหลือ $num_pro ชิ้น</b></font>";
    }
    $price_pro=$read["price_pro"];
    $coin=$read["coin"];
    $type_ques=$read["type_ques"];
    if($type_ques==1){
        $tp="สุขภาพ";
    }else if($type_ques==2){
        $tp="เวชสำอาง";
    }else{
        $tp="ทั่วไป";
    }
    $sql1="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $id_pack=$read1["id_pack"];
    $coin_user=$read1["coin_user"];
    $sql2="select * from tb_package where id_pack='$id_pack'";
    $result2=mysqli_query($conn,$sql2);
    $read2=mysqli_fetch_assoc($result2);
    $disc=$read2["disc"];
?>
<form action="pro_detail2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>รายละเอียดสินค้า</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-5 col-12"><?php echo "<img src='admin/product/$pic_pro' class='rounded img-fluid w-100'>"; ?></div>
                <div class="col-sm-7 col-12">
                    <table>
                        <tr>
                            <th>ชื่อสินค้า</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$name_pro"; ?></td>
                        </tr>
                        <tr>
                            <th>ประเภทสินค้า</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$tp"; ?></td>
                        </tr>
                        <tr>
                            <th>ราคา</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "".number_format($price_pro)." บาท"; ?></td>
                        </tr>
                        <tr>
                            <th>สินค้าเหลือ</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$np"; ?></td>
                        </tr>
                    </table><br/>
                    <b>รายละเอียดสินค้า :</b><br/>
                    <?php echo "$detail_pro"; ?><br/><br/><br/><br/>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                            <div class="card" style="border-radius:10px">
                                <center><img src="img/coin.png" class="img-fluid" width="20">&nbsp;&nbsp;แลก <?php echo "$coin"; ?> แต้ม</center>
                            </div>
                        </div>
                    </div>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-sm-3 col-12"></div>
                <div class="col-sm-6 col-12">
                    <center><h3><b>สั่งซื้อสินค้า</b></h3>
                    <b>จำนวนแต้มแลกซื้อของท่าน <?php echo"$coin_user";?> แต้ม</b>
                    </center><hr>
                    <b>สั่งซื้อโดย :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if($coin_user>=$coin){ ?>
                        <input type="radio" class="form-check-input" name="pay_order1" id="pay_order1" value="1" onchange="cal_order1()">&nbsp;ใช้แต้มแลกซื้อ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="pay_order2" id="pay_order2" value="2" onchange="cal_order2()">&nbsp;ใช้เงินสด&nbsp;&nbsp;&nbsp;
                    <?php }else if($coin_user<$coin){ ?>
                        <input type="radio" class="form-check-input" name="pay_order3" id="pay_order3" value="3" onchange="cal_order3()">&nbsp;ใช้เงินสด&nbsp;&nbsp;&nbsp;
                    <?php } ?><br><br>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <b>ราคาสินค้า :</b>
                            <input type="text" class="form-control" name="price_pro" id="price_pro" value="<?php echo"$price_pro";?>" style="text-align:right" disabled>
                        </div>
                        <div class="col-sm-6 col-12">
                            <b>จำนวนแต้มแลกซื้อ :</b>
                            <?php if($coin_user>=$coin){ ?>
                                <input type="text" class="form-control" name="coin" id="coin" value="<?php echo"$coin";?>" style="text-align:right" readonly>
                                <input type="hidden" name="coin1" id="coin1" value="<?php echo"$coin";?>">
                            <?php }else if($coin_user<$coin){ ?>
                                <input type="text" class="form-control" name="coin" id="coin" placeholder="แต้มไม่เพียงพอ" style="text-align:right" readonly>
                            <?php } ?>
                        </div>
                        <div class="col-sm-12 col-12">
                            <b>ยอดสั่งซื้อ :</b>
                            <input type="text" class="form-control bg-dark text-warning" name="sum1" id="sum1" value="<?php echo"$sum1";?>" style="text-align:right;font-size:20px" readonly>
                        </div>
                        <div class="col-sm-6 col-12">
                            <b>ส่วนลด (สำหรับสมาชิกแพ็คเกจ) :</b>
                            <input type="text" class="form-control" name="discount" id="discount" value="<?php echo"$discount";?>" style="text-align:right" disabled>
                            <input type="hidden" name="disc" id="disc" value="<?php echo"$disc";?>">
                        </div>
                        <div class="col-sm-12 col-12">
                            <b>ราคาสุทธิ :</b>
                            <input type="text" class="form-control bg-dark text-warning" name="total_order" id="total_order" value="<?php echo"$total_order";?>" style="text-align:right;font-size:28px" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-12"></div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <input type="hidden" name="id_pro" id="id_pro" value="<?php echo"$id_pro";?>">
                <input type="hidden" name="coin_user" id="coin_user" value="<?php echo"$coin_user";?>">
                <button type="submit" class="btn btn-success btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยืนยันคำสั่งซื้อ&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
            </center>
        </div>
    </div>
</form>
<script>
    function cal_order1(){
        var pay_order1=document.getElementById("pay_order1").value;
        document.getElementById("pay_order2").checked=false;
        console.log(coin)
        if(pay_order1=="1"){
            var coin=document.getElementById("coin1").value;
            document.getElementById("coin").value=coin.toString();
            var price_pro=parseInt(document.getElementById("price_pro").value);
            var disc=parseInt(document.getElementById("disc").value);
            var sum1=price_pro*50/100;
            var discount=sum1*disc/100;
            var total_order=sum1-discount;
            document.getElementById("total_order").value=total_order.toString();
            document.getElementById("discount").value=discount.toString();
            document.getElementById("sum1").value=sum1.toString();
        }else{
            document.form1.price_pro.disabled=false;
            document.form1.coin.disabled=true;
        }
    }
    function cal_order2(){
        var pay_order2=document.getElementById("pay_order2").value;
        document.getElementById("pay_order1").checked=false;
        if(pay_order2=="2"){
            var coin=document.getElementById("coin1").value;
            document.getElementById("coin").value="0";
            var price_pro=parseInt(document.getElementById("price_pro").value);
            var disc=parseInt(document.getElementById("disc").value);
            var sum1=price_pro-0;
            var discount=sum1*disc/100;
            var total_order=sum1-discount;
            document.getElementById("total_order").value=total_order.toString();
            document.getElementById("discount").value=discount.toString();
            document.getElementById("sum1").value=sum1.toString();
        }else{
            document.form1.price_pro.disabled=true;
            document.form1.coin.disabled=false;
        }
    }
    function cal_order3(){
        var pay_order3=document.getElementById("pay_order3").value;
        if(pay_order3=="3"){
            var coin=document.getElementById("coin").value;
            document.getElementById("coin").value="แต้มไม่เพียงพอ";
            var price_pro=parseInt(document.getElementById("price_pro").value);
            var disc=parseInt(document.getElementById("disc").value);
            var sum1=price_pro-0;
            var discount=sum1*disc/100;
            var total_order=sum1-discount;
            document.getElementById("total_order").value=total_order.toString();
            document.getElementById("discount").value=discount.toString();
            document.getElementById("sum1").value=sum1.toString();
        }else{
            document.form1.price_pro.disabled=true;
            document.form1.coin.disabled=false;
        }
    }
</script>