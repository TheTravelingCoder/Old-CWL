<?php
if (isset($_POST['signup-submit'])){

  require 'dbh.inc.php';

  $first = $_POST['first'];
  $last = $_POST['last'];
  $username = $_POST['uid'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $passwordrepeat = $_POST['pwd-repeat'];

  /*Checks if any fields are empty*/
  if (empty($first) || empty($last) || empty($username) || empty($email) || empty($password) || empty($passwordrepeat)){
    header("Location: ../EP/signup.php?error=emptyfields&first=".$first."&last=" .$last. "&username=" .$username. "&email=" .$email);
    exit();
  }
  /*This checks is both email and uid are bad*/
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../EP/signup.php?error=invalidmailuid");
    exit();
  }
  /*This checks for invalid email*/
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: ../EP/signup.php?error=invalidmail&uid=" .$username);
    exit();
  }
  /*This checks for invalid username*/
  elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: ../EP/signup.php?error=invaliduid&mail=" .$email);
    exit();
  }
  /*This checks if password and repeat match*/
  elseif ($password !== $passwordrepeat){
    header("Location: ../EP/signup.php?error=passwordcheck&uid=" .$username. "&mail=" .$email);
    exit();
  }
  /*This checks for unused uid*/
  else {

    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../EP/signup.php?error=sqlerror");
      exit();
    }

    else {
      /*This can have multiple parameters*/
      /*this checks if username is taken*/
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0){
        header("Location: ../EP/signup.php?error=usertaken&mail=" .$email);
        exit();
      }
      else {
        /*This adjusts the SQL statement*/
        $sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../EP/signup.php?error=sqlerror");
          exit();
        }
      /*This checks if the email address is in the database*/
      else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if($resultCheck != 1){
          header("Location: ../EP/signup.php?error=invalidemail");
          exit();
        }
      else {
        /*This statement actually puts the information in the database*/
        $sql = "INSERT INTO users (firstUsers, lastUsers, uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../EP/signup.php?error=sqlerror");
          exit();
        }
        else {
          /*password_hash encrypts the passwords, so you cant put php code in our database*/
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sssss", $first, $last, $username, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../EP/signup.php?signup=success");
          exit();
        }
      }
    }
  }
}
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
  header("Location: ../EP/signup.php");
  exit();
}
