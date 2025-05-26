<!-- View website -->
<div class="modal fade" id="viewPModal<?= $fetch['pid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">ያጋጠመ ችግር ዝርዝር መረጃ</h3>
            </div>
            <div class="modal-body">
                <p>ወረዳ: <?= $fetch['w_name']; ?></p>
                <p>የሪፖርት ወቅት: <?= $fetch['year'] ?>, <span class="text-primary"><?= $fetch['month'] ?></span></p>
                <p>የችግሩ ርዕሰ ጉዳይ: <?php echo $fetch['subject']; ?></p>
                <p>ዝርዝር መግለጫ: <?php echo $fetch['ptext']; ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#editPModal<?= $fetch['pid'] ?>"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletePModal<?= $fetch['pid'] ?>"><span class="fa fa-trash"></span></button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span>
                    ዝጋ</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit modal -->
<div class="modal fade" id="editPModal<?= $fetch['pid'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">የድረገፅ ዝርዝር መረጃ አሻሽል</h3>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ርዕሰ ጉዳይ</span>
                        </div>
                        <input type="text" name="subject" class="form-control" value="<?= $fetch['subject']; ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="ptext">ዝርዝር መግለጫ</label>
                        <textarea name="ptext" class="form-control" value="<?= $fetch['ptext'] ?>" placeholder="ዝርዝር መግለጫ"><?= $fetch['ptext']; ?></textarea>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['pid'] ?>">
                    <button name="update_problem" class="btn btn-primary"><span class="fa fa-check"></span>
                        አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times-circle"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deletePModal<?= $fetch['pid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">Delete Problem Record Information</h3>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">ይህን መረጃ በእርግጥ ማስወገድ ይፈልጋሉ?</h4>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['pid'] ?>">
                    <button type="submit" name="delete_problem" class="btn btn-danger"><span class="fa fa-check"></span>
                        Yes</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span>
                        No</button>
                </div>
        </div>
        </form>
    </div>
</div>