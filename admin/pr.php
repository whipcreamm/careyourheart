<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $type=$_POST["type"];
    if($type==""){
        $sql="select * from tb_pr order by id_pr desc";
    }else{
        $sql="select * from tb_pr where type_ques='$type' order by id_pr desc";
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
            <center><h2><b>จัดการป้ายโฆษณา</b></h2></center><br>
            <a class="btn btn_add btn-primary">เพิ่มป้ายโฆษณาใหม่</a>
            <form action="ques.php" name="form1" method="post">
                <div class="input-group">
                    <span class="input-group-text">ค้นหา</span>
                    <select class="form-control form-select" name="type" id="type">
                        <option value="">==เลือกประเภทป้ายโฆษณา==</option>
                        <option value="1">สุขภาพ</option>
                        <option value="2">เวชสำอาง</option>
                        <option value="3">ทั่วไป</option>
                        <option value="4">แบนเนอร์</option>
                    </select>
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
                    <th width="30%">ป้ายโฆษณา</th>
                    <th>ผู้ลงโฆษณา</th>
                    <th>ประเภท</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_pr=$read["id_pr"];
                        $name_pr=$read["name_pr"];
                        $pic_pr=$read["pic_pr"];
                        $type_ques=$read["type_ques"];
                        if($type_ques==1){
                            $type_ques="สุขภาพ";
                        }else if($type_ques==2){
                            $type_ques="เวชสำอาง";
                        }else if($type_ques==3){
                            $type_ques="ทั่วไป";
                        }else{
                            $type_ques="แบนเนอร์";
                        }
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td><?php echo"<img src='pr/$pic_pr' class='rounded' width='600'>";?></td>
                    <td><?php echo"$name_pr";?></td>
                    <td><?php echo"$type_ques";?></td>
                    <td><?php echo"<a class='btn btn_edit btn-warning' id_pr='$id_pr'>แก้ไข</a>";?></td>
                    <td><?php echo"<a href='pr_del.php?id_pr=$id_pr&pic_pr=$pic_pr' onclick=\"return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่?')\" class='btn btn-danger'>ลบ</a>";?></td>
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
                url:"pr_add.php",
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
                url:"pr_edit.php",
                data:"id_pr="+$(this).attr("id_pr"),
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