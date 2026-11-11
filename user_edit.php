<?php
    include "head.php";
    $sql="select * from tb_user where id_user='$_SESSION[valid_user]'";
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
<div class="bg-1"><br/><br/><br/><br/><br/>
    <div class="container">
        <form name="form1" method="post" action="user_edit2.php" enctype="multipart/form-data">
            <div class="card" style="border-radius:30px">
                <div class="card-header">
                    <center><h2><b>แก้ไขข้อมูลส่วนตัว</b></h2></center>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 col-12">
                            <label>ชื่อ :</label>
                            <input type="text" class="form-control" name="name_user" id="name_user" placeholder="กรอกชื่อ" value="<?php echo "$name_user"; ?>" required>
                        </div>
                        <div class="col-sm-3 col-12">
                            <label>นามสกุล :</label>
                            <input type="text" class="form-control" name="sname_user" id="sname_user" placeholder="กรอกนามสกุล" value="<?php echo "$sname_user"; ?>" required>
                        </div>
                        <div class="col-sm-3 col-12">
                            <label>Username (ชื่อผู้ใช้) :</label>
                            <input type="text" class="form-control" name="user" id="user" placeholder="กรอก Username (ชื่อผู้ใช้)" value="<?php echo "$user"; ?>" required>
                        </div>
                        <div class="col-sm-3 col-12">
                            <label>Password (รหัสผ่าน) :</label>
                            <input type="text" class="form-control" name="pass" id="pass" placeholder="กรอก Password (รหัสผ่าน)" value="<?php echo "$pass"; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-12">
                            <label>วันเกิด (ปี ค.ศ.) :</label>
                            <input type="date" class="form-control" name="born" id="born" value="<?php echo "$born"; ?>" required>
                        </div>
                        <div class="col-sm-4 col-12">
                            <label>เพศ :</label>
                            <select class="form-select" name="sex" id="sex">
                                <option value="">==เลือกเพศ==</option>
                                <option value="1" <?php if($sex==1){ echo "selected"; } ?>>ชาย</option>
                                <option value="2" <?php if($sex==2){ echo "selected"; } ?>>หญิง</option>
                            </select>
                        </div>
                        <div class="col-sm-4 col-12">
                            <label>เบอร์โทรติดต่อ :</label>
                            <input type="text" class="form-control" name="tel" id="tel" placeholder="กรอกเบอร์โทรติดต่อ" value="<?php echo "$tel"; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <label>ที่อยู่ปัจจุบัน :</label>
                            <textarea class="form-control" name="addr" id="addr" rows="3" placeholder="กรอกที่อยู่ปัจจุบัน" required><?php echo "$addr"; ?></textarea>
                        </div>
                        <div class="col-sm-12 col-12">
                            <label>รูปโปรไฟล์ :</label>
                            <?php if($pic_user!=""){ ?>
                                <center>
                                    <input type="checkbox" name="del" id="del" value="1">&nbsp;ลบ&nbsp;&nbsp;&nbsp;
                                    <?php echo "<img src='admin/user/$pic_user' class='rounded-pill img-fluid' width='250'>"; ?>
                                </center>
                            <?php }else if($pic_user==""){ ?>
                                <input type="file" class="form-control" name="pic_new" id="pic_new">
                                <font color="red">[เฉพาะไฟล์ .jpg , .png และ .gif เท่านั้น!]</font>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div><br/>
            <div class="card" style="border-radius:30px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-12">
                            <label>ความดันค่าบน :</label>
                            <input type="text" class="form-control" name="sys" id="sys" placeholder="กรอกความดันค่าบน" value="<?php echo "$sys"; ?>" required>
                        </div>
                        <div class="col-sm-4 col-12">
                            <label>ความดันค่าล่าง :</label>
                            <input type="text" class="form-control" name="dia" id="dia" placeholder="กรอกความดันค่าล่าง" value="<?php echo "$dia"; ?>" required>
                        </div>
                        <div class="col-sm-4 col-12">
                            <label>อัตราการเต้นของหัวใจ :</label>
                            <input type="text" class="form-control" name="heart" id="heart" placeholder="กรอกอัตราการเต้นของหัวใจ" value="<?php echo "$heart"; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <label>โรคประจำตัว (ถ้ามี) :</label>
                            <textarea class="form-control" name="dise" id="dise" rows="3" placeholder="กรอกโรคประจำตัว (ถ้ามี)"><?php echo "$dise"; ?></textarea>
                        </div>
                    </div>
                </div>
            </div><br/>
            <center>
                <button type="submit" class="btn btn-lg btn-warning w-50" style="border-radius:30px">แก้ไขข้อมูล</button>
            </center>
        </form>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>