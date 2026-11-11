<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_alert,tb_user where tb_alert.id_user=tb_user.id_user and id_pack='$_SESSION[id_pack]' and status_alert='n' order by id_alert desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <div class="card" style="border-radius:30px">
                <div class="card-header">
                    <center><h2><b>แจ้งเตือนรับประทานยา</b></h2></center>
                </div>
                <div class="card-body">
                    <form name="form1" method="post" action="warn2.php">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <label>วันที่แจ้งเตือน :</label>
                                <input type="date" class="form-control" name="day_alert" id="day_alert" required>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <label>เวลาแจ้งเตือน :</label>
                                <input type="time" class="form-control" name="time_alert" id="time_alert" required>
                            </div>
                            <div class="col-lg-12 col-sm-6 col-12">
                                <label>ข้อความแจ้งเตือน :</label>
                                <textarea class="form-control" name="detail_alert" id="detail_alert" rows="3" placeholder="พิมพ์ข้อความแจ้งเตือน..." required></textarea>
                            </div>
                        </div><br/>
                        <center>
                            <button type="submit" class="btn btn-lg btn-success" style="border-radius:30px">แจ้งเตือน</button>&nbsp;&nbsp;&nbsp;
                            <button type="reset" class="btn btn-lg btn-danger" style="border-radius:30px">ยกเลิก</button>
                        </center>
                    </form>
                </div>
            </div><br/><br/>
            <?php
                if($num==0){
                    echo "<br/><br/><br/><center><h2><font color='red'>ยังไม่มีการนัดพบผู้ป่วยในแพ็คเกจ</font></h2></center><br/><br/><br/>
                    <br/><br/><br/><br/><br/><br/><br/>";
                }else{
            ?>
            <table class="table table-hover table-striped">
                <tr class="h5" align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่แจ้งเตือน</th>
                    <th>เวลาแจ้งเตือน</th>
                    <th>สถานะการรับประทานยา</th>
                    <th>โทรแจ้งเตือน</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $day_alert=$read["day_alert"];
                        if($day_alert!=""){
                            $day_alert=displaydate($day_alert);
                        }
                        $time_alert=$read["time_alert"];
                        $detail_alert=$read["detail_alert"];
                        $status_alert=$read["status_alert"];
                        if($status_alert=="n"){
                            $status_alert="<font color='red'><b>ยังไม่ได้รับประทานยา</b></font>";
                        }
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $tel=$read["tel"];
                ?>
                <tr align="center">
                    <td><?php echo "$i"; ?></td>
                    <td><?php echo "$name_user $sname_user"; ?></td>
                    <td><?php echo "$day_alert"; ?></td>
                    <td><?php echo "$time_alert"; ?></td>
                    <td><?php echo "$status_alert"; ?></td>
                    <td><?php echo "<a href='tel:$tel' class='btn btn-warning'>โทรแจ้งเตือน</a>"; ?></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </table><br/><br/><br/><br/><br/><br/><br/><br/>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>