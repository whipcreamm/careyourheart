<?php
    include "head.php";
    $sql="select * from tb_package,tb_user where tb_package.id_pack=tb_user.id_pack and tb_user.id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $id_pack=$read["id_pack"];
    $name_pack=$read["name_pack"];
    $detail_pack=$read["detail_pack"];
    $price_pack=$read["price_pack"];
?>
<div class="bg"><br/><br/><br/><br/><br/>
    <div class="container">
        <center><h2><b>ยืนยันการสั่งซื้อแพ็คเกจ</b></h2></center><hr><br/>
        <div class="col-lg-12 col-12">
            <div class="card" style="border-radius:30px">
                <div class="card-body">
                    <div class="card-title"><h4 class="border-bottom"><b><?php echo "$name_pack"; ?></b></h4></div>
                    <div class="card-text"><?php echo "$detail_pack"; ?></div><br/><br/><br/><br/>
                    <div align="right"><span class="badge bg-success">ราคา <?php echo "".number_format($price_pack).""; ?> บาท</span></div>
                </div>
            </div>
        </div><br/>
        <center>
            <a href="tel:0623516990" class="btn btn-lg btn-success w-100" style="border-radius:30px">โทรสั่งซื้อแพ็คเกจ</a>
        </center><br/><br/><br/><br/>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>