<?php
  if(isset($_GET["cat"])){
    $category = $_GET["cat"];
  }else{
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listings</title>
    <link rel="icon" href="assets/details_img.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <script src="assets/bootstrap/js/jquery-1.10.2.js" charset="utf-8"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="assets/cs/listings_categorically.css">
  </head>
  <body>

    <?php
    include("header.php");
    include("connection.php");

    function getRowNum($cat){
      include("connection.php");
      $sql = "SELECT count(listing_ID) as cnt from listings where category='$cat'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      return $row["cnt"];
    }
    ?>

    <div class="container-fluid p-0 m-0">
      <div class="row m-0">
        <div class="col-12 imgsec">
          <div class="row innerrow">
            <div class="col-12 white">
              <h1 class="donate-now">Good going</h1>
              You can find below all the listings related to the selected category. Go ahead and contribute.
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid p-5">
      <div class="row">
        <div class="col-2 p-3 left-links heighted">
          <h4 class="mb-3" style="color: rgb(248,164,147);">Other categories</h4>
          <a href="listings_categorically.php?cat=Arts & culture" class="text-decoration-none black">Art & culture <?php echo getRowNum("Arts & culture"); ?></a>
          <a href="listings_categorically.php?cat=Education" class="text-decoration-none black">Education <?php echo getRowNum("Education"); ?></a>
          <a href="listings_categorically.php?cat=Environment" class="text-decoration-none black">Environment <?php echo getRowNum("Environment"); ?></a>
          <a href="listings_categorically.php?cat=Animals & humane" class="text-decoration-none black">Animal & humane <?php echo getRowNum("Animals & humane"); ?></a>
          <a href="listings_categorically.php?cat=Disaster relief" class="text-decoration-none black">Disaster relief <?php echo getRowNum("Disaster relief"); ?></a>
          <a href="listings_categorically.php?cat=Health & medical" class="text-decoration-none black">Health <?php echo getRowNum("Health & medical"); ?></a>
          <a href="listings_categorically.php?cat=Military" class="text-decoration-none black">Military <?php echo getRowNum("Military"); ?></a>
          <a href="listings_categorically.php?cat=Human services" class="text-decoration-none black">Human services <?php echo getRowNum("Human services"); ?></a>
          <a href="listings_categorically.php?cat=Global" class="text-decoration-none black">Global <?php echo getRowNum("Global"); ?></a>
          <a href="listings_categorically.php?cat=Social" class="text-decoration-none black">Social <?php echo getRowNum("Social"); ?></a>
          <a href="listings_categorically.php?cat=Community & family" class="text-decoration-none black">Community & family <?php echo getRowNum("Community & family"); ?></a>
          <a href="listings_categorically.php?cat=Faith and missions" class="text-decoration-none black">Faith & missions <?php echo getRowNum("Faith and missions"); ?></a>
        </div>
        <div class="col-10 p-3">
          <div class="row pl-5 pr-5">

            <?php
            $sql = "select * from listings where category LIKE '%$category%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $image = explode("*",$row["doclinks"]);
                $image = $image[0];
                if ($image == NULL) {
                  $image = "no_image.jpg";
                }
                $lid = $row["listing_ID"];
                $lid_email = $row["fk_email"];
                $target = (int)$row["target"];

                $sql2 = "SELECT sum(amount) from donations where fk_listing='$lid'";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                $collected = $row2["sum(amount)"];
                if ($collected=="") {
                  $collected = 0;
                }
                $collected = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $collected);
                $percent_collected = round(($row2["sum(amount)"]/$target)*100);

                $sql2 = "SELECT name from user where email='$lid_email'";
                $result2 = $conn->query($sql2);
                $row2 = $result2->fetch_assoc();
                $postedby = $row2["name"];


                echo '<div class="col-4 p-4 rounded">
                  <div class="card">
                    <div class="img-container">
                    <img class="card-img-top" src="listingimages/'.$image.'" alt="Card image cap">
                    </div>
                    <div class="card-body">
                      <h6 class="card-title">'.$row["title"].'</h6>
                      <div class="progress mt-4">
                        <div class="progress-bar" role="progressbar" style="width: '.$percent_collected.'%" aria-valuenow="'.$percent_collected.'" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <div class="row mt-4 text-center">
                        <div class="col-6 border-right p-0">
                          <p class="mb-0">Raised</p>
                          <p class="small-text">&#8377;'.$collected.'</p>
                        </div>
                        <div class="col-6 p-0">
                          <p class="mb-0">Created by</p>
                          <p class="small-text">'.$postedby.'</p>
                        </div>
                      </div>
                      <div class="text-center mt-3">
                        <a href="details.php?listing='.$row["listing_ID"].'" class="btn btn-primary w-75">Details</a>
                      </div>
                    </div>
                  </div>
                </div>';
              }
            } else {
              echo "Sorry! no listings found in this category";
            }
            ?>
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

  </body>
</html>
