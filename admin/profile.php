<?php
    if($_SESSION["valid_admin"]==""){
        echo"<meta http-eauiv='refresh' content='0;url=index.php'>";
        exit();
    }
    $sql="select * from tb_admin where id_ad='$_SESSION[valid_admin]'";
    $result=mysqli_query($conn,$sql);
    $read=mysqli_fetch_assoc($result);
    $name_ad=$read["name_ad"];
    $sname_ad=$read["sname_ad"];
    $pic_ad=$read["pic_ad"];
    $tel_ad=$read["tel_ad"];
?>
<div class="card" style="border-radius:20px">
    <div class="card-img-top"><?php echo "<img src='admin/$pic_ad' class='rounded img-fluid w-100'>"; ?></div>
    <div class="card-body">
        <center><h4><b><?php echo "$name_ad $sname_ad"; ?></b></h4></center><hr>
        <table>
            <tr>
                <th>เบอร์โทร</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <th>:</th>
                <td>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo substr($tel_ad,0,3).'-'.substr($tel_ad,3,7); ?></td>
            </tr>
        </table>
    </div>
</div>