<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_pack=$_POST["id_pack"];
    $sql="select * from tb_package where id_pack='$id_pack'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_pack=$read["name_pack"];
    $price_pack=$read["price_pack"];
    $detail_pack=$read["detail_pack"];
    $disc=$read["disc"];
?>
<form action="pack_edit2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>แก้ไขแพ็คเกจ</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>ชื่อแพ็คเกจ :</label>
                    <input type="text" class="form-control" name="name_pack" id="name_pack" placeholder="ชื่อแพ็คเกจ" value="<?php echo"$name_pack";?>" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ราคาแพ็คเกจ :</label>
                    <input type="text" class="form-control" name="price_pack" id="price_pack" placeholder="ราคาแพ็คเกจ" value="<?php echo"$price_pack";?>" price_pack>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ส่วนลด (คิดเป็นเปอร์เซ็นต์) :</label>
                    <input type="text" class="form-control" name="disc" id="disc" placeholder="ส่วนลด" value="<?php echo"$disc";?>">
                </div>
                <div class="col-sm-12 col-12">
                    <label>รายละเอียด :</label>
                    <textarea class="form-control" name="detail_pack" id="detail_pack" rows="5" placeholder="รายละเอียด"><?php echo"$detail_pack";?></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <input type="hidden" name="id_pack" id="id_pack" value="<?php echo"$id_pack";?>">
                <button type="submit" class="btn btn-warning btn-lg" style="border-radius:30px">&nbsp;&nbsp;แก้ไข&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
            </center>
        </div>
    </div>
</form>