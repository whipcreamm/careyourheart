<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    include "head2.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $name=$_POST["name"];
    if($name==""){
        $sql="select * from tb_admin order by id_ad desc";
    }else{
        $sql="select * from tb_admin where name_ad like '%$name%' order by id_ad desc";
    }
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <center><h2><b>จัดการข้อมูลแอดมิน/แพทย์</b></h2></center><br>
            <a class="btn btn_add btn-primary">เพิ่มข้อมูลแอดมิน/แพทย์ใหม่</a>
            <form action="admin.php" name="form1" method="post">
                <div class="input-group">
                    <span class="input-group-text">ค้นหา</span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="ค้นหา แอดมิน/แพทย์">
                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                </div>
            </form><br>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-สกุล</th>
                    <th>แพ็คเกจ</th>
                    <th>เบอร์โทรติดต่อ</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_ad=$read["id_ad"];
                        $id_pack=$read["id_pack"];
                        $name_ad=$read["name_ad"];
                        $sname_ad=$read["sname_ad"];
                        $pic_ad=$read["pic_ad"];
                        $tel_ad=$read["tel_ad"];
                        $type_ad=$read["type_ad"];
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];
                        if($pic_ad==""){
                            $pic_ad="admin.png";
                        }
                        if($type_ad==1){
                            $show="Admin";
                        }else{
                            $show="$name_pack";
                        }
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td><?php echo"<img src='admin/$pic_ad' class='rounded-pill' width='100' height='100'><br>$name_ad $sname_ad";?></td>
                    <td><?php echo"$show";?></td>
                    <td><font color="green"><b><?php echo substr($tel_ad,0,3).'-'.substr($tel_ad,3,7);?></b></font></td>
                    <td><?php echo"<a class='btn btn_edit btn-warning' id_ad='$id_ad'>แก้ไข</a>";?></td>
                    <td><?php echo"<a href='admin_del.php?id_ad=$id_ad&pic_ad=$pic_ad' onclick=\"return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่?')\" class='btn btn-danger'>ลบ</a>";?></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>
<script>
    $(function(){
        $(".btn_add").on('click',function(){
            $.ajax({
                url:"admin_add.php",
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
        $(".btn_edit").on('click',function(){
            $.ajax({
                url:"admin_edit.php",
                data:"id_ad="+$(this).attr("id_ad"),
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