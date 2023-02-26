<?php include("islogged.php"); ?>
<nav class="navbar navbar-expand-md navbar-light z-100">
    <a href="#" class="navbar-brand">
        <h2 class="font-weight-bold white">Charity DApp</h2>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
            <a href="#" class="nav-item nav-link white">Home</a>
            <a href="#about" class="nav-item nav-link white">About</a>
            <a href="#contact" class="nav-item nav-link white">Contact Us</a>
            <?php if(islogged()==1) {
              echo '<a href="profile.php" class="nav-item nav-link white log ml-2">Profile</a>
              <a href="signlogic.php?logout=1" class="nav-item nav-link white log ml-2">Logout</a>';
            }else{
              echo '<a href="signup.php" class="nav-item nav-link white log ml-2">Signup</a>
              <a href="login.php" class="nav-item nav-link white log ml-2">Login</a>';
            } ?>


        </div>
    </div>
</nav>
