<!-- View Modal -->
<div class="modal fade" id="viewAppModal<?= $fetch['aid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">የአፕሊኬሽኑ ዝርዝር መረጃ</h3>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ወረዳ</span>
                    </div>
                    <input type="text" value="<?= $fetch['w_name']; ?>" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">በጀት ዓመት</span>
                    </div>
                    <input type="text" value="<?= $fetch['year']; ?> ዓ.ም" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ወር</span>
                    </div>
                    <input type="text" value="<?= $fetch['month']; ?>" disabled class="form-control bg-white">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">CCMS</span>
                    </div>
                    <input type="text" value="<?= $fetch['ccms']; ?>" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">IBEX</span>
                    </div>
                    <input type="text" value="<?= $fetch['ibex']; ?>" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Payroll</span>
                    </div>
                    <input type="text" value="<?= $fetch['payroll']; ?>" disabled class="form-control bg-white">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">PASS</span>
                    </div>
                    <input type="text" value="<?= $fetch['pass']; ?>" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">TRLS</span>
                    </div>
                    <input type="text" value="<?= $fetch['trls']; ?>" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">MIS</span>
                    </div>
                    <input type="text" value="<?= $fetch['mis']; ?>" disabled class="form-control bg-white">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ICSMIS</span>
                    </div>
                    <input type="text" value="<?= $fetch['icsmis']; ?>" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">SIGTAS</span>
                    </div>
                    <input type="text" value="<?= $fetch['sigtas']; ?>" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">OMAS</span>
                    </div>
                    <input type="text" value="<?= $fetch['omas']; ?>" disabled class="form-control bg-white">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">PADS</span>
                    </div>
                    <input type="text" value="<?= $fetch['pads']; ?>" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">ISLA</span>
                    </div>
                    <input type="text" value="<?= $fetch['isla']; ?>" disabled class="form-control bg-white">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Others</span>
                    </div>
                    <input type="text" value="<?= $fetch['others']; ?>" disabled class="form-control bg-white">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#editAppModal<?php echo $fetch['aid'] ?>"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteAppModal<?php echo $fetch['aid'] ?>"><span class="fa fa-trash"></span></button>
                <button type="button" class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Update modal -->
<div class="modal fade" id="editAppModal<?= $fetch['aid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">Update Application Details</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $fetch['aid'] ?>" />
                    <?php if($page == 'admin'){
                        $sql = "SELECT * FROM woredas"; ?>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ወረዳ</span>
                        </div>
                        <select name="woreda" class="form-control">
                            <?php
                            foreach ($woredas = mysqli_query($conn, $sql) as $woreda) : ?>
                                <option value="<?= $woreda['id']; ?>" <?php if($woreda['id'] == $fetch['woreda']){echo 'selected';}?>><?= $woreda['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php } ?>
                    <div class="input-group mb-3">
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
                            <span class="input-group-text">CCMS</span>
                        </div>
                        <input type="number" name="ccms" class="form-control" value="<?= $fetch['ccms'] ?>" placeholder="CCMS" />
                        <div class="input-group-prepend">
                            <span class="input-group-text">IBEX</span>
                        </div>
                        <input type="number" name="ibex" class="form-control" value="<?= $fetch['ibex'] ?>" placeholder="IBEX">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Payroll</span>
                        </div>
                        <input type="number" name="payroll" class="form-control" value="<?= $fetch['payroll'] ?>" placeholder="Payroll">
                        <div class="input-group-prepend">
                            <span class="input-group-text">PASS</span>
                        </div>
                        <input type="number" name="pass" class="form-control" value="<?= $fetch['pass'] ?>" placeholder="PASS">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">TRLS</span>
                        </div>
                        <input type="number" name="trls" class="form-control" value="<?= $fetch['trls'] ?>" placeholder="TRLS">
                        <div class="input-group-prepend">
                            <span class="input-group-text">MIS</span>
                        </div>
                        <input type="number" name="mis" class="form-control" value="<?= $fetch['mis'] ?>" placeholder="MIS">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ICSMIS</span>
                        </div>
                        <input type="number" name="icsmis" class="form-control" value="<?= $fetch['icsmis'] ?>" placeholder="ICSMIS">
                        <div class="input-group-prepend">
                            <span class="input-group-text">SIGTAS</span>
                        </div>
                        <input type="number" name="sigtas" class="form-control" value="<?= $fetch['sigtas'] ?>" placeholder="SIGTAS">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">OMAS</span>
                        </div>
                        <input type="number" name="omas" class="form-control" value="<?= $fetch['omas'] ?>" placeholder="OMAS">
                        <div class="input-group-prepend">
                            <span class="input-group-text">PADS</span>
                        </div>
                        <input type="number" name="pads" class="form-control" value="<?= $fetch['pads'] ?>" placeholder="PADS">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ISLA</span>
                        </div>
                        <input type="number" name="isla" class="form-control" value="<?= $fetch['isla'] ?>" placeholder="ISLA">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Others</span>
                        </div>
                        <input type="number" name="others" class="form-control" value="<?= $fetch['others'] ?>" placeholder="Others">
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="update_app" class="btn btn-primary"><span class="fa fa-check"></span> አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteAppModal<?= $fetch['aid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">Delete Application Record</h3>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">የ<span class="text-muted"><?= $fetch['w_name']; ?></span>ን መረጃ ማስወገድ ይፈልጋሉ?</h4>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['aid'] ?>">
                    <button type="submit" name="delete_app" class="btn btn-danger"><span class="fa fa-check"></span> Yes</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span> No</button>
                </div>
        </div>
        </form>
    </div>
</div>