<?php
  require "header.php";
?>
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Chinook Winds Logistics LLC</title>

  <!-- Font Awesome Icons -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="../css/creative.css" rel="stylesheet">

</head>

<body>
<section class="page-section bg-dark text-white">
		<div class="container">
				<h1 align="center">
					This is the check call form website
				</h1>
		</div>
    <h2 align="center">
      Is this an arrival or departure?
    </h2>
    <div align="center">
      <form method="get" name="a/d" action="checkCall2.php">
    <select name="selector">
      <option value="566243">566243</option>
      <option value="566521">566521</option>
      <option value="567130">567130</option>
    </select>
    <select name="selector2">
      <option value="aaShipper">Arrival at Shipper</option>
      <option value="dfShipper">Departure From Shipper</option>
      <option value="aaConsignee">Arrival at Consignee</option>
      <option value="dfConsignee">Departure From Consignee</option>
    </select>
    <input type="submit">
  </div><br /></form></section>




    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/creative.min.js"></script>
	</body>

  <?php
   require "footer.php";
   ?>

</html>
