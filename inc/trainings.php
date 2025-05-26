<?php
if ($_SESSION['role'] == 'Zone') {
    $page = 'admin';
} elseif ($_SESSION['role'] == 'Woreda') {
    $page = 'home';
}
?>
<!-- view Modal-->
<div class="modal fade" id="viewModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Record Details</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>First Name: <?php echo $row['name']; ?></p>
                <p>Gender: <?php echo $row['sex']; ?></p>
                <?php if ($page === 'admin') : ?>
                    <p>Woreda: <?= $row['woreda']; ?></p>
                <?php endif; ?>
                <p>Category: <?= $row['category']; ?></p>
                <p>Office: <?= $row['office']; ?></p>
                <p>Type: <?php echo $row['type']; ?></p>
                <p>Year: <?php echo $row['year']; ?></p>
                <p>Month: <?php echo $row['month']; ?></p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-sm mr-1" data-tooltip="tooltip" title="Edit" href="editTraining.php?id=<?= $row['id'] ?>" ><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" data-tooltip="tooltip" title="Delete" href="deleteTraining.php?id=<?= $row['id'] ?>"><i class="fas fa-trash"></i></a>
                <button class="btn btn-secondary btn-sm" data-tooltip="tooltip" type="button" title="Close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
                <?php if ($row['category'] == 'Basic Computer') : ?>
                    <form action="inc/certificate.php" method="get">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <button type="submit" class="btn btn-primary">Certificate</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- edit Modal-->
<div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">የሰልጣኝ መረጃ ማስተካከያ ቅፅ</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form accept-charset="UTF-8" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                                <option value="<?= $ys; ?>"<?php if($row['year'] == $ys){echo 'selected';}?>><?= $ys; ?> ዓ.ም</option>
                            <?php  } ?>
                        </select>
                        <select name="month" class="form-select" required>
                            <option value="" selected disabled>ወር</option>
                            <option value="ሐምሌ" <?php if($row['month'] == 'July'){echo 'selected';}?>>ሐምሌ</option>
                            <option value="ነሃሴ" <?php if($row['month'] == 'August'){echo 'selected';}?>>ነሃሴ</option>
                            <option value="መስከረም" <?php if($row['month'] == 'September'){echo 'selected';}?>>መስከረም</option>
                            <option value="ጥቅምት" <?php if($row['month'] == 'October'){echo 'selected';}?>>ጥቅምት</option>
                            <option value="ሕዳር" <?php if($row['month'] == 'November'){echo 'selected';}?>>ሕዳር</option>
                            <option value="ታሕሳስ" <?php if($row['month'] == 'December'){echo 'selected';}?>>ታህሳስ</option>
                            <option value="ጥር" <?php if($row['month'] == 'January'){echo 'selected';}?>>ጥር</option>
                            <option value="የካቲት" <?php if($row['month'] == 'February'){echo 'selected';}?>>የካቲት</option>
                            <option value="መጋቢት" <?php if($row['month'] == 'March'){echo 'selected';}?>>መጋቢት</option>
                            <option value="ሚያዚያ" <?php if($row['month'] == 'April'){echo 'selected';}?>>ሚያዚያ</option>
                            <option value="ግንቦት" <?php if($row['month'] == 'May'){echo 'selected';}?>>ግንቦት</option>
                            <option value="ሰኔ" <?php if($row['month'] == 'June'){echo 'selected';}?>>ሰኔ</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="hidden" name="woreda" value="<?= $row['woreda']; ?>">
                        <input type="text" name="fullname" class="form-control" value="<?= $row['name'] ?>" placeholder="ሙሉ ስም" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-male"></i>/<i class="fas fa-female"></i></span>
                        <select name="sex" class="form-select" required="required">
                            <option value="" selected disabled>-ፆታ-</option>
                            <option value="Male" <?php if ($row['sex'] == "Male") { echo 'selected'; } ?>>ወንድ</option>
                            <option value="Female" <?php if ($row['sex'] == "Female") { echo 'selected'; } ?>>ሴት</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-folder"></i></span>
                        <select name="category" class="form-select" required>
                            <option value="" selected disabled>የስልጠና ዓይነት</option>
                            <?php foreach ($cts = mysqli_query($conn, "SELECT * FROM categories") as $ct) : ?>
                                <option value="<?= $ct['cid'] ?>" <?php if ($row['cat_id'] == $ct['cid']) {
                                                                        echo 'selected';
                                                                    } ?>><?= $ct['cname']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="type" class="form-select" required>
                            <option value="" selected disabled>-የሠልጣኝ ዓይነት-</option>
                            <option value="መንግሥት ሠራተኛ" <?php if ($row['type'] == 'Employee') {
                                                            echo 'selected';
                                                        } ?>>መንግሥት ሠራተኛ</option>
                            <option value="መምህር" <?php if ($row['type'] == 'Teacher') {
                                                        echo 'selected';
                                                    } ?>>መምህር</option>
                            <option value="አመራር" <?php if ($fetch['type'] == 'Management') {
                                                        echo 'selected';
                                                    } ?>>አመራር</option>
                            <option value="ስራ አስኪያጅ" <?php if ($row['type'] == 'Kebele Manager') {
                                                            echo 'selected';
                                                        } ?>>ስራ አስኪያጅ</option>
                            <option value="ተማሪ" <?php if ($row['type'] == 'Student') {
                                                    echo 'selected';
                                                } ?>>ተማሪ</option>
                            <option value="ማህበረሰብ" <?php if ($row['type'] == 'Community') {
                                                        echo 'selected';
                                                    } ?>>ማህበረሰብ</option>
                            <option value="ሴቶች" <?php if ($row['type'] == 'Women') {
                                                    echo 'selected';
                                                } ?>>ሴቶች</option>
                            <option value="HIV/AIDS ማህበራት" <?php if ($row['type'] == 'HIV/AIDS Association') {
                                                                echo 'selected';
                                                            } ?>>HIV/AIDS ማህበራት</option>
                            <option value="አካል ጉዳተኛ" <?php if ($row['type'] == 'Disabled') {
                                                            echo 'selected';
                                                        } ?>>አካል ጉዳተኛ</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        <textarea name="office" class="form-control" rows="2" placeholder="ተቋም"><?php echo $row['office']; ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $fetch['tid']; ?>">
                    <button class="btn btn-primary btn-sm" type="submit" name="Update_trainee" data-tooltip="tooltip" title="Update"><i class="fa fa-check"></i></button>
                    <button class="btn btn-secondary btn-sm" type="button" data-tooltip="tooltip" title="Close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="deleteModal<?php echo $fetch['tid']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
