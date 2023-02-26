<?php
  if (isset($_GET["signsuccess"])) {
    echo '<script type="text/javascript">alert("Sign up success");</script>';
  }
  if (isset($_GET["logerror"])) {
    echo '<script type="text/javascript">alert("email or password does not match");</script>';
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="icon" href="assets/details_img.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/cs/login.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <script src="assets/bootstrap/js/jquery-1.10.2.js" charset="utf-8"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
  </head>
  <body>

    <img src="assets/topside.png" class="z-100 img-tp">
    <nav class="navbar navbar-expand-md navbar-light z-100">
        <a href="#" class="navbar-brand">
            <h1 class="font-weight-bold">Charity DApp</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="index.php" class="nav-item nav-link white">Home</a>
                <a href="index.php#about" class="nav-item nav-link white">About</a>
                <a href="index.php#contact" class="nav-item nav-link white">Contact Us</a>
                <a href="signup.php" class="nav-item nav-link white log ml-2">Signup</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-0">
      <div class="row topimg m-0 pt-2" style="background-image: url('assets/person.png')">
          <div class="col-6 p-5">
            <form action="signlogic.php?login=1" method="post">
            <div class="container p-5 rounded logbox mt-5">
              <h4 class="mb-3 ml-3 white">Login</h4>
              <input type="email" autocomplete="off" name="email" placeholder="E-Mail" class="t-inp">
              <input type="password" autocomplete="off" name="password" placeholder="Password" class="t-inp">
              <div class="row mt-3 p-2">
                <div class="col-6 white">
                  <input type="checkbox" name="" class="check" checked> Remember me
                </div>
                <div class="col-6 text-right white">
                  <a href="#" class="text-decoration-none white">Forgot Password?</a>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" name="button" class="w-50 dn-btn mt-3">Login</button>
              </div>
            </div>
            </form>
          </div>
      </div>
    </div>




  </body>
</html>
