<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="user_add2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>เพิ่มข้อมูลผู้ใช้ใหม่</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3 col-12">
                    <label>ชื่อ :</label>
                    <input type="text" class="form-control" name="name_user" id="name_user" placeholder="กรอกชื่อ" required>
                </div>
                <div class="col-sm-3 col-12">
                    <label>นามสกุล :</label>
                    <input type="text" class="form-control" name="sname_user" id="sname_user" placeholder="กรอกนามสกุล" required>
                </div>
                <div class="col-sm-3 col-12">
                    <label>Username (ชื่อผู้ใช้) :</label>
                    <input type="text" class="form-control" name="user" id="user" placeholder="กรอก Username (ชื่อผู้ใช้)" required>
                </div>
                <div class="col-sm-3 col-12">
                    <label>Password (รหัสผ่าน) :</label>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="กรอก Password (รหัสผ่าน)" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>วันเกิด (ปี ค.ศ.) :</label>
                    <input type="date" class="form-control" name="born" id="born" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>เพศ :</label>
                    <select class="form-select" name="sex" id="sex">
                        <option value="">==เลือกเพศ==</option>
                        <option value="1">ชาย</option>
                        <option value="2">หญิง</option>
                    </select>
                </div>
                <div class="col-sm-4 col-12">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" name="tel" id="tel" placeholder="กรอกเบอร์โทรติดต่อ" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <label>ที่อยู่ปัจจุบัน :</label>
                    <textarea class="form-control" name="addr" id="addr" rows="3" placeholder="กรอกที่อยู่ปัจจุบัน" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>ความดันค่าบน :</label>
                    <input type="text" class="form-control" name="sys" id="sys" placeholder="กรอกความดันค่าบน" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ความดันค่าล่าง :</label>
                    <input type="text" class="form-control" name="dia" id="dia" placeholder="กรอกความดันค่าล่าง" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>อัตราการเต้นของหัวใจ :</label>
                    <input type="text" class="form-control" name="heart" id="heart" placeholder="กรอกอัตราการเต้นของหัวใจ" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <label>โรคประจำตัว (ถ้ามี) :</label>
                    <textarea class="form-control" name="dise" id="dise" rows="3" placeholder="กรอกโรคประจำตัว (ถ้ามี)"></textarea>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รูปโปรไฟล์ :</label>
                    <input type="file" class="form-control" name="pic_user" id="pic_user">
                    <font color="red">[เฉพาะไฟล์ .jpg , .png และ .gif เท่านั้น!]</font>
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