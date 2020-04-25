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
 <main>
   <br>
   <br>

   <div class="container">

         <h3>Click here to download the most up to date version of the employee handbook.<br />
         Currently it is revision 2.0.</h3>
         <br />

       <form method="get" action="HandbookRevision2Full.pdf" align="center">
         <button type="submit" class="btn btn-primary">Download</button>
       </form>
   </div>

 </main>

  <?php
  require "footer.php";
  ?>
