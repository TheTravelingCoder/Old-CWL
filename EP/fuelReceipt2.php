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

		<div class="container">
				<h1 align="center">
					This is the Fuel Receipt Database Manager
				</h1>
		</div>
    <h2 align="center">
      Please input the information from your fuel receipts
    </h2>
    <?php
    if (isset($_GET['selector'])){
      if ($_GET['selector'] == "566243"){echo'<div class="container" align="center">
          <form  action="../includes/fuel566243.inc.php" method="post" enctype="multipart/form-data"><!-- method=get lets it know we want user
                                                                     info, action is for where to send data-->

            <p class="CC">
              Date:<br />
              <input type="date" name="fuelDate" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Location: (example: TA #0117-Antioch, Tennessee)<br />
              <input type="text" name="location" size="15" maxlength="100" required="required" />
            </p>
            <p class="CC">
              Advertised Diesel Price:<br />
              $<input type="number" min="0.0000" step="0.0001" name="advertised" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Diesel Quantity (Gallons):<br />
              <input type="number" name="gallons" min="0.0000" step="0.0001" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Def Price:<br />
              $<input type="number" min="0.0000" step="0.0001" name="defPrice" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Def Quantity:<br />
              <input type="number" min="0.0000" step="0.0001" name="defQuantity" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              IFTA Rate:<br />
              $<input type="number" min="0.0000" step="0.0001" name="iftaRate" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Comdata Purchase:<br />
              $<input type="number" min="0.0000" step="0.0001" name="comdataPurchase" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Select Image to Upload:<br />
              <input type="file" name="receiptImg" id="receiptImg" required="required" />
            </p>
              <button class="btn btn-primary" type="submit" name="FRSubmit" value="Upload Image">Submit</button>
          </form>
        </div>
    </div><br /></form>';}
    else if($_GET['selector'] == "566521"){echo'<div class="container" align="center">
        <form  action="../includes/fuel566521.inc.php" method="post" enctype="multipart/form-data"><!-- method=get lets it know we want user
                                                                   info, action is for where to send data-->

          <p class="CC">
            Date:<br />
            <input type="date" name="fuelDate" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Location: (example: TA #0117-Antioch, Tennessee)<br />
            <input type="text" name="location" size="15" maxlength="100" required="required" />
          </p>
          <p class="CC">
            Advertised Diesel Price:<br />
            $<input type="number" min="0.0000" step="0.0001" name="advertised" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Diesel Quantity (Gallons):<br />
            <input type="number" name="gallons" min="0.0000" step="0.0001" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Def Price:<br />
            $<input type="number" min="0.0000" step="0.0001" name="defPrice" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Def Quantity:<br />
            <input type="number" min="0.0000" step="0.0001" name="defQuantity" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            IFTA Rate:<br />
            $<input type="number" min="0.0000" step="0.0001" name="iftaRate" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Comdata Purchase:<br />
            $<input type="number" min="0.0000" step="0.0001" name="comdataPurchase" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Select Image to Upload:<br />
            <input type="file" name="receiptImg" id="receiptImg" align="center" required="required" />
          </p>
            <button class="btn btn-primary" type="submit" name="FRSubmit"  value="Upload Image">Submit</button>
        </form>
      </div>
  </div><br /></form>';}
    else if($_GET['selector'] == "567130"){echo'<div class="container" align="center">
        <form  action="../includes/fuel567130.inc.php" method="post" enctype="multipart/form-data"><!-- method=get lets it know we want user
                                                                   info, action is for where to send data-->

          <p class="CC">
            Date:<br />
            <input type="date" name="fuelDate" size="15" maxlength="50" required="required" />
          </p>
          <p class="CC">
            Location: (example: TA #0117-Antioch, Tennessee)<br />
            <input type="text" name="location" size="15" maxlength="100" required="required" />
          </p>
          <p class="CC">
            Advertised Diesel Price:<br />
            $<input type="number" min="0.0000" step="0.0001" name="advertised" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Diesel Quantity (Gallons):<br />
            <input type="number" name="gallons" min="0.0000" step="0.0001" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Def Price:<br />
            $<input type="number" min="0.0000" step="0.0001" name="defPrice" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Def Quantity:<br />
            <input type="number" min="0.0000" step="0.0001" name="defQuantity" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            IFTA Rate:<br />
            $<input type="number" min="0.0000" step="0.0001" name="iftaRate" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Comdata Purchase:<br />
            $<input type="number" min="0.0000" step="0.0001" name="comdataPurchase" size="15" maxlength="30" required="required" />
          </p>
          <p class="CC">
            Select Image to Upload:<br />
            <input type="file" name="receiptImg" id="receiptImg" required="required" />
          </p>
            <button class="btn btn-primary" type="submit" name="FRSubmit"  value="Upload Image">Submit</button>
        </form>
      </div>
  </div><br /></form>';}}
     ?>
</body>


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
