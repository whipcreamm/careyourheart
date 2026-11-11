<?php
    session_start();
    include "config.inc.php";
    include "head2.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_pr order by id_pr desc";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<div class="row">
    <div class="col-lg-2 col-sm-2 col-6 border-end bg-1">
        <?php include "navbar.php";?>
    </div>
    <div class="col-lg-10 col-sm-10 col-6">
        <div class="container"><br>
            <a class="btn btn-primary" href="repr2.php" target="_blank">พิมพ์รายงานผลรายได้</a><hr>
            <center><h2><b>รายงานผลรายได้จากป้ายโฆษณา</b></h2></center>
            <?php
                if($num==0){
                    echo"<font color='red'><center><h2>ไม่พบข้อมูล</h2></center></font>";
                }else{
                    echo"<font color='blue'><center><h2>จำนวนข้อมูล $num รายการ</h2></center></font>";
            ?><br>
            <table class="table table-holver table-striped">
                <tr align="center" class="bg-p text-light">
                    <th>ลำดับที่</th>
                    <th width="30%">ป้ายโฆษณา</th>
                    <th>ผู้ลงโฆษณา</th>
                    <th>ประเภท</th>
                    <th>รายได้</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_pr=$read["id_pr"];
                        $name_pr=$read["name_pr"];
                        $pic_pr=$read["pic_pr"];
                        $type_ques=$read["type_ques"];
                        $price_pr=$read["price_pr"];
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
                    <td><?php echo"".number_format($price_pr)." บาท/ปี";?></td>
                </tr>
                <?php
                    $i++;
                    $total+=$price_pr;
                    }
                ?>
                <tr align="center" class="bg-p text-light">
                    <th colspan="4">รวมรายได้จากป้ายโฆษณา</th>
                    <th><?php echo"".number_format($total)." บาท/ปี";?></th>
                </tr>
            </table>
            <?php } ?>
        </div>
    </div>
</div>
<?php include "footer.php";?>