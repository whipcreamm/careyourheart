<?php
    session_start();
    include "config.inc.php";
    $sql="select distinct(id_pack) from tb_package";
    $result=mysqli_query($conn,$sql);
    if($_SESSION["pic_user"]==""){
        $_SESSION["pic_user"]="user.png";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Your Heart</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script>
        function cal_num(){
            var disc=parseInt(document.form1.disc.value);
            var pay=parseInt(document.form1.pay.value);
            var cost=parseInt(document.form1.cost.value);
            var type_cost=document.form1.type_cost.value;
            var total;
            var discount;
            discount=(pay+cost)*disc/100;
            if(type_cost=="1"){
                total=(pay+cost+500)-discount;
            }else{
                total=(pay+cost+0)-discount;
            }
            document.form1.total.value=total;
            document.form1.discount.value=discount;
        }
        function showHideTable(type,num){
            console.log("num :" + num);
            document.getElementById(num).style.display=type;
        }
    </script>
    <script language="javascript">
        function resizeText(multiplier) {
            multiplyText(50, document.getElementById('myContent'));    
        }
        function multiplyText(multiplier, txtobj) {
            if (txtobj.style.fontSize == '') {
                txtobj.style.fontSize = "100%";
            }
            if (multiplier == 0) {
                txtobj.style.fontSize = "100%";
            } 
            else { 
            txtobj.style.fontSize = parseFloat(txtobj.style.fontSize) - multiplier + "%";
            }
        }
        function resizeText2(multiplier) {
            multiplyText2(50, document.getElementById('myContent'));    
        }
        function multiplyText2(multiplier, txtobj) {
            if (txtobj.style.fontSize == '') {
                txtobj.style.fontSize = "100%";
            }
            if (multiplier == 0) {
                txtobj.style.fontSize = "100%";
            } 
            else { 
            txtobj.style.fontSize = parseFloat(txtobj.style.fontSize) + multiplier + "%";
            }
        }
    </script>
</head>
<style>
    .navbar{
        background: linear-gradient(90deg, #096c72, #1f86a0, #20bde4);
        font-size: 20px;
    }
    .footer{
        background: linear-gradient(90deg, #096c72, #1f86a0, #20bde4);
        font-size: 20px;
        color: #fff;
        padding-top: 70px;
        padding-bottom: 20px;
    }
    .footer ul li{
        list-style: none;
    }
    .body{
        font-size: 16px;
    }
    .bg-1{
        background: #ececec;
    }
    .f-block{
        transition: all 0.5s ease;
        text-align: center;
        min-height: 200px;
        padding: 15px;
    }
    .f-block:hover{
        background: #fff;
        border-radius: var(--border-radius-medium);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175);
    }
    .f-block:hover .f-block-img{
        transform: scale(0.75);
    }
    .f-block-img{
        display: block;
        margin: auto;
        transition: all 0.5s;
    }
    .f-block:hover .f-block-text{
        margin-top: 0px;
    }
    .f-block-text{
        font-size: 20px;
        margin-top: 0px;
        transition: all 0.5s;
    }
    .close{
        background: #fff;
        border: none;
        font-size: 30px;
        font-weight: bold;
        color: #000;
    }
</style>
<body id="myContent">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/lg.png" class="img-fluid" width="250">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link text-light" href="index.php">หน้าแรก</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="news.php">ข่าวสารสุขภาพ</a></li>
                    <?php if($_SESSION["valid_user"]==""){ ?>
                    <?php }else if($_SESSION["valid_user"]!=""){ ?>
                        <li class="nav-item"><a class="nav-link text-light" href="pack.php">แพ็คเกจสุขภาพ</a></li>
                    <?php } ?>
                    <li class="nav-item"><a class="nav-link text-light" href="#btn_add" data-bs-toggle="modal" data-bs-target="#btn_add">โทรฉุกเฉิน</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="us.php">เกี่ยวกับเรา</a></li>
                </ul>
                <div class="btn-group">
                    <button type="button" class="btn btn-light">Font</button>
                    <a class="btn btn-outline-light" href="javascript:resizeText(10);">A -</a>
                    <a class="btn btn-outline-light" href="javascript:resizeText2(10);">A +</a>
                </div>&nbsp;&nbsp;&nbsp;
                <?php if($_SESSION["valid_user"]==""){ ?>
                    <a class="btn btn-lg btn-outline-light" style="border-radius:30px" href="regis.php">สมัครสมาชิก</a>&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-lg btn-light" style="border-radius:30px" href="login.php">เข้าสู่ระบบ</a>
                <?php }else if($_SESSION["valid_user"]!=""){ ?>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-link dropdown">
                            <a class="nav-link dropdown-toggle text-light" role="button" data-bs-toggle="dropdown">
                                <?php echo "<img src='admin/user/$_SESSION[pic_user]' class='rounded-pill img-fluid' width='50' height='50'>&nbsp;&nbsp;&nbsp;$_SESSION[name_user] $_SESSION[sname_user]"; ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="user_edit.php">แก้ไขข้อมูลส่วนตัว</a></li>
                                <li><a class="dropdown-item" href="logout.php" onclick="return confirm('ท่านต้องการออกจากระบบใช่หรือไม่?')">ออกจากระบบ</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>
</body>
</html>