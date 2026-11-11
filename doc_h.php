<?php
    include "head.php";
    include "function_sum.php";
    $id_his=$_REQUEST["id_his"];
    $sql="select * from tb_his where id_his='$id_his'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
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
    $sql1="select * from tb_admin,tb_user where tb_admin.id_pack=tb_user.id_pack and tb_admin.id_ad";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $name_ad=$read1["name_ad"];
    $sname_ad=$read1["sname_ad"];
    $pic_ad=$read1["pic_ad"];
    $sql2="select * from tb_chat where id_his='$id_his' order by id_chat";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
?>
<div class="bg-1"><br/><br/><br/><br/><br/>
    <div class="container">
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center>
                    <h2>ปรึกษาแพทย์ : <?php echo "$name_ad $sname_ad"; ?></h2>
                    <h4>ประจำวันที่ : <?php echo "$day_in"; ?></h4>
                </center>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <tr class="h5" align="center">
                        <th>ความดันค่าบน</th>
                        <th>ความดันค่าล่าง</th>
                        <th>อัตราการเต้นของหัวใจ</th>
                        <th>อาการเพิ่มเติม</th>
                        <th>แต้มแลกซื้อ</th>
                        <th>สถานะอาการ</th>
                    </tr>
                    <tr align="center">
                        <td><?php echo "$sys"; ?></td>
                        <td><?php echo "$dia"; ?></td>
                        <td><?php echo "$heart"; ?></td>
                        <td><?php echo "$detail"; ?></td>
                        <td><?php echo "$cu"; ?></td>
                        <td><?php echo "$show"; if($status_mem==7){ echo "&nbsp;&nbsp;&nbsp;<a href='tel:1669' class='btn btn-danger'>1669</a>"; } ?></td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <?php
                    if($num2==0){
                        echo "<br/><br/><br/><center><h2><font color='green'>เริ่มปรึกษาแพทย์</font></h2></center><br/><br/><br/><br/>";
                    }else{
                ?>
                <?php
                    while($read2=mysqli_fetch_assoc($result2)){
                        $detail_chat=$read2["detail_chat"];
                        $day_chat=$read2["day_chat"];
                        $day_chat=displaydate($day_chat);
                        $time_chat=$read2["time_chat"];
                        $type_chat=$read2["type_chat"];
                        $id_user=$read2["id_user"];
                        if($type_chat==1){
                            $sql3="select * from tb_user where id_user='$id_user'";
                            $result3=mysqli_query($conn,$sql3);
                            $read3=mysqli_fetch_assoc($result3);
                            $name_user=$read3["name_user"];
                            $sname_user=$read3["sname_user"];
                            $pic_user=$read3["pic_user"];
                            if($pic_user==""){
                                $pic_user="user.png";
                            }
                        }
                ?>
                <?php if($type_chat==1){ ?>
                    <div class="d-flex md-3 justify-content-end">
                        <div class="rounded-3 px-3 py-1 border" style="background-color:#ffe7e7">
                            <strong><?php echo "$name_user $sname_user"; ?></strong>
                            <small><?php echo "$day_chat $time_chat"; ?></small>
                            <h4><?php echo "$detail_chat"; ?></h4>
                        </div>&nbsp;&nbsp;&nbsp;
                        <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>
                    </div><br/>
                <?php }else if($type_chat==2){ ?>
                    <div class="d-flex md-3">
                        <?php echo "<img src='admin/admin/$pic_ad' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                        <div class="rounded-3 px-3 py-1 border" style="background-color:#e7fffc">
                            <strong>Admin</strong>
                            <small><?php echo "$day_chat $time_chat"; ?></small>
                            <h4><?php echo "$detail_chat"; ?></h4>
                        </div>
                    </div><br/>
                <?php } ?>
                <?php
                    }
                ?>
                <?php
                    }
                ?>
                <form name="form1" method="post" action="doc_h2.php">
                    <div class="input-group">
                        <textarea class="form-control" name="detail_chat" id="detail_chat" rows="1" placeholder="พิมพ์ข้อความ..." required></textarea>
                        <button type="submit" class="btn btn-lg btn-primary">ส่ง
                            <input type="hidden" name="id_his" id="id_his" value="<?php echo "$id_his"; ?>">
                        </button>
                    </div>
                </form>
            </div>
        </div><br/>
        <center>
            <a href="ques_n_doc.php" class="btn btn-lg btn-warning w-50" style="border-radius:30px">แบบประเมินความพึงพอใจต่อการให้บริการของแพทย์</a>
        </center>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>