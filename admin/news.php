<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-equiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_news order by id_news desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <center><h2><b>จัดการข้อมูลข่าวสาร</b></h2></center><hr>
            <a class="btn btn_add btn-primary">เพิ่มข้อมูลข่าวสารใหม่</a>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>หัวข้อข่าว</th>
                    <th>วันที่อัปโหลด</th>
                    <th>คอมเมนต์</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_news=$read["id_news"];
                        $head_news=$read["head_news"];
                        $pic_news=$read["pic_news"];
                        $day_up=$read["day_up"];
                        $day_up=displaydate($day_up);
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td align="left"><?php echo"$head_news";?></td>
                    <td><?php echo"$day_up";?></td>
                    <td><?php echo"<a class='btn btn_com btn-primary' id_news='$id_news'>คอมเมนต์</a>";?></td>
                    <td><?php echo"<a class='btn btn_edit btn-warning' id_news='$id_news'>แก้ไข</a>";?></td>
                    <td><?php echo"<a href='news_del.php?id_news=$id_news&pic_news=$pic_news' onclick=\"return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่?')\" class='btn btn-danger'>ลบ</a>";?></td>
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
                url:"news_add.php",
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
                url:"news_edit.php",
                data:"id_news="+$(this).attr("id_news"),
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
        $(".btn_com").on('click',function(){
            $.ajax({
                url:"comment.php",
                data:"id_news="+$(this).attr("id_news"),
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