<!-- view Modal-->
<div class="modal fade" id="viewModal<?php echo $fetch['cvid']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">የሲቪል ሰርቪስ አተገባበር መረጃ</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if ($page === 'admin') : ?>
                    <p>ወረዳ: <?= $fetch['woredas.name']; ?></p>
                <?php endif; ?>
                <p>የተደራጁ ሰራተኞች ብዛት: <?php echo $fetch['oemps']; ?></p>
                <p>የልማት ቡድን ብዛት: <?php echo $fetch['dteams']; ?></p>
                <p>እስከዚህ ወር የተደረገ የል/ቡድን ዉይይት ብዛት: <?= $fetch['dtdiscussion']; ?></p>
                <p>የተደረገ መማማር ብዛት: <?= $fetch['learning']; ?></p>
                <p>የ6 ወር BSC ዉጤት ተኮር ዕቅድ የተሰጣቸዉ ባለሙያዎች ብዛት: <?php echo $fetch['bscplan']; ?></p>
                <p>የ6 ወር ዉጤት የተሞላላቸዉ ባለሙያዎች ብዛት: <?= $fetch['bscresult']; ?></p>
                <p>በ6ወር ከፍተኛ አፈጻጸም ያስመዘገቡ ባለሙያዎች ብዛት: <?= $fetch['highscorers']; ?></p>
                <p>Year: <?php echo $fetch['year']; ?></p>
                <p>Month: <?php echo $fetch['month']; ?></p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-sm mr-1" data-tooltip="tooltip" title="Edit" href="#" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $fetch['cvid']; ?>"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $fetch['cvid']; ?>"><i class="fas fa-trash"></i></a>
                <button class="btn btn-secondary btn-sm" data-tooltip="tooltip" type="button" title="Close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- edit Modal-->
<div class="modal fade" id="editModal<?php echo $fetch['cvid']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">የአዲስ የሲቪል ሰርቪስ አተገባበር መረጃ ማስተካከያ ቅፅ</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        <?php
                        $years = date('Y') - 9;
                        $yeare = $years + 9;
                        $months = date('F');
                        ?>
                        <select name="year" class="form-select" required>
                            <option value="" selected disabled>በጀት ዓመት</option>
                            <?php for ($ys = $years; $ys <= $yeare; $ys++) { ?>
                                <option value="<?= $ys; ?>" <?php if ($fetch['year'] == $ys) {
                                                                echo 'selected';
                                                            } ?>><?= $ys; ?> ዓ.ም</option>
                            <?php  } ?>
                        </select>
                        <select name="month" class="form-select" required>
                            <option value="" selected disabled>ወር</option>
                            <option value="ሐምሌ" <?php if ($fetch['month'] == 'July' || $fetch['month'] == 'ሐምሌ') {
                                                    echo 'selected';
                                                } ?>>ሐምሌ</option>
                            <option value="ነሃሴ" <?php if ($fetch['month'] == 'August' || $fetch['month'] == 'ነሃሴ') {
                                                    echo 'selected';
                                                } ?>>ነሃሴ</option>
                            <option value="መስከረም" <?php if ($fetch['month'] == 'September' || $fetch['month'] == 'መስከረም') {
                                                        echo 'selected';
                                                    } ?>>መስከረም</option>
                            <option value="ጥቅምት" <?php if ($fetch['month'] == 'October' || $fetch['month'] == 'ጥቅምት') {
                                                        echo 'selected';
                                                    } ?>>ጥቅምት</option>
                            <option value="ሕዳር" <?php if ($fetch['month'] == 'November' || $fetch['month'] == 'ህዳር') {
                                                    echo 'selected';
                                                } ?>>ሕዳር</option>
                            <option value="ታሕሳስ" <?php if ($fetch['month'] == 'December' || $fetch['month'] == 'ታሕሳስ') {
                                                        echo 'selected';
                                                    } ?>>ታህሳስ</option>
                            <option value="ጥር" <?php if ($fetch['month'] == 'January' || $fetch['month'] == 'ጥር') {
                                                    echo 'selected';
                                                } ?>>ጥር</option>
                            <option value="የካቲት" <?php if ($fetch['month'] == 'February' || $fetch['month'] == 'የካቲት') {
                                                        echo 'selected';
                                                    } ?>>የካቲት</option>
                            <option value="መጋቢት" <?php if ($fetch['month'] == 'March' || $fetch['month'] == 'መጋቢት') {
                                                        echo 'selected';
                                                    } ?>>መጋቢት</option>
                            <option value="ሚያዚያ" <?php if ($fetch['month'] == 'April' || $fetch['month'] == 'ሚያዚያ') {
                                                        echo 'selected';
                                                    } ?>>ሚያዚያ</option>
                            <option value="ግንቦት" <?php if ($fetch['month'] == 'May' || $fetch['month'] == 'ግንቦት') {
                                                        echo 'selected';
                                                    } ?>>ግንቦት</option>
                            <option value="ሰኔ" <?php if ($fetch['month'] == 'June' || $fetch['month'] == 'ሰኔ') {
                                                    echo 'selected';
                                                } ?>>ሰኔ</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label for="oems" class="form-label">የተደራጁ ሰራተኞች ብዛት</label>
                        <input type="number" id="oems" name="oemps" class="form-control" value="<?= $fetch['oemps']; ?>" placeholder="የተደራጁ ሰራተኞች ብዛት">
                    </div>
                    <div class="input-group mb-3">
                        <label for="dteams" class="form-label">የልማት ቡድን ብዛት</label>
                        <input type="number" id="dteams" name="dteams" class="form-control" value="<?= $fetch['dteams']; ?>" placeholder="የልማት ቡድን ብዛት">
                    </div>
                    <div class="input-group mb-3">
                        <label for="dtdiscussion" class="form-label">እስከዚህ ወር የተደረገ የል/ቡድን ዉይይት ብዛት</label>
                        <input type="number" id="dtdiscussion" name="dtdiscussion" class="form-control" value="<?= $fetch['dtdiscussion']; ?>" placeholder="የል/ቡድን ዉይይት ብዛት (እስከዚህ ወር)">
                    </div>
                    <div class="input-group mb-3">
                        <label for="learning" class="form-label">የልማት ቡድን ብዛት</label>
                        <input type="number" id="learning" name="learning" class="form-control" value="<?= $fetch['learning']; ?>" placeholder="በተመረጡ ርዕሶች ላይ የተደረገ መማማር ብዛት">
                    </div>
                    <div class="input-group mb-3">
                        <label for="bscplan" class="form-label">የልማት ቡድን ብዛት</label>
                        <input type="number" id="bscplan" name="bscplan" class="form-control" value="<?= $fetch['bscplan']; ?>" placeholder="የ6 ወር BSC ዕቅድ የተሰጣቸዉ ባለሙያዎች ብዛት">
                    </div>
                    <div class="input-group mb-3">
                        <label for="bscresult" class="form-label">የልማት ቡድን ብዛት</label>
                        <input type="number" id="bscresult" name="bscresult" class="form-control" value="<?= $fetch['bscresult']; ?>" placeholder="የ6 ወር BSC ውጤት የተሰጣቸዉ ባለሙያዎች ብዛት">
                    </div>
                    <div class="input-group mb-3">
                        <label for="highscorers" class="form-label">የልማት ቡድን ብዛት</label>
                        <input type="number" id="highscorers" name="highscorers" class="form-control" value="<?= $fetch['highscorers']; ?>" placeholder="ከፍተኛ ውጤት ያስመዘገቡ ባለሙያዎች ብዛት">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $fetch['cvid']; ?>">
                    <button class="btn btn-primary btn-sm" type="submit" name="update_civil_srvice" data-tooltip="tooltip" title="Update"><i class="fa fa-check"></i></button>
                    <button class="btn btn-secondary btn-sm" type="button" data-tooltip="tooltip" title="Close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="deleteModal<?php echo $fetch['cvid']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-danger">
                <h5 class="modal-title" id="exampleModalLabel">ማስወገድ</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger">ይህን የሲቪል ሰርቪስ አተገባበር መረጃ ለማስወገድ እርግጠኛ ነዎት (<?php echo $fetch['woredas.name']; ?>)?</p>
            </div>
            <form action="" method="POST">
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $fetch['cvid']; ?>">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fas fa-chevron-left"></i> አይ</button>
                    <button type="submit" name="delete_civil_srvice" class="btn btn-danger"><i class="fas fa-times"></i> አዎን</button>
                </div>
            </form>
        </div>
    </div>
</div>