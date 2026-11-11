<?php
    $sql="select * from tb_pr where type_ques='$type_ques' order by id_pr desc limit 0,3";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<?php
    if($num==0){

    }else{
?>
<br/>
<div class="card" style="border-radius:20px">
    <div class="carousel slide" id="dome1" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#dome1" data-bs-slide-to="1" class="active"></button>
            <button type="button" data-bs-target="#dome1" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#dome1" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <?php
                $i=1;
                while($read=mysqli_fetch_assoc($result)){
                    $pic_pr=$read["pic_pr"];
                    $name_pr=$read["name_pr"];
                    $detail_pr=$read["detail_pr"];
                    $tel_pr=$read["tel_pr"];
                    $url_pr=$read["url_pr"];
            ?>
            <div class="carousel-item <?php if($i==1){ echo "active"; } ?>">
                <div class="card-img-top">
                    <?php echo "<img src='admin/pr/$pic_pr' class='img-fluid d-block w-100'>"; ?>
                </div>
                <div class="card-body">
                    <div class="card-title"><h4><b><?php echo "$name_pr"; ?></b></h4></div>
                    <div class="card-text"><?php echo "$detail_pr"; ?></div>
                    <div class="card-text"><b>Tel.<?php echo "$tel_pr"; ?></b></div><br/>
                    <?php echo "<a href='$url_pr' target='_blank' class='btn btn-outline-primary w-100' style='border-radius:30px'>สนใจ คลิก!</a>"; ?>
                </div>
            </div>
            <?php
                $i++;
                }
            ?>
        </div>
        <button type="button" class="carousel-control-prev" data-bs-target="#dome1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button type="button" class="carousel-control-next" data-bs-target="#dome1" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>
<?php
    }
?>