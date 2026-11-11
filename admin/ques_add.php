<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="ques_add2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>เพิ่มแบบประเมินใหม่</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <label>คำถาม :</label>
                    <input type="text" class="form-control" name="question" id="question" placeholder="คำถาม" required>
                </div>
                <div class="col-sm-6 col-12">
                    <label>ประเภทแบบประเมิน :</label>
                    <select class="form-control form-select" name="type_ques_n" id="type_ques_n" required>
                        <option value="">==เลือกประเภทแบบประเมิน==</option>
                        <option value="1">แบบประเมินเกี่ยวกับการใช้งานเว็บไซต์</option>
                        <option value="2">แบบประเมินเกี่ยวกับการให้บริการของแพทย์</option>
                    </select>
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