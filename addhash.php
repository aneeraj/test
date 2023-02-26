<?php
  include("islogged.php");
  include("connection.php");

  if (isset($_GET["register"],$_GET["email"],$_GET["hash"])) {
    $email = $_GET["email"];
    $hash = $_GET["hash"];
    $sql = "UPDATE user set AC_hash='$hash' where email='$email'";
    if ($conn->query($sql)) {
      echo "hash added";
    }else{
      echo "failed";
    }
  }

  if (isset($_GET["listing"],$_GET["lid"],$_GET["cat"],$_GET["title"])) {
    $lid = $_GET["lid"];
    $cat = $_GET["cat"];
    $title = $_GET["title"];
    $hash = $_GET["hash"];
    $sql = "UPDATE listings set hash='$hash' where listing_ID='$lid' and title='$title'";
    if ($conn->query($sql)) {
      echo "hash added";
    }else{
      echo "failed";
    }
  }

  if (isset($_GET["donation"])) {
    $lid = $_GET["lid"];
    $from = $_GET["from"];
    $to = $_GET["to"];
    $amt = $_GET["amt"];
    $dtime = $_GET["dtime"];
    $hash = $_GET["hash"];
    $sql = "UPDATE donations set dhash='$hash' where fk_listing='$lid' and from_email='$from' and to_email='$to' and amount='$amt' and date_time='$dtime'";
    if ($conn->query($sql)) {
      echo "hash added";
    }else{
      echo "failed";
    }
  }

  if (isset($_GET["verified_donation"],$_GET["did"],$_GET["hash"])) {
    $did = $_GET["did"];
    $hash = $_GET["hash"];
    $sql = "UPDATE donations set dhash='$hash' where d_ID='$did'";
    if ($conn->query($sql)) {
      echo "hash added";
    }else{
      echo "failed";
    }
  }
?>
