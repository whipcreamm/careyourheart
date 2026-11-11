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
        $sql="select * from tb_user where id_pack='$_SESSION[id_pack]' and status_pack='y' order by id_user desc";
    }else{
        $sql="select * from tb_user where id_pack='$_SESSION[id_pack]' and status_pack='y' and name_user like '%$name%' order by id_user desc";
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
            <center><h2><b>จัดการ</b></h2></center><hr><br>
            <a class="btn btn_add btn-primary">เพิ่ม</a>
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
                    echo"<font color='blue'><center><h4>จำนวนข้อมูล $num รายการ</h4></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center">
                    <th>ลำดับที่</th>
                    <th>ชื่อ-สกุล</th>
                    <th>อายุ</th>
                    <th>สถานะ</th>
                    <th>ข้อมูลผู้ป่วย</th>
                    <th>ประวัติอาการ</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_user=$read["id_user"];
                        $id_pack=$read["id_pack"];
                        $name_user=$read["name_user"];
                        $sname_user=$read["sname_user"];
                        $status_mem=$read["status_mem"];
                        $status_mem=$read["status_mem"];
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
                            $show="<font color='green'><b>ผู้ป่วยมีสุขภาพร่างกายที่ดี</b></font>";
                        }
                        $pic_user=$read["pic_user"];
                        $born=$read["born"];
                        $born=getage($born);
                        if($pic_user==""){
                            $pic_user="user.png";
                        }
                        $sql1="select * from tb_his where id_user='$id_user' and status_his='n'";
                        $result1=mysqli_query($conn,$sql1);
                        $num1=mysqli_num_rows($result1);
                        $sql2="select * from tb_chat,tb_his where tb_chat.id_his=tb_his.id_his and tb_his.id_user='$id_user' and status_chat='n'";
                        $result2=mysqli_query($conn,$sql2);
                        $num2=mysqli_num_rows($result2);
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td><?php echo"<img src='../admin/user/$pic_user' class='rounded-pill' width='100' height='100'><br>$name_user $sname_user";?></td>
                    <td><?php echo"$born";?> ปี</td>
                    <td><?php echo"$show";?></td>
                    <td><?php echo"<a class='btn btn_edit btn-success' id_user='$id_user'>ดูข้อมูล</a>";?></td>
                    <td>
                        <?php echo"<a href='health.php?id_user=$id_user&name_user=$name_user&sname_user=$sname_user' class='btn btn-primary'>ประวัติอาการ</a>";?>
                        <?php if($num1>0){ echo "&nbsp;&nbsp;&nbsp;<div class='spinner-grow bg-danger'></div>
                        <audio autoplay='1' loop='loop'><source src='sound/Alarm04.wav' type='audio/wav'></audio>
                        "; } ?>
                        <?php if($num2>0){ echo "&nbsp;&nbsp;&nbsp;<div class='spinner-grow bg-success'></div>
                        <audio autoplay='1' loop='loop'><source src='sound/Alarm04.wav' type='audio/wav'></audio>
                        "; } ?>
                    </td>
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