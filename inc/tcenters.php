<!-- View website -->
<div class="modal fade" id="viewTCModal<?= $fetch['tcid'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">ያጋጠመ ችግር ዝርዝር መረጃ</h3>
            </div>
            <div class="modal-body">
                <p>ወረዳ: <?= $fetch['w_name']; ?></p>
                <p>የማዕከላት ብዛት: <?= $fetch['amount'] ?></span></p>
                <p>የኮምፒዩተር ብዛት: <?php echo $fetch['pcs']; ?></p>
                <p>መብራት ያላቸው: <?php echo $fetch['efacility']; ?></p>
                <p>ኢንተርኔት ያላቸው: <?php echo $fetch['ifacility']; ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-toggle="modal" type="button" data-bs-target="#editTCModal<?= $fetch['tcid'] ?>"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deleteTCModal<?= $fetch['tcid'] ?>"><span class="fa fa-trash"></span></button>
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times"></span>
                    ዝጋ</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit modal -->
<div class="modal fade" id="editTCModal<?= $fetch['tcid'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">የድረገፅ ዝርዝር መረጃ አሻሽል</h3>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">የማዕከላት ብዛት</span>
                        </div>
                        <input type="number" name="amount" class="form-control" value="<?= $fetch['amount']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ኮምፒዩተር ብዛተ</span>
                        </div>
                        <input type="number" name="pcs" class="form-control" value="<?= $fetch['pcs']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">መብራት ያላቸው</span>
                        </div>
                        <input type="number" name="efacility" class="form-control" value="<?= $fetch['efacility']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">ኢንተርኔት ያላቸው</span>
                        </div>
                        <input type="number" name="ifacility" class="form-control" value="<?= $fetch['ifacility']; ?>">
                    </div>                  
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['tcid'] ?>">
                    <button name="update_tcenter" class="btn btn-primary"><span class="fa fa-check"></span>
                        አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span class="fa fa-times-circle"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteTCModal<?= $fetch['tcid'] ?>" aria-hidden="true">
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
                    <input type="hidden" name="id" value="<?= $fetch['tcid'] ?>">
                    <button type="submit" name="delete_tcenter" class="btn btn-danger"><span class="fa fa-check"></span>
                        Yes</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span>
                        No</button>
                </div>
        </div>
        </form>
    </div>
</div>