<!-- view Modal-->
<div class="modal fade" id="viewCLModal<?= $fetch['clid'] ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">የሠራተኞች የኮምፒዩተር ዕውቀት መረጃ</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input class="form-control" value="<?= $fetch['w_name']; ?>" disabled>
                    <input class="form-control" value="<?= $fetch['month']; ?>" disabled> <input class="form-control" value="<?= $fetch['year'] . ' ዓ.ም'; ?>" disabled>
                </div>
                <div class="input-group mb-3">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">የሠራተኛ ብዛት</legend>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-male"></i></span>
                            <input class="form-control" disabled value="<?= $fetch['empsm']; ?>" />
                            <span class="input-group-text"><i class="fas fa-female"></i></span>
                            <input class="form-control" disabled value="<?= $fetch['empsf']; ?>" />
                            <span class="input-group-text"><i class="fas fa-male"></i>+<i class="fas fa-female"></i></span>
                            <input class="form-control" disabled value="<?= $fetch['empsm'] + $fetch['empsf']; ?>" />
                        </div>
                    </fieldset>
                </div>
                <div class="input-group mb-3">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">የኮምፒዩተር ዕውቀት ያላቸው ብዛት</legend>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-male"></i></span>
                            <input class="form-control" disabled value="<?= $fetch['literatem']; ?>" />
                            <span class="input-group-text"><i class="fas fa-female"></i></span>
                            <input class="form-control" disabled value="<?= $fetch['literatef']; ?>" />
                            <span class="input-group-text"><i class="fas fa-male"></i>+<i class="fas fa-female"></i></span>
                            <input class="form-control" disabled value="<?= $fetch['literatem'] + $fetch['literatef']; ?>" />
                        </div>
                    </fieldset>
                </div>
                <div class="input-group mb-3">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">የኮምፒዩተር ዕውቀት የሌላቸው ብዛት</legend>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-male"></i></span>
                            <input class="form-control" value="<?= $fetch['iliteratem']; ?>" disabled />
                            <span class="input-group-text"><i class="fas fa-female"></i></span>
                            <input class="form-control" value="<?= $fetch['iliteratef']; ?>" disabled />
                            <span class="input-group-text"><i class="fas fa-male"></i>+<i class="fas fa-female"></i></span>
                            <input class="form-control" value="<?= $fetch['iliteratem'] + $fetch['iliteratef']; ?>" disabled />
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-sm mr-1" title="Edit" href="#" data-bs-toggle="modal" data-bs-target="#editCLModal<?= $fetch['clid']; ?>"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" title="Delete" href="#" data-bs-toggle="modal" data-bs-target="#deleteCLModal<?= $fetch['clid']; ?>"><i class="fas fa-trash"></i></a>
                <button class="btn btn-secondary btn-sm" type="button" title="Close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal-->
<div class="modal fade" id="editCLModal<?= $fetch['clid']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">የኮምፒዩተር ዕውቀት መረጃ ማስተካከያ</h3>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <?php foreach ($woredas = mysqli_query($conn, "SELECT *, woredas.id AS w_id FROM woredas WHERE woredas.id IN(SELECt woreda FROM contacts WHERE contacts.id = $id)") as $woreda) : ?>
                            <?php $woreda = $woreda['w_id']; ?>
                            <input type="hidden" name="woreda" value="<?= $woreda ?>">
                        <?php endforeach; ?>
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
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
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">የሠራተኛ ብዛት</legend>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-male"></i></span>
                                <input type="number" class="form-control" name="empsm" value="<?= $fetch['empsm']; ?>" />
                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" name="empsf" value="<?= $fetch['empsf']; ?>" />
                            </div>
                        </fieldset>
                    </div>
                    <div class="input-group mb-3">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">የኮምፒዩተር ዕውቀት ያላቸው ብዛት</legend>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-male"></i></span>
                                <input type="number" class="form-control" name="literatem" value="<?= $fetch['literatem']; ?>" />
                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" name="literatef" value="<?= $fetch['literatef']; ?>" />
                            </div>
                        </fieldset>
                    </div>
                    <div class="input-group mb-3">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">የኮምፒዩተር ዕውቀት የሌላቸው ብዛት</legend>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-male"></i></span>
                                <input type="number" class="form-control" name="iliteratem" value="<?= $fetch['iliteratem']; ?>" />
                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" name="iliteratef" value="<?= $fetch['iliteratef']; ?>" />
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['clid']; ?>">
                    <button name="update_cliteracy" class="btn btn-primary"><span class="fa fa-check"></span>
                        አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times-circle"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete Modal-->
<div class="modal fade" id="deleteCLModal<?= $fetch['clid']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete record?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger">ይህን መረጃ ለማጥፋት እርግጠኛ ነዎት?</p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="id" value="<?= $fetch['clid']; ?>">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" name="delete_cliteracy" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>