<?php
    include "head.php";
    include "function_sum.php";
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
<div class="bg-1"><br/><br/><br/><br/><br/>
    <div class="container">
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center><h2><b><?php echo "$head_news"; ?></b></h2></center>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5 col-12"><?php echo "<a href='news_detail.php?id_news=$id_news'><img src='admin/news/$pic_news' class='rounded img-fluid w-100'></a>"; ?></div>
                    <div class="col-sm-7 col-12">
                        <div class="card-text"><b>อัปโหลดวันที่ : <?php echo "$day_up"; ?></b></div><br/>
                        <div class="card-text"><?php echo "$detail_news"; ?></div><br/><br/><br/><br/>
                        <div align="right"><span class="badge bg-primary">ยอดเข้าชม <?php echo "".number_format($count_news).""; ?> ครั้ง</span></div>
                    </div>
                </div>
            </div>
        </div><br/><br/>
        <h5><b>ความคิดเห็น จำนวน <?php echo "$num2"; ?> รายการ</b></h5>
        <form name="form1" method="post" action="news_detail2.php">
            <div class="input-group">
                <textarea class="form-control" name="comment" id="comment" rows="1" placeholder="แสดงความคิดเห็น..." required></textarea>
                <button type="submit" class="btn btn-lg btn-primary">ส่ง<input type="hidden" name="id_news" id="id_news" value="<?php echo "$id_news"; ?>"></button>
            </div>
        </form><br/>
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
            <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
            <div class="rounded-3 px-3 py-1 border" style="background-color:#fff">
                <strong><?php echo "$name_user $sname_user"; ?></strong>
                <small><?php echo "$day_com $time_com"; ?></small>
                <h4><?php echo "$comment"; ?></h4>
            </div>
        </div><br/>
        <?php
            }
        ?>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>


