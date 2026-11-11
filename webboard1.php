<div class="modal fade" id="btn_add1" tabindex="-1" aria-labelledby="addnewLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:30px">
            <div class="modal-header">
                <div class="modal-title" id="addnewLabel">โพสต์ของคุณ</div>
                <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="form1" method="post" action="webboard2.php"  enctype="multipart/form-data">
                    <textarea class="form-control" name="detail_ques" id="detail_ques" rows="3" placeholder="พิมพ์อะไรสักหน่อย..." required></textarea><br/>
                    <input type="file" class="form-control" name="pic_ques" id="pic_ques">
                    <font color="green">[อัปโหลดรูปภาพ]</font><br/><br/>
                    <button type="submit" class="btn btn-lg btn-outline-success w-100" style="border-radius:30px">โพสต์<input type="hidden" name="type_ques" id="type_ques" value="<?php echo "$type_ques"; ?>"></button>
                </form>
            </div>
        </div>
    </div>
</div>