<?php
    include "head.php";
    include "function_sum.php";
    $sql="select * from tb_his where id_user='$_SESSION[valid_user]' order by id_his desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="bg"><br/><br/><br/><br/><br/>
    <div class="container">
        <center><h2><b>แบบบันทึกสุขภาพประจำวัน</b></h2></center><hr><br/>
        <a href="#btn_add1" data-bs-toggle="modal" data-bs-target="#btn_add1" class="btn btn-lg btn-success" style="border-radius:30px;text-align:left">บันทึกสุขภาพ</a>
        <?php
            if($num==0){
                echo "<br/><br/><br/><center><h2><font color='red'>ยังไม่มีการบันทึกสุขภาพประจำวัน</font></h2></center><br/><br/><br/>
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
                <th>แต้มแลกซื้อ</th>
                <th>สถานะอาการ</th>
                <th>ปรึกษาแพทย์</th>
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
                        $cu="<font color='red'><b>$coin_user แต้ม</b></font>";
                    }else if($status_mem==6){
                        $show="<font color='orange'><b>อัตราความดันสูง<br/>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
                        $cu="<font color='orange'><b>$coin_user แต้ม</b></font>";
                    }else if($status_mem==5){
                        $show="<font color='orange'><b>อัตราความดันสูง<br/>อัตราการเต้นของหัวใจปกติ</b></font>";
                        $cu="<font color='orange'><b>+$coin_user แต้ม</b></font>";
                    }else if($status_mem==4){
                        $show="<font color='orange'><b>อัตราความดันเริ่มสูง<br/>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
                        $cu="<font color='orange'><b>+$coin_user แต้ม</b></font>";
                    }else if($status_mem==3){
                        $show="<font color='orange'><b>อัตราความดันเริ่มสูง<br/>อัตราการเต้นของหัวใจปกติ</b></font>";
                        $cu="<font color='orange'><b>+$coin_user แต้ม</b></font>";
                    }else if($status_mem==2){
                        $show="<font color='orange'><b>อัตราความดันปกติ<br/>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
                        $cu="<font color='orange'><b>+$coin_user แต้ม</b></font>";
                    }else{
                        $show="<font color='green'><b>ท่านมีสุขภาพร่างกายที่ดี</b></font>";
                        $cu="<font color='green'><b>+$coin_user แต้ม</b></font>";
                    }
            ?>
            <tr align="center">
                <td><?php echo "$day_in"; ?></td>
                <td><?php echo "$sys"; ?></td>
                <td><?php echo "$dia"; ?></td>
                <td><?php echo "$heart"; ?></td>
                <td><?php echo "$detail"; ?></td>
                <td><?php echo "$cu"; ?></td>
                <td><?php echo "$show"; if($status_mem==7){ echo "&nbsp;&nbsp;&nbsp;<a href='tel:1669' class='btn btn-danger'>1669</a>"; } ?></td>
                <td><?php echo "<a href='doc_h.php?id_his=$id_his' class='btn btn-primary'>แชท</a>"; ?></td>
            </tr>
            <?php
                }
            ?>
        </table><br/><br/><br/><br/><br/><br/><br/><br/>
        <?php
            }
        ?>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "health2.php";
    include "footer.php";
?>