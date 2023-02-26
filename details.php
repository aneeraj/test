<?php
  include("connection.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Details</title>
    <link rel="icon" href="assets/details_img.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <script src="assets/bootstrap/js/jquery-1.10.2.js" charset="utf-8"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/cs/details.css">
    <link rel="stylesheet" href="assets/swiper/swiper.css">
  </head>
  <body>
    <?php
    include("header.php"); ?>
    <?php
    if (isset($_GET["amt"])) {
      $amt = $_GET["amt"];
      echo '<script type="text/javascript">
        alert("You have successfully donated Rs.'.preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $amt).'")
      </script>';
    }
    ?>

    <div class="container-fluid p-3">
      <div class="row rounded-sm p-2">
        <div class="col-6 p-2">
          <h5 class="bold text-center">Documents and other images</h5>
          <hr>
          <div class="swiper-container p-3 mt-4">
            <div class="swiper-wrapper p-2 text-center">
              <?php
                if (isset($_GET["listing"])) {
                  $lid = $_GET["listing"];
                }else{
                  header("Location: index.php?");
                  exit();
                }
                $sql = "SELECT * from listings where listing_ID='$lid'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  if ($row["doclinks"]=="") {
                    echo "No documents found";
                  }
                  $images = explode("*",$row["doclinks"]);
                  $email = $row["fk_email"];
                  $title = $row["title"];
                  $desc = $row["description"];
                  $list_hash = $row["hash"];
                  $category = $row["category"];
                  $from_ngo = $row["fromNGO"];
                  $benkey = $row["beneficiary_id"];
                  $target = $row["target"];
                  $target_for_form = $row["target"];

                  $sql2 = "SELECT sum(amount) from donations where fk_listing='$lid'";
                  $result2 = $conn->query($sql2);
                  $row2 = $result2->fetch_assoc();
                  $reached = $row2["sum(amount)"];
                  $reached_for_form = $row2["sum(amount)"];
                  if ($reached=="") {
                    $reached = 0;
                  }
                  $reached = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $reached);
                  $target = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $target);
                  array_pop($images);
                  foreach ($images as $value) {
                    echo '<div class="swiper-slide">
                          <img src="listingimages/'.$value.'" class="w-100">
                    </div>';
                  }
                } else {
                  header("Location: index.php");
                  exit();
                }
              ?>
            </div>
             <div class="swiper-pagination"></div>
          </div>
          <hr>
          <?php
            echo "<h5 class='pl-4'>".$title."</h5>";
            echo "<p class='pl-4'>".$desc."</p>";
            echo '<a class="pl-4" href="https://rinkeby.etherscan.io/tx/'.$list_hash.'" target="_blank"> <button type="button" class="btn btn-primary" name="button">Verify listing on Etherscan</button> </a>';
          ?>
        </div>
        <div class="col-6 p-2 border-right">
          <h5 class="bold mb-3 text-center">Details</h5>
          <hr>
          <?php
            if ($from_ngo!=NULL) {
              $sql = "SELECT * from beneficiary_details where ben_id='$benkey'";
              $result = $conn->query($sql);
              $row = $result->fetch_assoc();
              $ben_name = $row["name"];
              $ben_address = $row["address"];
              $ben_mobile = $row["phone"];
              $ben_mail = $row["email"];
              echo '<div class="p-3">
                <p class="text-center text-danger">This request was posted by an NGO on behalf of the beneficiary, get in touch with the beneficiary if needed.</p>
                <p class="mb-0 mt-3 bold">Beneficiary Name:</p>
                <p>'.$ben_name.'</p>
                <p class="mb-0 bold">Address:</p>
                <p>'.$ben_address.'</p>
                <p class="mb-0 bold">Mobile:</p>
                <p>'.$ben_mobile.'</p>
                <p class="mb-0 bold">E-mail:</p>
                <p>'.$ben_mail.'</p>
              </div>';
            }
          ?>


          <?php
            $sql = "SELECT * from user where email='$email'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $name = $row["name"];
            $address = $row["address"];
            $dob = $row["dob"];
            $mobile = $row["mobile"];
            $ngo = $row["ngo"];
            $hash = $row["AC_hash"];
            ?>
            <div class="p-3">
              <?php if ($from_ngo!=NULL) { echo "<h5 class='text-danger text-center'>NGO Details</h5>";} ?>
              <p class="mb-0 bold">Name:</p>
              <p><?php echo $name; ?></p>
              <p class="mb-0 bold">Date of birth / Establishment:</p>
              <p><?php echo $dob; ?></p>
              <p class="mb-0 bold">Address:</p>
              <p><?php echo $address; ?></p>
              <p class="mb-0 bold">Mobile:</p>
              <p><?php echo $mobile; ?></p>
              <p class="mb-0 bold">E-mail:</p>
              <p><?php echo $email; ?></p>
              <p class="mb-0 bold">Registration hash:</p>
              <p><?php echo $hash; ?></p>
              <a href="https://rinkeby.etherscan.io/tx/<?php echo $hash ?>" target="_blank"> <button type="button" class="btn btn-primary" name="button">Verify user on Etherscan</button> </a>
          </div>
        </div>
      </div>


      <?php
      if (isset($_SESSION["userlogged"]) && $_SESSION["useremail"]!=$email) {
        ?>
        <section class="credit-card">
  		 <div class="container">
  			<div class="card-holder">
          <?php echo "<h3 class='pl-4 text-info text-center'>Reached &#8377;".$reached." out of &#8377;".$target."</h3>"; ?>
          <h5 class="text-center mt-4 mb-3">Donate Now</h5>
  			  <div class="card-box bg-news">
  		       <div class="row">
  				<div class="col-lg-6">
  				 <div class="img-box">
             <img src="assets/details_img.png" class="w-50 mr-5 mt-3" class="img-fluid" />
  				 </div>
  				</div>
  				<div class="col-lg-6">

  				<form action="methods.php?donation-txn=1&lid=<?php echo $lid."&email=".$email."&target=".$target_for_form."&reached=".$reached_for_form."&uname=".$name ?>" method="post">
  				  <div class="card-details">

  					<div class="row">
  					  <div class="form-group col-sm-7">
  					   <div class="inner-addon right-addon">
  						<label for="card-holder">Card Holder</label>
                          <i class="far fa-user"></i>
  						<input id="card-holder" required type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
  					   </div>
  					  </div>
  					  <div class="form-group col-sm-5">
  						<label for="">Expiration Date</label>
  						<div class="input-group expiration-date">
  						  <input type="number" required class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
  						  <span class="date-separator">/</span>
  						  <input type="number" required class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
  						</div>
  					  </div>
  					  <div class="form-group col-sm-8">
  					   <div class="inner-addon right-addon">
  						<label for="card-number">Card Number</label>
                          <i class="far fa-credit-card"></i>
  						<input id="card-number" type="number" required class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
  					   </div>
  					  </div>
  					  <div class="form-group col-sm-4">
  						<label for="cvc">CVC</label>
  						<input id="cvc" type="number" maxlength="3" required class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
  					  </div>
                <div class="form-group col-sm-12">
    						<label for="amount">Donation amount</label>
    						<input id="amount" required name="donation-amt" autocomplete="off" type="number" class="form-control" placeholder="&#8377;">
    					  </div>
    					  <div class="form-group col-sm-12">
    						<button type="submit" class="btn btn-primary btn-block">Proceed</button>
    					  </div>
  					</div>
  				  </div>
  				</form>

  				</div><!--/col-lg-6 -->

  		       </div><!--/row -->
  			  </div><!--/card-box -->
  			</div><!--/card-holder -->

  		 </div><!--/container -->
  		</section>
        <?php
      }
      ?>

    </div>


    <script src="assets/swiper/swiper.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container', {
     spaceBetween: 30,
     slidesPerView: 1,
     centeredSlides: true,
     autoplay: {
       delay: 2500,
       disableOnInteraction: false,
     },
     pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
      },
   });
    </script>
  </body>
</html>
