<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_news=$_REQUEST["id_news"];
    $sql="select * from tb_news where id_news='$id_news'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $head_news=$read["head_news"];
    $detail_news=$read["detail_news"];
    $pic_news=$read["pic_news"];
    $day_up=$read["day_up"];
    $day_up=displaydate($day_up);
    $count_news=$read["count_news"];
    $count_news++;
    $sql1="update tb_news set count_news='$count_news' where id_news='$id_news'";
    $result1=mysqli_query($conn,$sql1);
    $sql2="select * from tb_comment,tb_user where tb_comment.id_user=tb_user.id_user and tb_comment.id_news='$id_news' order by id_com desc";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
?>
<div class="modal-content">
    <div class="modal-header bg-p">
        &nbsp;<center><h2><b><?php echo"$head_news";?></b></h2></center>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <div class="container">
            <div class="col-sm-12">
                <b><?php echo "$day_up"; ?></b>&nbsp;&nbsp;&nbsp;<span class="badge bg-primary">ยอดเข้าชม <?php echo "".number_format($count_news).""; ?> ครั้ง</span>
            </div><br>
            <div class="card" style="border-radius:30px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <center>
                                <?php echo "<a href='news_detail.php?id_news=$id_news'><img src='news/$pic_news' class='rounded img-fluid' width='60%'></a>"; ?></div>
                            </center><br>
                            <div class="card-text"><h3><b><?php echo "$head_news"; ?></b></h3></div>
                            <div class="card-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "$detail_news"; ?></div><br/>
                        </div>
                    </div>
                </div>
            </div><br/>
            <h5><b>ความคิดเห็น จำนวน <?php echo "$num2"; ?> รายการ</b></h5><hr>
            <?php
                while($read2=mysqli_fetch_assoc($result2)){
                    $comment=$read2["comment"];
                    $day_com=$read2["day_com"];
                    $day_com=displaydate($day_com);
                    $time_com=$read2["time_com"];
                    $id_user=$read2["id_user"];
                    $name_user=$read2["name_user"];
                    $sname_user=$read2["sname_user"];
                    $pic_user=$read2["pic_user"];
                    if($pic_user==""){
                        $pic_user="user.png";
                    }
            ?>
            <div class="d-flex md-3">
                <?php echo "<img src='user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                <div class="rounded-3 px-3 py-1 border" style="background-color:#fff">
                    <strong><?php echo "$name_user $sname_user"; ?></strong>
                    <small><?php echo "$day_com $time_com"; ?></small>
                    <h4><?php echo "$comment"; ?></h4>
                </div>
            </div><br/>
            <?php
                }
            ?>
        </div>
    </div>
</div>