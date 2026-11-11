<?php
    include "head.php";
    include "function_sum.php";
    $sql="select * from tb_order,tb_user where tb_order.id_user=tb_user.id_user and tb_user.id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="bg"><br/><br/><br/><br/><br/>
    <div class="container">
        <center><h2><b>ประวัติการสั่งซื้อสินค้า</b></h2></center><hr><br/>
        <?php
            if($num==0){
                echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
            }else{
        ?><br>
        <table class="table table-holver table-striped">
            <tr align="center">
                <th>ลำดับที่</th>
                <th>ชื่อสินค้า</th>
                <th>ราคาสินค้า</th>
                <th>ราคาสุทธิ</th>
                <th>สถานะการจัดส่ง</th>
                <th>อนุมัติคำสั่งซื้อ</th>
            </tr>
            <?php
                while($read=mysqli_fetch_assoc($result)){
                    $id_order=$read["id_order"];
                    $id_user=$read["id_user"];
                    $id_pro=$read["id_pro"];
                    $name_user=$read["name_user"];
                    $sname_user=$read["sname_user"];
                    $tel=$read["tel"];
                    $total_order=$read["total_order"];
                    $status_order=$read["status_order"];
                    if($status_order=="n"){
                        $so="<font color='red'><b>รอแอดมินอนุมัตื</b></font>";
                    }else{
                        $so="<font color='green'><b>กำลังจัดส่ง</b></font>";
                    }
                    $no_order=$read["no_order"];
                    if($status_order=="n"){
                        $no="<font color='red'><b>รอแอดมินอนุมัตื</b></font>";
                    }else{
                        $no="<font><b>$no_order</b></font>";
                    }
                    $sql1="select * from tb_product where id_pro='$id_pro'";
                    $result1=mysqli_query($conn,$sql1);
                    $read1=mysqli_fetch_assoc($result1);
                    $name_pro=$read1["name_pro"];
                    $price_pro=$read1["price_pro"];
            ?>
            <tr align="center">
                <td><?php echo"$no";?></td>
                <td><?php echo"$name_pro";?></td>
                <td><?php echo"".number_format($price_pro)." บาท";?></td>
                <td><?php echo"".number_format($total_order)." บาท";?></td>
                <td><?php echo"$so";?></td>
                <td><?php echo"<a class='btn btn-primary btn_order' id_order='$id_order'>ดูรายละเอียด</a>";?></td>
            </tr>
            <?php
                }
            ?>
        </table><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <?php } ?>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>
<script>
    $(function(){
        $(".btn_order").on('click',function(){
            $.ajax({
                url:"pro_his1.php",
                data:"id_order="+$(this).attr("id_order"),
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
    <div class="modal-dialog modal-lg" id="adm" role="document"></div>
</div>