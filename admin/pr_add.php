<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="pr_add2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>เพิ่มป้ายโฆษณาใหม่</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>ผู้ลงโฆษณา :</label>
                    <input type="text" class="form-control" name="name_pr" id="name_pr" placeholder="ผู้ลงโฆษณา" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" name="tel_pr" id="tel_pr" placeholder="เบอร์โทรติดต่อ" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ประเภทป้ายโฆษณา :</label>
                    <select class="form-control form-select" name="type_ques" id="type_ques" required>
                        <option value="">==เลือกประเภทป้ายโฆษณา==</option>
                        <option value="1">สุขภาพ</option>
                        <option value="2">เวชสำอาง</option>
                        <option value="3">ทั่วไป</option>
                        <option value="4">แบนเนอร์</option>
                    </select>
                </div>
                <div class="col-sm-12 col-12">
                    <label>URL :</label>
                    <input type="text" class="form-control" name="url_pr" id="url_pr" placeholder="http:........" required>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รายละเอียด :</label>
                    <textarea class="form-control" name="detail_pr" id="detail_pr" rows="5" placeholder="รายละเอียด"></textarea>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รูปป้ายโฆษณา :</label>
                    <input type="file" class="form-control" name="pic_pr" id="pic_pr">
                    <font color="red">[รองรับเฉพาะไฟล์ .jpg , .png และ .gif เท่านั้น!]</font>
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