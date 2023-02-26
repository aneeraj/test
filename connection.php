<?php
date_default_timezone_set('Asia/Kolkata');
$servername = "db-mysql-blr1-00436-do-user-12232507-0.b.db.ondigitalocean.com";
$username = "doadmin";
$password = "AVNS_sRVnWmkZg6brEHdfOMw";
$dbname = "defaultdb";
$port = "25060";
$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
