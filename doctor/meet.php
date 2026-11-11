<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_meet,tb_user where tb_meet.id_user=tb_user.id_user and status_meet='n' order by id_meet desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <center><h2><b>รายละเอียดการนัด</b></h2></center><hr><br/>
            <?php
                if($num==0){
                    echo "<br/><br/><br/><center><h2><font color='red'>ยังไม่มีการนัดพบผู้ป่วยในแพ็คเกจ</font></h2></center><br/><br/><br/>
                    <br/><br/><br/><br/><br/><br/><br/>";
                }else{
            ?>
            <table class="table table-hover table-striped">
                <tr class="h5" align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่นัด</th>
                    <th>เวลานัด</th>
                    <th>สถานะการเข้าพบแพทย์</th>
                    <th>โทรแจ้งเตือน</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_meet=$read["id_meet"];
                        $day_meet=$read["day_meet"];
                        if($day_meet!=""){
                            $day_meet=displaydate($day_meet);
                        }
                        $time_meet=$read["time_meet"];
                        $detail_meet=$read["detail_meet"];
                        $status_meet=$read["status_meet"];
                        if($status_meet=="n"){
                            $status_meet="<font color='red'><b>ยังไม่ได้เข้าพบแพทย์</b></font>";
                        }
                        $type_cost=$read["type_cost"];
                        $total=$read["total"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $born=$read["born"];
                        $born=getage($born);
                        $tel=$read["tel"];
                        $addr=$read["addr"];
                ?>
                <tr align="center">
                    <td><?php echo "$i"; ?></td>
                    <td><?php echo "$name_user $sname_user"; ?></td>
                    <td><?php echo "$day_meet"; ?></td>
                    <td><?php echo "$time_meet"; ?></td>
                    <td><?php echo "<a class='btn_meet btn btn-primary' id_meet='$id_meet'>ยืนยันสถานะการเข้าพบแพทย์</a>"; ?></td>
                    <td><?php echo "<a href='tel:$tel' class='btn btn-warning'>โทรแจ้งเตือน</a>"; ?></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </table><br/><br/><br/><br/><br/><br/><br/><br/>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>

<script>
    $(function(){
        $(".btn_meet").on('click',function(){
            $.ajax({
                url:"meet_detail.php",
                data:"id_meet="+$(this).attr("id_meet"),
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