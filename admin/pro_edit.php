<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pro=$_POST["id_pro"];
    $sql="select * from tb_product where id_pro='$id_pro'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_pro=$read["name_pro"];
    $price_pro=$read["price_pro"];
    $type_ques=$read["type_ques"];
    $coin=$read["coin"];
    $num_pro=$read["num_pro"];
    $detail_pro=$read["detail_pro"];
    $pic_pro=$read["pic_pro"];
?>
<form action="pro_edit2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>แก้ไขสินค้า</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>ชื่อสินค้า :</label>
                    <input type="text" class="form-control" name="name_pro" id="name_pro" placeholder="ชื่อสินค้า" value="<?php echo"$name_pro";?>" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ราคาสินค้า :</label>
                    <input type="text" class="form-control" name="price_pro" id="price_pro" placeholder="ราคาสินค้า" value="<?php echo"$price_pro";?>" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ประเภทสินค้า :</label>
                    <select class="form-control form-select" name="type_ques" id="type_ques">
                        <option value="">==เลือกประเภทสินค้า==</option>
                        <option value="1" <?php if($type_ques==1){echo"selected";} ?>>สุขภาพ</option>
                        <option value="2" <?php if($type_ques==2){echo"selected";} ?>>เวชสำอาง</option>
                        <option value="3" <?php if($type_ques==3){echo"selected";} ?>>ทั่วไป</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-12">
                    <label>จำนวนแต้มที่ใช้แลก :</label>
                    <input type="text" class="form-control" name="coin" id="coin" placeholder="จำนวนแต้มที่ใช้แลก" value="<?php echo"$coin";?>" required>
                </div>
                <div class="col-sm-6 col-12">
                    <label>จำนวนสินค้าในคลัง :</label>
                    <input type="text" class="form-control" name="num_pro" id="num_pro" placeholder="จำนวนสินค้าในคลัง" value="<?php echo"$num_pro";?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <label>รายละเอียด :</label>
                    <textarea class="form-control" name="detail_pro" id="detail_pro" rows="5" placeholder="รายละเอียด"><?php echo"$detail_pro";?></textarea>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รูปสินค้า :</label>
                    <?php
                        if($pic_pro!=""){
                    ?>
                    <center>
                        <input type="checkbox" value="1" name="del" id="del"> ลบ&nbsp;&nbsp;&nbsp;
                        <img src="product/<?php echo"$pic_pro";?>" class="rounded-pill" width="250">
                    </center>
                    <?php }else{ ?>
                        <input type="file" class="form-control" name="pic_new" id="pic_new">
                        <font color="red">[รองรับเฉพาะไฟล์ .jpg , .png และ .gif เท่านั้น!]</font>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <input type="hidden" name="id_pro" id="id_pro" value="<?php echo"$id_pro";?>">
                <input type="hidden" name="pic_pro" id="pic_pro" value="<?php echo"$pic_pro";?>">
                <button type="submit" class="btn btn-warning btn-lg" style="border-radius:30px">&nbsp;&nbsp;แก้ไข&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
            </center>
        </div>
    </div>
</form>