<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_package,tb_user where tb_package.id_pack=tb_user.id_pack and tb_package.id_pack between '3' and '10' and status_pack='n'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <center><h2><b>รายการสั่งซื้อแพ็คเกจ</b></h2></center><hr>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-สกุล (ผู้สั่งซื้อ)</th>
                    <th>ชื่อแพ็คเกจ</th>
                    <th>ราคาแพ็คเกจ</th>
                    <th>อนุมัติคำสั่งซื้อ</th>
                    <th>โทรติดต่อ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_pack=$read["id_pack"];
                        $id_user=$read["id_user"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $tel=$read["tel"];
                        $name_pack=$read["name_pack"];
                        $price_pack=$read["price_pack"];
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td align="left"><?php echo"$name_user $sname_user";?></td>
                    <td><?php echo"$name_pack";?></td>
                    <td><?php echo"".number_format($price_pack)." บาท";?></td>
                    <td><?php echo"<a href='pay_pack.php?id_user=$id_user' onclick=\"return confirm('ท่านต้องการอนุมัติคำสั่งซื้อใช่หรือไม่?')\" class='btn btn-primary'>อนุมัติคำสั่งซื้อ</a>";?></td>
                    <td><?php echo"<a href='tel:$tel' class='btn btn-warning'>โทรติดต่อ</a>";?></td>
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