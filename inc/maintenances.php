<!-- View modal -->
<div class="modal fade" id="viewMTModal<?= $fetch['mid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">የጥገናው ዝርዝር መረጃ</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>ወረዳ: </label>
                        <i class="lead"><?= $fetch['w_name'] ?></i>
                    </div>
                    <div class="col-md-6">
                        <label>ደስክቶፕ: </label>
                        <i class="lead"><?= $fetch['desktop'] ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>ፕሪንተር: </label>
                        <i class="lead"><?= $fetch['printer'] ?></i>
                    </div>
                    <div class="col-md-6">
                        <label>ላፕቶፕ: </label>
                        <i class="lead"><?= $fetch['laptop'] ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>ፎቶኮፒ: </label>
                        <i class="lead"><?php echo $fetch['photocopier'] ?></i>
                    </div>
                    <div class="col-md-6">
                        <label>ፋክስ: </label>
                        <i class="lead"><?php echo $fetch['fax'] ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>ስካነር: </label>
                        <i class="lead"><?php echo $fetch['scanner'] ?></i>
                    </div>
                    <div class="col-md-6">
                        <label>ስዊች: </label>
                        <i class="lead"><?php echo $fetch['switch'] ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>ፕሮጀክተር: </label>
                        <i class="lead"><?php echo $fetch['projector'] ?></i>
                    </div>
                    <div class="col-md-6">
                        <label>ሰርቨር: </label>
                        <i class="lead"><?php echo $fetch['server'] ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>በጀት ዓመት: </label>
                        <i class="lead"><?php echo $fetch['year'] ?></i>
                    </div>
                    <div class="col-md-6">
                        <label>ወር: </label>
                        <i class="lead"><?php echo $fetch['month'] ?></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-info">ጠቅላላ የተጠገኑ ኤሌክትሮኒክስ ዕቃዎች፡ <?php echo $sum_devices; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-info">ከብክነት የዳነ ወጪ፡ <?php echo $fetch['price'] ?></h3>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#editModal<?= $fetch['mid'] ?>"><span class="fa fa-edit"></span></button>
                    <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteModal<?= $fetch['mid'] ?>"><span class="fa fa-trash"></span></button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal-->
<div class="modal fade" id="editMTModal<?= $fetch['mid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">ይህን የጥገና ዝርዝር አሻሽል</h3>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                        </div>
                        <?php
                        if ($page === 'home') :
                            // $w = $conn->query("SELECT * FROM `woredas` WHERE id in(SELECT woreda FROM contacts WHERE id IN(SELECT contact_id FROM users WHERE id = $id))") or die(mysqli_error($conn));
                            $sql = $conn->query("SELECT *, woredas.name AS w_name, woredas.id AS w_id FROM woredas INNER JOIN contacts ON woredas.id = woreda AND contacts.id = $id") or die(mysqli_error($conn));
                            while ($row = $sql->fetch_assoc()) { ?>
                                <select name="woreda" class="form-select <?php echo (!empty($woreda_err)) ? 'is-invalid' : ''; ?>">
                                    <option value="<?= $row['w_id']; ?>" selected><?= $row['w_name']; ?></option>
                                </select>
                            <?php }
                        else : ?>
                            <select name="woreda" class="form-control <?php echo (!empty($woreda_err)) ? 'is-invalid' : ''; ?>">
                                <option value="" selected disabled>ወረዳ</option>
                                <?php foreach ($woredas = mysqli_query($conn, "SELECT * FROM woredas") as $woreda) : ?>
                                    <option value="<?= $woreda['wid']; ?>"<?php if($woreda['wid'] == $fetch['woreda']){echo 'selected';}?>><?= $woreda['woredas.name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>
                    </div>
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
                                                            } ?>><?= $ys; ?></option>
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
                            <span class="input-group-text">
                                <i class="fa fa-desktop"></i>
                            </span>
                        </div>
                        <input type="number" name="desktop" value="<?= $fetch['desktop']; ?>" title="ደስክቶፕ" class="form-control" placeholder="ደስክቶፕ ብዛት">
                        <input type="number" name="laptop" value="<?= $fetch['laptop']; ?>" title="ላፕቶፕ" class="form-control" placeholder="ላፕቶፕ ብዛት">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-print"></i>
                            </span>
                        </div>
                        <input type="number" name="printer" class="form-control" title="ፕሪንተር" value="<?= $fetch['printer']; ?>" placeholder="ፕሪንተር ብዛት">
                        <input type="number" name="photocopier" class="form-control" title="ፎቶኮፒ" value="<?= $fetch['photocopier']; ?>" placeholder="ፎቶኮፒ ብዛት">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-fax"></i>
                            </span>
                        </div>
                        <input type="number" name="fax" class="form-control" title="ፋክስ" value="<?= $fetch['fax']; ?>" placeholder="ፋክስ ብዛት">
                        <input type="number" name="scanner" class="form-control" title="ስካነር" value="<?= $fetch['scanner']; ?>" placeholder="ስካነር ብዛት">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-cogs"></i>
                            </span>
                        </div>
                        <input type="number" name="switch" class="form-control" title="ስዊችና ኔትወርክ" value="<?= $fetch['switch']; ?>" placeholder="ስዊች ብዛት">
                        <input type="number" name="projector" class="form-control" title="ፕሮጀክተር" value="<?= $fetch['projector']; ?>" placeholder="ፕሮጀክተር ብዛት">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-cash-register"></i>
                            </span>
                        </div>
                        <input type="number" name="server" class="form-control" title="ሰርቨር" value="<?= $fetch['server']; ?>" placeholder="ሰርቨር ብዛት">                        
                    </div>
                </div>
                <!-- <div style="clear:both;"></div> -->
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['mid']; ?>">
                    <button name="update_maintenance" class="btn btn-primary"><span class="fa fa-check"></span> አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span> ዝጋ</button>
                </div>
        </div>
        </form>
    </div>
</div>

<!-- delete Modal-->
<div class="modal fade" id="deleteMTModal<?= $fetch['mid']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header border-danger">
                    <h3 class="modal-title">Delete Record</h3>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">ይህንን የጥገና መረጃ ማጥፋት ይፈልጋሉ?</h4>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?=$fetch['mid'] ?>">
                    <button type="submit" name="delete_maintenance" class="btn btn-danger"><span class="fa fa-check"></span> አዎን</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span> አይ</button>
                </div>
        </div>
        </form>
    </div>
</div>