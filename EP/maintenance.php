<?php
  require "header.php";
?>
<!DOCTYPE html>

<!-- to run the php "cd C:\Users\Kevin Richards\Desktop\Chinook Website"
     Then php -S localhost:8000-->
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

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">

      		<div class="container">
      				<h2 align="center">
      				Welcome to the Maintenance Portal.
      				</h2>
      		</div>
          <h2 align="center">
            Are you submitting a maintenance receipt?<br />
            Or, would you like to run a maintenance report?
          </h2>
          <div align="center">
            <form method="get" name="rOrR" action="maintenance2.php">
          <select name="selector">
            <option value="receipt">Submit a maintenance receipt</option>
            <option value="reports">Reports</option>
          </select>
          <input type="submit">
        </div><br /></form>
    </div>
  </section>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="../js/creative.min.js"></script>

</body>

<?php
 require "footer.php";
?>

</html>
