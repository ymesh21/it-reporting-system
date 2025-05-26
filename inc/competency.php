<!-- View Ccenter -->
<div class="modal fade" id="viewCMPModal<?= $fetch['comp_id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">የሙያ ብቃት ፍቃድና ዕድሳት ዝርዝር መረጃ</h3>
            </div>
            <div class="modal-body">
                <p>ወረዳ: <?= $fetch['woredas.name']; ?></p>
                <p>የማዕከለኡ መጠሪያ ስም: <?= $fetch['name'] ?></span></p>
                <p>ያለበት አካባቢ: <?php echo $fetch['area']; ?></p>
                <p>ደረጃ: <?php echo $fetch['level']; ?></p>
                <p>የተቋቋመትበት ዓመት: <?php echo $fetch['organizedyear']; ?> ዓ.ም</p>
                <p>ያቋቋመው አካል: <?php echo $fetch['organizedby']; ?></p>
                <p>አሁን ያለበት ሁኔታ: <?php echo $fetch['status']; ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#editCMPModal<?= $fetch['ccid'] ?>"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteCMPModal<?= $fetch['ccid'] ?>"><span class="fa fa-trash"></span></button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span>
                    ዝጋ</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Ccenter modal -->
<div class="modal fade" id="editCMPModal<?= $fetch['comp_id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="card-header">
                    <h5 class="text-primary">የሙያ ብቃት ፍቃድና ዕድሳት መመዝገቢያ</h5>
                </div>
                <div class="card-body">

                    <input type="hidden" name="woreda" value="<?= $woreda; ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        <?php
                        $years = date('Y') - 9;
                        $yeare = $years + 9;
                        $months = date('F');
                        ?>
                        <select name="year" class="form-select">
                            <option value="" selected disabled>በጀት ዓመት</option>
                            <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                <option value="<?= $ys; ?>" <?php if($fetch['year'] == $ys){echo 'selected';}?>><?= $ys; ?> ዓ.ም</option>
                            <?php  } ?>
                        </select>
                        <select name="month" class="form-select" required>
                            <option value="" selected disabled>ወር</option>
                            <option value="ሐምሌ" <?php if($fetch['month'] == "ሐምሌ"){echo 'selected';}?>>ሐምሌ</option>
                            <option value="ነሃሴ" <?php if($fetch['month'] == "ነሃሴ"){echo 'selected';}?>>ነሃሴ</option>
                            <option value="መስከረም" <?php if($fetch['month'] == "መስከረም"){echo 'selected';}?>>መስከረም</option>
                            <option value="ጥቅምት" <?php if($fetch['month'] == "ጥቅምት"){echo 'selected';}?>>ጥቅምት</option>
                            <option value="ሕዳር" <?php if($fetch['month'] == "ሕዳር"){echo 'selected';}?>>ሕዳር</option>
                            <option value="ታሕሳስ" <?php if($fetch['month'] == "ታሕሳስ"){echo 'selected';}?>>ታህሳስ</option>
                            <option value="ጥር" <?php if($fetch['month'] == "ጥር"){echo 'selected';}?>>ጥር</option>
                            <option value="የካቲት" <?php if($fetch['month'] == "የካቲት"){echo 'selected';}?>>የካቲት</option>
                            <option value="መጋቢት" <?php if($fetch['month'] == "መጋቢት"){echo 'selected';}?>>መጋቢት</option>
                            <option value="ሚያዚያ" <?php if($fetch['month'] == "ሚያዚያ"){echo 'selected';}?>>ሚያዚያ</option>
                            <option value="ግንቦት" <?php if($fetch['month'] == "ግንቦት"){echo 'selected';}?>>ግንቦት</option>
                            <option value="ሰኔ" <?php if($fetch['month'] == "ሰኔ"){echo 'selected';}?>>ሰኔ</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">አዲስ የሙያ ብቃት</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="newCompetency" value="<?= $fetch['newCompetency'] ; ?>" placeholder="አዲስ የሙያ ብቃት">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">የሙያ ብቃት ዕድሳት</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="renewalCompetency" value="<?= $fetch['renewalCompetency'] ; ?>" placeholder="የሙያ ብቃት ዕድሳት">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">አዲስ ንግድ ፍቃድ</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="newTradeLicense" value="<?= $fetch['newTradeLicense'] ; ?>" placeholder="አዲስ ንግድ ፍቃድ">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">የንግድ ፍቃድ ዕድሳት</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="renewalTradeLicense" value="<?= $fetch['renewalTradeLicense'] ; ?>" placeholder="የንግድ ፍቃድ ዕድሳት">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">ከአዲስ ንግድ ፍቃድ የተገኘ ገንዘብ</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="newMoney" value="<?= $fetch['newMoney'] ; ?>" placeholder="ከአዲስ ንግድ ፍቃድ የተገኘ ገንዘብ">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">ከንግድ ዕድሳት የተገኝ ገንዘብ</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="renewalMoney" value="<?= $fetch['renewalMoney'] ; ?>" placeholder="ከንግድ ዕድሳት የተገኝ ገንዘብ">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button name="update_competency" class="btn btn-primary"><span class="fa fa-check"></span>አሻሽል</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Ccenter -->
<div class="modal fade" id="deleteCMPModal<?= $fetch['comp_id'] ?>" aria-hidden="true">
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
                    <input type="hidden" name="id" value="<?= $fetch['comp_id'] ?>">
                    <button type="submit" name="delete_competency" class="btn btn-danger"><span class="fa fa-check"></span>
                        Yes</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span>
                        No</button>
                </div>
        </div>
        </form>
    </div>
</div>