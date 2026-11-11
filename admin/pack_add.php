<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="pack_add2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>เพิ่มแพ็คเกจใหม่</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>ชื่อแพ็คเกจ :</label>
                    <input type="text" class="form-control" name="name_pack" id="name_pack" placeholder="ชื่อแพ็คเกจ" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ราคาแพ็คเกจ :</label>
                    <input type="text" class="form-control" name="price_pack" id="price_pack" placeholder="ราคาแพ็คเกจ" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ส่วนลด (คิดเป็นเปอร์เซ็นต์) :</label>
                    <input type="text" class="form-control" name="disc" id="disc" placeholder="ส่วนลด">
                </div>
                <div class="col-sm-12 col-12">
                    <label>รายละเอียด :</label>
                    <textarea class="form-control" name="detail_pack" id="detail_pack" rows="5" placeholder="รายละเอียด"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <button type="submit" class="btn btn-success btn-lg" style="border-radius:30px">&nbsp;&nbsp;บันทึก&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
            </center>
        </div>
    </div>
</form>