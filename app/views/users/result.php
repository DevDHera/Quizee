<?php require APPROOT . '/views/inc/header.php'; ?>
  
    <div class="card card-body bg-light mt-5">
        <h2>Results</h2>        
    </div>
    
    <div class="mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Quiz #</th>
                    <th scope="col">Attempt</th>
                    <th scope="col">Result</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['results'] as $result) : ?>
                    <tr>
                        <th scope="row"><?php echo $result->quiz_id; ?></th>
                        <td><?php echo $result->attempt_count; ?></td>
                        <td class="text-success"><?php echo $result->result; ?> %</td>
                    </tr> 
                <?php endforeach; ?>         
            </tbody>
        </table>
    </div>
  
<?php require APPROOT . '/views/inc/footer.php'; ?>