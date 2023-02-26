<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Charity Listings</title>
    <link rel="icon" href="assets/details_img.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <script src="assets/bootstrap/js/jquery-1.10.2.js" charset="utf-8"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/cs/listings.css">
  </head>
  <body>

    <?php
    include("header.php"); ?>

    <div class="container-fluid p-0 m-0">
      <div class="row m-0">
        <div class="col-12 imgsec">
          <div class="row innerrow">
            <div class="col-12 white">
              <h1 class="donate-now">Donate Now</h1>
              You can find below various categories for which you can make donations.
              Choose any of the category to see the listings under that category.
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5" id="types">
      <div class="row">
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Arts & culture">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg1.jpg" class="w-100 img-fluid">
              <h3>Arts & Culture</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Education">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg2.jpg" class="w-100 img-fluid">
              <h3>Education</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Environment">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg3.jpg" class="w-100 img-fluid">
              <h3>Environment</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Animals & humane">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg4.jpg" class="w-100 img-fluid">
              <h3>Animal & Humane</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Disaster relief">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg5.jpg" class="w-100 img-fluid">
              <h3>Disaster relief</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Health & medical">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg6.jpg" class="w-100 img-fluid">
              <h3>Health & Medical</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Military">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg7.jpg" class="w-100 img-fluid">
              <h3>Military</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Human services">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg8.jpg" class="w-100 img-fluid">
              <h3>Human services</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Global">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg9.jpg" class="w-100 img-fluid">
              <h3>Global</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Social">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg10.jpg" class="w-100 img-fluid">
              <h3>Social</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Community & family">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg11.jpg" class="w-100 img-fluid">
              <h3>Community & family</h3>
            </div>
          </div>
          </a>
        </div>
        <div class="col-3 p-1">
          <a href="listings_categorically.php?cat=Faith and missions">
          <div class="holder border p-2">
            <div class="img-hover-zoom">
              <img src="assets/donation_images/docationcatimg12.jpg" class="w-100 img-fluid">
              <h3>Faith and Missions</h3>
            </div>
          </div>
          </a>
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

  </body>
</html>
