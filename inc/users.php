<!-- view Modal-->
<div class="modal fade" id="viewModal<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Name: <b><?= $fetch['firstname']; ?> <?= $fetch['lastname']; ?></b></p>
                <p>Username: <b><?= $fetch['username']; ?></b></p>
                <p>Woreda: <b><?= $fetch['woredas.name']; ?></b></p>
                <p>Email: <b> <?= $fetch['email']; ?></b></p>
                <p>Phone: <b> <?= $fetch['phone']; ?></b></p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-success btn-sm mr-1" title="Edit" href="#" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $fetch['id']; ?>"><i class="fas fa-edit"></i></a>
                <a class="btn btn-danger btn-sm" title="Delete" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $fetch['id']; ?>"><i class="fas fa-trash"></i></a>
                <button class="btn btn-secondary btn-sm" type="button" title="Close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal-->
<div class="modal fade" id="editModal<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Name</label>
                                <select name="contact" class="form-control form-control-user <?php echo (!empty($contact_err)) ? 'is-invalid' : ''; ?>" required>
                                    <option>-Select Contact-</option>
                                    <?php 
                                        $contacts = mysqli_query($conn, 'SELECT * FROM contacts');
                                        foreach($contacts as $contact) :?>
                                    <option value="<?= $contact['id']; ?>" <?php if($fetch['contact_id'] == $contact['id']){echo 'selected';}?>><?= $contact['firstname']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="invalid-feedback"><?php echo $contact_err; ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?= $fetch['username']; ?>">
                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control form-control-user<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="" required>
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="" required>
                                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Access Level</label>
                                <select name="role" class="form-control <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>" required>
                                    <option>Please Select access level</option>
                                    <option value="Zone" <?php if($fetch['role'] == 'Zone'){echo 'selected';}?>>Zone</option>
                                    <option value="Woreda" <?php if($fetch['role'] == 'Woreda'){echo 'selected';}?>>Woreda</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $role_err; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['id'] ?>">
                    <button class="btn btn-primary btn-sm" type="submit" name="update_user" title="Update"><i class="fa fa-check"></i></button>
                    <button class="btn btn-secondary btn-sm" type="button" title="Close" data-bs-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete Modal-->
<div class="modal fade" id="deleteModal<?= $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete record?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-danger">Are you sre to delete <?= $fetch['username']; ?>?</p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="id" value="<?= $fetch['id'] ?>">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>