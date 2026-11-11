<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_user where status_pack='y'";
    $result=mysqli_query($conn,$sql);
    $sql1="select * from tb_package where id_pack between '3' and '10'";
    $result1=mysqli_query($conn,$sql1);
    $num=mysqli_num_rows($result1);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <a class="btn btn-primary" href="repack2.php" target="_blank">พิมพ์รายงานผลรายได้</a><hr>
            <center><h2><b>รายงานผลรายได้จากแพ็คเกจ</b></h2></center>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center" class="bg-p text-light">
                    <th>ลำดับที่</th>
                    <th>ชื่อแพ็คเกจ</th>
                    <th>ราคาแพ็คเกจ</th>
                    <th>จำนวน</th>
                    <th>รายได้</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result1)){
                        $id_pack=$read["id_pack"];
                        $name_pack=$read["name_pack"];
                        $price_pack=$read["price_pack"];
                        $sql2="select * from tb_package,tb_user where tb_package.id_pack=tb_user.id_pack and tb_package.id_pack='$id_pack' and status_pack='y'";
                        $result2=mysqli_query($conn,$sql2);
                        $num2=mysqli_num_rows($result2);
                        $total=$price_pack*$num2;
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td align="left"><?php echo"$name_pack";?></td>
                    <td><?php echo"".number_format($price_pack)." บาท";?></td>
                    <td><?php echo"".number_format($num2)." คน";?></td>
                    <td><?php echo"".number_format($total)." บาท";?></td>
                </tr>
                <?php
                    $i++;
                    $count+=$num2;
                    $net+=$total;
                    }
                ?>
                <tr align="center" class="bg-p text-light">
                    <th colspan="3">รวมรายได้จากแพ็คเกจ</th>
                    <th><?php echo"".number_format($count)." คน";?></th>
                    <th><?php echo"".number_format($net)." บาท";?></th>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>