<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $type_ques=$_REQUEST["type_ques"];
    if($type_ques==1){
        $tp="สุขภาพ";
    }else if($type_ques==2){
        $tp="เวชสำอาง";
    }else{
        $tp="ทั่วไป";
    }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-12 border-end bg-1">
            <?php include "navbar.php";?>
        </div>
        <div class="col-lg-8 col-sm-8 col-12">
            <br>
            <?php include "webboard.php"; ?>
        </div>
        <div class="col-lg-2 col-sm-2 col-12">
            <?php include "profile.php";?>
        </div>
    </div>
</div><br/><br/>
<?php
    include "footer.php";
?>