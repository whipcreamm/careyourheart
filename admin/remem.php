<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_user order by id_user desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $per=($num*100)/100;
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <a class="btn btn-primary" href="remem2.php" target="_blank">พิมพ์รายงานผลข้อมูล</a>
            <center><h2><b>รายงานผลข้อมูลผู้ใช้</b></h2></center>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?>
            <hr>
            <h5><b>ยอดผู้ใช้ในระบบ</b></h5>
            <div class="progress" style="height:60px">
                <div class="progress-bar bg-success progress-bar-animated progress-bar-striped" aria-valuenow="<?php echo"$per";?>" aria-valuemin="0" aria-valuemax="100" style="width:%">
                    <h6><b><?php echo"$per"?> คน</b></h6>
                </div>
            </div>
            <hr>
            <table class="table table-holver table-striped">
                <tr align="center" class="bg-p text-light">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-สกุล</th>
                    <th>อายุ</th>
                    <th>สถานะ</th>
                    <th>แพ็คเกจ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_user=$read["id_user"];
                        $id_pack=$read["id_pack"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $status_mem=$read["status_mem"];
                        $pic_user=$read["pic_user"];
                        $born=$read["born"];
                        $born=getage($born);
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];
                        if($pic_user==""){
                            $pic_user="user.png";
                        }
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
                            $show="<font color='green'><b>สุขภาพร่างกายดี</b></font>";
                        }
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td><?php echo"<img src='user/$pic_user' class='rounded-pill' width='100' height='100'><br>$name_user $sname_user";?></td>
                    <td><?php echo"$born";?> ปี</td>
                    <td><?php echo"$show";?></td>
                    <td><?php echo"$name_pack";?></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>