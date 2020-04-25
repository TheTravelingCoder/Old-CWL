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
  session_start();
    if (isset($_GET['selector'])){

      /*Defining Values for $_SESSION*/
      $selector = $_GET['selector'];
      $_SESSION['selector'] = $selector;

      if ($_GET['selector'] == "reimbursements"){
        if($_SESSION['userUid'] == 'Noodlescoop' || $_SESSION['userUid'] == 'addeaton'){
        echo'<section class="page-section bg-dark text-white" id="contact">
          <div class="container text-center">
          <div class="container">
          <h1 align="center">
          	This is the Expense Database Manager
          </h1></div>
          <h2 align="center">
            Please input the information from your receipts<br />
          </h2>
        <div class="container" align="center">
            <form action="../includes/reimbursements.inc.php" method="post" enctype="multipart/form-data">
              <p class="CC">
                Date of Receipt:<br />
                <input class="form-control" type="date" name="receiptDate" size="15" maxlength="30" required="required" />
              </p>
              <p class="CC">
                Please Select Your Name: <br />
              <select name="selector2" class="form-control">
                <option value="addeaton">Andrew Deaton</option>
                <option value="akbrown">Amanda Brown</option>
                <option value="cmaguilar">Carlos Aguilar</option>
                <option value="crmorales">Christopher Morales</option>
                <option value="dwmyers">David Myers</option>
                <option value="jmcox">Jon Cox</option>
                <option value="karichards">Kevin Richards</option>
                <option value="wcmelson">Will Melson</option>
              </select></p>
              <p class="CC">
                Truck Number:<br />
                <input class="form-control" type="number" placeholder="Truck Number" name="truckNumber" size="15" maxlength="30" />
              </p>
              <p class="CC">
                Expense Amount:<br />
                <input class="form-control" type="number" placeholder="Expense Amount" min="0.00" step="0.01" name="amount" size="15" maxlength="30" required="required" />
              </p>
              <p class="CC">
                Reason for Expense:<br />
                <input class="form-control" id="message" rows="5" placeholder="Message" name="message" required="required" data-validation-required-message="Please enter a message."  maxlength="255"></textarea>
              </p>
              <p class="CC">
                IRS Tax Justification:<br />
                <select name="irs" class="form-control">
                  <option value="costOfGoodsSold">Cost of Goods Sold</option>
                  <option value="costOfGoodsSoldFuel">(Cost of Goods Sold) Fuel</option>
                  <option value="costOfGoodsSoldTolls">(Cost of Goods Sold) Tolls</option>
                  <option value="costOfGoodsSoldTruckScale">(Cost of Goods Sold) Truck Scale</option>
                  <option value="bankFees">Bank Fees</option>
                  <option value="employeeBenefits">Employee Benefits</option>
                  <option value="equipmentPayment">Equipment Payment</option>
                  <option value="insurance">Insurance</option>
                  <option value="interest">Interest</option>
                  <option value="licensing">Licensing</option>
                  <option value="maintenance">Maintenance</option>
                  <option value="maintenanceTruckWash">Maintenance (Truck Wash)</option>
                  <option value="mealsAndEntertainment">Meals And Entertainment</option>
                  <option value="officeEquipment">Office Equipment</option>
                  <option value="officeSupplies">Office Supplies</option>
                  <option value="payroll401k">Payroll 401k</option>
                  <option value="payrollGarnishments">Payroll Garnishments</option>
                  <option value="payrollProfessionalFees">Payroll Professinoal Fees</option>
                  <option value="payrollTaxes">Payroll Taxes</option>
                  <option value="payrollWages">Payroll Wages</option>
                  <option value="professionalFees">Professional Fees</option>
                  <option value="rent">Rent</option>
                  <option value="revenue">Revenue</option>
                  <option value="startupCapital">Startup Capital</option>
                  <option value="taxes">Taxes</option>
                  <option value="travelExpenses">Travel Expenses</option>
                  <option value="usps">USPS</option>
                  <option value="utilities">Utilities</option>
                </select></p>
              <p class="CC">
                Select Receipt to Upload:<br />
                <input class="form-control" type="file" name="receiptImg" id="receiptImg" required="required" align="center" />
              </p>
              <p class="CC">
                <input class="form-control" type="checkbox" name="ccbox" align="center"> Was this Purchase made on a company card? </input>
              </p>
                <button class="btn btn-primary" type="submit" name="reimbursementSubmit" value="Upload Image">Submit</button>
            </form>
          </div>
      </div><br /></form></div></section>';}else{
        echo'<section class="page-section bg-dark text-white" id="contact">
          <div class="container text-center">
          <div class="container">
          <h1 align="center">
          	This is the Expense Database Manager
          </h1></div>
          <h2 align="center">
            Please input the information from your receipts<br />
          </h2>
        <div class="container" align="center">
            <form action="../includes/reimbursements.inc.php" method="post" enctype="multipart/form-data">
              <p class="CC">
                Date of Receipt:<br />
                <input class="form-control" type="date" name="receiptDate" size="15" maxlength="30" required="required" />
              </p>
              <p class="CC">
                Please Select Your Name: <br />
              <select name="selector2" class="form-control">
                <option value="addeaton">Andrew Deaton</option>
                <option value="akbrown">Amanda Brown</option>
                <option value="cmaguilar">Carlos Aguilar</option>
                <option value="crmorales">Christopher Morales</option>
                <option value="dwmyers">David Myers</option>
                <option value="jmcox">Jon Cox</option>
                <option value="karichards">Kevin Richards</option>
                <option value="wcmelson">Will Melson</option>
              </select></p>
              <p class="CC">
                Truck Number:<br />
                <input class="form-control" type="number" placeholder="Truck Number" name="truckNumber" size="15" maxlength="30" />
              </p>
              <p class="CC">
                Expense Amount:<br />
                <input class="form-control" type="number" placeholder="Expense Amount" min="0.00" step="0.01" name="amount" size="15" maxlength="30" required="required" />
              </p>
              <p class="CC">
                Reason for Expense:<br />
                <input class="form-control" id="message" rows="5" placeholder="Message" name="message" required="required" data-validation-required-message="Please enter a message."  maxlength="255"></textarea>
              </p>
              <p class="CC">
                IRS Tax Justification:<br />
                <select name="irs" class="form-control">
                  <option value="costOfGoodsSold">Cost of Goods Sold</option>
                  <option value="costOfGoodsSoldFuel">(Cost of Goods Sold) Fuel</option>
                  <option value="costOfGoodsSoldTolls">(Cost of Goods Sold) Tolls</option>
                  <option value="costOfGoodsSoldTruckScale">(Cost of Goods Sold) Truck Scale</option>
                  <option value="bankFees">Bank Fees</option>
                  <option value="employeeBenefits">Employee Benefits</option>
                  <option value="equipmentPayment">Equipment Payment</option>
                  <option value="insurance">Insurance</option>
                  <option value="interest">Interest</option>
                  <option value="licensing">Licensing</option>
                  <option value="maintenance">Maintenance</option>
                  <option value="maintenanceTruckWash">Maintenance (Truck Wash)</option>
                  <option value="mealsAndEntertainment">Meals And Entertainment</option>
                  <option value="officeEquipment">Office Equipment</option>
                  <option value="officeSupplies">Office Supplies</option>
                  <option value="payroll401k">Payroll 401k</option>
                  <option value="payrollGarnishments">Payroll Garnishments</option>
                  <option value="payrollProfessionalFees">Payroll Professinoal Fees</option>
                  <option value="payrollTaxes">Payroll Taxes</option>
                  <option value="payrollWages">Payroll Wages</option>
                  <option value="professionalFees">Professional Fees</option>
                  <option value="rent">Rent</option>
                  <option value="revenue">Revenue</option>
                  <option value="startupCapital">Startup Capital</option>
                  <option value="taxes">Taxes</option>
                  <option value="travelExpenses">Travel Expenses</option>
                  <option value="usps">USPS</option>
                  <option value="utilities">Utilities</option>
                </select></p>
              <p class="CC">
                Select Receipt to Upload:<br />
                <input class="form-control" type="file" name="receiptImg" id="receiptImg" required="required" align="center" />
              </p>
              <p class="CC">
                <input class="form-control" type="checkbox" name="ccbox" align="center"> Was this Purchase made on a company card? </input>
              </p>
                <button class="btn btn-primary" type="submit" name="reimbursementSubmit" value="Upload Image">Submit</button>
            </form>
          </div>
      </div><br /></form></div></section>';}
    }
      elseif($_GET['selector'] == "reports"){
        if($_SESSION['userUid'] == 'Noodlescoop' || $_SESSION['userUid'] == 'addeaton'){
          echo'<section class="page-section bg-dark text-white" id="contact">
            <div class="container text-center">
            <div class="container">
            <h1 align="center">
            	This is the Reimbursement Database Manager
            </h1></div>
            <h2 align="center">
              Please input the information from your receipts<br />
            </h2>
          <div class="container" align="center">
              <form action="../includes/reimbursements.inc.php" method="post" enctype="multipart/form-data">
                <p class="CC">
                  Start Date of Report:<br />
                  <input class="form-control" type="date" name="startDate" size="15" maxlength="30" required="required" />
                </p>
                <p class="CC">
                  End Date of Report:<br />
                  <input class="form-control" type="date" name="endDate" size="15" maxlength="100" required="required" />
                </p>
                  <button class="btn btn-primary" type="submit" name="reimbursementSubmit" value="Upload Image">Submit</button>
              </form>
            </div>
        </div><br /></form></div></section>';}
        else{
          echo'<section class="page-section bg-dark text-white" id="contact">
            <div class="container text-center">
            <div class="container">
            <h1 align="center">
              Sorry, you do not have access to this page
            </h1></div>
            </div></section>';}}
      elseif($_GET['selector'] == "update"){
        if($_SESSION['userUid'] == 'Noodlescoop' || $_SESSION['userUid'] == 'addeaton'){
        echo'<section class="page-section bg-dark text-white" id="contact">
          <div class="container text-center">
          <div class="container">
          <h1 align="center">
          	This is the receipt update database manager
          </h1></div>
          <h2 align="center">
            Please enter the information for the receipt you would like to update<br />
          </h2>
        <div class="container" align="center">
            <form action="../includes/reimbursements.inc.php" method="post" enctype="multipart/form-data">
            <p class="CC">
              Would you like to reimburse all employees? :<br />
              <select name="selector2" class="form-control">
                <option value="yes">Yes!</option>
                <option value="no">No!</option>
              </select>
            </p>
            <p class="CC">
              Please enter todays date:<br />
              <input class="form-control" type="date" name="todaysDate" size="15" maxlength="30" required="required" />
            </p>
              <button class="btn btn-primary" type="submit" name="reimbursementSubmit" value="Upload Image">Submit</button>
            </form>
          </div>
      </div><br /></form></div></section>';}
        else{
          echo'<section class="page-section bg-dark text-white" id="contact">
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
