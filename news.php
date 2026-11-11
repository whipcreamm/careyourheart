<?php
    include "head.php";
    include "function_sum.php";
    $sql="select * from tb_news order by id_news desc";
    $result=mysqli_query($conn,$sql);
?>
<div class="bg"><br/><br/><br/><br/><br/>
    <div class="container">
        <center><h2><b>ข่าวสารสุขภาพ</b></h2></center><hr><br/>
        <?php
            $chk=1;
            while($read=mysqli_fetch_assoc($result)){
                $id_news=$read["id_news"];
                $head_news=$read["head_news"];
                $pic_news=$read["pic_news"];
                $day_up=$read["day_up"];
                $day_up=displaydate($day_up);
                $count_news=$read["count_news"];
                if($chk%3==1){
                    echo "<div class='row'>";
                }
        ?>
        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card" style="border-radius:30px">
                <div calss="card-img-top"><?php echo "<a href='news_detail.php?id_news=$id_news'><img src='admin/news/$pic_news' class='rounded img-fluid w-100'></a>"; ?></div>
                <div class="card-body">
                    <div class="card-title"><h4><b><?php echo "$head_news"; ?></b></h4></div>
                    <div class="row">
                        <div class="col-sm-6"><?php echo "$day_up"; ?></div>
                        <div class="col-sm-6" align="right"><span class="badge bg-primary">ยอดเข้าชม <?php echo "".number_format($count_news).""; ?> ครั้ง</span></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if($chk%3==0){
                echo "</div><br/>";
            }
            $chk++;
            }
        ?>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>