<?php
session_start();

if (isset($_GET['submit'])){

require 'dbh.inc.php';

$tNumber = $_GET['truckNumber'];
$report = $_GET['reportSelect'];
$startDate = $_GET['reportDateStart'];
$endDate = $_GET['reportDateEnd'];

  if($tNumber == '566243'){
    if($report == 'fuelQuantity'){
      /*Grabs row of Database with highest id Value*/
      $sql = "SELECT SUM(gallons)
              FROM fuel566243
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row = mysqli_fetch_assoc($result);

      echo "<h4>Total Fuel Quantity in Gallons For Truck 566243</h4>";
      echo $row["SUM(gallons)"];
      }
    elseif($report == "fuelCost"){
      /*Grabs sum of truck 566243 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase), SUM(defTotal)
              FROM fuel566243
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row = mysqli_fetch_assoc($result);

      echo "<h4>Total Fuel Cost for Truck 566243</h4>";
      echo '$';
      echo $row["SUM(comdataPurchase)"] - $row["SUM(defTotal)"];
    }
    elseif($report == "totalComdata"){
      /*Grabs sum of truck 566243 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase)
              FROM fuel566243
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row = mysqli_fetch_assoc($result);

      echo "<h4>Total Comdata Purchase For Truck 566243</h4>";
      echo '$';
      echo $row["SUM(comdataPurchase)"];
    }
    else{
      echo "There was an error generating your report, please try again";
    }
  }
  elseif($tNumber == "566521"){
    if($report == "fuelQuantity"){
      /*Grabs row of Database with highest id Value*/
      $sql = "SELECT SUM(gallons)
              FROM fuel566521
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row = mysqli_fetch_assoc($result);

      echo "<h4>Total Fuel Quantity in Gallons For Truck 566521</h4>";
      echo $row["SUM(gallons)"];
    }
    elseif($report == "fuelCost"){
      /*Grabs sum of truck 566521 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase), SUM(defTotal)
              FROM fuel566521
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row = mysqli_fetch_assoc($result);

      echo "<h4>Total Fuel Cost for Truck 566521</h4>";
      echo '$';
      echo $row["SUM(comdataPurchase)"] - $row["SUM(defTotal)"];
    }
    elseif($report == "totalComdata"){
      /*Grabs sum of truck 566521 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase)
              FROM fuel566521
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row = mysqli_fetch_assoc($result);

      echo "<h4>Total Comdata Purchase For Truck 566521</h4>";
      echo '$';
      echo $row["SUM(comdataPurchase)"];
    }
    else{
      echo "There was an error generating your report, please try again";
    }
  }
  elseif($tNumber == "567130"){
    if($report == "fuelQuantity"){
      /*Grabs row of Database with highest id Value*/
      $sql = "SELECT SUM(gallons)
              FROM fuel567130
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row = mysqli_fetch_assoc($result);

      echo "<h4>Total Fuel Quantity in Gallons For Truck 567130</h4>";
      echo $row["SUM(gallons)"];
    }
    elseif($report == "fuelCost"){
      /*Grabs sum of truck 566243 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase), SUM(defTotal)
              FROM fuel567130
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row = mysqli_fetch_assoc($result);

      echo "<h4>Total Fuel Cost for Truck 567130</h4>";
      echo '$';
      echo $row["SUM(comdataPurchase)"] - $row["SUM(deftotal)"];
    }
    elseif($report == "totalComdata"){
      /*Grabs sum of truck 567130 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase)
              FROM fuel567130
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row = mysqli_fetch_assoc($result);

      echo "<h4>Total Comdata Purchase For Truck 567130</h4>";
      echo '$';
      echo $row["SUM(comdataPurchase)"];
    }
    else{
      echo "There was an error generating your report, please try again";
    }
  }
  elseif($tNumber == "allTrucks"){
    if($report == "fuelQuantity"){
      /*Grabs sum of truck 566243 gallons column*/
      $sql = "SELECT SUM(gallons)
              FROM fuel566243
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row1 = mysqli_fetch_assoc($result);

      echo "<h4>Total Fuel Quantity in Gallons For Truck 566243</h4>";
      echo $row1["SUM(gallons)"];

      /*Grabs sum of truck 566521 gallons column*/
      $sql = "SELECT SUM(gallons)
              FROM fuel566521
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row2 = mysqli_fetch_assoc($result);

      echo "<h4>Total Fuel Quantity in Gallons For Truck 566521</h4>";
      echo $row2["SUM(gallons)"];

      /*Grabs sum of truck 567130 gallons column*/
      $sql = "SELECT SUM(gallons)
              FROM fuel567130
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row3 = mysqli_fetch_assoc($result);

      echo "<h4>Total Fuel Quantity in Gallons For Truck 567130</h4>";
      echo $row3["SUM(gallons)"];

      /*adds the values together to make total for all trucks*/
      echo "<h4> Total Fuel Quantity Across All Trucks</h4>";
      echo $row1["SUM(gallons)"] + $row2["SUM(gallons)"] + $row3["SUM(gallons)"];
    }
    elseif($report == "fuelCost"){
      /*Grabs sum of truck 566243 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase), SUM(defTotal)
              FROM fuel566243
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row1 = mysqli_fetch_assoc($result);

      /*Sets variable for outcome*/
      $fuelCost566243 = $row1["SUM(comdataPurchase)"] - $row1["SUM(defTotal)"];

      echo "<h4>Total Fuel Cost for Truck 566243</h4>";
      echo '$';
      echo $fuelCost566243;

      /*Grabs sum of truck 566243 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase), SUM(defTotal)
              FROM fuel566521
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row2 = mysqli_fetch_assoc($result);

      $fuelCost566521 = $row2["SUM(comdataPurchase)"] - $row2["SUM(defTotal)"];

      echo "<h4>Total Fuel Cost for Truck 566521</h4>";
      echo '$';
      echo $fuelCost566521;

      /*Grabs sum of truck 566243 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase), SUM(defTotal)
              FROM fuel567130
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row3 = mysqli_fetch_assoc($result);

      $fuelCost567130 = $row3["SUM(comdataPurchase)"] - $row3["SUM(defTotal)"];

      echo "<h4>Total Fuel Cost for Truck 567130</h4>";
      echo '$';
      echo $fuelCost567130;

      echo "<h4>Total Fuel Cost for All Trucks</h4>";
      echo '$';
      echo $fuelCost566243 + $fuelCost566521 + $fuelCost567130;

    }
    elseif($report == "totalComdata"){
      /*Grabs sum of truck 566243 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase)
              FROM fuel566243
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row1 = mysqli_fetch_assoc($result);

      echo "<h4>Total Comdata Purchase For Truck 566243</h4>";
      echo '$';
      echo $row1["SUM(comdataPurchase)"];

      /*Grabs sum of truck 566521 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase)
              FROM fuel566521
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row2 = mysqli_fetch_assoc($result);

      echo "<h4>Total Comdata Purchase For Truck 566521</h4>";
      echo '$';
      echo $row2["SUM(comdataPurchase)"];

      /*Grabs sum of truck 567130 comdataPurchase column*/
      $sql = "SELECT SUM(comdataPurchase)
              FROM fuel567130
              WHERE fuelDate BETWEEN '$startDate' AND '$endDate';";
      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
      /*puts $result into an array*/
      $row3 = mysqli_fetch_assoc($result);

      echo "<h4>Total Comdata Purchase For Truck 567130</h4>";
      echo '$';
      echo $row3["SUM(comdataPurchase)"];

      /*adds the values together to make total for all trucks*/
      echo "<h4> Total Comdata Purchase Across All Trucks</h4>";
      echo '$';
      echo $row1["SUM(comdataPurchase)"] + $row2["SUM(comdataPurchase)"] + $row3["SUM(comdataPurchase)"];
    }
    else{
      echo "There was an error generating your report, please try again";
    }
  }
  else{
    echo "There was an error generating your report, please try again";
  }
}

 ?>
