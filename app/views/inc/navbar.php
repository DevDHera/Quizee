<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>">
      <img src="<?php echo URLROOT; ?>/img/logo.webp" width="30" height="30" class="d-inline-block align-top" alt="">
      <?php echo SITENAME; ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
        </li>
        <?php if(isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/quizzes">Quizzes</a>
          </li>
        <?php endif; ?>
      </ul>

      <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION['user_id'])) : ?>            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['user_name']; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['user_name']; ?></a>
                <a class="dropdown-item"><i class="fa fa-at"></i> <?php echo $_SESSION['user_email']; ?></a>
                <a class="dropdown-item"><i class="fa fa-registered"></i> <?php echo $_SESSION['user_role']; ?></a> 
                <?php if(isAdmin()) : ?>
                  <div class="dropdown-divider"></div>                
                  <a class="dropdown-item" href="<?php echo URLROOT; ?>/admins/users">Users</a> 
                  <a class="dropdown-item" href="<?php echo URLROOT; ?>/admins/attempts">Attempts</a> 
                  <a class="dropdown-item" href="<?php echo URLROOT; ?>/quizzes/addbasic">Add Quiz</a> 
                <?php endif; ?>
                <div class="dropdown-divider"></div>  
                <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/results">Your Results</a>
                <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
              </div>
                
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>