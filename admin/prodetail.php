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
    </div>
</div>