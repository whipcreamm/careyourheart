<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_order=$_POST["id_order"];
    $sql="select * from tb_order,tb_user where tb_order.id_user=tb_user.id_user and id_order='$id_order'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $id_user=$read["id_user"];
    $id_pro=$read["id_pro"];
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $born=$read["born"];
    $born=getage($born);
    $tel=$read["tel"];
    $addr=$read["addr"];
    $id_pack=$read["id_pack"];
    $coin_user=$read["coin_user"];
    $total_order=$read["total_order"];
    $pay_order=$read["pay_order"];
    if($pay_order=="1"){
        $p="<font color='green'><b>ใช้แต้มแลกซื้อ</b></font>";
    }else{
        $p="<font color='red'><b>ไม่ใช้แต้มแลกซื้อ</b></font>";
    }
    $sql1="select * from tb_product where id_pro='$id_pro'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $name_pro=$read1["name_pro"];
    $coin=$read1["coin"];
    $price_pro=$read1["price_pro"];
?>
<form action="pay_pro.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>ยืนยันใบเสร็จสั่งซื้อสินค้า</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <center>
                <div class="row">
                    <div class="col-sm-1 col-12"></div>
                    <div class="col-sm-10 col-12">
                        <img src="../img/lg1.png" class="img-fluid" width="250">
                        <h5><b>ใบเสร็จสั่งซื้อสินค้าเว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</b></h5>
                        <p>เลขที่ 2 ถนนรอบกำแพงเมืองทิศตะวันตก ตำบลในเวียง อำเภอเมือง จังหวัดน่าน 55000</p><hr>
                        <table>
                            <tr>
                                <th>ชื่อ-นามสกุล</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "$name_user $sname_user"; ?></td>
                            </tr>
                            <tr>
                                <th>อายุ</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "$born"; ?> ปี</td>
                            </tr>
                            <tr>
                                <th>เบอร์โทรติดต่อ</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "$tel"; ?></td>
                            </tr>
                            <tr>
                                <th>ที่อยู่ปัจจุบัน</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "$addr"; ?></td>
                            </tr>
                            <tr>
                                <th>จำนวนแต้มของผู้ใช้</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "$coin_user"; ?> แต้ม</td>
                            </tr>
                            <tr>
                                <th>สถานะ</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "$p"; ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
                                <th>ชื่อสินค้า</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "$name_pro"; ?></td>
                            </tr>
                            <tr>
                                <th>ราคาสินค้า</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "".number_format($price_pro)." บาท"; ?></td>
                            </tr>
                            <tr>
                                <th>จำนวนแต้มแลกซื้อ</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "$coin"; ?> แต้ม</td>
                            </tr>
                            <tr>
                                <th>ราคาสุทธิ</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <th>:</th>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo "".number_format($total_order)." บาท"; ?></td>
                            </tr>
                        </table><hr>
                    </div>
                    <div class="col-sm-1 col-12"></div>
                </div>
            </center><br>
                <div class="row">
                    <div class="col-sm-2 col-12"></div>
                    <div class="col-sm-8 col-12">
                        <center><h4><b>เลือกช่องทางการจัดส่ง</b></h4></center><hr>
                        <b>ช่องทางการจัดส่ง :</b>&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="type_order1" id="type_order1" value="1" onchange="order1()">&nbsp;จัดส่งธรรมดา&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="type_order2" id="type_order2" value="2" onchange="order2()">&nbsp;EMS (ด่วนพิเศษ)
                        <br><br>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <b>ราคาสุทธิ :</b>
                                <input type="text" class="form-control" name="total_order" id="total_order" value="<?php echo"$total_order";?>" style="text-align:right" disabled>
                            </div>
                            <div class="col-sm-6 col-12">
                                <b>ค่าจัดส่ง :</b>
                                <input type="text" class="form-control" name="tran" id="tran" value="<?php echo"$tran";?>" style="text-align:right" disabled>
                            </div>
                            <div class="col-sm-12 col-12">
                                <b>ยอดสั่งซื้อทั้งหมด :</b>
                                <input type="text" class="form-control bg-dark text-warning" name="net" id="net" value="<?php echo"$net";?>" style="text-align:right;font-size:28px" readonly>
                            </div>
                            <div class="col-sm-12 col-12"><br>
                                <b>เลขที่จัดส่ง :</b>
                                <input type="text" class="form-control" name="no_order" id="no_order" placeholder="เลขที่จัดส่ง" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-12"></div>
                </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <input type="hidden" name="id_order" id="id_order" value="<?php echo"$id_order";?>">
                <input type="hidden" name="id_user" id="id_user" value="<?php echo"$id_user";?>">
                <input type="hidden" name="id_pro" id="id_pro" value="<?php echo"$id_pro";?>">
                <input type="hidden" name="coin" id="coin" value="<?php echo"$coin";?>">
                <input type="hidden" name="coin_user" id="coin_user" value="<?php echo"$coin_user";?>">
                <input type="hidden" name="pay_order" id="pay_order" value="<?php echo"$pay_order";?>">
                <button type="submit" class="btn btn-success btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยืนยัน&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
            </center>
        </div>
    </div>
</form>
<script>
    function order1(){
        var type_order1=document.getElementById("type_order1").value;
        document.getElementById("type_order2").checked=false;
        if(type_order1=="1"){
            var total_order=parseInt(document.getElementById("total_order").value);
            document.getElementById("tran").value="50";
            var tran=parseInt(document.getElementById("tran").value);
            var net=total_order+tran;
            document.getElementById("net").value=net.toString();
            document.getElementById("tran").value=tran.toString();
        }else{
            document.form1.total_order.disabled=false;
            document.form1.tran.disabled=true;
        }
    }
    function order2(){
        var type_order2=document.getElementById("type_order2").value;
        document.getElementById("type_order1").checked=false;
        if(type_order2=="2"){
            var total_order=parseInt(document.getElementById("total_order").value);
            document.getElementById("tran").value="100";
            var tran=parseInt(document.getElementById("tran").value);
            var net=total_order+tran;
            document.getElementById("net").value=net.toString();
            document.getElementById("tran").value=tran.toString();
        }else{
            document.form1.total_order.disabled=false;
            document.form1.tran.disabled=true;
        }
    }
</script>