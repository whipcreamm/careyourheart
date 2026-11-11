<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pr=$_POST["id_pr"];
    $sql="select * from tb_pr where id_pr='$id_pr'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_pr=$read["name_pr"];
    $tel_pr=$read["tel_pr"];
    $type_ques=$read["type_ques"];
    $detail_pr=$read["detail_pr"];
    $url_pr=$read["url_pr"];
    $pic_pr=$read["pic_pr"];
?>
<form action="pr_edit2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>แก้ไขป้ายโฆษณา</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>ผู้ลงโฆษณา :</label>
                    <input type="text" class="form-control" name="name_pr" id="name_pr" placeholder="ผู้ลงโฆษณา" value="<?php echo"$name_pr";?>" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" name="tel_pr" id="tel_pr" placeholder="เบอร์โทรติดต่อ" value="<?php echo"$tel_pr";?>" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ประเภทป้ายโฆษณา :</label>
                    <select class="form-control form-select" name="type_ques" id="type_ques" required>
                        <option value="">==เลือกประเภทป้ายโฆษณา==</option>
                        <option value="1" <?php if($type_ques==1){echo"selected";};?>>สุขภาพ</option>
                        <option value="2" <?php if($type_ques==2){echo"selected";};?>>เวชสำอาง</option>
                        <option value="3" <?php if($type_ques==3){echo"selected";};?>>ทั่วไป</option>
                        <option value="4" <?php if($type_ques==4){echo"selected";};?>>แบนเนอร์</option>
                    </select>
                </div>
                <div class="col-sm-12 col-12">
                    <label>URL :</label>
                    <input type="text" class="form-control" name="url_pr" id="url_pr" placeholder="http:........" value="<?php echo"$url_pr";?>" required>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รายละเอียด :</label>
                    <textarea class="form-control" name="detail_pr" id="detail_pr" rows="5" placeholder="รายละเอียด"><?php echo"$detail_pr";?></textarea>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รูปป้ายโฆษณา :</label>
                    <?php
                        if($pic_pr!=""){
                    ?>
                    <center>
                        <input type="checkbox" value="1" name="del" id="del"> ลบ&nbsp;&nbsp;&nbsp;
                        <img src="pr/<?php echo"$pic_pr";?>" class="rounded" width="60%">
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
                <input type="hidden" name="id_pr" id="id_pr" value="<?php echo"$id_pr";?>">
                <input type="hidden" name="pic_pr" id="pic_pr" value="<?php echo"$pic_pr";?>">
                <button type="submit" class="btn btn-warning btn-lg" style="border-radius:30px">&nbsp;&nbsp;แก้ไข&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
            </center>
        </div>
    </div>
</form>