<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and tb_meet.status_meet='y' order by id_meet desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <a class="btn btn-primary" href="remeet2.php" target="_blank">พิมพ์รายงานผลรายได้</a><hr>
            <center><h2><b>รายงานผลรายได้จากค่าบริการนอกสถานที่ของแพทย์</b></h2></center>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center" class="bg-p text-light">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-สกุล (ผู้ใช้บริการ)</th>
                    <th>เบอร์โทรติดต่อ</th>
                    <th>รายได้</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_meet=$read["id_meet"];
                        $id_user=$read["id_user"];
                        $tel=$read["tel"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $sql1="select sum(total) as total from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and tb_meet.status_meet='y' and tb_meet.id_meet='$id_meet'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $total=$read["total"];
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td align="left"><?php echo"$name_user $sname_user";?></td>
                    <td><?php echo substr($tel,0,3).'-'.substr($tel,3,7);?></td>
                    <td><?php echo"".number_format($total)." บาท";?></td>
                </tr>
                <?php
                    $i++;
                    $net+=$total;
                    }
                ?>
                <tr align="center" class="bg-p text-light">
                    <th colspan="3">รวมรายได้จากค่าบริการนอกสถานที่ของแพทย์</th>
                    <th><?php echo"".number_format($net)." บาท";?></th>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>