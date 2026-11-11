<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    $id_pro=$_POST["id_pro"];
    $sql="select * from tb_product where id_pro='$id_pro'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $pic_pro=$read["pic_pro"];
    $name_pro=$read["name_pro"];
    $detail_pro=$read["detail_pro"];
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
?>
<form action="pro_detail2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content" style="border-radius:30px">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>รายละเอียดสินค้า</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-5 col-12"><?php echo "<img src='admin/product/$pic_pro' class='rounded img-fluid w-100'>"; ?></div>
                <div class="col-sm-7 col-12">
                    <table>
                        <tr>
                            <th>ชื่อสินค้า</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$name_pro"; ?></td>
                        </tr>
                        <tr>
                            <th>ประเภทสินค้า</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$tp"; ?></td>
                        </tr>
                        <tr>
                            <th>ราคา</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "".number_format($price_pro)." บาท"; ?></td>
                        </tr>
                        <tr>
                            <th>สินค้าเหลือ</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <th>:</th>
                            <td>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo "$np"; ?></td>
                        </tr>
                    </table><br/>
                    <b>รายละเอียดสินค้า :</b><br/>
                    <?php echo "$detail_pro"; ?><br/><br/><br/><br/>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                            <div class="card" style="border-radius:10px">
                                <center><img src="img/coin.png" class="img-fluid" width="20">&nbsp;&nbsp;แลก <?php echo "$coin"; ?> แต้ม</center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>