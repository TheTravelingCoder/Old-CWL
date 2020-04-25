<?php
session_start();

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*makes sure user got to page from correct link*/
if (isset($_POST['CCSubmit'])){

  /* If you installed PHPMailer without Composer do this instead: */
  require '../PHPMailer/src/Exception.php';
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';

  /*This gives the database connection*/
  require 'dbh.inc.php';

  /* Stores the values of the different inputs into vars*/
  $load = $_SESSION['load'];
  $date = $_SESSION['date'];
  $arrival = $_SESSION['arrival'];
  $departure = $_SESSION['departure'];
  $atrailer = $_SESSION['atrailer'];
  $dtrailer = $_SESSION['dtrailer'];
  $seal = $_SESSION['seal'];
  $last = $_SESSION['last'];
  $mileage = $_SESSION['mileage'];

  /*assigning Session Variables to route check call to proper database*/
  $tNum = $_SESSION['truckNumber'];
  $ad = $_SESSION['aorD'];

  if ($tNum == '566243'){
    $target_dir = "bol566243/";
    $target_file = $target_dir . basename($_FILES["bol"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                /*Checks if any fields are empty*/
                if (empty($load) || empty($date) || empty($arrival) || empty($departure) || empty($atrailer) || empty($dtrailer) || empty($seal) || empty($last) || empty($mileage)){
                  header("Location: ../EP/checkCall.php?error=emptyfields&load=".$load."&date=".$date."&arrival=" .$arrival. "&departure=" .$departure. "&atrailer=" .$atrailer."&dtrailer=" .$dtrailer. "&seal=" .$seal. "&last=" .$last. "&mileage" .$mileage);
                  exit();
                }
                else {
                  /*Grabs row of Database with highest id Value*/
                  $sql = "SELECT id, departureTrailer FROM checkCall566243 ORDER BY id DESC LIMIT 1";
                  /*actually runs the code above*/
                  $result = mysqli_query($conn, $sql);
                  /*puts $result into an array*/
                  $row = mysqli_fetch_assoc($result);

                  if($row["departureTrailer"] == '0'){
                    /*This statement actually puts the information in the database*/
                    $sql = "INSERT INTO checkCall566243 (loadNumber, d8, arrivalTime, departureTime, arrivalTrailer, departureTrailer, seal, trailerLast, tractorMileage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                      header("Location: ../EP/checkCall.php?error=sqlerror");
                      exit();
                    }
                  else {

                    /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
                    $mail = new PHPMailer(TRUE);

                    /* Set the mail sender. */
                    $mail->setFrom('chinookw@webserver3.pebblehost.com', 'CheckCallDaemon');

                    /* Add a recipient. */
                    $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

                    /* Set the subject. */
                    $mail->Subject = "Depart from Consignee Check Call for 566243";

                    /* Set the mail message body. */
                    $mail->isHTML(TRUE);
                    $mail->Body = "<html>
                                <head>
                                <title>Departure Check Call</title>
                                </head>
                                <body>
                                <p>This is a Depart from Consignee Check Call for Truck 566243</p>
                                <table>
                                <tr>
                                <th>Load Number:</th>
                                <th>Date:</th>
                                <th>Arrival Time:</th>
                                <th>Departure Time:</th>
                                <th>Arrival Trailer:</th>
                                <th>Departure Trailer:</th>
                                <th>Seal Number:</th>
                                <th>Last Trailer Inspection Date:</th>
                                <th>Tractor Mileage:</th>
                                </tr>
                                <tr>
                                <td>$load</td>
                                <td>$date</td>
                                <td>$arrival</td>
                                <td>$departure</td>
                                <td>$atrailer</td>
                                <td>$dtrailer</td>
                                <td>$seal</td>
                                <td>$last</td>
                                <td>$mileage</td>
                                </tr>
                                </table>
                                <p>Please do not reply to this message</p>
                                </body>
                                </html>";

                    /* Add attachment to email */
                    if (isset($_FILES['bol']) &&
                     $_FILES['bol']['error'] == UPLOAD_ERR_OK) {
                     $mail->AddAttachment($_FILES['bol']['tmp_name'],
                                          $_FILES['bol']['name']);
                                         }

                    /* Finally send the mail. */
                    $mail->send();

                    echo 'Your E-mail has been sent successfully<br />';

                    mysqli_stmt_bind_param($stmt, "sssssssss", $load, $date, $arrival, $departure, $atrailer, $dtrailer, $seal, $last, $mileage);
                    mysqli_stmt_execute($stmt);

                    // Check if file already exists
                    if (file_exists($target_file)) {
                      echo "Sorry, file already exists.";
                      $uploadOk = 0;
                    }
                    if (move_uploaded_file($_FILES["bol"]["tmp_name"], $target_file)) {
                      echo "The file ". basename( $_FILES["bol"]["name"]). " has been uploaded.";
                      header("Location: ../EP/checkCall.php");
                      exit();
                      /*Checks if any fields are empty*/
                    } else {
                      echo "Sorry, there was an error uploading your file.";
                    }
                    header("Location: ../EP/checkCall.php");
                    exit();
                  }
                }
                else{
                  echo 'You must have an arrival call before you can enter a new departure call.';
                  header("Location: ../EP/CheckCall.php?error=NoDeparture");
                  exit();
                }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
              }
    elseif ($tNum == '566521'){
      $target_dir = "bol566521/";
      $target_file = $target_dir . basename($_FILES["bol"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                  /*Checks if any fields are empty*/
                  if (empty($load) || empty($date) || empty($arrival) || empty($departure) || empty($atrailer) || empty($dtrailer) || empty($seal) || empty($last) || empty($mileage)){
                    header("Location: ../EP/checkCall.php?error=emptyfields&load=".$load."&date=".$date."&arrival=" .$arrival. "&departure=" .$departure. "&atrailer=" .$atrailer."&dtrailer=" .$dtrailer. "&seal=" .$seal. "&last=" .$last. "&mileage" .$mileage);
                    exit();
                  }
                  else {
                    /*Grabs row of Database with highest id Value*/
                    $sql = "SELECT id, departureTrailer FROM checkCall566521 ORDER BY id DESC LIMIT 1";
                    /*actually runs the code above*/
                    $result = mysqli_query($conn, $sql);
                    /*puts $result into an array*/
                    $row = mysqli_fetch_assoc($result);

                    if($row["departureTrailer"] == '0'){
                      /*This statement actually puts the information in the database*/
                      $sql = "INSERT INTO checkCall566521 (loadNumber, d8, arrivalTime, departureTime, arrivalTrailer, departureTrailer, seal, trailerLast, tractorMileage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                      $stmt = mysqli_stmt_init($conn);
                      if (!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../EP/checkCall.php?error=sqlerror");
                        exit();
                      }
                    else {

                      /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
                      $mail = new PHPMailer(TRUE);

                      /* Set the mail sender. */
                      $mail->setFrom('chinookw@webserver3.pebblehost.com', 'CheckCallDaemon');

                      /* Add a recipient. */
                      $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

                      /* Set the subject. */
                      $mail->Subject = "Depart from Consignee Check Call for 566521";

                      /* Set the mail message body. */
                      $mail->isHTML(TRUE);
                      $mail->Body = "<html>
                                  <head>
                                  <title>Departure Check Call</title>
                                  </head>
                                  <body>
                                  <p>This is a Depart from Consignee Check Call for Truck 566521</p>
                                  <table>
                                  <tr>
                                  <th>Load Number:</th>
                                  <th>Date:</th>
                                  <th>Arrival Time:</th>
                                  <th>Departure Time:</th>
                                  <th>Arrival Trailer:</th>
                                  <th>Departure Trailer:</th>
                                  <th>Seal Number:</th>
                                  <th>Last Trailer Inspection Date:</th>
                                  <th>Tractor Mileage:</th>
                                  </tr>
                                  <tr>
                                  <td>$load</td>
                                  <td>$date</td>
                                  <td>$arrival</td>
                                  <td>$departure</td>
                                  <td>$atrailer</td>
                                  <td>$dtrailer</td>
                                  <td>$seal</td>
                                  <td>$last</td>
                                  <td>$mileage</td>
                                  </tr>
                                  </table>
                                  <p>Please do not reply to this message</p>
                                  </body>
                                  </html>";

                      /* Add attachment to email */
                      if (isset($_FILES['bol']) &&
                       $_FILES['bol']['error'] == UPLOAD_ERR_OK) {
                       $mail->AddAttachment($_FILES['bol']['tmp_name'],
                                            $_FILES['bol']['name']);
                                           }

                      /* Finally send the mail. */
                      $mail->send();

                      echo 'Your E-mail has been sent successfully<br />';

                      mysqli_stmt_bind_param($stmt, "sssssssss", $load, $date, $arrival, $departure, $atrailer, $dtrailer, $seal, $last, $mileage);
                      mysqli_stmt_execute($stmt);

                      // Check if file already exists
                      if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                      }
                      if (move_uploaded_file($_FILES["bol"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["bol"]["name"]). " has been uploaded.";
                        header("Location: ../EP/checkCall.php");
                        exit();
                        /*Checks if any fields are empty*/
                      } else {
                        echo "Sorry, there was an error uploading your file.";
                      }
                      header("Location: ../EP/checkCall.php");
                      exit();
                    }
                  }
                  else{
                    echo 'You must have an arrival call before you can enter a new departure call.';
                    header("Location: ../EP/CheckCall.php?error=NoDeparture");
                    exit();
                  }
                }
                  mysqli_stmt_close($stmt);
                  mysqli_close($conn);
                }
    elseif ($tNum == '567130'){
      $target_dir = "bol567130/";
      $target_file = $target_dir . basename($_FILES["bol"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                  /*Checks if any fields are empty*/
                  if (empty($load) || empty($date) || empty($arrival) || empty($departure) || empty($atrailer) || empty($dtrailer) || empty($seal) || empty($last) || empty($mileage)){
                    header("Location: ../EP/checkCall.php?error=emptyfields&load=".$load."&date=".$date."&arrival=" .$arrival. "&departure=" .$departure. "&atrailer=" .$atrailer."&dtrailer=" .$dtrailer. "&seal=" .$seal. "&last=" .$last. "&mileage" .$mileage);
                    exit();
                  }
                  else {
                    /*Grabs row of Database with highest id Value*/
                    $sql = "SELECT id, departureTrailer FROM checkCall567130 ORDER BY id DESC LIMIT 1";

                    /*actually runs the code above*/
                    $result = mysqli_query($conn, $sql);

                    /*puts $result into an array*/
                    $row = mysqli_fetch_assoc($result);

                    if($row["departureTrailer"] == '0'){

                      /*This statement actually puts the information in the database*/
                      $sql = "INSERT INTO checkCall567130 (loadNumber, d8, arrivalTime, departureTime, arrivalTrailer, departureTrailer, seal, trailerLast, tractorMileage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                      $stmt = mysqli_stmt_init($conn);
                      if (!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../EP/checkCall.php?error=sqlerror");
                        exit();
                      }
                      else {

                        /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
                        $mail = new PHPMailer(TRUE);

                        /* Set the mail sender. */
                        $mail->setFrom('chinookw@webserver3.pebblehost.com', 'CheckCallDaemon');

                        /* Add a recipient. */
                        $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

                        /* Set the subject. */
                        $mail->Subject = "Depart from Consignee Check Call for 567130";

                        /* Set the mail message body. */
                        $mail->isHTML(TRUE);
                        $mail->Body = "<html>
                                    <head>
                                    <title>Departure Check Call</title>
                                    </head>
                                    <body>
                                    <p>This is a Depart from Consignee Check Call for Truck 567130</p>
                                    <table>
                                    <tr>
                                    <th>Load Number:</th>
                                    <th>Date:</th>
                                    <th>Arrival Time:</th>
                                    <th>Departure Time:</th>
                                    <th>Arrival Trailer:</th>
                                    <th>Departure Trailer:</th>
                                    <th>Seal Number:</th>
                                    <th>Last Trailer Inspection Date:</th>
                                    <th>Tractor Mileage:</th>
                                    </tr>
                                    <tr>
                                    <td>$load</td>
                                    <td>$date</td>
                                    <td>$arrival</td>
                                    <td>$departure</td>
                                    <td>$atrailer</td>
                                    <td>$dtrailer</td>
                                    <td>$seal</td>
                                    <td>$last</td>
                                    <td>$mileage</td>
                                    </tr>
                                    </table>
                                    <p>Please do not reply to this message</p>
                                    </body>
                                    </html>";

                        /* Add attachment to email */
                        if (isset($_FILES['bol']) &&
                         $_FILES['bol']['error'] == UPLOAD_ERR_OK) {
                         $mail->AddAttachment($_FILES['bol']['tmp_name'],
                                              $_FILES['bol']['name']);
                                             }

                        /* Finally send the mail. */
                        $mail->send();

                        echo 'Your E-mail has been sent successfully<br />';

                        mysqli_stmt_bind_param($stmt, "sssssssss", $load, $date, $arrival, $departure, $atrailer, $dtrailer, $seal, $last, $mileage);
                        mysqli_stmt_execute($stmt);

                      // Check if file already exists
                      if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                      }
                      if (move_uploaded_file($_FILES["bol"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["bol"]["name"]). " has been uploaded.";
                        header("Location: ../EP/checkCall.php");
                        exit();
                        /*Checks if any fields are empty*/
                      } else {
                        echo "Sorry, there was an error uploading your file.";
                      }
                      header("Location: ../EP/checkCall.php");
                      exit();
                    }
                  }
                else{
                  echo 'You must have an arrival call before you can enter a new departure call.';
                  header("Location: ../EP/CheckCall.php?error=NoDeparture");
                  exit();
                }
                  }
                  mysqli_stmt_close($stmt);
                  mysqli_close($conn);
                }


}
  else{
  header("Location: ../EP/checkCall.php");
  exit();
}
