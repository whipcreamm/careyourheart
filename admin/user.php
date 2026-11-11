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
        $sql="select * from tb_user order by id_user desc";
    }else{
        $sql="select * from tb_user where name_user like '%$name%' order by id_user desc";
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
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card p-4 bg-warning text-light">
                        <div class="card-body">
                            <center><h4>
                                <?php $num1=sumperson(1); ?> จำนวนผู้ใช้ <br>
                                <h2><b><?php echo"$num1";?> คน</b></h2>
                            </h4></center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card p-4 bg-danger text-light">
                        <div class="card-body">
                            <center><h4>
                                <?php $num2=sumperson(2); ?> จำนวนแอดมิน/แพทย์ <br>
                                <h2><b><?php echo"$num2";?> คน</b></h2>
                            </h4></center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card p-4 bg-success text-light">
                        <div class="card-body">
                            <center><h4>
                                <?php $num3=sumperson(3); ?> สังคมออนไลน์ <br>
                                <h2><b><?php echo"$num3";?> รายการ</b></h2>
                            </h4></center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card p-4 bg-primary text-light">
                        <div class="card-body">
                            <center><h4>
                                <?php $num4=sumperson(4); ?> จำนวนแพ็คเกจ <br>
                                <h2><b><?php echo"$num4";?> รายการ</b></h2>
                            </h4></center>
                        </div>
                    </div>
                </div>
            </div><br>
            <center><h2><b>จัดการข้อมูลผู้ใช้</b></h2></center><br>
            <a class="btn btn_add btn-primary">เพิ่มข้อมูลผู้ใช้ใหม่</a>
            <form action="user.php" name="form1" method="post">
                <div class="input-group">
                    <span class="input-group-text">ค้นหา</span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="ค้นหา ผู้ใช้">
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
                    <th>อายุ</th>
                    <th>สถานะ</th>
                    <th>แพ็คเกจ</th>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_user=$read["id_user"];
                        $id_pack=$read["id_pack"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $status_mem=$read["status_mem"];
                        $pic_user=$read["pic_user"];
                        $born=$read["born"];
                        $born=getage($born);
                        $sql1="select * from tb_package where id_pack='$id_pack'";
                        $result1=mysqli_query($conn,$sql1);
                        $read1=mysqli_fetch_assoc($result1);
                        $name_pack=$read1["name_pack"];
                        if($pic_user==""){
                            $pic_user="user.png";
                        }
                        if($status_mem==7){
                            $show="<font color='red'><b>พบแพทย์</b></font>";
                        }else if($status_mem==6){
                            $show="<font color='orange'><b>อัตราความดันสูง<br/>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
                        }else if($status_mem==5){
                            $show="<font color='orange'><b>อัตราความดันสูง<br/>อัตราการเต้นของหัวใจปกติ</b></font>";
                        }else if($status_mem==4){
                            $show="<font color='orange'><b>อัตราความดันเริ่มสูง<br/>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
                        }else if($status_mem==3){
                            $show="<font color='orange'><b>อัตราความดันเริ่มสูง<br/>อัตราการเต้นของหัวใจปกติ</b></font>";
                        }else if($status_mem==2){
                            $show="<font color='orange'><b>อัตราความดันปกติ<br/>อัตราการเต้นของหัวใจผิดปกติ</b></font>";
                        }else{
                            $show="<font color='green'><b>สุขภาพร่างกายดี</b></font>";
                        }
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td><?php echo"<img src='user/$pic_user' class='rounded-pill' width='100' height='100'><br>$name_user $sname_user";?></td>
                    <td><?php echo"$born";?> ปี</td>
                    <td><?php echo"$show";?></td>
                    <td><?php echo"$name_pack";?></td>
                    <td><?php echo"<a class='btn btn_edit btn-warning' id_user='$id_user'>แก้ไข</a>";?></td>
                    <td><?php echo"<a href='user_del.php?id_user=$id_user&pic_user=$pic_user' onclick=\"return confirm('ท่านต้องการลบข้อมูลใช่หรือไม่?')\" class='btn btn-danger'>ลบ</a>";?></td>
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
                url:"user_add.php",
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
                url:"user_edit.php",
                data:"id_user="+$(this).attr("id_user"),
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