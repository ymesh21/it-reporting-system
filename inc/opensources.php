<!-- View modal -->
<div class="modal fade" id="viewOpenModal<?= $fetch['oid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">የአፕሊኬሽኑ ዝርዝር መረጃ</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-info">
                        <label>ወረዳ: </label>
                        <?= $fetch['w_name']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Attendance: </label>
                        <?php echo $fetch['ams'] ?>
                    </div>
                    <div class="col-md-4">
                        <label>IP Messenger: </label>
                        <?php echo $fetch['ipm'] ?>
                    </div>
                    <div class="col-md-4">
                        <label>Teamviewer: </label>
                        <?php echo $fetch['teamv'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>JAWS/NVDA: </label>
                        <?php echo $fetch['jaws'] ?>
                    </div>
                    <div class="col-md-4">
                        <label>FAX Auto.: </label>
                        <?php echo $fetch['faxaw'] ?>
                    </div>
                    <div class="col-md-4">
                        <label>Simulation: </label>
                        <?php echo $fetch['simu'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Document Management: </label>
                        <?php echo $fetch['dms'] ?>
                    </div>
                    <div class="col-md-3">
                        <label>BSCA: </label>
                        <?php echo $fetch['bsca'] ?>
                    </div>
                    <div class="col-md-3">
                        <label>ARKDB: </label>
                        <?php echo $fetch['arkdb'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Others: </label>
                        <?php echo $fetch['others'] ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>በጀት ዓመት: </label>
                        <?php echo $fetch['month'] ?>, <?php echo $fetch['year'] ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#updateModal<?php echo $fetch['id'] ?>" title="Update"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteModal<?php echo $fetch['id'] ?>" title="Delete"><span class="fa fa-trash"></span></button>
                <button type="button" class="btn btn-secondary" type="button" data-bs-dismiss="modal" title="Close"><span class="fa fa-times"></span></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editOpenModal<?= $fetch['oid'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">Update Open Source Record</h3>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <?php if ($page == 'admin') {
                            $sql = "SELECT * FROM woredas"; ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">ወረዳ</span>
                                </div>
                                <select name="woreda" class="form-control">
                                    <?php
                                    foreach ($woredas = mysqli_query($conn, $sql) as $woreda) : ?>
                                        <option value="<?= $woreda['id']; ?>" <?php if ($woreda['id'] == $fetch['woreda']) {
                                                                                    echo 'selected';
                                                                                } ?>><?= $woreda['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php } ?>
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <?php
                        $years = date('Y') - 9;
                        $yeare = $years + 9;
                        $months = date('F');
                        ?>
                        <select name="year" class="form-select">
                            <option value="" selected disabled>በጀት ዓመት</option>
                            <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                <option value="<?= $ys; ?>" <?php if ($fetch['year'] == $ys) {
                                                                echo 'selected';
                                                            } ?>><?= $ys; ?> ዓ.ም</option>
                            <?php  } ?>
                        </select>
                        <select name="month" class="form-select" required>
                            <option value="" selected disabled>ወር</option>
                            <option value="ሐምሌ" <?php if ($fetch['month'] == "ሐምሌ") {
                                                    echo 'selected';
                                                } ?>>ሐምሌ</option>
                            <option value="ነሃሴ" <?php if ($fetch['month'] == "ነሃሴ") {
                                                    echo 'selected';
                                                } ?>>ነሃሴ</option>
                            <option value="መስከረም" <?php if ($fetch['month'] == "መስከረም") {
                                                        echo 'selected';
                                                    } ?>>መስከረም</option>
                            <option value="ጥቅምት" <?php if ($fetch['month'] == "ጥቅምት") {
                                                        echo 'selected';
                                                    } ?>>ጥቅምት</option>
                            <option value="ሕዳር" <?php if ($fetch['month'] == "ሕዳር") {
                                                    echo 'selected';
                                                } ?>>ሕዳር</option>
                            <option value="ታሕሳስ" <?php if ($fetch['month'] == "ታሕሳስ") {
                                                        echo 'selected';
                                                    } ?>>ታህሳስ</option>
                            <option value="ጥር" <?php if ($fetch['month'] == "ጥር") {
                                                    echo 'selected';
                                                } ?>>ጥር</option>
                            <option value="የካቲት" <?php if ($fetch['month'] == "የካቲት") {
                                                        echo 'selected';
                                                    } ?>>የካቲት</option>
                            <option value="መጋቢት" <?php if ($fetch['month'] == "መጋቢት") {
                                                        echo 'selected';
                                                    } ?>>መጋቢት</option>
                            <option value="ሚያዚያ" <?php if ($fetch['month'] == "ሚያዚያ") {
                                                        echo 'selected';
                                                    } ?>>ሚያዚያ</option>
                            <option value="ግንቦት" <?php if ($fetch['month'] == "ግንቦት") {
                                                        echo 'selected';
                                                    } ?>>ግንቦት</option>
                            <option value="ሰኔ" <?php if ($fetch['month'] == "ሰኔ") {
                                                    echo 'selected';
                                                } ?>>ሰኔ</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">AMS</span>
                        </div>
                        <input type="text" name="ams" value="<?php echo $fetch['ams'] ?>" class="form-control" placeholder="Attendance management" />
                        <div class="input-group-prepend">
                            <span class="input-group-text">IP Messenger</span>
                        </div>
                        <input type="number" name="ipm" value="<?php echo $fetch['ipm'] ?>" class="form-control" placeholder="IP Messenger">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Teamviewer</span>
                        </div>
                        <input type="number" name="teamv" value="<?php echo $fetch['teamv'] ?>" class="form-control" placeholder="Teamviewer">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">JAWS/NVDA</span>
                        </div>
                        <input type="number" name="jaws" value="<?php echo $fetch['jaws'] ?>" class="form-control" placeholder="JAWS/NVDA">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Fax</span>
                        </div>
                        <input type="number" name="faxaw" value="<?php echo $fetch['faxaw'] ?>" class="form-control" placeholder="Fax Automation">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Simulation</span>
                        </div>
                        <input type="number" name="simu" value="<?php echo $fetch['simu'] ?>" class="form-control" placeholder="Simulation">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">DMS</span>
                        </div>
                        <input type="number" name="dms" value="<?php echo $fetch['dms'] ?>" class="form-control" placeholder="Document Management">
                        <div class="input-group-prepend">
                            <span class="input-group-text">BSCA</span>
                        </div>
                        <input type="number" name="bsca" value="<?php echo $fetch['bsca'] ?>" class="form-control" placeholder="BSC Automation">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ARKDB</span>
                        </div>
                        <input type="number" name="arkdb" value="<?php echo $fetch['arkdb'] ?>" class="form-control" placeholder="ARKDB">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Easy BCD</span>
                        </div>
                        <input type="number" name="ebcd" value="<?php echo $fetch['ebcd'] ?>" class="form-control" placeholder="Easy BCD">
                    </div>
                    <div class="input-group mb-3 w-50">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Others</span>
                        </div>
                        <input type="number" name="others" value="<?php echo $fetch['others'] ?>" class="form-control" placeholder="Others">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['oid'] ?>">
                    <button name="update_open" class="btn btn-primary"><span class="fa fa-check"></span> አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteOpenModal<?= $fetch['oid']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">Delete Open Source Record</h3>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">የ<u><span class="text-muted"><?= $fetch['w_name'];; ?></span></u>ን መረጃ ማስወገድ ይፈልጋሉ?</h4>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['oid'] ?>">
                    <button type="submit" name="delete_open" class="btn btn-danger"><span class="fa fa-check"></span> Yes</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> No</button>
                </div>
        </div>
        </form>
    </div>
</div>