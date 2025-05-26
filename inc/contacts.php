<!-- add Modal-->
<div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new employee record</h5>
                <button class="btn btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="create">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>" placeholder="First name">
                        <span class="invalid-feedback"><?php echo $firstname_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>" placeholder="Last name">
                        <span class="invalid-feedback"><?php echo $lastname_err; ?></span>
                    </div>
                    <div class="form-group">
                        <select name="sex" class="form-control <?php echo (!empty($sex_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $sex; ?>" placeholder="Gender">
                            <option>-ፆታ-</option>
                            <option value="ወንድ">ወንድ</option>
                            <option value="ሴት">ሴት</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $sex_err; ?></span>
                    </div>
                    <div class="form-group">
                        <select name="woreda" class="form-control <?php echo (!empty($woreda_err)) ? 'is-invalid' : ''; ?>">
                            <option value="" selected disabled>ወረዳ</option>
                            <?php foreach ($woredas = mysqli_query($conn, "SELECT * FROM woredas") as $woreda) : ?>
                                <option value="<?= $woreda['id']; ?>"><?= $woreda['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="invalid-feedback"><?php echo $woreda_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="position" class="form-control <?php echo (!empty($position_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $position; ?>" placeholder="Position">
                        <span class="invalid-feedback"><?php echo $position_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>" placeholder="Phone Number">
                        <span class="invalid-feedback"><?php echo $phone_err; ?></span>
                    </div>
                    <div class="form-group mb-2">
                        <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Email address">
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group mb-2">
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="" placeholder="Password">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <select name="role" class="form-control <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>">
                            <option value="" selected disabled>Role</option>
                            <option value="admin">Admin</option>
                            <option value="zone">Zone</option>
                            <option value="woreda">Woreda</option>
                        </select>
                        <span class="invalid-feedback"><?php echo $role_err; ?></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_contact" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- view Modal-->
<div class="modal fade" id="viewModal<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Record Details</h5>
                <button class="btn btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>ስም: <?= $fetch['firstname']; ?></p>
                <p>የአባት ስም: <?= $fetch['lastname']; ?></p>
                <p>ፆታ: <?= $fetch['sex']; ?></p>
                <p>ወረዳ: <?= $fetch['w_name']; ?></p>
                <p>የሥራ መደብ: <?= $fetch['position']; ?></p>
                <p>ስልክ ቁጥር: <?= $fetch['phone']; ?></p>
                <p>ኢሜይል: <?= $fetch['email']; ?></p>
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
<div class="modal fade" id="editModal<?= $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                <button class="btn btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" value="<?= $fetch['firstname']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" value="<?= $fetch['lastname']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="sex" class="form-control" required>
                                    <option value="" selected disabled>ፆታ</option>
                                    <option value="ወንድ" <?php if ($fetch['sex'] == 'ወንድ') {
                                                            echo "selected";
                                                        } ?>>ወንድ</option>
                                    <option value="ሴት" <?php if ($fetch['sex'] == 'ሴት') {
                                                            echo "selected";
                                                        } ?>>ሴት</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Woreda</label>
                                <select name="woreda" class="form-control <?php echo (!empty($woreda_err)) ? 'is-invalid' : ''; ?>">
                                    <option value="" selected disabled>ወረዳ</option>
                                    <?php foreach ($woredas = mysqli_query($conn, "SELECT * FROM woredas") as $woreda) : ?>
                                        <option value="<?= $woreda['id']; ?>" <?php if ($fetch['woreda'] == $woreda['id']) {
                                                                                    echo "selected";
                                                                                } ?>><?= $woreda['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" name="position" class="form-control" value="<?= $fetch['position']; ?>" placeholder="Position" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?= $fetch['phone']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" value="<?= $fetch['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="" placeholder="Password">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" value="<?= $fetch['id']; ?>">
                    <button class="btn btn-primary btn-sm" type="submit" name="update_contact" title="Update"><i class="fa fa-check-circle"></i></button>
                    <button class="btn btn-secondary btn-sm" type="button" title="Close" data-bs-dismiss="modal"><i class="fa fa-times-circle"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete Modal-->
<div class="modal fade" id="deleteModal<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete record?</h5>
                <button class="btn btn-close btn-lg" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-danger">Are you sre to delete <?php echo $fetch['firstname']; ?>?</p>
            </div>
            <div class="modal-footer">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $fetch['id']; ?>">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" name="delete_contact" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>