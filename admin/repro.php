<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_order,tb_user where tb_order.id_user=tb_user.id_user and status_order='y'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <a class="btn btn-primary" href="repro2.php" target="_blank">พิมพ์รายงานผลรายได้</a><hr>
            <center><h2><b>รายงานผลรายได้จากการขายสินค้า</b></h2></center>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center" class="bg-p text-light">
                    <th>เลขที่จัดส่ง</th>
                    <th>ชื่อ-สกุล (ผู้สั่งซื้อ)</th>
                    <th>วันที่สั่งซื้อ</th>
                    <th>เบอร์โทรติดต่อ</th>
                    <th>รายได้</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_order=$read["id_order"];
                        $id_user=$read["id_user"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $tel=$read["tel"];
                        $total_order=$read["total_order"];
                        $no_order=$read["no_order"];
                        $day_order=$read["day_order"];
                        $day_order=displaydate($day_order);
                ?>
                <tr align="center">
                    <td><?php echo"<a class='btn btn_pro' id_order='$id_order'>$no_order</a>";?></td>
                    <td align="left"><?php echo"$name_user $sname_user";?></td>
                    <td><?php echo"$day_order";?></td>
                    <td><?php echo substr($tel,0,3).'-'.substr($tel,3,7);?></td>
                    <td><?php echo"".number_format($total_order)." บาท";?></td>
                </tr>
                <?php
                    $i++;
                    $net+=$total_order;
                    }
                ?>
                <tr align="center" class="bg-p text-light">
                    <th colspan="4">รวมรายได้จากการขายสินค้า</th>
                    <th><?php echo"".number_format($net)." บาท";?></th>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>
<script>
    $(function(){
        $(".btn_pro").on('click',function(){
            $.ajax({
                url:"prodetail.php",
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