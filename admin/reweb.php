<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_webques order by id_wques desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <a class="btn btn-primary" href="reweb2.php" target="_blank">พิมพ์รายงานผลข้อมูล</a><hr>
            <center><h2><b>รายงานผลสังคมออนไลน์</b></h2></center>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center" class="bg-p text-light">
                    <th>ลำดับที่</th>
                    <th>หัวข้อ</th>
                    <th>วันที่โพสต์</th>
                    <th>ยอด Like</th>
                    <th>คอมเมนต์</th>
                    <th>ยอดเข้าชม</th>
                    <th>ประเภท</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_wques=$read["id_wques"];
                        $detail_ques=$read["detail_ques"];
                        $day_ques=$read["day_ques"];
                        $day_ques=displaydate($day_ques);
                        $type_ques=$read["type_ques"];
                        if($type_ques==1){
                            $type_ques="สุขภาพ";
                        }else if($type_ques==2){
                            $type_ques="เวชสำอาง";
                        }else{
                            $type_ques="ทั่วไป";
                        }
                        $sql1="select * from tb_webanswer where id_wques='$id_wques'";
                        $result1=mysqli_query($conn,$sql1);
                        $num1=mysqli_num_rows($result1);
                        $sql2="select * from tb_like where id_wques='$id_wques' and status_like='y'";
                        $result2=mysqli_query($conn,$sql2);
                        $num2=mysqli_num_rows($result2);
                        $total=$num1+$num2;
                ?>
                <tr align="center">
                    <td><?php echo"$i";?></td>
                    <td align="left"><?php echo"$detail_ques";?></td>
                    <td><?php echo"$day_ques";?></td>
                    <td><?php echo"$num2";?> Like</td>
                    <td><?php echo"$num1";?> รายการ</td>
                    <td><?php echo"$total";?> ครั้ง</td>
                    <td><?php echo"$type_ques";?></td>
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