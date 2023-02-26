<?php
date_default_timezone_set('Asia/Kolkata');
$servername = "db-mysql-blr1-00436-do-user-12232507-0.b.db.ondigitalocean.com";
$username = "doadmin";
$password = "AVNS_sRVnWmkZg6brEHdfOMw";
$dbname = "defaultdb";
$port = "25060";

$con = mysqli_init();
if (!$con) {
  die("mysqli_init failed");
}

mysqli_ssl_set($con, NULL, NULL, "ca-certificate.crt", NULL, NULL);

if (!mysqli_real_connect($con, $servername, $username, $password, $dbname, $port)) {
  die("Connect Error: " . mysqli_connect_error());
}


?>
