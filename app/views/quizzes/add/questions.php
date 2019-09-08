<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="card card-body bg-light mt-5">
        <?php flash('quiz_added'); ?>
        <?php flash('quiz_question_added'); ?>
        <h2>Add Questions</h2>        
        <p>Create the question <?php echo $_SESSION['current_question_count']; ?>/<?php echo $_SESSION['question_count']; ?></p>
        <form action="<?php echo URLROOT; ?>/quizzes/addquestions" method="post">
            <div class="form-group">
                <label for="question">Question: <sup>*</sup></label>
                <textarea name="question" class="form-control form-control-lg <?php echo (!empty($data['question_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['question']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['question_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="answer_one">Answer 1: <sup>*</sup></label>
                <input type="text" name="answer_one" class="form-control form-control-lg <?php echo (!empty($data['answer_one_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['answer_one']; ?>">
                <span class="invalid-feedback"><?php echo $data['answer_one_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="answer_two">Answer 2: <sup>*</sup></label>
                <input type="text" name="answer_two" class="form-control form-control-lg <?php echo (!empty($data['answer_two_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['answer_two']; ?>">
                <span class="invalid-feedback"><?php echo $data['answer_two_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="answer_three">Answer 3: <sup>*</sup></label>
                <input type="text" name="answer_three" class="form-control form-control-lg <?php echo (!empty($data['answer_three_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['answer_three']; ?>">
                <span class="invalid-feedback"><?php echo $data['answer_three_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="answer_four">Answer 4: <sup>*</sup></label>
                <input type="text" name="answer_four" class="form-control form-control-lg <?php echo (!empty($data['answer_four_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['answer_four']; ?>">
                <span class="invalid-feedback"><?php echo $data['answer_four_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="correct_answer">Correct Answer: <sup>*</sup></label>
                <select class="form-control <?php echo (!empty($data['correct_answer_err'])) ? 'is-invalid' : ''; ?>" id="correct_answer" name="correct_answer">
                    <option value="null">- Select Answer -</option>
                    <option value="answer_one">Answer One</option>
                    <option value="answer_two">Answer Two</option>
                    <option value="answer_three">Answer Three</option>
                    <option value="answer_four">Answer Four</option>
                </select>
                <span class="invalid-feedback"><?php echo $data['correct_answer_err']; ?></span>
            </div>
            <input type="submit" class="btn btn-success pull-right" value="Next">          
        </form>
    </div>    
  
<?php require APPROOT . '/views/inc/footer.php'; ?>