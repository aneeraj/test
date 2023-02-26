<?php
  include("connection.php");
  $myfile = fopen("address.txt", "r") or die("Unable to open file!");
  // Output one line until end-of-file
  while(!feof($myfile)) {
    $val =  fgets($myfile);
    $sql = "INSERT into remixaccounts(type,address) values('donation','$val')";
    if ($conn->query($sql)) {
      echo "Inserted ".$val."<br>";
    }

  }
  fclose($myfile);
?>
