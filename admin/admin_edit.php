<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_ad=$_POST["id_ad"];
    $sql="select * from tb_admin where id_ad='$id_ad'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $id_pack=$read["id_pack"];
    $name_ad=$read["name_ad"];
    $sname_ad=$read["sname_ad"];
    $user_ad=$read["user_ad"];
    $pass_ad=$read["pass_ad"];
    $tel_ad=$read["tel_ad"];
    $type_ad=$read["type_ad"];
    $pic_ad=$read["pic_ad"];
?>
<form action="admin_edit2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>แก้ไขข้อมูลแอดมิน/แพทย์</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3 col-12">
                    <label>ชื่อ :</label>
                    <input type="text" class="form-control" name="name_ad" id="name_ad" placeholder="ชื่อ" value="<?php echo"$name_ad";?>" required>
                </div>
                <div class="col-sm-3 col-12">
                    <label>นามสกุล :</label>
                    <input type="text" class="form-control" name="sname_ad" id="sname_ad" placeholder="นามสกุล" value="<?php echo"$sname_ad";?>" required>
                </div>
                <div class="col-sm-3 col-12">
                    <label>Username :</label>
                    <input type="text" class="form-control" name="user_ad" id="user_ad" placeholder="Username" value="<?php echo"$user_ad";?>" required>
                </div>
                <div class="col-sm-3 col-12">
                    <label>Password :</label>
                    <input type="text" class="form-control" name="pass_ad" id="pass_ad" placeholder="Password" value="<?php echo"$pass_ad";?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" name="tel_ad" id="tel_ad" maxlength="10" placeholder="Password" value="<?php echo"$tel_ad";?>" required>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ประเภทแอดมิน/แพทย์ :</label>
                    <select class="form-control form-select" name="type_ad" id="type_ad" required>
                        <option value="">==เลือกประเภทแอดมิน/แพทย์==</option>
                        <option value="1" <?php if($type_ad==1){echo"selected";} ?>>ผู้ดูแลระบบ (แอดมิน)</option>
                        <option value="2" <?php if($type_ad==2){echo"selected";} ?>>แพทย์</option>
                    </select>
                </div>
                <div class="col-sm-4 col-12">
                    <label>แพ็คเกจ :</label>
                    <select class="form-control form-select" name="id_pack" id="id_pack" required>
                        <option value="">==เลือกประเภทแอดมิน/แพทย์==</option>
                        <?php
                            $sql1="select * from tb_package where id_pack between '2' and '10'";
                            $result1=mysqli_query($conn,$sql1);
                            while($read1=mysqli_fetch_assoc($result1)){
                                $id_pack1=$read1["id_pack"];
                                $name_pack=$read1["name_pack"];
                                if($id_pack==$id_pack1){
                        ?>
                        <option value="<?php echo"$id_pack1";?>" selected><?php echo"$name_pack";?></option>
                        <?php }else{ ?>
                        <option value="<?php echo"$id_pack1";?>"><?php echo"$name_pack";?></option>
                        <?php }} ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <label>รูปโปรไฟล์ :</label>
                    <?php
                        if($pic_ad!=""){
                    ?>
                    <center>
                        <input type="checkbox" value="1" name="del" id="del"> ลบ&nbsp;&nbsp;&nbsp;
                        <img src="admin/<?php echo"$pic_ad";?>" class="rounded-pill" width="250">
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
                <input type="hidden" name="id_ad" id="id_ad" value="<?php echo"$id_ad";?>">
                <input type="hidden" name="pic_ad" id="pic_ad" value="<?php echo"$pic_ad";?>">
                <button type="submit" class="btn btn-warning btn-lg" style="border-radius:30px">&nbsp;&nbsp;แก้ไข&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
            </center>
        </div>
    </div>
</form>