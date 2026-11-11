<?php include "head.php";?>
<div class="row">
    <div class="col-lg-7 col-sm-12 col-12">
        <center>
            <img src="../img/lg1.png" class="img-fluid" width="900">
            <h2 class="display-6">ระบบจัดการเว็บไซต์ส่งเสริมสุขภาพผู้สูงอายุ</h2>
        </center>
    </div>
    <div class="col-lg-4 col-sm-12 col-12">
        <center>
            <h3><b>เข้าสู่ระบบ</b></h3><br>
            <form action="check_user.php" name="form1" method="post" class="p-4 md-5 border" style="border-radius:30px">
                <div class="form-floating mt-3">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                    <label class="floatinginput">Username</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label class="floatinginput">Password</label>
                </div><br>
                <button type="submit" class="btn btn-outline-primary btn-lg w-100" style="border-radius:30px">เข้าสู่ระบบ</button>
            </form>
        </center>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "footer.php";?>