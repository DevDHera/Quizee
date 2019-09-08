<?php require APPROOT . '/views/inc/header.php'; ?>

    <a href="<?php echo URLROOT; ?>/admins/users" class="btn btn-light">
        <i class="fa fa-backward"></i> Back
    </a>
    <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-4">
            <h2>Edit User Account</h2>
            <form action="<?php echo URLROOT; ?>/admins/edituser/<?php echo $data['user_id']; ?>" method="post">
            <div class="form-group">
                <label for="emp_no">Employee #: <sup>*</sup></label>
                <input type="text" name="emp_no" class="form-control form-control-lg <?php echo (!empty($data['emp_no_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['emp_no']; ?>">
                <span class="invalid-feedback"><?php echo $data['emp_no_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="name">Name: <sup>*</sup></label>
                <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>          
            <div class="form-group">
                <label for="correct_answer">Correct Answer: <sup>*</sup></label>
                <select class="form-control <?php echo (!empty($data['role_err'])) ? 'is-invalid' : ''; ?>" id="role" name="role">
                    <option value="ADMIN" <?php if($data['role'] == 'ADMIN'): ?> selected="selected"<?php endif; ?>>ADMIN</option>
                    <option value="USER" <?php if($data['role'] == 'USER'): ?> selected="selected"<?php endif; ?>>USER</option>
                </select>
                <span class="invalid-feedback"><?php echo $data['correct_answer_err']; ?></span>
            </div>

            <input type="submit" value="Submit" class="btn btn-success btn-block">
            
            </form>
        </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>