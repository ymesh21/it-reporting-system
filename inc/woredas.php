<!-- add modal -->
<div class="modal fade" id="addModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">Woreda መረጃ መመዝገቢያ</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Please enter woreda name"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Please enter address"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="add_woreda" class="btn btn-primary"><span class="fa fa-check-circle"></span>
                        መዝግብ</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span
                            class="fa fa-times-circle"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal<?php echo $fetch['id']?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">የworeda ዝርዝር መረጃ አሻሽል</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="woreda">Name</label>
                        <input type="hidden" name="id" value="<?php echo $fetch['id']?>" />
                        <input type="text" name="name" class="form-control" value="<?php echo $fetch['name']?>"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="status">Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo $fetch['address']?>"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="update_woreda" class="btn btn-primary"><span class="fa fa-check"></span>
                        አሻሽል</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><span
                            class="fa fa-times-circle"></span> ዝጋ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal<?php echo $fetch['id']?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h3 class="modal-title">Delete Woreda Record Information</h3>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">የ<span class="text-muted"><?php echo $fetch['name']; ?>ን</span> መረጃ ማስወገድ
                        ይፈልጋሉ?</h4>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?php echo $fetch['id']?>">
                    <button type="submit" name="delete_woreda" class="btn btn-danger"><span class="fa fa-check"></span>
                        Yes</button>
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"><span class="fa fa-close"></span>
                        No</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>