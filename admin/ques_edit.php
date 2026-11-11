<?php
    session_start();
    include "config.inc.php";
    include "function_sum.php";
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $id_ques=$_POST["id_ques"];
    $sql="select * from tb_question where id_ques='$id_ques'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $question=$read["question"];
    $type_ques_n=$read["type_ques_n"];
?>
<form action="ques_edit2.php" name="form1" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <div class="modal-content">
        <div class="modal-header bg-p">
            &nbsp;<center><h2><b>แก้ไขแบบประเมิน</b></h2></center>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <label>คำถาม :</label>
                    <input type="text" class="form-control" name="question" id="question" placeholder="คำถาม" value="<?php echo"$question";?>" required>
                </div>
                <div class="col-sm-6 col-12">
                    <label>ประเภทแบบประเมิน :</label>
                    <select class="form-control form-select" name="type_ques_n" id="type_ques_n" required>
                        <option value="">==เลือกประเภทแบบประเมิน==</option>
                        <option value="1" <?php if($type_ques_n==1){echo"selected";} ?>>แบบประเมินเกี่ยวกับการใช้งานเว็บไซต์</option>
                        <option value="2" <?php if($type_ques_n==2){echo"selected";} ?>>แบบประเมินเกี่ยวกับการให้บริการของแพทย์</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-1">
            <center>
                <input type="hidden" name="id_ques" id="id_ques" value="<?php echo"$id_ques";?>">
                <button type="submit" class="btn btn-warning btn-lg" style="border-radius:30px">&nbsp;&nbsp;แก้ไข&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-danger btn-lg" style="border-radius:30px">&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;</button>
            </center>
        </div>
    </div>
</form>