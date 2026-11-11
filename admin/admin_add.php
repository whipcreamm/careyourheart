<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql1="select * from tb_package where id_pack between '2' and '10'";
    $result1=mysqli_query($conn,$sql1);
?>
<form action="admin_add2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>เพิ่มข้อมูลแอดมิน/แพทย์ใหม่</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3 col-12">
                    <label>ชื่อ :</label>
                    <input type="text" class="form-control" name="name_ad" id="name_ad" placeholder="ชื่อ" required>
                </div>
                <div class="col-sm-3 col-12">
                    <label>นามสกุล :</label>
                    <input type="text" class="form-control" name="sname_ad" id="sname_ad" placeholder="นามสกุล" required>
                </div>
                <div class="col-sm-3 col-12">
                    <label>Username :</label>
                    <input type="text" class="form-control" name="user_ad" id="user_ad" placeholder="Username" required>
                </div>
                <div class="col-sm-3 col-12">
                    <label>Password :</label>
                    <input type="password" class="form-control" name="pass_ad" id="pass_ad" placeholder="Password" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" name="tel_ad" id="tel_ad" maxlength="10" placeholder="Password" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ประเภทแอดมิน/แพทย์ :</label>
                    <select class="form-control form-select" name="type_ad" id="type_ad" required>
                        <option value="">==เลือกประเภทแอดมิน/แพทย์==</option>
                        <option value="1">ผู้ดูแลระบบ (แอดมิน)</option>
                        <option value="2">แพทย์</option>
                    </select>
                </div>
                <div class="col-sm-4 col-12">
                    <label>แพ็คเกจ :</label>
                    <select class="form-control form-select" name="id_pack" id="id_pack" required>
                        <option value="">==เลือกประเภทแอดมิน/แพทย์==</option>
                        <?php
                            while($read1=mysqli_fetch_assoc($result1)){
                                $id_pack=$read1["id_pack"];
                                $name_pack=$read1["name_pack"];
                        ?>
                        <option value="<?php echo"$id_pack";?>"><?php echo"$name_pack";?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <label>รูปโปรไฟล์ :</label>
                    <input type="file" class="form-control" name="pic_ad" id="pic_ad">
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