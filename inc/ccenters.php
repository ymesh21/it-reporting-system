<!-- View Ccenter -->
<div class="modal fade" id="viewCCModal<?= $fetch['ccid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">የሁለገብ ማሕበረሰብ ማዕከል ዝርዝር መረጃ</h3>
            </div>
            <div class="modal-body">
                <p>ወረዳ: <?= $fetch['w_name']; ?></p>
                <p>የማዕከለኡ መጠሪያ ስም: <?= $fetch['name'] ?></span></p>
                <p>ያለበት አካባቢ: <?php echo $fetch['area']; ?></p>
                <p>ደረጃ: <?php echo $fetch['level']; ?></p>
                <p>የተቋቋመትበት ዓመት: <?php echo $fetch['organizedyear']; ?> ዓ.ም</p>
                <p>ያቋቋመው አካል: <?php echo $fetch['organizedby']; ?></p>
                <p>አሁን ያለበት ሁኔታ: <?php echo $fetch['status']; ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#editCCModal<?= $fetch['ccid'] ?>"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteCCModal<?= $fetch['ccid'] ?>"><span class="fa fa-trash"></span></button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span>
                    ዝጋ</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Ccenter modal -->
<div class="modal fade" id="editCCModal<?= $fetch['ccid'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">የሁለገብ ማሕበረሰብ ማዕከል መረጃ አሻሽል</h3>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">መጠሪያ ስም</span>
                        </div>
                        <input type="text" name="name" class="form-control" value="<?= $fetch['name']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">አካባቢ</span>
                        <select name="area" class="form-select">
                            <option value="" selected disabled>ያለበት አካባቢ</option>
                            <option value="ከተማ" <?php if($fetch['area'] == "ከተማ"){echo 'selected';}?>>ከተማ</option>
                            <option value="ገጠር" <?php if($fetch['area'] == "ገጠር"){echo 'selected';}?>>ገጠር</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">ደረጃ</span>
                        <select name="level" class="form-select">
                            <option value="" selected disabled>የማዕከሉ ደረጃ</option>
                            <option value="ትልቅ" <?php if($fetch['level'] == "ትልቅ"){echo 'selected';}?>>ትልቅ</option>
                            <option value="መካከለኛ" <?php if($fetch['level'] == "መካከለኛ"){echo 'selected';}?>>መካከለኛ</option>
                            <option value="ትንሽ" <?php if($fetch['level'] == "ትንሽ"){echo 'selected';}?>>ትንሽ</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">የተቋቋመበት ዓመት</span>
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        <?php
                        $years = 2000;
                        $yeare = date('Y') - 8;
                        ?>
                        <select name="organizedyear" class="form-select">
                            <option value="" selected disabled>የተቋቋመበት ዓመት</option>
                            <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                <option value="<?= $ys; ?>" <?php if($fetch['organizedyear'] == $ys){echo 'selected';}?>><?= $ys; ?> ዓ.ም</option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">ያቋቋመው አካል</span>
                        <input type="text" name="organizedby" class="form-control" placeholder="ያቋቋመው አካል" value="<?= $fetch['organizedby']?>">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text me-3">ያለበት ሁኔታ</span>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="status" id="active" value="የሚሰራ" <?php if($fetch['status'] == "የሚሰራ"){echo 'checked';}?>>
                            <label class="form-check-label" for="active">የሚሰራ</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="status" id="closed" value="የተዘጋ" <?php if($fetch['status'] == "የተዘጋ"){echo 'checked';}?>>
                            <label class="form-check-label" for="closed">የተዘጋ</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="status" id="inactive" value="ስራ ያልጀመረ" <?php if($fetch['status'] == "ስራ ያልጀመረ"){echo 'checked';}?>>
                            <label class="form-check-label" for="inactive">ስራ ያልጀመረ</label>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['ccid'] ?>">
                    <button name="update_ccenter" class="btn btn-primary"><span class="fa fa-check"></span>
                        አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times-circle"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Ccenter -->
<div class="modal fade" id="deleteCCModal<?= $fetch['ccid'] ?>" aria-hidden="true">
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
                    <input type="hidden" name="id" value="<?= $fetch['ccid'] ?>">
                    <button type="submit" name="delete_ccenter" class="btn btn-danger"><span class="fa fa-check"></span>
                        Yes</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span>
                        No</button>
                </div>
        </div>
        </form>
    </div>
</div>