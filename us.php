<?php
    include "head.php";
?>
<div class="bg"><br/><br/><br/><br/><br/>
    <div class="container">
        <center><h2><b>เกี่ยวกับเรา</b></h2></center><hr><br/>
        <div class="row">
            <div class="col-lg-2 col-sm-2 col-12"></div>
            <div class="col-lg-8 col-sm-8 col-12">
                <div class="card" style="border-radius:30px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5 col-12 py-2"><br/><img src="img/lg1.png" class="img-fluid w-100"></div>
                            <div class="col-sm-7 col-12">
                                <center><h4><b>ติดต่อเรา</b></h4></center><hr>
                                <table>
                                    <tr>
                                        <th>E-mail</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>careyourheart000@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th>Facebook</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>Care Your Heart</td>
                                    </tr>
                                    <tr>
                                        <th>Line</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>@careyourheart</td>
                                    </tr>
                                    <tr>
                                        <th>Tel.</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <th>:</th>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>000-0000000</td>
                                    </tr>
                                </table>
                            </div>
                        </div><hr>
                        <center><h4><b>แนะนำแพ็คเกจ!!!</b></h4></center>
                        <p>แพ็คเกจใส่ใจสุขภาพ ท่านะได้รับบริการต่าง ๆ มากมาย เช่น ระบบบันทึกสุขภาพประจำวัน แต้มแลกซื้อสินค้าจากการบันทึกสุขภาพประจำวัน บริการปรึกษาปัญหาสุขภาพกับแพทย์โดยตรง รับใบนัดและการแจ้งเตือนเวลารับประทานยา
                            จากแพทย์ และส่วนลดจากค่าบริการทางการแพทย์ 10% !!
                        </p>
                        <?php if($_SESSION["valid_user"]==""){ ?>
                            <center><a href="regis.php" class="btn btn-outline-primary" style="border-radius:30px">สนใจสมัครสมาชิกเลย!!!</a></center>
                        <?php }else if($_SESSION["valid_user"]!=""){ ?>
                            <center><a href="regis.php" class="btn btn-outline-success" style="border-radius:30px">สนใจสั่งซื้อแพ็คเกจเลย!!!</a></center>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-2 col-12"></div>
        </div>
    </div><br/><br/>
</div>
<?php
    include "tel.php";
    include "footer.php";
?>
