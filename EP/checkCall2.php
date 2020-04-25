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
<section class="page-section bg-dark text-white">
		<div class="container">
				<h1 align="center">
					This is the check call form website
				</h1>
		</div>

<?php
if (isset($_GET['selector']) && isset($_GET['selector2'])){
  $tNum = $_GET['selector'];
  $ad = $_GET['selector2'];

  /*Defining Values for $_SESSION*/
  $_SESSION['truckNumber'] = $tNum;
  $_SESSION['aorD'] = $ad;

  if ($tNum == "566243"){
    if($ad == "aaShipper"){
  echo'<div class="container" align="center">
			<form  action="checkCall3.php" method="post" enctype="multipart/form-data"><!-- method=get lets it know we want user
														                                     info, action is for where to send data-->
        <p class="CC">
          Load Number: (ie: JQL4979119)<br />
          <input type="text" name="load" size="15" maxlength="30" required="required" />
        </p>
        <p class="CC">
					Date:<br />
					<input type="date" name="date" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Arrival Time:<br />
					<input type="time" name="arrival" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Arrival Trailer:<br />
					<input type="text" name="atrailer" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Seal Number: (If no seal, please enter "No Seal")<br />
					<input type="text" name="seal" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Last Trailer Inspection date:<br />
					<input type="date" name="last" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Tractor Mileage:<br />
					<input type="number" name="mileage" size="15" maxlength="30" required="required" />
				</p>
					<button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
			</form>
		</div>';}
    elseif($ad == "aaConsignee"){
  echo'<div class="container" align="center">
			<form  action="checkCall3.php" method="post" enctype="multipart/form-data"><!-- method=get lets it know we want user
														                                     info, action is for where to send data-->
        <p class="CC">
          Load Number: (ie: JQL4979119)<br />
          <input type="text" name="load" size="15" maxlength="30" required="required" />
        </p>
        <p class="CC">
					Date:<br />
					<input type="date" name="date" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Arrival Time:<br />
					<input type="time" name="arrival" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Arrival Trailer:<br />
					<input type="text" name="atrailer" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Seal Number: (If no seal, please enter "No Seal")<br />
					<input type="text" name="seal" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Last Trailer Inspection date:<br />
					<input type="date" name="last" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Tractor Mileage:<br />
					<input type="number" name="mileage" size="15" maxlength="30" required="required" />
				</p>
					<button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
			</form>
		</div>';}
    elseif($ad == "dfShipper"){
  echo'<div class="container" align="center">
			<form  action="checkCall3.php" method="post" enctype="multipart/form-data">
        <p class="CC">
          Load Number: (ie: JQL4979119)<br />
          <input type="text" name="load" size="15" maxlength="30" required="required" />
        </p>
        <p class="CC">
					Date:<br />
					<input type="date" name="date" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Arrival Time:<br />
					<input type="time" name="arrival" size="15" maxlength="30" required="required" />
				</p>
        <p class="CC">
          Departure Time:<br />
          <input type="time" name="departure" size="15" maxlength="30" required="required" />
        </p>
				<p class="CC">
					Arrival Trailer:<br />
					<input type="text" name="atrailer" size="15" maxlength="30" required="required" />
				</p>
        <p class="CC">
          Departure Trailer: (If no trailer, please enter Bobtail)<br />
          <input type="text" name="dtrailer" size="15" maxlength="30" required="required" />
        </p>
				<p class="CC">
					Seal Number: (If no seal, please enter "No Seal")<br />
					<input type="text" name="seal" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Last Trailer Inspection date:<br />
					<input type="date" name="last" size="15" maxlength="30" required="required" />
				</p>
				<p class="CC">
					Tractor Mileage:<br />
					<input type="number" name="mileage" size="15" maxlength="30" required="required" />
				</p>
					<button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
			</form>
		</div>';}
    elseif($ad == "dfConsignee"){
      echo'<div class="container" align="center">
          <form  action="checkCall3.php" method="post" enctype="multipart/form-data">
            <p class="CC">
              Load Number: (ie: JQL4979119<br />
              <input type="text" name="load" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Date:<br />
              <input type="date" name="date" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Arrival Time:<br />
              <input type="time" name="arrival" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Departure Time:<br />
              <input type="time" name="departure" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Arrival Trailer:<br />
              <input type="text" name="atrailer" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Departure Trailer: (If no trailer, please enter Bobtail)<br />
              <input type="text" name="dtrailer" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Seal Number: (If no seal, please enter "No Seal")<br />
              <input type="text" name="seal" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Last Trailer Inspection date:<br />
              <input type="date" name="last" size="15" maxlength="30" required="required" />
            </p>
            <p class="CC">
              Tractor Mileage:<br />
              <input type="number" name="mileage" size="15" maxlength="30" required="required" />
            </p>
              <button class="btn btn-primary" type="submit" name="CCSubmit" value="Upload Image">Submit</button>
          </form>
        </div>';}}
  elseif ($tNum == "566521"){
      if($ad == "aaShipper"){
        echo'<div class="container" align="center">
      			<form  action="checkCall3.php" method="post" enctype="multipart/form-data"><!-- method=get lets it know we want user
      														                                     info, action is for where to send data-->
              <p class="CC">
                Load Number: (ie: JQL4979119)<br />
                <input type="text" name="load" size="15" maxlength="30" required="required" />
              </p>
              <p class="CC">
      					Date:<br />
      					<input type="date" name="date" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Arrival Time:<br />
      					<input type="time" name="arrival" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Arrival Trailer:<br />
      					<input type="text" name="atrailer" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Seal Number: (If no seal, please enter "No Seal")<br />
      					<input type="text" name="seal" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Last Trailer Inspection date:<br />
      					<input type="date" name="last" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Tractor Mileage:<br />
      					<input type="number" name="mileage" size="15" maxlength="30" required="required" />
      				</p>
      					<button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
      			</form>
      		</div>';}
      elseif($ad == "aaConsignee"){
        echo'<div class="container" align="center">
      			<form  action="checkCall3.php" method="post" enctype="multipart/form-data"><!-- method=get lets it know we want user
      														                                     info, action is for where to send data-->
              <p class="CC">
                Load Number: (ie: JQL4979119)<br />
                <input type="text" name="load" size="15" maxlength="30" required="required" />
              </p>
              <p class="CC">
      					Date:<br />
      					<input type="date" name="date" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Arrival Time:<br />
      					<input type="time" name="arrival" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Arrival Trailer:<br />
      					<input type="text" name="atrailer" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Seal Number: (If no seal, please enter "No Seal")<br />
      					<input type="text" name="seal" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Last Trailer Inspection date:<br />
      					<input type="date" name="last" size="15" maxlength="30" required="required" />
      				</p>
      				<p class="CC">
      					Tractor Mileage:<br />
      					<input type="number" name="mileage" size="15" maxlength="30" required="required" />
      				</p>
      					<button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
      			</form>
      		</div>';}
          elseif($ad == "dfShipper"){
            echo'<div class="container" align="center">
          			<form  action="checkCall3.php" method="post" enctype="multipart/form-data">
                  <p class="CC">
                    Load Number: (ie: JQL4979119)<br />
                    <input type="text" name="load" size="15" maxlength="30" required="required" />
                  </p>
                  <p class="CC">
          					Date:<br />
          					<input type="date" name="date" size="15" maxlength="30" required="required" />
          				</p>
          				<p class="CC">
          					Arrival Time:<br />
          					<input type="time" name="arrival" size="15" maxlength="30" required="required" />
          				</p>
                  <p class="CC">
                    Departure Time:<br />
                    <input type="time" name="departure" size="15" maxlength="30" required="required" />
                  </p>
          				<p class="CC">
          					Arrival Trailer:<br />
          					<input type="text" name="atrailer" size="15" maxlength="30" required="required" />
          				</p>
                  <p class="CC">
                    Departure Trailer: (If no trailer, please enter Bobtail)<br />
                    <input type="text" name="dtrailer" size="15" maxlength="30" required="required" />
                  </p>
          				<p class="CC">
          					Seal Number: (If no seal, please enter "No Seal")<br />
          					<input type="text" name="seal" size="15" maxlength="30" required="required" />
          				</p>
          				<p class="CC">
          					Last Trailer Inspection date:<br />
          					<input type="date" name="last" size="15" maxlength="30" required="required" />
          				</p>
          				<p class="CC">
          					Tractor Mileage:<br />
          					<input type="number" name="mileage" size="15" maxlength="30" required="required" />
          				</p>
          					<button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
          			</form>
          		</div>';}
          elseif($ad == "dfConsignee"){
            echo'<div class="container" align="center">
                <form  action="checkCall3.php" method="post" enctype="multipart/form-data">
                  <p class="CC">
                    Load Number: (ie: JQL4979119<br />
                    <input type="text" name="load" size="15" maxlength="30" required="required" />
                  </p>
                  <p class="CC">
                    Date:<br />
                    <input type="date" name="date" size="15" maxlength="30" required="required" />
                  </p>
                  <p class="CC">
                    Arrival Time:<br />
                    <input type="time" name="arrival" size="15" maxlength="30" required="required" />
                  </p>
                  <p class="CC">
                    Departure Time:<br />
                    <input type="time" name="departure" size="15" maxlength="30" required="required" />
                  </p>
                  <p class="CC">
                    Arrival Trailer:<br />
                    <input type="text" name="atrailer" size="15" maxlength="30" required="required" />
                  </p>
                  <p class="CC">
                    Departure Trailer: (If no trailer, please enter Bobtail)<br />
                    <input type="text" name="dtrailer" size="15" maxlength="30" required="required" />
                  </p>
                  <p class="CC">
                    Seal Number: (If no seal, please enter "No Seal")<br />
                    <input type="text" name="seal" size="15" maxlength="30" required="required" />
                  </p>
                  <p class="CC">
                    Last Trailer Inspection date:<br />
                    <input type="date" name="last" size="15" maxlength="30" required="required" />
                  </p>
                  <p class="CC">
                    Tractor Mileage:<br />
                    <input type="number" name="mileage" size="15" maxlength="30" required="required" />
                  </p>
                    <button class="btn btn-primary" type="submit" name="CCSubmit" value="Upload Image">Submit</button>
                </form>
              </div>';}}
  elseif ($tNum == "567130"){
      if($ad == "aaShipper"){
              echo'<div class="container" align="center">
            			<form  action="checkCall3.php" method="post" enctype="multipart/form-data"><!-- method=get lets it know we want user
            														                                     info, action is for where to send data-->
                    <p class="CC">
                      Load Number: (ie: JQL4979119)<br />
                      <input type="text" name="load" size="15" maxlength="30" required="required" />
                    </p>
                    <p class="CC">
            					Date:<br />
            					<input type="date" name="date" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Arrival Time:<br />
            					<input type="time" name="arrival" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Arrival Trailer:<br />
            					<input type="text" name="atrailer" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Seal Number: (If no seal, please enter "No Seal")<br />
            					<input type="text" name="seal" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Last Trailer Inspection date:<br />
            					<input type="date" name="last" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Tractor Mileage:<br />
            					<input type="number" name="mileage" size="15" maxlength="30" required="required" />
            				</p>
            					<button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
            			</form>
            		</div>';}
                elseif($ad == "aaConsignee"){
              echo'<div class="container" align="center">
            			<form  action="checkCall3.php" method="post" enctype="multipart/form-data"><!-- method=get lets it know we want user
            														                                     info, action is for where to send data-->
                    <p class="CC">
                      Load Number: (ie: JQL4979119)<br />
                      <input type="text" name="load" size="15" maxlength="30" required="required" />
                    </p>
                    <p class="CC">
            					Date:<br />
            					<input type="date" name="date" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Arrival Time:<br />
            					<input type="time" name="arrival" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Arrival Trailer:<br />
            					<input type="text" name="atrailer" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Seal Number: (If no seal, please enter "No Seal")<br />
            					<input type="text" name="seal" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Last Trailer Inspection date:<br />
            					<input type="date" name="last" size="15" maxlength="30" required="required" />
            				</p>
            				<p class="CC">
            					Tractor Mileage:<br />
            					<input type="number" name="mileage" size="15" maxlength="30" required="required" />
            				</p>
            					<button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
            			</form>
            		</div>';}
                elseif($ad == "dfShipper"){
                  echo'<div class="container" align="center">
                			<form  action="checkCall3.php" method="post" enctype="multipart/form-data">
                        <p class="CC">
                          Load Number: (ie: JQL4979119)<br />
                          <input type="text" name="load" size="15" maxlength="30" required="required" />
                        </p>
                        <p class="CC">
                					Date:<br />
                					<input type="date" name="date" size="15" maxlength="30" required="required" />
                				</p>
                				<p class="CC">
                					Arrival Time:<br />
                					<input type="time" name="arrival" size="15" maxlength="30" required="required" />
                				</p>
                        <p class="CC">
                          Departure Time:<br />
                          <input type="time" name="departure" size="15" maxlength="30" required="required" />
                        </p>
                				<p class="CC">
                					Arrival Trailer:<br />
                					<input type="text" name="atrailer" size="15" maxlength="30" required="required" />
                				</p>
                        <p class="CC">
                          Departure Trailer: (If no trailer, please enter Bobtail)<br />
                          <input type="text" name="dtrailer" size="15" maxlength="30" required="required" />
                        </p>
                				<p class="CC">
                					Seal Number: (If no seal, please enter "No Seal")<br />
                					<input type="text" name="seal" size="15" maxlength="30" required="required" />
                				</p>
                				<p class="CC">
                					Last Trailer Inspection date:<br />
                					<input type="date" name="last" size="15" maxlength="30" required="required" />
                				</p>
                				<p class="CC">
                					Tractor Mileage:<br />
                					<input type="number" name="mileage" size="15" maxlength="30" required="required" />
                				</p>
                					<button class="btn btn-primary" type="submit" name="CCSubmit">Submit</button>
                			</form>
                		</div>';}
                elseif($ad == "dfConsignee"){
                  echo'<div class="container" align="center">
                      <form  action="checkCall3.php" method="post" enctype="multipart/form-data">
                        <p class="CC">
                          Load Number: (ie: JQL4979119<br />
                          <input type="text" name="load" size="15" maxlength="30" required="required" />
                        </p>
                        <p class="CC">
                          Date:<br />
                          <input type="date" name="date" size="15" maxlength="30" required="required" />
                        </p>
                        <p class="CC">
                          Arrival Time:<br />
                          <input type="time" name="arrival" size="15" maxlength="30" required="required" />
                        </p>
                        <p class="CC">
                          Departure Time:<br />
                          <input type="time" name="departure" size="15" maxlength="30" required="required" />
                        </p>
                        <p class="CC">
                          Arrival Trailer:<br />
                          <input type="text" name="atrailer" size="15" maxlength="30" required="required" />
                        </p>
                        <p class="CC">
                          Departure Trailer: (If no trailer, please enter Bobtail)<br />
                          <input type="text" name="dtrailer" size="15" maxlength="30" required="required" />
                        </p>
                        <p class="CC">
                          Seal Number: (If no seal, please enter "No Seal")<br />
                          <input type="text" name="seal" size="15" maxlength="30" required="required" />
                        </p>
                        <p class="CC">
                          Last Trailer Inspection date:<br />
                          <input type="date" name="last" size="15" maxlength="30" required="required" />
                        </p>
                        <p class="CC">
                          Tractor Mileage:<br />
                          <input type="number" name="mileage" size="15" maxlength="30" required="required" />
                        </p>
                          <button class="btn btn-primary" type="submit" name="CCSubmit" value="Upload Image">Submit</button>
                      </form>
                    </div>';}}
                    else {
                      echo "error";
                    }
      }?>
    </section>

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
