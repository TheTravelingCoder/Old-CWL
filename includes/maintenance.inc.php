<?php
session_start();

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*makes sure user got to page from correct link*/
if (isset($_POST['maintenanceSubmit'])){

  /* If you installed PHPMailer without Composer do this instead: */
  require '../PHPMailer/src/Exception.php';
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';

  /*This gives the database connection*/
  require 'dbh.inc.php';

  $selector = $_SESSION['selector'];

  if($selector == "receipt"){
    $date = $_POST['receiptDate'];
    $tNum = $_POST['truckNumber'];
    $tMileage = $_POST['tractorMileage'];
    $comment = $_POST['message'];
    $todaysDate = $_POST['todaysDate'];

    if($tNum == "566243"){

      $datas = array();

      $target_dir = "maintenance566243/";
      $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      $sql = "SELECT * FROM maintenance566243 ORDER BY id DESC LIMIT 1";

      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);

      /*This if statements, puts the results
      of the above statement, into an array*/
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $datas[] = $row;
        }
      }

      /*This statement actually puts the information in the database*/
      $sql = "INSERT INTO maintenance566243 (d8, annual, pm, lube, dpfFilter, airFilter, engineOverhead, engineWash, coolant, coolantFilter, fanBelt, fuelTankVent, ahi, transmissionOil,
                                            defFilter, axleAlignment, rearAxleOil, powerSteeringFluid, airDryerCartridge, comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../EP/maintenance2.php?error=sqlerror");
        exit();
      }else{
        if (isset($_POST['annualInspection'])){
          $annualInspection = $date;
        }else{
          $annualInspection = $datas['0']['annual'];
        }
        if (isset($_POST['pmService'])){
          $pmService = $tMileage;
        }else{
          $pmService = $datas['0']['pm'];
        }
        if (isset($_POST['lubeService'])){
          $lubeService = $tMileage;
        }else{
          $lubeService = $datas['0']['lube'];
        }
        if (isset($_POST['dpfFilter'])){
          $dpfFilter = $tMileage;
        }else{
          $dpfFilter = $datas['0']['dpfFilter'];
        }
        if (isset($_POST['airFilter'])){
          $airFilter = $tMileage;
        }else{
          $airFilter = $datas['0']['airFilter'];
        }
        if (isset($_POST['engineOverheadAdjustment'])){
          $engineOverhead = $tMileage;
        }else{
          $engineOverhead = $datas['0']['engineOverhead'];
        }
        if (isset($_POST['engineWash'])){
          $engineWash = $date;
        }
        else{
          $engineWash = $datas['0']['engineWash'];
        }
        if (isset($_POST['coolant'])){
          $coolant = $tMileage;
        }else{
          $coolant = $datas['0']['coolant'];
        }
        if (isset($_POST['coolantFilter'])){
          $coolantFilter = $tMileage;
        }else{
          $coolantFilter = $datas['0']['coolantFilter'];
        }
        if (isset($_POST['fanBelt'])){
          $fanBelt = $tMileage;
        }else{
          $fanBelt = $datas['0']['fanBelt'];
        }
        if (isset($_POST['fuelTankVent'])){
          $fuelTankVent = $date;
        }else{
          $fuelTankVent = $datas['0']['fuelTankVent'];
        }
        if (isset($_POST['aHI'])){
          $aHI = $tMileage;
        }else{
          $aHI = $datas['0']['ahi'];
        }
        if (isset($_POST['transOil'])){
          $transOil = $tMileage;
        }else{
          $transOil = $datas['0']['transmissionOil'];
        }
        if (isset($_POST['def'])){
          $def = $tMileage;
        }else{
          $def = $datas['0']['defFilter'];
        }
        if (isset($_POST['axleAlignment'])){
          $axleAlignment = $tMileage;
        }else{
          $axleAlignment = $datas['0']['axleAlignment'];
        }
        if (isset($_POST['vrao'])){
          $vrao = $tMileage;
        }else{
          $vrao = $datas['0']['rearAxleOil'];
        }
        if (isset($_POST['powerSteering'])){
          $powerSteering = $tMileage;
        }else{
          $powerSteering = $datas['0']['powerSteeringFluid'];
        }
        if (isset($_POST['aDCC'])){
          $aDCC = $tMileage;
        }else{
          $aDCC = $datas['0']['airDryerCartridge'];
        }

        /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
        $mail = new PHPMailer(TRUE);

        /* Set the mail sender. */
        $mail->setFrom('chinookw@webserver3.pebblehost.com', 'MaintenanceDaemon');

        /* Add a recipient. */
        $mail->addAddress('MaintenanceCWL@gmail.com', 'CheckCall');

        /* Set the subject. */
        $mail->Subject = "Maintenance Receipt for 566243";

        /* Set the mail message body. */
        $mail->isHTML(TRUE);
        $mail->Body = "<html>
                    <head>
                    <title>Maintenance Receipt</title>
                    </head>
                    <body>
                    <p>This is a maintenance receipt for Truck 566243</p>
                    <table>
                    <tr>
                    <th>Today's Date:<th>
                    <th>Last Annual Inspection:</th>
                    <th>Last PM Service:</th>
                    <th>Last Lube Service:</th>
                    <th>Last DPF:</th>
                    <th>Last Air Filter:</th>
                    <th>Last Engine Overhead:</th>
                    <th>Last Engine Wash:</th>
                    <th>Last Coolant change:</th>
                    <th>Last Coolant Filter:</th>
                    <th>Last Fan Belt Change:</th>
                    <th>Last Fuel Tank Vent:</th>
                    <th>Last Aftertreatment Hydrocarboninjector:</th>
                    <th>Last Transmission Oil:</th>
                    <th>Last Def Filter:</th>
                    <th>Last Axle Alignment:</th>
                    <th>Last Vender Rear Axle Oil Replace</th>
                    <th>Last Power Steering Fluid and Filter Replace</th>
                    <th>Last Air Dryer Coalescing Cartridge</th>
                    </tr>
                    <tr>
                    <td>$todaysDate</td>
                    <td>$annualInspection</td>
                    <td>$pmService</td>
                    <td>$lubeService</td>
                    <td>$dpfFilter</td>
                    <td>$airFilter</td>
                    <td>$engineOverhead</td>
                    <td>$engineWash</td>
                    <td>$coolant</td>
                    <td>$coolantFilter</td>
                    <td>$fanBelt</td>
                    <td>$fuelTankVent</td>
                    <td>$aHI</td>
                    <td>$transOil</td>
                    <td>$def</td>
                    <td>$axleAlignment</td>
                    <td>$vrao</td>
                    <td>$powerSteering</td>
                    <td>$aDCC</td>
                    </tr>
                    </table>
                    <p>Please do not reply to this message</p>
                    </body>
                    </html>";

        /* Add attachment to email */
        if (isset($_FILES['receiptImg']) &&
         $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
         $mail->AddAttachment($_FILES['receiptImg']['tmp_name'],
                              $_FILES['receiptImg']['name']);
                             }

        /* Finally send the mail. */
        $mail->send();

        mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $todaysDate, $annualInspection, $pmService, $lubeService, $dpfFilter, $airFilter, $engineOverhead, $engineWash, $coolant, $coolantFilter, $fanBelt,
                               $fuelTankVent, $aHI, $transOil, $def, $axleAlignment, $vrao, $powerSteering, $aDCC, $comment);
        mysqli_stmt_execute($stmt);

        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
          header("Location: ../EP/checkCall.php");
          exit();
          /*Checks if any fields are empty*/
        } else {
          echo "Sorry, there was an error uploading your file.";
        }

        echo "Your receipt has been submitted";
      }
    }elseif($tNum == "566521"){

      $datas = array();

      $target_dir = "maintenance566521/";
      $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $sql = "SELECT * FROM maintenance566521 ORDER BY id DESC LIMIT 1";

        /*actually runs the code above*/
        $result = mysqli_query($conn, $sql);

        /*This if statements, puts the results
        of the above statement, into an array*/
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            $datas[] = $row;
          }
        }

        /*This statement actually puts the information in the database*/
        $sql = "INSERT INTO maintenance566521 (d8, annual, pm, lube, dpfFilter, airFilter, engineOverhead, engineWash, coolant, coolantFilter, fanBelt, fuelTankVent, ahi, transmissionOil,
                                              defFilter, axleAlignment, rearAxleOil, powerSteeringFluid, airDryerCartridge, comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../EP/maintenance2.php?error=sqlerror");
          exit();
        }else{
          if (isset($_POST['annualInspection'])){
            $annualInspection = $date;
          }else{
            $annualInspection = $datas['0']['annual'];
          }
          if (isset($_POST['pmService'])){
            $pmService = $tMileage;
          }else{
            $pmService = $datas['0']['pm'];
          }
          if (isset($_POST['lubeService'])){
            $lubeService = $tMileage;
          }else{
            $lubeService = $datas['0']['lube'];
          }
          if (isset($_POST['dpfFilter'])){
            $dpfFilter = $tMileage;
          }else{
            $dpfFilter = $datas['0']['dpfFilter'];
          }
          if (isset($_POST['airFilter'])){
            $airFilter = $tMileage;
          }else{
            $airFilter = $datas['0']['airFilter'];
          }
          if (isset($_POST['engineOverheadAdjustment'])){
            $engineOverhead = $tMileage;
          }else{
            $engineOverhead = $datas['0']['engineOverhead'];
          }
          if (isset($_POST['engineWash'])){
            $engineWash = $date;
          }
          else{
            $engineWash = $datas['0']['engineWash'];
          }
          if (isset($_POST['coolant'])){
            $coolant = $tMileage;
          }else{
            $coolant = $datas['0']['coolant'];
          }
          if (isset($_POST['coolantFilter'])){
            $coolantFilter = $tMileage;
          }else{
            $coolantFilter = $datas['0']['coolantFilter'];
          }
          if (isset($_POST['fanBelt'])){
            $fanBelt = $tMileage;
          }else{
            $fanBelt = $datas['0']['fanBelt'];
          }
          if (isset($_POST['fuelTankVent'])){
            $fuelTankVent = $date;
          }else{
            $fuelTankVent = $datas['0']['fuelTankVent'];
          }
          if (isset($_POST['aHI'])){
            $aHI = $tMileage;
          }else{
            $aHI = $datas['0']['ahi'];
          }
          if (isset($_POST['transOil'])){
            $transOil = $tMileage;
          }else{
            $transOil = $datas['0']['transmissionOil'];
          }
          if (isset($_POST['def'])){
            $def = $tMileage;
          }else{
            $def = $datas['0']['defFilter'];
          }
          if (isset($_POST['axleAlignment'])){
            $axleAlignment = $tMileage;
          }else{
            $axleAlignment = $datas['0']['axleAlignment'];
          }
          if (isset($_POST['vrao'])){
            $vrao = $tMileage;
          }else{
            $vrao = $datas['0']['rearAxleOil'];
          }
          if (isset($_POST['powerSteering'])){
            $powerSteering = $tMileage;
          }else{
            $powerSteering = $datas['0']['powerSteeringFluid'];
          }
          if (isset($_POST['aDCC'])){
            $aDCC = $tMileage;
          }else{
            $aDCC = $datas['0']['airDryerCartridge'];
          }

          /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
          $mail = new PHPMailer(TRUE);

          /* Set the mail sender. */
          $mail->setFrom('chinookw@webserver3.pebblehost.com', 'MaintenanceDaemon');

          /* Add a recipient. */
          $mail->addAddress('MaintenanceCWL@gmail.com', 'CheckCall');

          /* Set the subject. */
          $mail->Subject = "Maintenance Receipt for 566521";

          /* Set the mail message body. */
          $mail->isHTML(TRUE);
          $mail->Body = "<html>
                      <head>
                      <title>Maintenance Receipt</title>
                      </head>
                      <body>
                      <p>This is a maintenance receipt for Truck 566521</p>
                      <table>
                      <tr>
                      <th>Today's Date</th>
                      <th>Last Annual Inspection:</th>
                      <th>Last PM Service:</th>
                      <th>Last Lube Service:</th>
                      <th>Last DPF:</th>
                      <th>Last Air Filter:</th>
                      <th>Last Engine Overhead:</th>
                      <th>Last Engine Wash:</th>
                      <th>Last Coolant change:</th>
                      <th>Last Coolant Filter:</th>
                      <th>Last Fan Belt Change:</th>
                      <th>Last Fuel Tank Vent:</th>
                      <th>Last Aftertreatment Hydrocarboninjector:</th>
                      <th>Last Transmission Oil:</th>
                      <th>Last Def Filter:</th>
                      <th>Last Axle Alignment:</th>
                      <th>Last Vender Rear Axle Oil Replace</th>
                      <th>Last Power Steering Fluid and Filter Replace</th>
                      <th>Last Air Dryer Coalescing Cartridge</th>
                      </tr>
                      <tr>
                      <td>$todaysDate</td>
                      <td>$annualInspection</td>
                      <td>$pmService</td>
                      <td>$lubeService</td>
                      <td>$dpfFilter</td>
                      <td>$airFilter</td>
                      <td>$engineOverhead</td>
                      <td>$engineWash</td>
                      <td>$coolant</td>
                      <td>$coolantFilter</td>
                      <td>$fanBelt</td>
                      <td>$fuelTankVent</td>
                      <td>$aHI</td>
                      <td>$transOil</td>
                      <td>$def</td>
                      <td>$axleAlignment</td>
                      <td>$vrao</td>
                      <td>$powerSteering</td>
                      <td>$aDCC</td>
                      </tr>
                      </table>
                      <p>Please do not reply to this message</p>
                      </body>
                      </html>";

          /* Add attachment to email */
          if (isset($_FILES['receiptImg']) &&
           $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
           $mail->AddAttachment($_FILES['receiptImg']['tmp_name'],
                                $_FILES['receiptImg']['name']);
                               }

          /* Finally send the mail. */
          $mail->send();

          mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $todaysDate, $annualInspection, $pmService, $lubeService, $dpfFilter, $airFilter, $engineOverhead, $engineWash, $coolant, $coolantFilter, $fanBelt,
                                 $fuelTankVent, $aHI, $transOil, $def, $axleAlignment, $vrao, $powerSteering, $aDCC, $comment);
          mysqli_stmt_execute($stmt);

          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
            header("Location: ../EP/checkCall.php");
            exit();
            /*Checks if any fields are empty*/
          } else {
            echo "Sorry, there was an error uploading your file.";
          }

          echo "Your receipt has been submitted";
        }
      }elseif($tNum == "567130"){

        $datas = array();

        $target_dir = "maintenance567130/";
        $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $sql = "SELECT * FROM maintenance567130 ORDER BY id DESC LIMIT 1";

        /*actually runs the code above*/
        $result = mysqli_query($conn, $sql);

        /*This if statements, puts the results
        of the above statement, into an array*/
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            $datas[] = $row;
          }
        }

        /*This statement actually puts the information in the database*/
        $sql = "INSERT INTO maintenance567130 (d8, annual, pm, lube, dpfFilter, airFilter, engineOverhead, engineWash, coolant, coolantFilter, fanBelt, fuelTankVent, ahi, transmissionOil,
                                              defFilter, axleAlignment, rearAxleOil, powerSteeringFluid, airDryerCartridge, comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../EP/maintenance2.php?error=sqlerror");
          exit();
        }else{
          if (isset($_POST['annualInspection'])){
            $annualInspection = $date;
          }else{
            $annualInspection = $datas['0']['annual'];
          }
          if (isset($_POST['pmService'])){
            $pmService = $tMileage;
          }else{
            $pmService = $datas['0']['pm'];
          }
          if (isset($_POST['lubeService'])){
            $lubeService = $tMileage;
          }else{
            $lubeService = $datas['0']['lube'];
          }
          if (isset($_POST['dpfFilter'])){
            $dpfFilter = $tMileage;
          }else{
            $dpfFilter = $datas['0']['dpfFilter'];
          }
          if (isset($_POST['airFilter'])){
            $airFilter = $tMileage;
          }else{
            $airFilter = $datas['0']['airFilter'];
          }
          if (isset($_POST['engineOverheadAdjustment'])){
            $engineOverhead = $tMileage;
          }else{
            $engineOverhead = $datas['0']['engineOverhead'];
          }
          if (isset($_POST['engineWash'])){
            $engineWash = $date;
          }
          else{
            $engineWash = $datas['0']['engineWash'];
          }
          if (isset($_POST['coolant'])){
            $coolant = $tMileage;
          }else{
            $coolant = $datas['0']['coolant'];
          }
          if (isset($_POST['coolantFilter'])){
            $coolantFilter = $tMileage;
          }else{
            $coolantFilter = $datas['0']['coolantFilter'];
          }
          if (isset($_POST['fanBelt'])){
            $fanBelt = $tMileage;
          }else{
            $fanBelt = $datas['0']['fanBelt'];
          }
          if (isset($_POST['fuelTankVent'])){
            $fuelTankVent = $date;
          }else{
            $fuelTankVent = $datas['0']['fuelTankVent'];
          }
          if (isset($_POST['aHI'])){
            $aHI = $tMileage;
          }else{
            $aHI = $datas['0']['ahi'];
          }
          if (isset($_POST['transOil'])){
            $transOil = $tMileage;
          }else{
            $transOil = $datas['0']['transmissionOil'];
          }
          if (isset($_POST['def'])){
            $def = $tMileage;
          }else{
            $def = $datas['0']['defFilter'];
          }
          if (isset($_POST['axleAlignment'])){
            $axleAlignment = $tMileage;
          }else{
            $axleAlignment = $datas['0']['axleAlignment'];
          }
          if (isset($_POST['vrao'])){
            $vrao = $tMileage;
          }else{
            $vrao = $datas['0']['rearAxleOil'];
          }
          if (isset($_POST['powerSteering'])){
            $powerSteering = $tMileage;
          }else{
            $powerSteering = $datas['0']['powerSteeringFluid'];
          }
          if (isset($_POST['aDCC'])){
            $aDCC = $tMileage;
          }else{
            $aDCC = $datas['0']['airDryerCartridge'];
          }

          /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
          $mail = new PHPMailer(TRUE);

          /* Set the mail sender. */
          $mail->setFrom('chinookw@webserver3.pebblehost.com', 'MaintenanceDaemon');

          /* Add a recipient. */
          $mail->addAddress('MaintenanceCWL@gmail.com', 'CheckCall');

          /* Set the subject. */
          $mail->Subject = "Maintenance Receipt for 567130";

          /* Set the mail message body. */
          $mail->isHTML(TRUE);
          $mail->Body = "<html>
                      <head>
                      <title>Maintenance Receipt</title>
                      </head>
                      <body>
                      <p>This is a maintenance receipt for Truck 567130</p>
                      <table>
                      <tr>
                      <th>Today's Date</th>
                      <th>Last Annual Inspection:</th>
                      <th>Last PM Service:</th>
                      <th>Last Lube Service:</th>
                      <th>Last DPF:</th>
                      <th>Last Air Filter:</th>
                      <th>Last Engine Overhead:</th>
                      <th>Last Engine Wash:</th>
                      <th>Last Coolant change:</th>
                      <th>Last Coolant Filter:</th>
                      <th>Last Fan Belt Change:</th>
                      <th>Last Fuel Tank Vent:</th>
                      <th>Last Aftertreatment Hydrocarboninjector:</th>
                      <th>Last Transmission Oil:</th>
                      <th>Last Def Filter:</th>
                      <th>Last Axle Alignment:</th>
                      <th>Last Vender Rear Axle Oil Replace</th>
                      <th>Last Power Steering Fluid and Filter Replace</th>
                      <th>Last Air Dryer Coalescing Cartridge</th>
                      </tr>
                      <tr>
                      <td>$todaysDate</td>
                      <td>$annualInspection</td>
                      <td>$pmService</td>
                      <td>$lubeService</td>
                      <td>$dpfFilter</td>
                      <td>$airFilter</td>
                      <td>$engineOverhead</td>
                      <td>$engineWash</td>
                      <td>$coolant</td>
                      <td>$coolantFilter</td>
                      <td>$fanBelt</td>
                      <td>$fuelTankVent</td>
                      <td>$aHI</td>
                      <td>$transOil</td>
                      <td>$def</td>
                      <td>$axleAlignment</td>
                      <td>$vrao</td>
                      <td>$powerSteering</td>
                      <td>$aDCC</td>
                      </tr>
                      </table>
                      <p>Please do not reply to this message</p>
                      </body>
                      </html>";

          /* Add attachment to email */
          if (isset($_FILES['receiptImg']) &&
           $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
           $mail->AddAttachment($_FILES['receiptImg']['tmp_name'],
                                $_FILES['receiptImg']['name']);
                               }

          /* Finally send the mail. */
          $mail->send();

          mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $todaysDate, $annualInspection, $pmService, $lubeService, $dpfFilter, $airFilter, $engineOverhead, $engineWash, $coolant, $coolantFilter, $fanBelt,
                                 $fuelTankVent, $aHI, $transOil, $def, $axleAlignment, $vrao, $powerSteering, $aDCC, $comment);
          mysqli_stmt_execute($stmt);

          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
            header("Location: ../EP/checkCall.php");
            exit();
            /*Checks if any fields are empty*/
          } else {
            echo "Sorry, there was an error uploading your file.";
          }

          echo "Your receipt has been submitted";
      }
    }
  }elseif($selector == "reports"){
    $tNum = $_POST['report'];
    $datas243 = array();
    $datas521 = array();
    $datas130 = array();

    if($tNum == 'maintenance'){
      $sql = "SELECT * FROM maintenance566243 ORDER BY id DESC LIMIT 1;";

      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);

      /*This if statements, puts the results
      of the above statement, into an array*/
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $datas243[] = $row;
        }
      }

      echo "<h2>This is the last mileage/date of each service for each Truck</h2>";
      echo "<table style='border-spacing: 10px;'>
            <tr>
              <th>Truck Number</th>
              <th>Annual Inspection</th>
              <th>PM Service</th>
              <th>Lube Service</th>
              <th>DPF Filter Clean</th>
              <th>Air Filter</th>
              <th>Engine Overhead Adjustment</th>
              <th>Undercarriage/Engine Wash</th>
              <th>Coolant</th>
              <th>Coolant Filter</th>
              <th>Fan Belt</th>
              <th>Fuel Tank Vent Filter</th>
              <th>Aftertreatment Hydrocarbon Injector</th>
              <th>Transmission Oil/Filter</th>
              <th>DEF Pump and Tank Filler Neck Filter</th>
              <th>Axle Alignment</th>
              <th>Vendor Rear Axle Oil</th>
              <th>Power Steering Fluid and Filter</th>
              <th>Air Dryer Coalescing Cartidge</th>
            </tr>";
      /*This outputs the data of the array*/
      foreach($datas243 as $data){
        echo "<tr>";
        echo "<td> Truck 566243 </td>";
        echo "<td>" .$data['annual']. "</td>";
        echo "<td>" .$data['pm']. "</td>";
        echo "<td>" .$data['lube']. "</td>";
        echo "<td>" .$data['dpfFilter']. "</td>";
        echo "<td>" .$data['airFilter']. "</td>";
        echo "<td>" .$data['engineOverhead']. "</td>";
        echo "<td>" .$data['engineWash']. "</td>";
        echo "<td>" .$data['coolant']. "</td>";
        echo "<td>" .$data['coolantFilter']. "</td>";
        echo "<td>" .$data['fanBelt']. "</td>";
        echo "<td>" .$data['fuelTankVent']. "</td>";
        echo "<td>" .$data['ahi']. "</td>";
        echo "<td>" .$data['transmissionOil']. "</td>";
        echo "<td>" .$data['defFilter']. "</td>";
        echo "<td>" .$data['axleAlignment']. "</td>";
        echo "<td>" .$data['rearAxleOil']. "</td>";
        echo "<td>" .$data['powerSteeringFluid']. "</td>";
        echo "<td>" .$data['airDryerCartridge']. "</td>";
      }
      $sql = "SELECT * FROM maintenance566521 ORDER BY id DESC LIMIT 1;";

      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);

      /*This if statements, put s the results
      of the above statement, into an array*/
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $datas521[] = $row;
        }
      }

      echo "<table style='border-spacing: 10px;'>
            <tr>
              <th>Truck Number</th>
              <th>Annual Inspection</th>
              <th>PM Service</th>
              <th>Lube Service</th>
              <th>DPF Filter Clean</th>
              <th>Air Filter</th>
              <th>Engine Overhead Adjustment</th>
              <th>Undercarriage/Engine Wash</th>
              <th>Coolant</th>
              <th>Coolant Filter</th>
              <th>Fan Belt</th>
              <th>Fuel Tank Vent Filter</th>
              <th>Aftertreatment Hydrocarbon Injector</th>
              <th>Transmission Oil/Filter</th>
              <th>DEF Pump and Tank Filler Neck Filter</th>
              <th>Axle Alignment</th>
              <th>Vendor Rear Axle Oil</th>
              <th>Power Steering Fluid and Filter</th>
              <th>Air Dryer Coalescing Cartidge</th>
            </tr>";
      /*This outputs the data of the array*/
      foreach($datas521 as $data){
        echo "<tr>";
        echo "<td> Truck 566521 </td>";
        echo "<td>" .$data['annual']. "</td>";
        echo "<td>" .$data['pm']. "</td>";
        echo "<td>" .$data['lube']. "</td>";
        echo "<td>" .$data['dpfFilter']. "</td>";
        echo "<td>" .$data['airFilter']. "</td>";
        echo "<td>" .$data['engineOverhead']. "</td>";
        echo "<td>" .$data['engineWash']. "</td>";
        echo "<td>" .$data['coolant']. "</td>";
        echo "<td>" .$data['coolantFilter']. "</td>";
        echo "<td>" .$data['fanBelt']. "</td>";
        echo "<td>" .$data['fuelTankVent']. "</td>";
        echo "<td>" .$data['ahi']. "</td>";
        echo "<td>" .$data['transmissionOil']. "</td>";
        echo "<td>" .$data['defFilter']. "</td>";
        echo "<td>" .$data['axleAlignment']. "</td>";
        echo "<td>" .$data['rearAxleOil']. "</td>";
        echo "<td>" .$data['powerSteeringFluid']. "</td>";
        echo "<td>" .$data['airDryerCartridge']. "</td>";
      }
      $sql = "SELECT * FROM maintenance567130 ORDER BY id DESC LIMIT 1;";

      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);

      /*This if statements, puts the results
      of the above statement, into an array*/
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          $datas130[] = $row;
        }
      }

      echo "<table style='border-spacing: 10px;'>
            <tr>
              <th>Truck Number</th>
              <th>Annual Inspection</th>
              <th>PM Service</th>
              <th>Lube Service</th>
              <th>DPF Filter Clean</th>
              <th>Air Filter</th>
              <th>Engine Overhead Adjustment</th>
              <th>Undercarriage/Engine Wash</th>
              <th>Coolant</th>
              <th>Coolant Filter</th>
              <th>Fan Belt</th>
              <th>Fuel Tank Vent Filter</th>
              <th>Aftertreatment Hydrocarbon Injector</th>
              <th>Transmission Oil/Filter</th>
              <th>DEF Pump and Tank Filler Neck Filter</th>
              <th>Axle Alignment</th>
              <th>Vendor Rear Axle Oil</th>
              <th>Power Steering Fluid and Filter</th>
              <th>Air Dryer Coalescing Cartidge</th>
            </tr>";
      /*This outputs the data of the array*/
      foreach($datas130 as $data){
        echo "<tr>";
        echo "<td>Truck 567130</td>";
        echo "<td>" .$data['annual']. "</td>";
        echo "<td>" .$data['pm']. "</td>";
        echo "<td>" .$data['lube']. "</td>";
        echo "<td>" .$data['dpfFilter']. "</td>";
        echo "<td>" .$data['airFilter']. "</td>";
        echo "<td>" .$data['engineOverhead']. "</td>";
        echo "<td>" .$data['engineWash']. "</td>";
        echo "<td>" .$data['coolant']. "</td>";
        echo "<td>" .$data['coolantFilter']. "</td>";
        echo "<td>" .$data['fanBelt']. "</td>";
        echo "<td>" .$data['fuelTankVent']. "</td>";
        echo "<td>" .$data['ahi']. "</td>";
        echo "<td>" .$data['transmissionOil']. "</td>";
        echo "<td>" .$data['defFilter']. "</td>";
        echo "<td>" .$data['axleAlignment']. "</td>";
        echo "<td>" .$data['rearAxleOil']. "</td>";
        echo "<td>" .$data['powerSteeringFluid']. "</td>";
        echo "<td>" .$data['airDryerCartridge']. "</td>";
      }
    }
  }else{
    echo "I am unsure how you selected an option that didn't work, congratulations? Please let Kevin know what happened.";
  }
}else{
    echo "Sorry there was an error on this page somewhere";
}
