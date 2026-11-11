<?php
    $sql="select * from tb_webques,tb_user where tb_webques.id_user=tb_user.id_user and type_ques='$type_ques' order by id_wques desc";
    $result=mysqli_query($conn,$sql);
    $sql1="select * from tb_admin where type_ad='1'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $pic_ad=$read1["pic_ad"];
?>
<div class="bg-1">
    <div class="container">
        <center><h2><b><?php echo "$tp"; ?></b></h2></center><hr><br/>
        <div class="card" style="border-radius:30px">
            <a href="#btn_add1" data-bs-toggle="modal" data-bs-target="#btn_add1" class="btn btn-lg btn-outline-dark" style="border-radius:30px;text-align:left">คุณกำลังคิดอะไรอยู่?</a>
        </div><br/>
        <h5><b>โพสต์หน้าฟีด :</b></h5>
        <?php
            $no=0;
            while($read=mysqli_fetch_assoc($result)){
                $id_wques=$read["id_wques"];
                $detail_ques=$read["detail_ques"];
                $day_ques=$read["day_ques"];
                $day_ques=displaydate($day_ques);
                $time_ques=$read["time_ques"];
                $pic_ques=$read["pic_ques"];
                $type_ques=$read["type_ques"];
                $id_user=$read["id_user"];
                $name_user=$read["name_user"];
                $sname_user=$read["sname_user"];
                $pic_user=$read["pic_user"];
                if($pic_user==""){
                    $pic_user="user.png";
                }
                $sql4="select * from tb_like where id_wques='$id_wques' and id_user='$_SESSION[valid_user]'";
                $result4=mysqli_query($conn,$sql4);
                $read4=mysqli_fetch_assoc($result4);
                $status_like=$read4["status_like"];
                $sql5="select * from tb_like where id_wques='$id_wques' and status_like='y'";
                $result5=mysqli_query($conn,$sql5);
                $num5=mysqli_num_rows($result5);
        ?>
        <div class="col-lg-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex md-3">
                        <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                        <div class="rounded-3 px-3 py-1">
                            <strong><?php echo "$name_user $sname_user"; ?></strong>
                            <small><?php echo "$day_ques $time_ques"; ?></small>
                            <h4><?php echo "$detail_ques"; ?></h4><br/>
                            <?php
                                if($pic_ques!=""){
                                    echo "<img src='admin/ques/$pic_ques' class='rounded img-fluid' width='300'>";
                                }
                            ?>
                        </div>
                    </div>
                </div><br/>
                <div class="btn-group">
                    <?php
                        if($status_like=="n" or $status_like==""){
                            echo "<a class='btn btn-outline-dark w-25' href='webboard3.php?id_wques=$id_wques&type_ques=$type_ques&status_like=$status_like'>Like $num5</a>";
                        }
                        if($status_like=="y"){
                            echo "<a class='btn btn-dark w-25' href='webboard3.php?id_wques=$id_wques&type_ques=$type_ques&status_like=$status_like'>Like $num5</a>";
                        }
                    ?>
                    <button type="submit" class="btn btn-outline-dark w-50" onclick="showHideTable('block', <?php echo ''.$no.''; ?>)">Comment</button>
                    <button type="submit" class="btn btn-outline-dark w-25" onclick="showHideTable('none', <?php echo ''.$no.''; ?>)">Hide Comment</button>
                </div>
                <div class="container" id="<?php echo "".$no.""; ?>" style="display:none;" slice>
                    <?php
                        $sql2="select * from tb_webanswer where id_wques='$id_wques' order by id_wans";
                        $result2=mysqli_query($conn,$sql2);
                        $num2=mysqli_num_rows($result2);
                        while($read2=mysqli_fetch_assoc($result2)){
                            $detail_ans=$read2["detail_ans"];
                            $day_ans=$read2["day_ans"];
                            $day_ans=displaydate($day_ans);
                            $time_ans=$read2["time_ans"];
                            $type_ans=$read2["type_ans"];
                            $id_user=$read2["id_user"];
                            if($type_ans==1){
                                $sql3="select * from tb_user where id_user='$id_user'";
                                $result3=mysqli_query($conn,$sql3);
                                $read3=mysqli_fetch_assoc($result3);
                                $name_user=$read3["name_user"];
                                $sname_user=$read3["sname_user"];
                                $pic_user=$read3["pic_user"];
                                if($pic_user==""){
                                    $pic_user="user.png";
                                }
                            }
                    ?>
                    <?php if($type_ans==1){ ?><br/>
                        <div class="d-flex md-3">
                            <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                            <div class="rounded-3 px-3 py-1 border" style="background-color:#fff">
                                <strong><?php echo "$name_user $sname_user"; ?></strong>
                                <small><?php echo "$day_ans $time_ans"; ?></small>
                                <h4><?php echo "$detail_ans"; ?></h4>
                            </div>
                        </div>
                    <?php }else if($type_ans==2){ ?><br/>
                        <div class="d-flex md-3">
                            <?php echo "<img src='admin/admin/$pic_ad' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                            <div class="rounded-3 px-3 py-1 border" style="background-color:#e7f8ff">
                                <strong>Admin</strong>
                                <small><?php echo "$day_ans $time_ans"; ?></small>
                                <h4><?php echo "$detail_ans"; ?></h4>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                        }
                    ?>
                    <hr><h5><b>ความคิดเห็น จำนวน <?php echo "$num2"; ?> รายการ</b></h5>
                    <form name="form1" method="post" action="webans.php">
                        <div class="input-group">
                            <textarea class="form-control" name="detail_ans" id="detail_ans" rows="1" placeholder="แสดงความคิดเห็น..." required></textarea>
                            <button type="submit" class="btn btn-lg btn-primary">ส่ง
                                <input type="hidden" name="id_wques" id="id_wques" value="<?php echo "$id_wques"; ?>">
                                <input type="hidden" name="type_ques" id="type_ques" value="<?php echo "$type_ques"; ?>">
                            </button>
                        </div>
                    </form><br/>
                </div>
            </div>
        </div><br/><br/>
        <?php
            $no++;
            }
        ?>
    </div><br/><br/>
</div>
<?php
    include "webboard1.php";
?>