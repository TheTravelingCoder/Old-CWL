<?php

$servername = "webserver3.pebblehost.com"; /*This will need to be changed to new server location when hosting*/
$dBUsername = "chinookw_Noodles";
$dBPassword = "BARKwoof1234!!!!";
$dBName = "chinookw_chinookwinds"; /*Name of database within server*/

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
  die("Connection error: " . mysqli_connect_error());
  }
