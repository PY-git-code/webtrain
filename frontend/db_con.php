<?php
//連結資料庫
$servername = "sql113.epizy.com";
$username = "epiz_28909874";
$password = "oneSDRCy2bSGd";
$dbase = "epiz_28909874_20210727";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbase);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

$conn -> query("SET NAMES UTF8");
?>
