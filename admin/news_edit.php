<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_news=$_POST["id_news"];
    $sql="select * from tb_news where id_news='$id_news'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $head_news=$read["head_news"];
    $detail_news=$read["detail_news"];
    $pic_news=$read["pic_news"];
?>
<form action="news_edit2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>แก้ไขข้อมูลข่าวสาร</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <label>หัวข้อข่าว :</label>
                    <input type="text" class="form-control" name="head_news" id="head_news" placeholder="หัวข้อข่าว" value="<?php echo"$head_news";?>" required>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รายละเอียด :</label>
                    <textarea class="form-control" name="detail_news" id="detail_news" rows="5" placeholder="รายละเอียด"><?php echo"$detail_news";?></textarea>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รูปข่าวสาร :</label>
                    <?php
                        if($pic_news!=""){
                    ?>
                    <center>
                        <input type="checkbox" value="1" name="del" id="del"> ลบ&nbsp;&nbsp;&nbsp;
                        <img src="news/<?php echo"$pic_news";?>" class="rounded" width="50%">
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
                <input type="hidden" name="id_news" id="id_news" value="<?php echo"$id_news";?>">
                <input type="hidden" name="pic_news" id="pic_news" value="<?php echo"$pic_news";?>">
                <button type="submit" class="btn btn-warning btn-lg" style="border-radius:30px">&nbsp;&nbsp;แก้ไข&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
            </center>
        </div>
    </div>
</form>