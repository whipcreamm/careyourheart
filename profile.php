<?php
    $sql="select * from tb_user where id_user='$_SESSION[valid_user]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_user=$read["name_user"];
    $sname_user=$read["sname_user"];
    $pic_user=$read["pic_user"];
    $born=$read["born"];
    $born=getage($born);
    $tel=$read["tel"];
    $addr=$read["addr"];
    $coin_user=$read["coin_user"];
    if($coin_user>0){
        $c="<font color='green'><b>$coin_user แต้ม</b></font>";
    }else{
        $c="<font color='red'><b>$coin_user แต้ม</b></font>";
    }
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
        $show="<font color='green'><b>ท่านมีสุขภาพร่างกายที่ดี</b></font>";
    }
?>
<div class="card" style="border-radius:20px">
    <div class="card-img-top"><?php echo "<img src='admin/user/$pic_user' class='rounded img-fluid w-100'>"; ?></div>
    <div class="card-body">
        <center><h4><b><?php echo "$name_user $sname_user"; ?></b></h4></center><hr>
        <table>
            <tr>
                <th>อายุ</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <th>:</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo "$born"; ?> ปี</td>
            </tr>
            <tr>
                <th>เบอร์โทร</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <th>:</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo "$tel"; ?></td>
            </tr>
            <tr>
                <th>ที่อยู่</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <th>:</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo "$addr"; ?></td>
            </tr>
            <tr>
                <th>อาการ</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <th>:</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo "$show"; ?></td>
            </tr>
            <tr>
                <th>แต้ม</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <th>:</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo "$c"; ?></td>
            </tr>
        </table>
    </div>
</div>