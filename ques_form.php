<?php
    include "head.php";
    $sql="select * from tb_question where type_ques_n='1'";
    $result=mysqli_query($conn,$sql);
?>
<div class="bg"><br/><br/><br/><br/><br/>
    <div class="container">
        <center><h2><b>แบบประเมินความพึงพอใจต่อการใช้งานเว็บไซต์</b></h2></center><hr><br/>
        <form name="form1" method="post" action="ques_form2.php">
            <table class="table table-hover table-striped">
                <tr class="h5" align="center">
                    <th>ลำดับที่</th>
                    <th>รายการ</th>
                    <th>มากที่สุด</th>
                    <th>มาก</th>
                    <th>ปานกลาง</th>
                    <th>น้อย</th>
                    <th>น้อยที่สุด</th>
                </tr>
                <?php
                    $i=1;
                    while($read=mysqli_fetch_assoc($result)){
                        $id_ques=$read["id_ques"];
                        $question=$read["question"];
                ?>
                <tr align="center">
                    <td><?php echo "$i"; ?></td>
                    <td align="left"><?php echo "$question"; ?><input type="hidden" name="id_ques[<?php echo "$i"; ?>]" value="<?php echo "$id_ques"; ?>"></td>
                    <td><?php echo "<input type='radio' class='form-check-input' name='answer[$i]' value='5'>"; ?></td>
                    <td><?php echo "<input type='radio' class='form-check-input' name='answer[$i]' value='4'>"; ?></td>
                    <td><?php echo "<input type='radio' class='form-check-input' name='answer[$i]' value='3'>"; ?></td>
                    <td><?php echo "<input type='radio' class='form-check-input' name='answer[$i]' value='2'>"; ?></td>
                    <td><?php echo "<input type='radio' class='form-check-input' name='answer[$i]' value='1'>"; ?></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </table>
            <p align="right"><button type="submit" class="btn btn-lg btn-success" style="border-radius:30px">ส่งแบบประเมิน</button></p>
            <input type="hidden" name="i" value="<?php echo "$i"; ?>">
        </form>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>