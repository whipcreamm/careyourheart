<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_user=$_POST["id_user"];
    $sql="select * from tb_user where id_user='$id_user'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $user=$read["user"];
    $pass=$read["pass"];
    $born=$read["born"];
    $sex=$read["sex"];
    $tel=$read["tel"];
    $addr=$read["addr"];
    $sys=$read["sys"];
    $dia=$read["dia"];
    $heart=$read["heart"];
    $dise=$read["dise"];
    $pic_user=$read["pic_user"];
?>
<form action="user_edit2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>ข้อมูล : <?php echo "$name_user $sname_user"; ?></b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3 col-12">
                    <label>ชื่อ :</label>
                    <input type="text" class="form-control" name="name_user" id="name_user" placeholder="กรอกชื่อ" value="<?php echo"$name_user";?>" disabled>
                </div>
                <div class="col-sm-3 col-12">
                    <label>นามสกุล :</label>
                    <input type="text" class="form-control" name="sname_user" id="sname_user" placeholder="กรอกนามสกุล" value="<?php echo"$sname_user";?>" disabled>
                </div>
                <div class="col-sm-3 col-12">
                    <label>Username (ชื่อผู้ใช้) :</label>
                    <input type="text" class="form-control" name="user" id="user" placeholder="กรอก Username (ชื่อผู้ใช้)" value="<?php echo"$user";?>" disabled>
                </div>
                <div class="col-sm-3 col-12">
                    <label>Password (รหัสผ่าน) :</label>
                    <input type="text" class="form-control" name="pass" id="pass" placeholder="กรอก Password (รหัสผ่าน)" value="<?php echo"$pass";?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>วันเกิด (ปี ค.ศ.) :</label>
                    <input type="date" class="form-control" name="born" id="born" value="<?php echo"$born";?>" disabled>
                </div>
                <div class="col-sm-4 col-12">
                    <label>เพศ :</label>
                    <select class="form-control" name="sex" id="sex" disabled>
                        <option value="">==เลือกเพศ==</option>
                        <option value="1" <?php if($sex==1){echo"selected";} ?>>ชาย</option>
                        <option value="2" <?php if($sex==2){echo"selected";} ?>>หญิง</option>
                    </select>
                </div>
                <div class="col-sm-4 col-12">
                    <label>เบอร์โทรติดต่อ :</label>
                    <input type="text" class="form-control" name="tel" id="tel" placeholder="กรอกเบอร์โทรติดต่อ" value="<?php echo"$tel";?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <label>ที่อยู่ปัจจุบัน :</label>
                    <textarea class="form-control" name="addr" id="addr" rows="3" placeholder="กรอกที่อยู่ปัจจุบัน" disabled><?php echo"$addr";?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-12">
                    <label>ความดันค่าบน :</label>
                    <input type="text" class="form-control" name="sys" id="sys" placeholder="กรอกความดันค่าบน" value="<?php echo"$sys";?>" disabled>
                </div>
                <div class="col-sm-4 col-12">
                    <label>ความดันค่าล่าง :</label>
                    <input type="text" class="form-control" name="dia" id="dia" placeholder="กรอกความดันค่าล่าง" value="<?php echo"$dia";?>" disabled>
                </div>
                <div class="col-sm-4 col-12">
                    <label>อัตราการเต้นของหัวใจ :</label>
                    <input type="text" class="form-control" name="heart" id="heart" placeholder="กรอกอัตราการเต้นของหัวใจ" value="<?php echo"$heart";?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-12">
                    <label>โรคประจำตัว (ถ้ามี) :</label>
                    <textarea class="form-control" name="dise" id="dise" rows="3" placeholder="กรอกโรคประจำตัว (ถ้ามี)" disabled><?php echo"$dise";?></textarea>
                </div>
                <div class="col-sm-12 col-12">
                    <label>รูปโปรไฟล์ :</label>
                    <?php if($pic_user!=""){ ?>
                        <center>
                            <input type="checkbox" name="del" id="del" value="1">&nbsp;ลบ&nbsp;&nbsp;&nbsp;
                            <?php echo "<img src='../admin/user/$pic_user' class='rounded-pill img-fluid' width='250'>"; ?>
                        </center>
                    <?php }else if($pic_user==""){ ?>
                        <center><h4><b>ไม่มีรูปโปรไฟล์</b></h4></center>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</form>