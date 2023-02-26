<?php
if (isset($_GET["error"])) {
  echo '<script type="text/javascript">alert("Something went wrong");</script>';
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Charity app</title>
    <link rel="icon" href="assets/details_img.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/cs/index.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <script src="assets/bootstrap/js/jquery-1.10.2.js" charset="utf-8"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/swiper/swiper.css">
  </head>
  <body>


    <?php
    include("header.php"); ?>

    <div class="container-fluid p-0 m-0">
      <div class="row m-0">
        <div class="col-12 imgsec">
          <div class="row innerrow">
            <div class="col-12 white">
              <h1 class="donate-now">Welcome</h1>
              Support the causes you care about. With charitable organizations in our database you give to as many organizations or fundraisers as you like, all in one donation basket. We take care of the rest. View and download your consolidated giving statement on demand.
              Rest assured, your money and your personal information is safe. Donations are processed through our secure portal with best-in-class transaction encryption technology. <br><br>
              Now there is no need to worry about the trust issues, We use Ethereum blockchain to store every transaction.
              The donations you do are fully trackable till the beneficiary.<br><br>
              <a href="listings.php"><button type="button" name="button" class="dn-btn">Donate Now</button></a>
              <a href="#about"><button type="button" name="button" class="exp-btn ml-3">Explore</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid d-none">
      <div class="row">
        <div class="col-1">
        </div>
        <div class="col-10 p-5">
          <div class="swiper-container p-3">
            <div class="swiper-wrapper ">
              <div class="swiper-slide">
                    <img src="assets/person.png" class="w-100">
                    <div class="p-2">
                      <h5 class="mt-1">Hello some heading goes here asd asd asd</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <div class="text-center">
                        <button type="button" name="button" class="w-75 dn-btn">Donate Now</button>
                      </div>
                    </div>
              </div>
              <div class="swiper-slide">
                    <img src="assets/person.png" class="w-100">
                    <div class="p-2">
                      <h5 class="mt-1">Hello some heading goes here asd asd asd</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <div class="text-center">
                        <button type="button" name="button" class="w-75 dn-btn">Donate Now</button>
                      </div>
                    </div>
              </div>
              <div class="swiper-slide">
                    <img src="assets/person.png" class="w-100">
                    <div class="p-2">
                      <h5 class="mt-1">Hello some heading goes here asd asd asd</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <div class="text-center">
                        <button type="button" name="button" class="w-75 dn-btn">Donate Now</button>
                      </div>
                    </div>
              </div>
              <div class="swiper-slide">
                    <img src="assets/person.png" class="w-100">
                    <div class="p-2">
                      <h5 class="mt-1">Hello some heading goes here asd asd asd</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <div class="text-center">
                        <button type="button" name="button" class="w-75 dn-btn">Donate Now</button>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt-5" id="about">
      <div class="row">
        <div class="col-1"></div>
        <div class="col-6 p-5">
          <h3 class="mb-5">About Us</h3>
          The necessity of bringing trust in charity is immense.
          Most of the people hesitate to donate due to involvement of middlemen
          and lack of understanding of whether their hard earned money is being
          utilized as they thought it would be. <br><br>
          We are here to solve just that. Now you no longer need to worry about
          your contributions. Our solution is built on Ethereum blockchain which ensures
          that all the information regarding the transactions are stored in public ledger.<br><br>
          You can always check the details of beneficiaries and related documentation and also you can contact them before
          proceeding with any donation to make sure everything is good.<br><br>
          In addition to this you can always track your contribution to ensure it is going in the right always
          and is reaching the hands intended.<br><br>
          You can choose to donate to people with wallet directly or you can donate through an NGO which on your behalf
          delivers the benefits to the people with no wallets.<br><br>
          Now you are in charge of the donations you do instead of any middle persons.
          So let us start donating by logging in or a simple signup.
        </div>
        <div class="col-5 pr-0 pl-5">
          <img src="assets/Group146.png" class="w-100">
        </div>
      </div>
    </div>

    <div class="container-fluid mt-3" id="contact">
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10 p-5">
          <h3>Contact us</h3>
          <div class="row mt-5">
            <div class="col-6 p-2">
              <div class="row m-0 p-2 con-box">
                <div class="col-3">
                  <img src="assets/avatar.png" class="w-100">
                </div>
                <div class="col-9 p-0">
                  <h5>Shrikanth Basa</h5>
                  <p class="mb-0">Hey, I'm a final year student in Computer Engineering from St.Francis Institute of Technology.</p>
                  <p>E-mail: shrikanthbasa35@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="col-6 p-2">
              <div class="row m-0 p-2 con-box">
                <div class="col-3">
                  <img src="assets/avatar2.jpg" class="w-100">
                </div>
                <div class="col-9 p-0">
                  <h5>Vaibhav Shah</h5>
                  <p class="mb-0">Hey, I'm a final year student in Computer Engineering from St.Francis Institute of Technology.</p>
                  <p>E-mail: vrshah1999@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="col-6 p-2 mt-2">
              <div class="row m-0 p-2 con-box">
                <div class="col-3">
                  <img src="assets/avatar3.png" class="w-100">
                </div>
                <div class="col-9 p-0">
                  <h5>Rushabh Shah</h5>
                  <p class="mb-0">Hey, I'm a final year student in Computer Engineering from St.Francis Institute of Technology.</p>
                  <p>E-mail: rushabhs1999@gmail.com </p>
                </div>
              </div>
            </div>
            <div class="col-6 p-2 mt-2">
              <div class="row m-0 p-2 con-box">
                <div class="col-3">
                  <img src="assets/avatar4.png" class="w-100">
                </div>
                <div class="col-9 p-0">
                  <h5>Jaynish Morakhia</h5>
                  <p class="mb-0">Hey, I'm a final year student in Computer Engineering from St.Francis Institute of Technology.</p>
                  <p>E-mail: mjaynish@gmail.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-3">
      <img src="assets/group65.png" class="w-100">
      <div class="row p-2">
        <div class="col-4">
          <h1 class="font-weight-bold">Charity DApp</h1>
        </div>
        <div class="col-8 p-3 text-right">
          <p>Powered by Ethereum, Developed by Shrikanth, Vaibhav, Rushabh and Jaynish</p>
        </div>
      </div>
    </div>

    <script src="assets/swiper/swiper.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', {
     spaceBetween: 30,
     slidesPerView: 3,
     centeredSlides: true,
     autoplay: {
       delay: 2500,
       disableOnInteraction: false,
     },
   });
    </script>

  </body>
</html>
