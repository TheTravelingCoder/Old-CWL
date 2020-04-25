<?php
  require "header.php";
?>
<!DOCTYPE html>

<!-- to run the php "cd C:\Users\Kevin Richards\Desktop\Chinook Website"
     Then php -S localhost:8000-->
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
    if (isset($_GET['selector'])){

      /*Defining Values for $_SESSION*/
      $selector = $_GET['selector'];
      $_SESSION['selector'] = $selector;

      if ($_GET['selector'] == "receipt"){
        echo'<section class="page-section bg-dark text-white" id="contact">
          <div class="container text-center">
          <div class="container">
          <h1 align="center">
          	This is the Maintenance Receipt Manager
          </h1></div>
        <div class="container" align="center">
            <form action="../includes/maintenance.inc.php" method="post" enctype="multipart/form-data">
              <p class="CC">
                Todays Date:<br />
                <input class="form-control" type="date" name="todaysDate" size="15" maxlength="30" required="required" />
              </p>
              <p class="CC">
                Date of Receipt:<br />
                <input class="form-control" type="date" name="receiptDate" size="15" maxlength="30" required="required" />
              </p>
              <p class="CC">
                Truck Number:<br />
                <input class="form-control" type="number" placeholder="Truck Number" name="truckNumber" size="15" maxlength="30" />
              </p>
              <p class="CC">
                Tractor Mileage:<br />
                <input class="form-control" type="number" placeholder="Tractor Mileage" name="tractorMileage" size="15" maxlength="30" />
              </p>
              <h2 align="center">
                What kind of work did you have done on your vehicle?<br />
              </h2>
              <p class="CC">
                <input type="checkbox" name="annualInspection" value="checked">Annual Inspection<br>
                <input type="checkbox" name="pmService" value="checked">PM Service<br>
                <input type="checkbox" name="lubeService" value="checked">Lube Service<br>
                <input type="checkbox" name="dpfFilterClean" value="checked">DPF Filter Clean<br>
                <input type="checkbox" name="airFilter" value="checked">Air Filter<br>
                <input type="checkbox" name="engineOverheadAdjustment" value="checked">Engine Overhead Adjustment<br>
                <input type="checkbox" name="engineWash" value="checked">Engine Wash<br>
                <input type="checkbox" name="coolant" value="checked">Coolant<br>
                <input type="checkbox" name="coolantFilter" value="checked">Coolant Filter<br>
                <input type="checkbox" name="fanBelt" value="checked">Fan Belt<br>
                <input type="checkbox" name="fuelTankVent" value="checked">Fuel Tank Vent<br>
                <input type="checkbox" name="aHI" value="checked">Aftertreatment Hydrocarbon Injector (AHI)<br>
                <input type="checkbox" name="transOil" value="checked">Transmission Oil/Filter<br>
                <input type="checkbox" name="def" value="checked">Def Pump and Tank Filler<br>
                <input type="checkbox" name="axleAlignment" value="checked">Axle Alignment<br>
                <input type="checkbox" name="vrao" value="checked">Vendor Rear Axle Oil<br>
                <input type="checkbox" name="powerSteering" value="checked">Power Steering Fluid and Filter<br>
                <input type="checkbox" name="aDCC" value="checked">Air Dryer Coalescing Cartridge<br>
              </p>
              <p class="CC">
                Comments or Additional Maintenance:<br />
                <input class="form-control" id="message" rows="5" placeholder="Message" name="message" required="required" data-validation-required-message="Please enter a message."  maxlength="255"></textarea>
              </p>
              <p class="CC">
                Select Receipt to Upload:<br />
                <input class="form-control" type="file" name="receiptImg" id="receiptImg" required="required" align="center" />
              </p>
                <button class="btn btn-primary" type="submit" name="maintenanceSubmit" value="Upload Image">Submit</button>
            </form>
          </div>
      </div><br /></form></div></section>';}
      elseif($_GET['selector'] == "reports"){
        if($_SESSION['userUid'] == 'Noodlescoop' || $_SESSION['userUid'] == 'Carlos' || $_SESSION['userUid'] == 'addeaton'){
          echo'<section class="page-section bg-dark text-white">
          <h1 align="center"> What report would you like? </h1>
          <form action="../includes/maintenance.inc.php" method="post" enctype="multipart/form-data" align="center">
          <select name="report">
          <option value="maintenance">All Trucks and Previous Maintenance</option>
          </select>
          <button class="btn btn-primary" type="submit" name="maintenanceSubmit">Get Report</button>
          </form>
          </section>';}
        else{
          echo'<section class="page-section bg-dark text-white">
            <div class="container text-center">
            <div class="container">
            <h1 align="center">
              Sorry, you do not have access to this page
            </h1></div>
            </div></section>';}}
      else{
        echo "There was an error generating this webpage";
      }}?>

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
