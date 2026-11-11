<?php
    include "head.php";
?>
<div class="bg-1"><br/><br/><br/><br/><br/>
    <div class="container">
        <center><h2><b>aaaaa</b></h2></center><hr><br/>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>


<div class="card" style="border-radius:30px">
                <div class="card-body"></div>
            </div>



            <center>
                <button type="submit" class="btn btn-lg btn-success" style="border-radius:30px">สมัครสมาชิก</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-lg btn-danger" style="border-radius:30px">ยกเลิก</button>
            </center>



<?php
    if($result1){
        echo "<center><h2><font color='green'><b>สมัครสมาชิกสำเร็จ</b></font></h2></center>";
        echo "<meta http-equiv='refresh' content='2;url=check_user.php'>";
    }else{
        echo "<center><h2><font color='red'><b>สมัครสมาชิกไม่สำเร็จ</b></font></h2></center>";
        echo "<meta http-equiv='refresh' content='2;url=regis.php'>";
    }
?>



<?php
    session_start();
    include "config.inc.php";
?>

