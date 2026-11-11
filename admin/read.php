<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_admin order by id_ad desc";
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
            <a class="btn btn-primary" href="read2.php" target="_blank">พิมพ์รายงานผลข้อมูล</a>
            <center><h2><b>รายงานผลข้อมูลแอดมิน/แพทย์</b></h2></center>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?>
            <hr>
            <h5><b>ยอดแอดมิน/แพทย์ในระบบ</b></h5>
            <div class="progress" style="height:60px">
                <div class="progress-bar bg-danger progress-bar-animated progress-bar-striped" aria-valuenow="<?php echo"$per";?>" aria-valuemin="0" aria-valuemax="100" style="width:%">
                    <h6><b><?php echo"$per"?> คน</b></h6>
                </div>
            </div>
            <hr>
            <table class="table table-holver table-striped">
                <tr align="center" class="bg-p text-light">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-สกุล</th>
                    <th>แพ็คเกจ</th>
                    <th>เบอร์โทรติดต่อ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_ad=$read["id_ad"];
                        $id_pack=$read["id_pack"];
                        $name_ad=$read["name_ad"];
                        $sname_ad=$read["sname_ad"];
                        $pic_ad=$read["pic_ad"];
                        $tel_ad=$read["tel_ad"];
                        $type_ad=$read["type_ad"];
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];
                        if($pic_ad==""){
                            $pic_ad="admin.png";
                        }
                        if($type_ad==1){
                            $show="Admin";
                        }else{
                            $show="$name_pack";
                        }
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td><?php echo"<img src='admin/$pic_ad' class='rounded-pill' width='100' height='100'><br>$name_ad $sname_ad";?></td>
                    <td><?php echo"$show";?></td>
                    <td><font color="green"><b><?php echo substr($tel_ad,0,3).'-'.substr($tel_ad,3,7);?></b></font></td>
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