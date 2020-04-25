<?php
/*makes sure user got to page from correct link*/
if (isset($_POST['login-submit'])){

  /*This gives the database connection*/
  require 'dbh.inc.php';

  $uid = $_POST['uid'];
  $password = $_POST['pwd'];

  if (empty($uid) || empty($password)){
    header("Location: ../EP/login.php?error=emptyfields");
    exit();
  }
  else {
    /* a "*" means all*/
    $sql = "SELECT * FROM users WHERE uidUsers=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/login.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $uid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      /*checks if actually get result from database*/
      if ($row = mysqli_fetch_assoc($result)) {
        /*this checks verification of password in database*/
        /*$row is a variable to check a row in database*/
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        if ($pwdCheck == false){
          header("Location: ../EP/login.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true){
          session_start();
          $_SESSION['userID'] = $row['idUsers'];
          $_SESSION['userUid'] = $row['uidUsers'];

          header("Location: ../EP/checkCall.php?login=success");
          exit();
        }
        else {
          header("Location: ../EP/login.php?error=wrongpwd");
          exit();
        }
      }
      else {
        header("Location: ../EP/login.php?error=nouser");
        exit();
      }
    }
  }
}
/*This return the user to checkcall page after signin*/
else {
  header("Location: ../EP/checkCall.php");
  exit();
}
