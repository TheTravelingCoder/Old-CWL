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
                    <a class="nav-link js-scroll-trigger" href="safety.php">Safety</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="handbook.php">Handbook</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="checkCall.php"> Check Call</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="attendance.php">Attendance</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="fuel.php"> Fuel</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="reimbursements.php">Expenses</a>
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
        </body>
<?php
require "footer.php";
?>
