<?php
session_start();

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*makes sure user got to page from correct link*/
if (isset($_POST['reimbursementSubmit'])){

  /* If you installed PHPMailer without Composer do this instead: */
  require '../PHPMailer/src/Exception.php';
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';

  /*This gives the database connection*/
  require 'dbh.inc.php';

  $selector = $_SESSION['selector'];

  if($selector == "reimbursements"){

    $date = $_POST['receiptDate'];
    $name = $_POST['selector2'];
    $tNum = $_POST['truckNumber'];
    $amount = -1 * abs($_POST['amount']);
    $message = $_POST['message'];
    $datePaid  = '2000-01-01';
    $irs = $_POST['irs'];
    $credits = 0;
    $debits = $amount;

    if($name == "addeaton"){
        if(empty($_POST['ccbox'])){
          $target_dir = "reimbursements/addeaton/";
          $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          /*Checks if any fields are empty*/
          if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
            header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
            exit();
          }
          else {
            /*This statement actually puts the information in the database*/
            $sql = "INSERT INTO reimbursements (d8, employeeName, truckNumber, amount, reason, datePaid, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
              header("Location: ../EP/reimbursements2.php?error=sqlerror");
              exit();
            }
            else {

              /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
              $mail = new PHPMailer(TRUE);

              /* Set the mail sender. */
              $mail->setFrom('chinookw@webserver3.pebblehost.com', 'EmployeeReimbursementDaemon');

              /* Add a recipient. */
              $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

              /* Set the subject. */
              $mail->Subject = "Employee Reimbursement Submission";

              /* Set the mail message body. */
              $mail->isHTML(TRUE);
              $mail->Body = "<html>
                            <head>
                            <title>Employee Reimbursement Submission</title>
                            </head>
                            <body>
                            <p>This is an employee reimbursement submission</p>
                            <table>
                            <tr>
                            <th>Receipt Date:</th>
                            <th>Employee Name:</th>
                            <th>Truck Number:</th>
                            <th>Reimbursement Amount:</th>
                            <th>Reason for Reimbursement:</th>
                            <th>IRS Justification:</th>
                            </tr>
                            <tr>
                            <td>$date</td>
                            <td>$name</td>
                            <td>$tNum</td>
                            <td>$amount</td>
                            <td>$message</td>
                            <td>$irs</td>
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

            echo 'Your E-mail has been sent successfully<br />';

            mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $tNum, $amount, $message, $datePaid, $irs);
            mysqli_stmt_execute($stmt);

            // Check if file already exists
            if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $uploadOk = 0;
            }
            if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
              header("Location: ../EP/reimbursements.php");
              exit();
            }
            else {
              echo "Sorry, there was an error uploading your file.";
            }
            header("Location: ../EP/reimbursements2.php");
            exit();
          }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
      }
    else{
      $target_dir = "ccexpenses/";
      $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      /*Checks if any fields are empty*/
      if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
        header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
        exit();
      }
      else {
        /*This statement actually puts the information in the database*/
        $sql = "INSERT INTO ccExpenses (d8, employeeName, debits, credits, amount, reason, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../EP/reimbursements2.php?error=sqlerror");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $debits, $credits, $amount, $message, $irs);
          mysqli_stmt_execute($stmt);

          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
            header("Location: ../EP/reimbursements.php");
            exit();
          }
          else {
            echo "Sorry, there was an error uploading your file.";
            exit();
          }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
      }
    }
  }
  elseif($name == "akbrown"){

    $target_dir = "reimbursements/akbrown/";
    $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    /*Checks if any fields are empty*/
    if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
      header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
      exit();
    }
    else {
      /*This statement actually puts the information in the database*/
      $sql = "INSERT INTO reimbursements (d8, employeeName, truckNumber, amount, reason, datePaid, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../EP/reimbursements2.php?error=sqlerror");
        exit();
      }
    else {

      /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
      $mail = new PHPMailer(TRUE);

      /* Set the mail sender. */
      $mail->setFrom('chinookw@webserver3.pebblehost.com', 'EmployeeReimbursementDaemon');

      /* Add a recipient. */
      $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

      /* Set the subject. */
      $mail->Subject = "Employee Reimbursement Submission";

      /* Set the mail message body. */
      $mail->isHTML(TRUE);
      $mail->Body = "<html>
                  <head>
                  <title>Employee Reimbursement Submission</title>
                  </head>
                  <body>
                  <p>This is an employee reimbursement submission</p>
                  <table>
                  <tr>
                  <th>Receipt Date:</th>
                  <th>Employee Name:</th>
                  <th>Truck Number:</th>
                  <th>Reimbursement Amount:</th>
                  <th>Reason for Reimbursement:</th>
                  <th>IRS Justification:</th>
                  </tr>
                  <tr>
                  <td>$date</td>
                  <td>$name</td>
                  <td>$tNum</td>
                  <td>$amount</td>
                  <td>$message</td>
                  <td>$irs</td>
                  </tr>
                  </table>
                  <p>Please do not reply to this message</p>
                  </body>
                  </html>";

      /* Add attachment to email */
      if (isset($_FILES['receiptImg']) && $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
       $mail->AddAttachment($_FILES['receiptImg']['tmp_name'], $_FILES['receiptImg']['name']);
      }

      /* Finally send the mail. */
      $mail->send();

      echo 'Your E-mail has been sent successfully<br />';

      mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $tNum, $amount, $message, $datePaid, $irs);
      mysqli_stmt_execute($stmt);

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
        header("Location: ../EP/reimbursements.php");
        exit();
        /*Checks if any fields are empty*/
      }
      else {
        echo "Sorry, there was an error uploading your file.";
      }
      header("Location: ../EP/reimbursements2.php");
      exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
elseif($name == "cmaguilar"){
  if(empty($_POST['ccbox'])){

    $target_dir = "reimbursements/cmaguilar/";
    $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    /*Checks if any fields are empty*/
    if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
      header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
      exit();
    }
    else {
      /*This statement actually puts the information in the database*/
      $sql = "INSERT INTO reimbursements (d8, employeeName, truckNumber, amount, reason, datePaid, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../EP/reimbursements2.php?error=sqlerror");
        exit();
      }
    else {

      /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
      $mail = new PHPMailer(TRUE);

      /* Set the mail sender. */
      $mail->setFrom('chinookw@webserver3.pebblehost.com', 'EmployeeReimbursementDaemon');

      /* Add a recipient. */
      $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

      /* Set the subject. */
      $mail->Subject = "Employee Reimbursement Submission";

      /* Set the mail message body. */
      $mail->isHTML(TRUE);
      $mail->Body = "<html>
                  <head>
                  <title>Employee Reimbursement Submission</title>
                  </head>
                  <body>
                  <p>This is an employee reimbursement submission</p>
                  <table>
                  <tr>
                  <th>Receipt Date:</th>
                  <th>Employee Name:</th>
                  <th>Truck Number:</th>
                  <th>Reimbursement Amount:</th>
                  <th>Reason for Reimbursement:</th>
                  <th>IRS Justification:</th>
                  </tr>
                  <tr>
                  <td>$date</td>
                  <td>$name</td>
                  <td>$tNum</td>
                  <td>$amount</td>
                  <td>$message</td>
                  <td>$irs</td>
                  </tr>
                  </table>
                  <p>Please do not reply to this message</p>
                  </body>
                  </html>";

      /* Add attachment to email */
      if (isset($_FILES['receiptImg']) && $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
       $mail->AddAttachment($_FILES['receiptImg']['tmp_name'], $_FILES['receiptImg']['name']);
      }

      /* Finally send the mail. */
      $mail->send();

      echo 'Your E-mail has been sent successfully<br />';

      mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $tNum, $amount, $message, $datePaid, $irs);
      mysqli_stmt_execute($stmt);

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
        header("Location: ../EP/reimbursements.php");
        exit();
        /*Checks if any fields are empty*/
      }
      else {
        echo "Sorry, there was an error uploading your file.";
      }
      header("Location: ../EP/reimbursements2.php");
      exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}else{
  $target_dir = "ccexpenses/";
  $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  /*Checks if any fields are empty*/
  if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
    header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
    exit();
  }
  else {
    /*This statement actually puts the information in the database*/
    $sql = "INSERT INTO ccExpenses (d8, employeeName, debits, credits, amount, reason, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/reimbursements2.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $debits, $credits, $amount, $message, $irs);
      mysqli_stmt_execute($stmt);

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
        header("Location: ../EP/reimbursements.php");
        exit();
      }
      else {
        echo "Sorry, there was an error uploading your file.";
        exit();
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
}
}
elseif($name == "crmorales"){
  if(empty($_POST['ccbox'])){

  $target_dir = "reimbursements/crmorales/";
  $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  /*Checks if any fields are empty*/
  if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
    header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
    exit();
  }
  else {
    /*This statement actually puts the information in the database*/
    $sql = "INSERT INTO reimbursements (d8, employeeName, truckNumber, amount, reason, datePaid, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/reimbursements2.php?error=sqlerror");
      exit();
    }
  else {

    /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
    $mail = new PHPMailer(TRUE);

    /* Set the mail sender. */
    $mail->setFrom('chinookw@webserver3.pebblehost.com', 'EmployeeReimbursementDaemon');

    /* Add a recipient. */
    $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

    /* Set the subject. */
    $mail->Subject = "Employee Reimbursement Submission";

    /* Set the mail message body. */
    $mail->isHTML(TRUE);
    $mail->Body = "<html>
                <head>
                <title>Employee Reimbursement Submission</title>
                </head>
                <body>
                <p>This is an employee reimbursement submission</p>
                <table>
                <tr>
                <th>Receipt Date:</th>
                <th>Employee Name:</th>
                <th>Truck Number:</th>
                <th>Reimbursement Amount:</th>
                <th>Reason for Reimbursement:</th>
                <th>IRS Justification:</th>
                </tr>
                <tr>
                <td>$date</td>
                <td>$name</td>
                <td>$tNum</td>
                <td>$amount</td>
                <td>$message</td>
                <td>$irs</td>
                </tr>
                </table>
                <p>Please do not reply to this message</p>
                </body>
                </html>";

    /* Add attachment to email */
    if (isset($_FILES['receiptImg']) && $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
     $mail->AddAttachment($_FILES['receiptImg']['tmp_name'], $_FILES['receiptImg']['name']);
    }

    /* Finally send the mail. */
    $mail->send();

    echo 'Your E-mail has been sent successfully<br />';

    mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $tNum, $amount, $message, $datePaid, $irs);
    mysqli_stmt_execute($stmt);

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
      header("Location: ../EP/reimbursements.php");
      exit();
      /*Checks if any fields are empty*/
    }
    else {
      echo "Sorry, there was an error uploading your file.";
    }
    header("Location: ../EP/reimbursements2.php");
    exit();
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
  $target_dir = "ccexpenses/";
  $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  /*Checks if any fields are empty*/
  if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
    header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
    exit();
  }
  else {
    /*This statement actually puts the information in the database*/
    $sql = "INSERT INTO ccExpenses (d8, employeeName, debits, credits, amount, reason, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/reimbursements2.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $debits, $credits, $amount, $message, $irs);
      mysqli_stmt_execute($stmt);

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
        header("Location: ../EP/reimbursements.php");
        exit();
      }
      else {
        echo "Sorry, there was an error uploading your file.";
        exit();
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
}
}
elseif($name == "dwmyers"){

  $target_dir = "reimbursements/dwmyers/";
  $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  /*Checks if any fields are empty*/
  if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
    header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
    exit();
  }
  else {
    /*This statement actually puts the information in the database*/
    $sql = "INSERT INTO reimbursements (d8, employeeName, truckNumber, amount, reason, datePaid, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/reimbursements2.php?error=sqlerror");
      exit();
    }
  else {

    /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
    $mail = new PHPMailer(TRUE);

    /* Set the mail sender. */
    $mail->setFrom('chinookw@webserver3.pebblehost.com', 'EmployeeReimbursementDaemon');

    /* Add a recipient. */
    $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

    /* Set the subject. */
    $mail->Subject = "Employee Reimbursement Submission";

    /* Set the mail message body. */
    $mail->isHTML(TRUE);
    $mail->Body = "<html>
                <head>
                <title>Employee Reimbursement Submission</title>
                </head>
                <body>
                <p>This is an employee reimbursement submission</p>
                <table>
                <tr>
                <th>Receipt Date:</th>
                <th>Employee Name:</th>
                <th>Truck Number:</th>
                <th>Reimbursement Amount:</th>
                <th>Reason for Reimbursement:</th>
                <th>IRS Justification:</th>
                </tr>
                <tr>
                <td>$date</td>
                <td>$name</td>
                <td>$tNum</td>
                <td>$amount</td>
                <td>$message</td>
                <td>$irs</td>
                </tr>
                </table>
                <p>Please do not reply to this message</p>
                </body>
                </html>";

    /* Add attachment to email */
    if (isset($_FILES['receiptImg']) && $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
     $mail->AddAttachment($_FILES['receiptImg']['tmp_name'], $_FILES['receiptImg']['name']);
    }

    /* Finally send the mail. */
    $mail->send();

    echo 'Your E-mail has been sent successfully<br />';

    mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $tNum, $amount, $message, $datePaid, $irs);
    mysqli_stmt_execute($stmt);

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
      header("Location: ../EP/reimbursements.php");
      exit();
      /*Checks if any fields are empty*/
    }
    else {
      echo "Sorry, there was an error uploading your file.";
    }
    header("Location: ../EP/reimbursements2.php");
    exit();
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
elseif($name == "jmcox"){

  $target_dir = "reimbursements/jmcox/";
  $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  /*Checks if any fields are empty*/
  if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
    header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
    exit();
  }
  else {
    /*This statement actually puts the information in the database*/
    $sql = "INSERT INTO reimbursements (d8, employeeName, truckNumber, amount, reason, datePaid, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/reimbursements2.php?error=sqlerror");
      exit();
    }
  else {

    /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
    $mail = new PHPMailer(TRUE);

    /* Set the mail sender. */
    $mail->setFrom('chinookw@webserver3.pebblehost.com', 'EmployeeReimbursementDaemon');

    /* Add a recipient. */
    $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

    /* Set the subject. */
    $mail->Subject = "Employee Reimbursement Submission";

    /* Set the mail message body. */
    $mail->isHTML(TRUE);
    $mail->Body = "<html>
                <head>
                <title>Employee Reimbursement Submission</title>
                </head>
                <body>
                <p>This is an employee reimbursement submission</p>
                <table>
                <tr>
                <th>Receipt Date:</th>
                <th>Employee Name:</th>
                <th>Truck Number:</th>
                <th>Reimbursement Amount:</th>
                <th>Reason for Reimbursement:</th>
                <th>IRS Justification:</th>
                </tr>
                <tr>
                <td>$date</td>
                <td>$name</td>
                <td>$tNum</td>
                <td>$amount</td>
                <td>$message</td>
                <td>$irs</td>
                </tr>
                </table>
                <p>Please do not reply to this message</p>
                </body>
                </html>";

    /* Add attachment to email */
    if (isset($_FILES['receiptImg']) && $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
     $mail->AddAttachment($_FILES['receiptImg']['tmp_name'], $_FILES['receiptImg']['name']);
    }

    /* Finally send the mail. */
    $mail->send();

    echo 'Your E-mail has been sent successfully<br />';

    mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $tNum, $amount, $message, $datePaid, $irs);
    mysqli_stmt_execute($stmt);

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
      header("Location: ../EP/reimbursements.php");
      exit();
      /*Checks if any fields are empty*/
    }
    else {
      echo "Sorry, there was an error uploading your file.";
    }
    header("Location: ../EP/reimbursements2.php");
    exit();
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
elseif($name == "karichards"){

  $target_dir = "reimbursements/karichards/";
  $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  /*Checks if any fields are empty*/
  if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
    header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
    exit();
  }
  else {
    /*This statement actually puts the information in the database*/
    $sql = "INSERT INTO reimbursements (d8, employeeName, truckNumber, amount, reason, datePaid, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/reimbursements2.php?error=sqlerror");
      exit();
    }
  else {

    /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
    $mail = new PHPMailer(TRUE);

    /* Set the mail sender. */
    $mail->setFrom('chinookw@webserver3.pebblehost.com', 'EmployeeReimbursementDaemon');

    /* Add a recipient. */
    $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

    /* Set the subject. */
    $mail->Subject = "Employee Reimbursement Submission";

    /* Set the mail message body. */
    $mail->isHTML(TRUE);
    $mail->Body = "<html>
                <head>
                <title>Employee Reimbursement Submission</title>
                </head>
                <body>
                <p>This is an employee reimbursement submission</p>
                <table>
                <tr>
                <th>Receipt Date:</th>
                <th>Employee Name:</th>
                <th>Truck Number:</th>
                <th>Reimbursement Amount:</th>
                <th>Reason for Reimbursement:</th>
                <th>IRS Justification:</th>
                </tr>
                <tr>
                <td>$date</td>
                <td>$name</td>
                <td>$tNum</td>
                <td>$amount</td>
                <td>$message</td>
                <td>$irs</td>
                </tr>
                </table>
                <p>Please do not reply to this message</p>
                </body>
                </html>";

    /* Add attachment to email */
    if (isset($_FILES['receiptImg']) && $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
     $mail->AddAttachment($_FILES['receiptImg']['tmp_name'], $_FILES['receiptImg']['name']);
    }

    /* Finally send the mail. */
    $mail->send();

    echo 'Your E-mail has been sent successfully<br />';

    mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $tNum, $amount, $message, $datePaid, $irs);
    mysqli_stmt_execute($stmt);

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
      header("Location: ../EP/reimbursements.php");
      exit();
      /*Checks if any fields are empty*/
    }
    else {
      echo "Sorry, there was an error uploading your file.";
    }
    header("Location: ../EP/reimbursements2.php");
    exit();
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
elseif($name == "wcmelson"){
  if(empty($_POST['ccbox'])){

  $target_dir = "reimbursements/wcmelson/";
  $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  /*Checks if any fields are empty*/
  if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
    header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
    exit();
  }
  else {
    /*This statement actually puts the information in the database*/
    $sql = "INSERT INTO reimbursements (d8, employeeName, truckNumber, amount, reason, datePaid, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/reimbursements2.php?error=sqlerror");
      exit();
    }
  else {

    /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
    $mail = new PHPMailer(TRUE);

    /* Set the mail sender. */
    $mail->setFrom('chinookw@webserver3.pebblehost.com', 'EmployeeReimbursementDaemon');

    /* Add a recipient. */
    $mail->addAddress('CWLCheckCall@gmail.com', 'CheckCall');

    /* Set the subject. */
    $mail->Subject = "Employee Reimbursement Submission";

    /* Set the mail message body. */
    $mail->isHTML(TRUE);
    $mail->Body = "<html>
                <head>
                <title>Employee Reimbursement Submission</title>
                </head>
                <body>
                <p>This is an employee reimbursement submission</p>
                <table>
                <tr>
                <th>Receipt Date:</th>
                <th>Employee Name:</th>
                <th>Truck Number:</th>
                <th>Reimbursement Amount:</th>
                <th>Reason for Reimbursement:</th>
                <th>IRS Justification:</th>
                </tr>
                <tr>
                <td>$date</td>
                <td>$name</td>
                <td>$tNum</td>
                <td>$amount</td>
                <td>$message</td>
                <td>$irs</td>
                </tr>
                </table>
                <p>Please do not reply to this message</p>
                </body>
                </html>";

    /* Add attachment to email */
    if (isset($_FILES['receiptImg']) && $_FILES['receiptImg']['error'] == UPLOAD_ERR_OK) {
     $mail->AddAttachment($_FILES['receiptImg']['tmp_name'], $_FILES['receiptImg']['name']);
    }

    /* Finally send the mail. */
    $mail->send();

    echo 'Your E-mail has been sent successfully<br />';

    mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $tNum, $amount, $message, $datePaid, $irs);
    mysqli_stmt_execute($stmt);

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
      header("Location: ../EP/reimbursements.php");
      exit();
      /*Checks if any fields are empty*/
    }
    else {
      echo "Sorry, there was an error uploading your file.";
    }
    header("Location: ../EP/reimbursements2.php");
    exit();
  }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
  $target_dir = "ccexpenses/";
  $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  /*Checks if any fields are empty*/
  if (empty($date) || empty($name) || empty($tNum) || empty($amount) || empty($message)){
    header("Location: ../EP/reimbursements2.php?error=emptyfields&date=".$date."&name=" .$name. "&tNum=" .$tNum. "&amount=" .$amount."&message=" .$message);
    exit();
  }
  else {
    /*This statement actually puts the information in the database*/
    $sql = "INSERT INTO ccExpenses (d8, employeeName, debits, credits, amount, reason, irsJustification) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/reimbursements2.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "sssssss", $date, $name, $debits, $credits, $amount, $message, $irs);
      mysqli_stmt_execute($stmt);

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
        header("Location: ../EP/reimbursements.php");
        exit();
      }
      else {
        echo "Sorry, there was an error uploading your file.";
        exit();
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
}
}
else{
  echo '<h2>Error with something</h2>';
}
}
  elseif($selector == "reports"){

    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $datas = array();

    $sql = "SELECT employeeName, SUM(amount)
            FROM reimbursements
            WHERE d8 BETWEEN '$startDate' AND '$endDate'
            GROUP BY employeeName
            ORDER BY employeeName;";

    /*actually runs the code above*/
    $result = mysqli_query($conn, $sql);

    /*This if statements, puts the results
    of the above statement, into an array*/
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $datas[] = $row;
      }
    }
    echo "<table style='border-spacing: 10px;'>
          <tr>
            <th>Employee Name</th>
            <th>Reimbursement Amount</th>
          </tr>";
    /*This outputs the data of the array*/
    foreach($datas as $data){
      echo "<tr>";
      echo "<td>" .$data['employeeName']. "</td>";
      echo "<td>" .$data['SUM(amount)']. "</td>";
    }
  }

  elseif($selector == 'update'){
    $selector2 = $_POST['selector2'];
    $_SESSION['selector2'] == $selector2;


    if($selector2 == 'no'){
    $_SESSION['todaysDate'] = $_POST['todaysDate'];
    $datas = array();

    $sql = "SELECT * FROM reimbursements WHERE datePaid = '2000-01-01'";

    /*actually runs the code above*/
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $datas[] = $row;
      }
    }
    echo "<table style='border-spacing: 10px;'>
          <tr>
            <th>Reimburse?</th>
            <th>Employee Name</th>
            <th>Amount to be Reimbursed</th>
            <th>Reason for Reimbursement</th>
          </tr>";

  echo '<form action="reimbursements2.inc.php" name="employee" method="post" enctype="multipart/form-data">';
    /*This outputs the data of the array*/
    foreach($datas as $data){
      echo "<tr>";
      echo "<td><input type='checkbox' name='counter[]' value='".$data['id']."'></input></td>";
      echo "<td>" .$data['employeeName']. "</td>";
      echo "<td>" .$data['amount']. "</td>";
      echo "<td>" .$data['reason']. "</td>";
    }
    echo "<button type='submit' name='reimbursementUpdator' value='Submit'>Submit</button>";
    echo "</form>";

    $_SESSION['datas'] = $datas;}else{

    echo "Would you like to reimburse all receipts? </ br>";
    echo "<form action='reimbursements2.inc.php' method='post' enctype='multipart/form-data'>
          <button class='btn btn-primary' type='submit' name='reimbursementUpdator'>Submit</button>
          </form>";}}
  else{
    echo'There was an error generating your report';
  }
}
