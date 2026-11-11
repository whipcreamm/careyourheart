<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
?>
<form action="pro_add2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>เพิ่มสินค้าใหม่</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>ชื่อสินค้า :</label>
                    <input type="text" class="form-control" name="name_pro" id="name_pro" placeholder="ชื่อสินค้า" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ราคาสินค้า :</label>
                    <input type="text" class="form-control" name="price_pro" id="price_pro" placeholder="ราคาสินค้า" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ประเภทสินค้า :</label>
                    <select class="form-control form-select" name="type_ques" id="type_ques">
                        <option value="">==เลือกประเภทสินค้า==</option>
                        <option value="1">สุขภาพ</option>
                        <option value="2">เวชสำอาง</option>
                        <option value="3">ทั่วไป</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-12">
                    <label>จำนวนแต้มที่ใช้แลก :</label>
                    <input type="text" class="form-control" name="coin" id="coin" placeholder="จำนวนแต้มที่ใช้แลก" required>
                </div>
                <div class="col-sm-6 col-12">
                    <label>จำนวนสินค้าในคลัง :</label>
                    <input type="text" class="form-control" name="num_pro" id="num_pro" placeholder="จำนวนสินค้าในคลัง" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <label>รายละเอียด :</label>
                    <textarea class="form-control" name="detail_pro" id="detail_pro" rows="5" placeholder="รายละเอียด"></textarea>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รูปสินค้า :</label>
                    <input type="file" class="form-control" name="pic_pro" id="pic_pro">
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