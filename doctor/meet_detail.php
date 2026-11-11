<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_meet=$_POST["id_meet"];
    $sql="select * from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and tb_meet.id_meet='$id_meet'";
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
?>
<form action="meet_confirm.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>รายละเอียดการนัดผู้ป่วย</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <center>
                <div class="card" style="border-radius:30px">
                    <div class="card-body">
                        <img src="../img/lg1.png" class="img-fluid" width="250">
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
                        <?php }else if($type_cost=="0" and $total=="0"){ ?>
                            <font color="red"><b>ผู้ป่วยยังไม่ได้อัปเดตสถานะ</b></font>
                        <?php } ?>
                    </div>
                </div><br/>
                <?php if($type_cost!="0" and $total!="0"){ ?>
                    <button type="submit" class="btn btn-lg btn-outline-success" style="border-radius:30px">ยืนยันสถานะการเข้าพบแพทย์</button>
                    <input type="hidden" name="id_meet" id="id_meet" value="<?php echo "$id_meet"; ?>">
                <?php }else if($type_cost=="0" and $total=="0"){ ?>
                <?php } ?>
            </center>
        </div>
    </div>
</form>