<?php
    include "head.php";
    include "function_sum.php";
    $sql="select * from tb_alert where id_user='$_SESSION[valid_user]' and status_alert='n' order by id_alert desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $read=mysqli_fetch_assoc($result);
    $day_alert=$read["day_alert"];
    if($day_alert!=""){
        $day_alert=displaydate($day_alert);
    }
    $time_alert=$read["time_alert"];
    $detail_alert=$read["detail_alert"];
    $status_alert=$read["status_alert"];
    if($status_alert=="n"){
        $status_alert="<font color='red'>ยังไม่ได้รับประทานยา</font>";
    }
?>
<div class="bg-1"><br/><br/><br/><br/><br/>
    <div class="container">
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center><h2><b><?php if($num>0){ echo "<div class='spinner-grow bg-danger'></div>&nbsp;&nbsp;&nbsp;
                                <audio autoplay='1' loop='loop'><source src='sound/Alarm04.wav' type='audio/wav'></audio>
                                "; } ?>แจ้งเตือนรับประทานยา</b></h2></center>
            </div>
            <div class="card-body">
                <center><img src="img/2.png" class="img-fluid" width="250"></center><br/>
                <?php
                    if($num==0){
                        echo "<br/><br/><br/><center><h2><font color='red'>ยังไม่มีการแจ้งเตือน</font></h2></center><br/><br/><br/>";
                    }else{
                ?>
                <center><h4>
                    <?php echo "$status_alert"; ?><br/><br/>
                    <table>
                        <tr>
                            <th>วันที่แจ้งเตือน</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$day_alert"; ?></td>
                        </tr>
                        <tr>
                            <th>เวลาแจ้งเตือน</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$time_alert"; ?></td>
                        </tr>
                    </table><br/>
                    <font color="green">"<?php echo "$detail_alert"; ?>"</font><br/><br/>
                    <a href="warn2.php" class="btn btn-lg btn-success" style="border-radius:30px">ยืนยันการรับประทานยา</a>
                </h4></center>
                <?php
                    }
                ?>
            </div>
        </div>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>