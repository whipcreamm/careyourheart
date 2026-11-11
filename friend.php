<?php
    $sql="select * from tb_friend where id_user='$_SESSION[valid_user]' or id_user2='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
?>
<?php
    if($num==0){

    }else{
?>
<div class="card" style="border-radius:20px">
    <div class="card-header">
        <h4><b>เพื่อนของฉัน</b></h4>
    </div>
    <div class="card-body">
        <table class="w-100">
            <?php
                $i=0;
                while($read=mysqli_fetch_assoc($result)){
                    $id_user=$read["id_user"];
                    $id_user2=$read["id_user2"];
                    $id_friend=$read["id_friend"];
                    if($id_user!=$_SESSION["valid_user"]){
                        $sql1="select * from tb_user where id_user='$id_user'";
                        $friend[$i]=$id_user;
                    }else if($id_user2!=$_SESSION["valid_user"]){
                        $sql1="select * from tb_user where id_user='$id_user2'";
                        $friend[$i]=$id_user2;
                    }
                    $result1=mysqli_query($conn,$sql1);
                    $read1=mysqli_fetch_assoc($result1);
                    $name_user=$read1["name_user"];
                    $sname_user=$read1["sname_user"];
                    $pic_user=$read1["pic_user"];
                    if($pic_user==""){
                        $pic_user="user.png";
                    }
                    $sql2="select * from tb_user where id_user='$id_user2'";
                    $result2=mysqli_query($conn,$sql2);
                    $read2=mysqli_fetch_assoc($result2);
                    $status_on=$read2["status_on"];
            ?>
            <tr>
                <th>
                    <?php echo "<a href='friend_chat.php?id_friend=$id_friend&name_user=$name_user&sname_user=$sname_user&pic_user=$pic_user&type_ques=$type_ques' class='btn btn-outline-light text-dark w-100'>"; ?>
                        <div class="d-flex md-3">
                            <?php echo "<img src='admin/user/$pic_user' class='rounded-pill' width='40' height='40'>"; ?>&nbsp;&nbsp;&nbsp;
                            <div class="py-2">
                                <strong><?php echo "$name_user $sname_user"; ?></strong>
                            </div>
                        </div>
                    <?php echo "</a>"; ?>
                </th>
                <td align="right">
                    <?php if($status_on=="y"){ ?>
                        <img src="img/on.png" class="img-fluid" width="10">
                    <?php } ?>
                </td>
            </tr>
            <?php
                $i++;
                }
            ?>
        </table>
    </div>
</div>
<br/>
<?php
    }
?>