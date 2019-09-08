<?php require APPROOT . '/views/inc/header.php'; ?>
    
    <?php flash('delete_user_success'); ?>
    <?php flash('edit_user_success'); ?>
    <div class="card card-body bg-light mt-5">
        <h2>System Users</h2>        
    </div>
    
    <div class="mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Employee #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['users'] as $user) : ?>
                    <tr>
                        <th scope="row"><?php echo $user->emp_no; ?></th>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td class="<?php echo ($user->role == 'ADMIN') ? 'text-success' : 'text-info'; ?>"><?php echo $user->role; ?></td>
                        <td><?php echo $user->created_at; ?></td>
                        <td><a class="btn btn-primary text-white" href="<?php echo URLROOT; ?>/admins/edituser/<?php echo $user->id; ?>"><i class="fa fa-pencil"></i> Edit</a></td>                        
                        <td>
                            <form action="<?php echo URLROOT; ?>/admins/deleteuser/<?php echo $user->id; ?>" method="post">
                                <input type="submit" value="Delete" class="btn btn-danger text-white">
                            </form>                        
                        </td>
                    </tr> 
                <?php endforeach; ?>         
            </tbody>
        </table>
    </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>