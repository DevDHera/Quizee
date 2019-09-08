<?php require APPROOT . '/views/inc/header.php'; ?>
  
    <a href="<?php echo URLROOT; ?>/quizzes" class="btn btn-light">
        <i class="fa fa-backward"></i> Back
    </a>    

    <div class="card card-body bg-light mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Try Quiz</h2>        
                <p>Test your knowledge</p>
            </div>
            <div class="col-md-6">
                <p class="text-right">Quiz Title: <strong><?php echo $data['quiz_title']; ?></strong></p>
                <p class="text-right"># Questions: <strong><?php echo $data['quiz_question_count']; ?></strong></p>
            </div>
        </div>
    </div>

    <form action="<?php echo URLROOT; ?>/quizzes/submitattempt/<?php echo $data['quiz_id']; ?>" method="post">
        <?php $i = 0; ?>
        <?php foreach($data['questions'] as $question) : ?>
            <div class="card card-body bg-light mt-5">
                <div class="form-group">
                    <label><strong>Question: <?php echo $i+1; ?></strong></label>                    
                </div>
                <div class="form-group">
                    <label><?php echo $question[0]['question']; ?></label>                    
                    <?php foreach($question as $answers) : ?>
                        <div class="form-check ml-5">
                            <input class="form-check-input" type="radio" name="<?php echo $answers['questionId']; ?>" id="<?php echo $answers['answerId']; ?>" value="<?php echo $answers['answerId']; ?>">
                            <label class="form-check-label" for="<?php echo $answers['answerId']; ?>">
                                <?php echo $answers['answer']; ?>
                            </label>
                        </div>                    
                    <?php endforeach; ?>                    
                </div>
            </div>
        <?php $i++; ?>
        <?php endforeach; ?>
        <input type="submit" class="btn btn-success mt-3 mb-3 pull-right" value="Finish">          
    </form>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>