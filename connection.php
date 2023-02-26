<?php
date_default_timezone_set('Asia/Kolkata');
$servername = "db-mysql-blr1-00436-do-user-12232507-0.b.db.ondigitalocean.com";
$username = "doadmin";
$password = "AVNS_U7hZWuzHqefOjo73Xuf";
$dbname = "defaultdb";
$port = "25060";

$conn = mysqli_init();
if (!$conn) {
  die("mysqli_init failed");
}

mysqli_ssl_set($con, NULL, NULL, "ca-certificate.crt", NULL, NULL);

if (!mysqli_real_connect($conn, $servername, $username, $password, $dbname, $port)) {
  die("Connect Error: " . mysqli_connect_error());
}


?>
