<?php

/*makes sure user got to page from correct link*/
if (isset($_POST['FRSubmit'])){

  /*This gives the database connection*/
  require 'dbh.inc.php';

  /* Stores the values of the different inputs into vars*/
  $date = $_POST["fuelDate"];
  $location = $_POST["location"];
  $advertised = $_POST["advertised"];
  $dGallons = $_POST["gallons"];
  $defPrice = $_POST["defPrice"];
  $defQuantity = $_POST["defQuantity"];
  $defTotal = $defPrice * $defQuantity;
  $iftaRate = $_POST["iftaRate"];
  $comdataPurchase = $_POST["comdataPurchase"];
  $target_dir = "upload567130/";
  $target_file = $target_dir . basename($_FILES["receiptImg"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  /*Checks if any fields are empty*/
  if (empty($date) || empty($location) || empty($advertised) || empty($dGallons) || empty($defPrice)
  || empty($defQuantity) || empty($iftaRate) || empty($comdataPurchase)){
    header("Location: ../EP/fuelReceipt.php?error=emptyfields&fuelDate=".$date."&location=" .$location. "&advertised=" .$advertised. "&gallons=" .$dGallons. "&defPrice=" .$defPrice.
    "&defQuantity" .$defQuantity. "&iftaRate=" .$iftaRate. "&comdataPurchase=" .$comdataPurchase);
    exit();
  }
  else {
      /*This statement actually puts the information in the database*/
      $sql = "INSERT INTO fuel567130 (fuelDate, location, advertised, gallons, defPrice, defQuantity, defTotal, iftaRate, comdataPurchase) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../EP/splash.php?error=sqlerror");
        exit();
      }
      else {
        /*password_hash encrypts the passwords, so you cant put php code in our database*/
        mysqli_stmt_bind_param($stmt, "sssssssss", $date, $location, $advertised, $dGallons, $defPrice, $defQuantity, $defTotal, $iftaRate, $comdataPurchase);
        mysqli_stmt_execute($stmt);

          // Check if file already exists
          if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $uploadOk = 0;
          }
          if (move_uploaded_file($_FILES["receiptImg"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["receiptImg"]["name"]). " has been uploaded.";
              /*Checks if any fields are empty*/
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
          header("Location: ../EP/splash.php");
          exit();
        }
      }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  }
  else{
  header("Location: ../EP/splash.php");
  exit();
  }
