<?php
    include "head.php";
    include "function_sum.php";
    $id_friend=$_REQUEST["id_friend"];
    $name_user=$_REQUEST["name_user"];
    $sname_user=$_REQUEST["sname_user"];
    $pic_user=$_REQUEST["pic_user"];
    $type_ques=$_REQUEST["type_ques"];
    $sql2="select * from tb_chat_f where id_friend='$id_friend' order by id_chat";
    $result2=mysqli_query($conn,$sql2);
    $num2=mysqli_num_rows($result2);
?>
<div class="bg-1"><br/><br/><br/><br/><br/>
    <div class="container">
        <?php echo "<a href='online.php?type_ques=$type_ques' class='btn btn-lg btn-info' style='border-radius:30px'><< กลับไปยังหน้าฟีด</a><br/><br/>" ?>
        <div class="card" style="border-radius:30px">
            <div class="card-header">
                <center>
                    <h2>กำลังสนทนากับ : <?php echo "$name_user $name_user"; ?></h2>
                </center>
            </div>
            <div class="card-body">
                <?php
                    if($num2==0){
                        echo "<br/><br/><br/><br/><center><h2><font color='green'>เริ่มสนทนากับเพื่อนใหม่!!</font></h2></center><br/><br/><br/><br/><br/>";
                    }else{
                ?>
                <?php
                    while($read2=mysqli_fetch_assoc($result2)){
                        $detail_chat=$read2["detail_chat"];
                        $day_chat=$read2["day_chat"];
                        $day_chat=displaydate($day_chat);
                        $time_chat=$read2["time_chat"];
                        $id_user=$read2["id_user"];
                        if($id_user!=$_SESSION["valid_user"]){
                            $sql3="select * from tb_user where id_user='$id_user'";
                            $result3=mysqli_query($conn,$sql3);
                            $read3=mysqli_fetch_assoc($result3);
                            $name_user=$read3["name_user"];
                            $sname_user=$read3["sname_user"];
                            $pic_user=$read3["pic_user"];
                            if($pic_user==""){
                                $pic_user="user.png";
                            }
                        }
                ?>
                <?php if($id_user==$_SESSION["valid_user"]){ ?>
                    <div class="d-flex md-3 justify-content-end">
                        <div class="rounded-3 px-3 py-1 border" style="background-color:#ffe7e7">
                            <strong><?php echo "$_SESSION[name_user] $_SESSION[sname_user]"; ?></strong>
                            <small><?php echo "$day_chat $time_chat"; ?></small>
                            <h4><?php echo "$detail_chat"; ?></h4>
                        </div>&nbsp;&nbsp;&nbsp;
                        <?php echo "<img src='admin/user/$_SESSION[pic_user]' class='rounded-pill' width='50' height='50'>"; ?>
                    </div><br/>
                <?php }else if($id_user!=$_SESSION["valid_user"]){ ?>
                    <div class="d-flex md-3">
                        <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='50' height='50'>"; ?>&nbsp;&nbsp;&nbsp;
                        <div class="rounded-3 px-3 py-1 border" style="background-color:#e7fffc">
                            <strong><?php echo "$name_user $sname_user"; ?></strong>
                            <small><?php echo "$day_chat $time_chat"; ?></small>
                            <h4><?php echo "$detail_chat"; ?></h4>
                        </div>
                    </div><br/>
                <?php } ?>
                <?php
                    }
                ?>
                <?php
                    }
                ?>
                <form name="form1" method="post" action="friend_chat2.php">
                    <div class="input-group">
                        <textarea class="form-control" name="detail_chat" id="detail_chat" rows="1" placeholder="พิมพ์ข้อความ..." required></textarea>
                        <button type="submit" class="btn btn-lg btn-primary">ส่ง
                            <input type="hidden" name="id_friend" id="id_friend" value="<?php echo "$id_friend"; ?>">
                            <input type="hidden" name="name_user" id="name_user" value="<?php echo "$name_user"; ?>">
                            <input type="hidden" name="sname_user" id="sname_user" value="<?php echo "$sname_user"; ?>">
                            <input type="hidden" name="pic_user" id="pic_user" value="<?php echo "$pic_user"; ?>">
                            <input type="hidden" name="type_ques" id="type_ques" value="<?php echo "$type_ques"; ?>">
                        </button>
                    </div>
                </form>
            </div>
        </div><br/>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>