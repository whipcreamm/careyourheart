<?php
    include "head.php";
    include "function_sum.php";
    $sql="select * from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and tb_user.id_user='$_SESSION[valid_user]' and status_meet='n' order by id_meet desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $read=mysqli_fetch_assoc($result);
    $id_meet=$read["id_meet"];
    $day_meet=$read["day_meet"];
    if($day_meet!=""){
        $day_meet=displaydate($day_meet);
    }
    $time_meet=$read["time_meet"];
    $detail_meet=$read["detail_meet"];
    $status_meet=$read["status_meet"];
    if($status_meet=="n"){
        $status_meet="<font color='red'><b>ยังไม่ได้เข้าพบแพทย์</b></font>";
    }
    $type_cost=$read["type_cost"];
    $total=$read["total"];
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $born=$read["born"];
    $born=getage($born);
    $tel=$read["tel"];
    $addr=$read["addr"];
    $id_pack=$read["id_pack"];
    $sql1="select * from tb_package where id_pack='$id_pack'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $disc=$read1["disc"];
?>
<div class="bg-1"><br/><br/><br/><br/><br/>
    <div class="container">
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center><h2><b><?php if($num>0){ echo "<div class='spinner-grow bg-danger'></div>&nbsp;&nbsp;&nbsp;
                                <audio autoplay='1' loop='loop'><source src='sound/Alarm04.wav' type='audio/wav'></audio>
                                "; } ?>ใบนัดพบแพทย์</b></h2></center>
            </div>
            <div class="card-body">
                <?php
                    if($num==0){
                        echo "<center><img src='img/3.png' class='img-fluid' width='250'></center><br/>
                        <br/><br/><br/><center><h2><font color='red'>ยังไม่มีการแจ้งเตือน</font></h2></center><br/><br/><br/>";
                    }else{
                ?>
                <div class="row">
                    <div class="col-lg-3 col-sm-3"></div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <center>
                            <div class="card" style="border-radius:30px">
                                <div class="card-body">
                                    <img src="img/lg1.png" class="img-fluid" width="250">
                                    <h5><b>ใบนัดพบแพทย์เว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</b></h5>
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
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th>วันที่นัด</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$day_meet"; ?></td>
                                        </tr>
                                        <tr>
                                            <th>เวลานัด</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$time_meet"; ?></td>
                                        </tr>
                                        <tr>
                                            <th>รายละเอียดการนัด</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$detail_meet"; ?></td>
                                        </tr>
                                        <tr>
                                            <th>สถานะ</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td><?php echo "$status_meet"; ?></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th>สถานที่นัดตรวจ</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>โรงพยาบาลน่าน</td>
                                        </tr>
                                        <tr>
                                            <th>ห้องตรวจ</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <th>:</th>
                                            <td>&nbsp;&nbsp;&nbsp;</td>
                                            <td>A119</td>
                                        </tr>
                                    </table><hr>
                                    <?php if($type_cost!="0" and $total!="0"){ ?>
                                        <h4><b>ค่าใช้จ่ายทั้งหมด : <?php echo "".number_format($total)." บาท"; ?></b></h4>
                                        <font color="red">[เฉพาะค่าบริการนอกสถานที่, ค่าวิชาชีพแพทย์ และค่าบริการขนส่งเท่านั้น!<br/>ไม่รวมค่ายา โปรดเตรียมเงินสดมาชำระ]</font><hr>
                                        <b>ขอบคุณที่ใช้บริการเว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</b>
                                    <?php }else if($type_cost=="0" and $total=="0"){ ?>
                                        <b>ขอบคุณที่ใช้บริการเว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</b>
                                    <?php } ?>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="col-lg-3 col-sm-3"></div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <?php
            if($num=="0" or $status_meet!="0" and $total!="0"){

            }else{
        ?>
        <br/><br/>
        <div class="card" style="border-radius:30px">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 co-sm-3"></div>
                    <div class="col-lg-6 co-sm-6 col-12">
                        <center><h4><b>เลือกบริการขนส่ง</b></h4></center><hr>
                        <form name="form1" id="form1" method="post" action="meet2.php">
                            <div class="row py-2">
                                <div class="col-sm-6 col-12">
                                    <b>ค่าบริการนอกสถานที่</b>
                                    <input type="text" class="form-control" name="pay" id="pay" value="1000" style="text-align:right" readonly>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <b>ค่าวิชาชีพแพทย์</b>
                                    <input type="text" class="form-control" name="cost" id="cost" value="300" style="text-align:right" readonly>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-sm-12 col-12">
                                    <b>บริการขนส่ง</b>&nbsp;&nbsp;&nbsp;
                                    <input type="radio" class="form-check-input" name="type_cost" id="type_cost" value="1" onchange="cal_num()">&nbsp;บริการรับ-ส่ง&nbsp;&nbsp;&nbsp;
                                    <input type="radio" class="form-check-input" name="type_cost" id="type_cost" value="2" onchange="cal_num()">&nbsp;เดินทางด้วยตนเอง
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-sm-6 col-12">
                                    <b>ส่วนลด</b>
                                    <input type="text" class="form-control" name="discount" id="discount" style="text-align:right" readonly>
                                    <input type="hidden" name="disc" id="disc" value="<?php echo "$disc"; ?>">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-sm-12 col-12">
                                    <b>ส่วนลด</b>
                                    <input type="text" class="form-control bg-dark text-warning" name="total" id="total" style="text-align:right;font-size:28px" readonly>
                                    <font color="red">[เฉพาะค่าบริการนอกสถานที่, ค่าวิชาชีพแพทย์ และค่าบริการขนส่งเท่านั้น!<br/>ไม่รวมค่ายา โปรดเตรียมเงินสดมาชำระ]</font>
                                </div>
                            </div><br/>
                            <center>
                                <button type="submit" class="btn btn-lg btn-success" style="border-radius:30px">ยืนยันการเลือกบริการขนส่ง</button><br/><br/>
                                <input type="hidden" name="id_meet" id="id_meet" value="<?php echo "$id_meet"; ?>">
                            </center>
                        </form>
                    </div>
                    <div class="col-lg-3 co-sm-3"></div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>