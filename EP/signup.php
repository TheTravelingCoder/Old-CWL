<?php session_start(); ?>
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

 <main>
   <header>
     <!-- Navigation -->
           <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav"><!---->
             <div class="container">
               <a class="navbar-brand js-scroll-trigger" href="../index.html">Chinook Winds Logistics</a>
               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarResponsive">
                 <ul class="navbar-nav ml-auto my-2 my-lg-0">
                   <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="../index.html">Home</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="../careers/splash.html"> Now Hiring</a>
                   </li>
                 </ul>
               </div>
             </div>
           </nav><!---->


           <!-- Masthead -->
           <header class="masthead">
             <div class="container h-100">
               <div class="row h-100 align-items-center justify-content-center text-center">
                 <div class="col-lg-10 align-self-end">
                   <h1 class="text-uppercase text-white font-weight-bold"><br>
         <br>
         </h1>

                 </div>
                 <div class="col-lg-8 align-self-baseline">
                   <p class="text-white-75 font-weight-light mb-5"></p>
                   <?php
                    if (isset($_SESSION['userID'])){
                     echo '<form action="../includes/logout.inc.php" method="post">
                          <button type="submit" name="logout-submit" class="btn btn-primary btn-xl js-scroll-trigger" href="../index.html">Log Out!</a>
                          </form>';
                    }
                    else {
                     echo '<form action="../includes/login.inc.php" method="post">
                          <input type="text" name="uid" placeholder="Username">
                          <input type="password" name="pwd" placeholder="Password">
                          <button type="submit" name="login-submit" class="btn btn-primary btn-xl js-scroll-trigger">Log In!</a>
                          </form>';
                    }
                   ?>

                 </div>
               </div>
             </div>
           </header>

   <!--This is the sign up form-->
   <section class="page-section bg-dark text-white">
     <div class="container text-center">
       <h2 class="mb-4">Signup!</h2>
       <br>
       <br>
       <?php
       /*this actually gives visible error messages*/
      if (isset($_GET['error'])){
        if ($_GET['error'] == "emptyfields"){
          echo '<p class="signuperror">Please fill in all fields.</p>';
        }
        else if ($_GET["error"] == "invalidmailuid"){
          echo '<p class="signuperror">Invalid username and e-mail.</p>';
        }
        else if ($_GET["error"] == "invalidmail"){
          echo '<p class="signuperror">Invalid e-mail.</p>';
        }
        else if ($_GET["error"] == "invaliduid"){
          echo '<p class="signuperror">Invalid username.</p>';
        }
        else if ($_GET["error"] == "passwordcheck"){
          echo '<p class="signuperror">Your passwords do not match.</p>';
        }
        else if ($_GET["error"] == "usertaken"){
          echo '<p class="signuperror">Username is already taken.</p>';
        }
        else if ($_GET["error"] == "invalidemail"){
          echo '<p class="signuperror">That email is invalid.</p>';
        }
        else if ($_GET["signup"] == "success"){
          echo '<p class="signuperror">Signup successful!</p>';
        }
      }

    ?>
        <form class="container" action="../includes/signup.inc.php" method="post">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>First Name</label>
              <input type="text" name="first" placeholder="First Name"></div></div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Last Name</label>
                <input type="text" name="last" placeholder="Last Name"></div></div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Username</label>
                <input type="text" name="uid" placeholder="Username"></div></div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>E-Mail Address</label>
                <input type="text" name="email" placeholder="E-mail"></div></div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Password</label>
                <input type="password" name="pwd" placeholder="Password"></div></div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Repeat Password</label>
                <input type="password" name="pwd-repeat" placeholder="Repeat password"></div></div>
            <div class="form-group">
              <button type="submit" name="signup-submit">Signup</buttom></div>
              </form>
            </div>
          </div>

 </main>

 <?php
  /*includes the footer.php page*/
  require "footer.php";
  ?>
