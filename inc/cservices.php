<!-- View Cservice -->
<div class="modal fade" id="viewCSModal<?= $fetch['csid'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">የሁለገብ ማሕበረሰብ ማዕከል አገልግሎት መረጃ</h3>
            </div>
            <div class="modal-body">
                <div class="row mb-3 border-primary">
                    <div class="col-lg-4">
                        ወረዳ: <span class="text-primary"><?= $fetch['w_name'] ?></span>
                    </div>
                    <div class="col-lg-4">
                        የማዕከሉ መጠሪያ ስም: <span class="text-primary"><?= $fetch['name'] ?></span>
                    </div>
                    <div class="col-lg-4">
                        ካፒታል: <span class="text-primary"><?= $fetch['capital'] ?> ብር</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">የቅጥር ሠራተኛ ብዛት (ወጣቶች)</legend>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-male"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['empym']; ?>" />
                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vfemale" value="<?= $fetch['empyf']; ?>" />
                                <span class="input-group-text"><i class="fas fa-male"></i>+<i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['empym'] + $fetch['empyf']; ?>" />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">የቅጥር ሠራተኛ ብዛት (ሌሎች)</legend>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-male"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['empom']; ?>" />
                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vfemale" value="<?= $fetch['empof']; ?>" />
                                <span class="input-group-text"><i class="fas fa-male"></i>+<i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['empom'] + $fetch['empof']; ?>" />
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">ኢንተርኔት ተጠቃሚ ብዛት (ወጣቶች)</legend>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-male"></i></span>
                                <input type="number" class="form-control" disabled name="iusersym" value="<?= $fetch['iusersym']; ?>" />
                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="iusersyf" value="<?= $fetch['iusersyf']; ?>" />
                                <span class="input-group-text"><i class="fas fa-male"></i>+<i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['iusersym'] + $fetch['iusersyf']; ?>" />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">ኢንተርኔት ተጠቃሚ ብዛት (ሌሎች)</legend>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-male"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['iusersom']; ?>" />
                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vfemale" value="<?= $fetch['iusersof']; ?>" />
                                <span class="input-group-text"><i class="fas fa-male"></i>+<i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['iusersom'] + $fetch['iusersof']; ?>" />
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">የቦርድ አባላት ብዛት (ወጣቶች)</legend>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-male"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['bmembym']; ?>" />
                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vfemale" value="<?= $fetch['bmembyf']; ?>" />
                                <span class="input-group-text"><i class="fas fa-male"></i>+<i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['bmembym'] + $fetch['bmembyf']; ?>" />
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-lg-6">
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border">የቦርድ አባላት ብዛት (ሌሎች)</legend>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-male"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['bmembom']; ?>" />
                                <span class="input-group-text"><i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vfemale" value="<?= $fetch['bmembom']; ?>" />
                                <span class="input-group-text"><i class="fas fa-male"></i>+<i class="fas fa-female"></i></span>
                                <input type="number" class="form-control" disabled name="vmale" value="<?= $fetch['bmembof'] + $fetch['bmembof']; ?>" />
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#editCSModal<?= $fetch['csid'] ?>"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteCSModal<?= $fetch['csid'] ?>"><span class="fa fa-trash"></span></button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span>
                    ዝጋ</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit modal -->
<div class="modal fade" id="editCSModal<?= $fetch['csid'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">የሁለገብ ማሕበረሰብ ማዕከል አገልግሎት መረጃ ማስተካከያ</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">መጠሪያ ስም</span>
                                <input type="text" name="name" class="form-control" value="<?= $fetch['name']; ?>" placeholder="የማዕከል መጠሪያ ስም">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">መጠሪያ ስም</span>
                                <input type="number" name="capital" class="form-control" value="<?= $fetch['capital']; ?>" placeholder="ካፒታል">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">የቅጥር ሠራተኛ ብዛት (ወጣቶች)</legend>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    <input type="number" class="form-control" name="empym" value="<?= $fetch['empym']; ?>" />
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                    <input type="number" class="form-control" name="empyf" value="<?= $fetch['empyf']; ?>" />
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">የቅጥር ሠራተኛ ብዛት (ሌሎች)</legend>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    <input type="number" class="form-control"  name="empempomom" value="<?= $fetch['empom']; ?>" />
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                    <input type="number" class="form-control"  name="empof" value="<?= $fetch['empof']; ?>" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">ኢንተርኔት ተጠቃሚ ወጣቶች ብዛት</legend>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    <input type="number" class="form-control" name="iusersym" value="<?= $fetch['iusersym']; ?>" />
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                    <input type="number" class="form-control" name="iusersyf" value="<?= $fetch['iusersyf']; ?>" />
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">ኢንተርኔት ተጠቃሚ ሌሎች ብዛት</legend>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    <input type="number" class="form-control" name="iusersom" value="<?= $fetch['iusersom']; ?>" />
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                    <input type="number" class="form-control" name="iusersof" value="<?= $fetch['iusersof']; ?>" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">የቦርድ አባላት ብዛት (ወጣቶች)</legend>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    <input type="number" class="form-control" name="bmembym" value="<?= $fetch['bmembym']; ?>" />
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                    <input type="number" class="form-control" name="bmembyf" value="<?= $fetch['bmembyf']; ?>" />
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">የቦርድ አባላት ብዛት (ሌሎች)</legend>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-male"></i></span>
                                    <input type="number" class="form-control" name="bmembom" value="<?= $fetch['bmembom']; ?>" />
                                    <span class="input-group-text"><i class="fas fa-female"></i></span>
                                    <input type="number" class="form-control" name="bmembof" value="<?= $fetch['bmembof']; ?>" />
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ካፒታል <i class="fas fa-dollar"></i></span>
                        </div>
                        <input type="number" class="form-control" name="capital" value="<?= $fetch['capital']; ?>" placeholder="ካፒታል" />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['csid'] ?>">
                    <button name="update_cservice" class="btn btn-primary"><span class="fa fa-check"></span>
                        አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times-circle"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteCSModal<?= $fetch['csid'] ?>" aria-hidden="true">
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
                    <input type="hidden" name="id" value="<?= $fetch['csid'] ?>">
                    <button type="submit" name="delete_cservice" class="btn btn-danger"><span class="fa fa-check"></span>
                        Yes</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span>
                        No</button>
                </div>
        </div>
        </form>
    </div>
</div>