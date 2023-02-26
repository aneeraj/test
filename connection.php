<?php
date_default_timezone_set('Asia/Kolkata');
$servername = "db-mysql-blr1-00436-do-user-12232507-0.b.db.ondigitalocean.com";
$username = "doadmin";
$password = "AVNS_sRVnWmkZg6brEHdfOMw";
$dbname = "defaultdb";
$port = "25060";
$conn = mysqlii_init();
$conn->ssl_set(null, null, 'ca-certificate.crt', null, null);
$conn->real_connct($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
