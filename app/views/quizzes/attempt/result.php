<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="card card-body bg-light mt-5">
        <h2 class="text-center"><?php echo $data['quiz_title']; ?> Results</h2>
        <p class="text-center">Employee ID: <?php echo $data['user_emp_no']; ?></p>
        <p class="text-center">Name: <?php echo $data['user_name']; ?></p>
        <p class="text-center">Attempt: <?php echo $data['attempt']; ?></p>
        <h2 class="text-center">Result: <?php echo $data['result']; ?> %</h2>
        <div class="row mt-4">
            <div class="col">
                <a href="<?php echo URLROOT; ?>/quizzes/attempt/<?php echo $data['quiz_id']; ?>" class="btn btn-primary btn-block">Try Again</a>    
            </div>
            <div class="col">
                <a href="<?php echo URLROOT; ?>/quizzes" class="btn btn-secondary btn-block">Go to Quizzes</a>
            </div>
        </div>
        
        
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>