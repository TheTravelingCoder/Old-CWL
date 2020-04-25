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
<?php
if (isset($_GET['selector1'])){

  if ($_GET['selector1'] == "receipt"){
    echo '<div class="container">
				  <h1 align="center">This is the fuel receipt form</h1>
		      </div>
          <h2 align="center">Which truck is this fuel receipt for?</h2>
          <div align="center">
            <form method="get" name="truckNumber" action="fuelReceipt2.php">
              <select name="selector">
                <option value="566243">566243</option>
                <option value="566521">566521</option>
                <option value="567130">567130</option>
              </select>
            <input type="submit"><br /></form></div>';}
  elseif ($_GET['selector1'] == "report"){
    if($_SESSION['userUid'] == 'Noodlescoop' || $_SESSION['userUid'] == 'addeaton'){
      echo '<section class="page-section bg-dark text-white" id="contact">
        <div class="container">
          <h1 align="center">
            This is the fuel report webpage
          </h1>
      </div>
      <h2 align="center">
        What kind of report can I make for you?
      </h2>
      <div align="center">
        <form method="get" name="reportType" action="../includes/fuelReport.inc.php">

      <select name="truckNumber">
        <option value="566243">566243</option>
        <option value="566521">566521</option>
        <option value="567130">567130</option>
        <option value="allTrucks">All Trucks</option>
      </select>
      <select name="reportSelect">
        <option value="fuelQuantity">Total Fuel Quantity</option>
        <option value="fuelCost">Total Fuel Cost</option>
        <option value="totalComdata">Total Comdata Purchase</option>
      </select>
      <div class="form-group floating-label-form-group controls mb-0 pb-2">
        Start Date:<br />
        <input type="date" name="reportDateStart" size="15" maxlength="50" required="required" />
      </div>
      <div class="form-group floating-label-form-group controls mb-0 pb-2">
        End Date:<br />
        <input type="date" name="reportDateEnd" size="15" maxlength="50" required="required" />
      </div>
      <input type="submit" name="submit">
    </div><br /></form></section>';}
    else{
      echo'<section class="page-section bg-dark text-white" id="contact">
        <div class="container text-center">
        <div class="container">
        <h1 align="center">
          Sorry, you do not have access to this page
        </h1></div>
        </div></section>';}
  }
  else {
    echo 'There is a glitch in the system!';
  }}
?>

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
