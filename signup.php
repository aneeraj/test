<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Signup</title>
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
                <a href="login.php" class="nav-item nav-link white log ml-2">Login</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0">
      <div class="row topimg m-0 pt-2" style="background-image: url('assets/person.png')">
        <div class="col-6 pl-5 pr-5">
          <form action="signlogic.php?signup=1" method="post" id="myform">
            <div class="container p-5 rounded logbox mt-0" id="box1">
              <h4 class="mb-3 ml-3 white">Signup</h4>
              <input type="text" autocomplete="off" name="name" id="username" placeholder="Name" class="t-inp" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode ==32">
              <input type="email" autocomplete="off" name="email" id="email" placeholder="E-Mail" class="t-inp">
              <input type="text" autocomplete="off" name="mobile" id="mobile" placeholder="Mobile" class="t-inp" onkeypress="return (event.charCode > 47 && event.charCode < 58)">
              <input type="password" autocomplete="off" name="pass" id="pass" placeholder="Password" class="t-inp">
              <input type="text" autocomplete="off" name="address" id="address" placeholder="Address" class="t-inp">
              <input type="date" autocomplete="off" name="dob" placeholder="Date of birth" class="t-inp pr-3">
              <input type="checkbox" name="isNGO" value=""> <span class="white">We are an NGO</span>
              <div class="text-center">
                <button type="submit" name="button" class="w-50 dn-btn mt-3">Signup</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>


<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.22/dist/web3.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $('#myform').submit(function() {
            var email = $("#email").val();
            var pass = $("#pass").val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
              alert("Provide a valid email");
              return false;
            }
            if (pass.length<6) {
              alert("Password should be at least 6 characters");
              return false;
            }


        });
    </script>
  </body>
</html>
