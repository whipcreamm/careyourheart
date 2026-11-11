<?php
    include "head.php";
    include "function_sum.php";
    $type_ques=$_REQUEST["type_ques"];
    if($type_ques==1){
        $tp="สุขภาพ";
    }else if($type_ques==2){
        $tp="เวชสำอาง";
    }else{
        $tp="ทั่วไป";
    }
?>
<div class="bg-1"><br/><br/><br/><br/><br/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-sm-2 col-12">
                <?php
                    include "profile.php";
                    include "banner1.php";
                    include "banner2.php";
                ?>
            </div>
            <div class="col-lg-8 col-sm-8 col-12">
                <?php include "webboard.php"; ?>
            </div>
            <div class="col-lg-2 col-sm-2 col-12">
                <?php
                    include "friend.php";
                    include "friend_add.php";
                ?>
            </div>
        </div>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>