<div class="modal fade" id="btn_add1" tabindex="-1" aria-labelledby="addnewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:30px">
            <div class="modal-header">
                <div class="modal-title" id="addnewLabel">แบบบันทึกสุขภาพประจำวัน</div>
                <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="form1" method="post" action="health3.php">
                    <div class="row">
                        <div class="col-sm-6 col-12 py-1">
                            <label>ความดันค่าบน :</label>
                            <input type="text" class="form-control" name="sys" id="sys" placeholder="ระบุความดันค่าบน" required>
                        </div>
                        <div class="col-sm-6 col-12 py-1">
                            <label>ความดันค่าล่าง :</label>
                            <input type="text" class="form-control" name="dia" id="dia" placeholder="ระบุความดันค่าล่าง" required>
                        </div>
                        <div class="col-sm-6 col-12 py-1">
                            <label>อัตราการเต้นของหัวใจ :</label>
                            <input type="text" class="form-control" name="heart" id="heart" placeholder="ระบุอัตราการเต้นของหัวใจ" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-12 py-1">
                            <label>อาการเพิ่มเติม (ถ้ามี) :</label>
                            <textarea class="form-control" name="detail" id="detail" rows="3" placeholder="ระบุอาการเพิ่มเติม (ถ้ามี)"></textarea>
                        </div>
                    </div><br/>
                    <button type="submit" class="btn btn-lg btn-outline-success w-100" style="border-radius:30px">บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</div>