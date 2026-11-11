<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_user=$_REQUEST["id_user"];
    $name_user=$_REQUEST["name_user"];
    $sname_user=$_REQUEST["sname_user"];
    $sql="select * from tb_his where id_user='$id_user' order by id_his desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $sql1="update tb_his set status_his='y' where id_user='$id_user'";
    $result1=mysqli_query($conn,$sql1);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <center><h2><b>ประวัติอาการ : <?php echo "$name_user $sname_user"; ?></b></h2></center><hr><br/>
            <?php
                if($num==0){
                    echo "<br/><br/><br/><center><h2><font color='red'>ผู้ป่วยยังไม่มีการบันทึกสุขภาพประจำวัน</font></h2></center><br/><br/><br/>
                    <br/><br/><br/><br/><br/><br/><br/>";
                }else{
            ?>
            <table class="table table-hover table-striped">
                <tr class="h5" align="center">
                    <th>วันที่บันทึก</th>
                    <th>ความดันค่าบน</th>
                    <th>ความดันค่าล่าง</th>
                    <th>อัตราการเต้นของหัวใจ</th>
                    <th>อาการเพิ่มเติม</th>
                    <th>สถานะอาการ</th>
                    <th>ให้คำปรึกษา</th>
                </tr>
                <?php
                    while($read=mysqli_fetch_assoc($result)){
                        $id_his=$read["id_his"];
                        $day_in=$read["day_in"];
                        $day_in=displaydate($day_in);
                        $sys=$read["sys"];
                        $dia=$read["dia"];
                        $heart=$read["heart"];
                        $detail=$read["detail"];
                        $status_mem=$read["status_mem"];
                        $coin_user=$read["coin_user"];
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
                            $show="<font color='green'><b>ผู้ป่วยมีสุขภาพร่างกายที่ดี</b></font>";
                        }
                        $sql2="select * from tb_chat where id_his='$id_his' and status_chat='n'";
                        $result2=mysqli_query($conn,$sql2);
                        $num2=mysqli_num_rows($result2);
                ?>
                <tr align="center">
                    <td><?php echo "$day_in"; ?></td>
                    <td><?php echo "$sys"; ?></td>
                    <td><?php echo "$dia"; ?></td>
                    <td><?php echo "$heart"; ?></td>
                    <td><?php echo "$detail"; ?></td>
                    <td><?php echo "$show"; if($status_mem==7){ echo "&nbsp;&nbsp;&nbsp;<a href='tel:1669' class='btn btn-danger'>1669</a>"; } ?></td>
                    <td>
                        <?php echo "<a href='doc_h.php?id_his=$id_his&id_user=$id_user&name_user=$name_user&sname_user=$sname_user' class='btn btn-primary'>แชท</a>"; ?>
                        <?php if($num2>0){ echo "&nbsp;&nbsp;&nbsp;<div class='spinner-grow bg-success'></div>
                        <audio autoplay='1' loop='loop'><source src='sound/Alarm04.wav' type='audio/wav'></audio>
                        "; } ?>
                    </td>
                </tr>
                <?php
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