<?php
session_start();

if (isset($_POST['reimbursementUpdator'])){
  if($_SESSION['selector2'] == 'yes'){

  /*This gives the database connection*/
  require 'dbh.inc.php';

  $todaysDate = $_SESSION['todaysDate'];

  $sql = "UPDATE reimbursements SET datePaid = '$todaysDate' WHERE datePaid = '2000-01-01'";

  /*actually runs the code above*/
  $result = mysqli_query($conn, $sql);

  echo 'All receipts have been updated';}

  else{

    /*This gives the database connection*/
    require 'dbh.inc.php';

    $datas = $_SESSION['datas'];
    $todaysDate = $_SESSION['todaysDate'];

    $counter = $_POST['counter'];

    foreach($counter as $id){
      echo "You reimbursed " .$datas['employeeName']. "for $" .$datas['amount']. "on " .$todaysDate;

      $sql = "UPDATE reimbursements SET datePaid = '$todaysDate' WHERE id = '$id'";

      /*actually runs the code above*/
      $result = mysqli_query($conn, $sql);
    }
  }
}else{
  echo 'Sorry im not sure how you got here';
}
