<!-- View website -->
<div class="modal fade" id="viewWebModal<?= $fetch['wbid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">የድረ ገፅ ዝርዝር መረጃ</h3>
            </div>
            <div class="modal-body">
                <p>ወረዳ: <?= $fetch['w_name']; ?></p>
                <p>ያለበት ሁኔታ :<span style="text-transform: capitalize;"><?= $fetch['status'] ?></span></p>
                <?php
                if ($fetch['name'] == 'Active') : ?>
                    <p>ድረ ገፅ አድራሻ: <a href="<?php echo $fetch['url']; ?>"><?= $fetch['url']; ?></a></p>
                <?php endif; ?>
                <p>ብዛት: <?php echo $fetch['count']; ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#updateModal<?php echo $fetch['id'] ?>"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteModal<?php echo $fetch['id'] ?>"><span class="fa fa-trash"></span></button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span>
                    ዝጋ</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editWebModal<?= $fetch['wbid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">የድረገፅ ዝርዝር መረጃ አሻሽል</h3>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-map-marker"></i>
                            </span>
                            <input type="hidden" name="id" value="<?= $fetch['wbid'] ?>" />
                            <select name="woreda" class="form-control" required>
                                <option value="" selected disabled>ወረዳ</option>
                                <?php foreach ($woredas = mysqli_query($conn, "SELECT * FROM woredas") as $woreda) : ?>
                                    <option value="<?= $woreda['id'] ?>" <?php if ($fetch['woreda'] == $woreda['id']) {
                                                                                echo 'selected';
                                                                            } ?>><?= $woreda['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="fas fa-power-off"></i>
                            </span>
                            <select name="status" class="form-control">
                                <option value="" selected disabled>ያለበት ሁኔታ</option>
                                <?php foreach ($sts = mysqli_query($conn, "SELECT * FROM web_status") as $st) : ?>
                                    <option value="<?= $st['id'] ?>" <?php if ($fetch['name'] == $st['id']) {
                                                                            echo 'selected';
                                                                        } ?>><?= $st['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><small>ብዛት</small></span>
                            <input type="number" name="count" class="form-control" value="<?= $fetch['count'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-link"></i>
                                </span>
                            </div>
                            <input type="url" name="url" class="form-control" value="<?= $fetch['url'] ?>" placeholder="Website address">
                        </div>
                        <!-- <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <?php
                            $years = date('Y') - 9;
                            $yeare = $years + 9;
                            $months = date('F');
                            ?>
                            <select name="year" class="form-control">
                                <option value="" selected disabled>በጀት ዓመት</option>
                                <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                    <option value="<?= $ys; ?>"><?= $ys; ?></option>
                                <?php  } ?>
                            </select>
                            <select name="month" class="form-control" required>
                                <option value="" selected disabled>ወር</option>
                                <option value="ሐምሌ">ሐምሌ</option>
                                <option value="ነሃሴ">ነሃሴ</option>
                                <option value="መስከረም">መስከረም</option>
                                <option value="ጥቅምት">ጥቅምት</option>
                                <option value="ሕዳር">ሕዳር</option>
                                <option value="ታሕሳስ">ታህሳስ</option>
                                <option value="ጥር">ጥር</option>
                                <option value="የካቲት">የካቲት</option>
                                <option value="መጋቢት">መጋቢት</option>
                                <option value="ሚያዚያ">ሚያዚያ</option>
                                <option value="ግንቦት">ግንቦት</option>
                                <option value="ሰኔ">ሰኔ</option>
                            </select>
                        </div> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="update_website" class="btn btn-primary"><span class="fa fa-check"></span>
                        አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times-circle"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteWebModal<?= $fetch['wbid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">Delete Website Record Information</h3>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">የ<span class="text-muted"><?= $fetch['w_name']; ?>ን</span> ድረ ገፅ መረጃ ማስወገድ
                        ይፈልጋሉ?</h4>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['wbid'] ?>">
                    <button type="submit" name="delete_website" class="btn btn-danger"><span class="fa fa-check"></span>
                        Yes</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span>
                        No</button>
                </div>
        </div>
        </form>
    </div>
</div>