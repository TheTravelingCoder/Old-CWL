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

  <?php
    $load = $_POST['load'];
    $date = $_POST['date'];
    $arrival = $_POST['arrival'];
    $atrailer = $_POST['atrailer'];
    $seal = $_POST['seal'];
    $last = $_POST['last'];
    $mileage = $_POST['mileage'];
    $departure = $_POST['departure'];
    $dtrailer = $_POST['dtrailer'];


    echo "You are about to submit a check call with the following information, are you sure you want to submit? <br />";

    echo "Load Number: " .$load. "<br />";
    echo "Date: " .$date. "<br />";
    echo "Arrival Time: " .$arrival. "<br />";
    echo "Arrival Trailer: " .$atrailer. "<br />";
    echo "Seal Number: " .$seal. "<br />";
    echo "Last Trailer Inspection Date: " .$last. "<br />";
    echo "Tractor Mileage: " .$mileage. "<br />";
    echo "Departure Time: " .$departure. "<br />";
    echo "Departure Trailer: " .$dtrailer. "<br />";

    $_SESSION['load'] = $load;
    $_SESSION['date'] = $date;
    $_SESSION['arrival'] = $arrival;
    $_SESSION['atrailer'] = $atrailer;
    $_SESSION['seal'] = $seal;
    $_SESSION['last'] = $last;
    $_SESSION['mileage'] = $mileage;
    $_SESSION['departure'] = $departure;
    $_SESSION['dtrailer'] = $dtrailer;

    if($_SESSION['aorD'] == "aaShipper"){
      echo'<div class="container" align="center">
      <form  action="../includes/acheckCall.inc.php" method="post" enctype="multipart/form-data">
      <button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
      </form>
    </div>';}
    elseif($_SESSION['aorD'] == "aaConsignee"){
      echo'<div class="container" align="center">
      <form  action="../includes/acheckCall.inc.php" method="post" enctype="multipart/form-data">
      <button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
      </form>
    </div>';}
    elseif($_SESSION['aorD'] == "dfShipper"){
      echo'<div class="container" align="center">
      <form  action="../includes/dscheckCall.inc.php" method="post" enctype="multipart/form-data">
      <button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
      </form>
    </div>';}
    elseif($_SESSION['aorD'] == "dfConsignee"){
      echo'<div class="container" align="center">
      <form  action="../includes/dccheckCall.inc.php" method="post" enctype="multipart/form-data">
      <p class="CC">
        Select Image to Upload:<br />
        <input type="file" name="bol" id="bol" />
      </p>
      <button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
      </form>
    </div>';}
    else{
      echo "Congrats, something broke, call Kevin";
    }
    ?>
</section></body>
