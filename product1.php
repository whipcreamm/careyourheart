<?php
    include "head.php";
    $sql="select * from tb_product order by id_pro desc limit 0,4";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $sql1="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result1=mysqli_query($conn,$sql1);
    $read1=mysqli_fetch_assoc($result1);
    $coin_user=$read1["coin_user"];
    if($coin_user>0){
        $c="<font color='green'><b>$coin_user แต้ม</b></font>";
    }else{
        $c="<font color='red'><b>$coin_user แต้ม</b></font>";
    }
?>
<div class="bg">
    <div class="container">
        <center><h2><b>สินค้า</b></h2></center><hr><br/>
        <?php
            $chk=1;
            while($read=mysqli_fetch_assoc($result)){
                $id_pro=$read["id_pro"];
                $pic_pro=$read["pic_pro"];
                $name_pro=$read["name_pro"];
                $num_pro=$read["num_pro"];
                if($num_pro=="0"){
                    $np="<font color='red'><b>สินค้าหมด</b></font>";
                }else{
                    $np="<font><b>สินค้าเหลือ $num_pro ชิ้น</b></font>";
                }
                $price_pro=$read["price_pro"];
                $coin=$read["coin"];
                $type_ques=$read["type_ques"];
                if($type_ques==1){
                    $tp="สุขภาพ";
                }else if($type_ques==2){
                    $tp="เวชสำอาง";
                }else{
                    $tp="ทั่วไป";
                }
                if($chk%4==1){
                    echo "<div class='row'>";
                }
        ?>
        <?php if($_SESSION["valid_user"]=="" or $num_pro=="0"){ ?>
            <div class="col-lg-3 col-sm-3 col-12">
                <?php echo "<a class='btn_pro' id_pro='$id_pro' style='text-decoration:none;color:#000'>"; ?>
                    <div class="card" style="border-radius:30px">
                        <div calss="card-img-top"><?php echo "<img src='admin/product/$pic_pro' class='rounded img-fluid w-100'>"; ?></div>
                        <div class="card-body">
                            <div class="card-title"><h4><b><?php echo "$name_pro"; ?></b></h4></div>
                            <div class="card-text"><?php echo "$np"; ?></div>
                            <div><span class="badge bg-success">ราคา <?php echo "".number_format($price_pro).""; ?> บาท</span></div><br/>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="card" style="border-radius:10px">
                                        <center><img src="img/coin.png" class="img-fluid" width="20">&nbsp;&nbsp;แลก <?php echo "$coin"; ?> แต้ม</center>
                                    </div>
                                </div>
                                <div class="col-sm-4"><span class="badge bg-info"><?php echo "$tp"; ?></span></div>
                            </div>
                        </div>
                    </div>
                <?php echo "</a>"; ?>
            </div>
        <?php }else if($_SESSION["valid_user"]!=""){ ?>
            <div class="col-lg-3 col-sm-3 col-12">
                <?php echo "<a class='btn_pro' id_pro='$id_pro' style='text-decoration:none;color:#000'>"; ?>
                    <div class="card" style="border-radius:30px">
                        <div calss="card-img-top"><?php echo "<img src='admin/product/$pic_pro' class='rounded img-fluid w-100'>"; ?></div>
                        <div class="card-body">
                            <div class="card-title"><h4><b><?php echo "$name_pro"; ?></b></h4></div>
                            <div class="card-text"><?php echo "$np"; ?></div>
                            <div><span class="badge bg-success">ราคา <?php echo "".number_format($price_pro).""; ?> บาท</span></div><br/>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="card" style="border-radius:10px">
                                        <center><img src="img/coin.png" class="img-fluid" width="20">&nbsp;&nbsp;แลก <?php echo "$coin"; ?> แต้ม</center>
                                    </div>
                                </div>
                                <div class="col-sm-4"><span class="badge bg-info"><?php echo "$tp"; ?></span></div>
                            </div><br/>
                            <?php echo "<a class='btn_pro1 btn btn-outline-primary w-100' style='border-radius:30px' id_pro='$id_pro'>สั่งซื้อสินค้า</a>"; ?>
                        </div>
                    </div>
                <?php echo "</a>"; ?>
            </div>
        <?php } ?>
        <?php
            if($chk%4==0){
                echo "</div><br/>";
            }
            $chk++;
            }
        ?>
    </div>
</div>
<script>
    $(function(){
        $(".btn_pro").on('click',function(){
            $.ajax({
                url:"pro_detail.php",
                data:"id_pro="+$(this).attr("id_pro"),
                type:"POST",
                success:function(result){
                    $('#adm').html('');
                    $('#adm').html(result);
                    $('#am').modal('show');
                },
                error:function(error){
                    alert(error.responsetext);
                }
            });
        });
    });
    $(function(){
        $(".btn_pro1").on('click',function(){
            $.ajax({
                url:"pro_detail1.php",
                data:"id_pro="+$(this).attr("id_pro"),
                type:"POST",
                success:function(result){
                    $('#adm').html('');
                    $('#adm').html(result);
                    $('#am').modal('show');
                },
                error:function(error){
                    alert(error.responsetext);
                }
            });
        });
    });
</script>
<div class="modal fade" id="am" role="dialog">
    <div class="modal-dialog modal-xl" id="adm" role="document"></div>
</div>