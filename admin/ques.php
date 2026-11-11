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
        $sql="select * from tb_question order by id_ques desc";
    }else{
        $sql="select * from tb_question where type_ques_n='$type' order by id_ques desc";
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
            <center><h2><b>จัดการแบบประเมิน</b></h2></center><br>
            <a class="btn btn_add btn-primary">เพิ่มแบบประเมินใหม่</a>
            <form action="ques.php" name="form1" method="post">
                <div class="input-group">
                    <span class="input-group-text">ค้นหา</span>
                    <select class="form-control form-select" name="type" id="type">
                        <option value="">==เลือกประเภทแบบประเมิน==</option>
                        <option value="1">แบบประเมินเกี่ยวกับการใช้งานเว็บไซต์</option>
                        <option value="2">แบบประเมินเกี่ยวกับการให้บริการของแพทย์</option>
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
                    <th>คำถาม</th>
                    <th>ประเภทแบบประเมิน</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_ques=$read["id_ques"];
                        $question=$read["question"];
                        $type_ques_n=$read["type_ques_n"];
                        if($type_ques_n==1){
                            $type_ques_n="แบบประเมินเกี่ยวกับการใช้งานเว็บไซต์";
                        }else{
                            $type_ques_n="แบบประเมินเกี่ยวกับการให้บริการของแพทย์";
                        }
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td align="left"><?php echo"$question";?></td>
                    <td><?php echo"$type_ques_n";?></td>
                    <td><?php echo"<a class='btn btn_edit btn-warning' id_ques='$id_ques'>แก้ไข</a>";?></td>
                    <td><?php echo"<a href='ques_del.php?id_ques=$id_ques' onclick=\"return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่?')\" class='btn btn-danger'>ลบ</a>";?></td>
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
                url:"ques_add.php",
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
                url:"ques_edit.php",
                data:"id_ques="+$(this).attr("id_ques"),
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