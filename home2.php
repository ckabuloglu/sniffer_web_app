<?php

include("function.php");

// $device_id = 0;
// $type = 0;
// $longitude = 0;
// $latitude = 0;
// $created = 0;

$sql = "SELECT device_id, type, longitude, latitude, created FROM location
        WHERE device_id = '1111' AND created = (SELECT MAX(created))";
$query = mysql_query($sql);

while ($row = mysql_fetch_array($query)) {
        $device_id = $row['device_id'];
        $type = $row['type'];
        $longitude = $row['longitude'];
        $latitude = $row['latitude'];
        $created = $row['created'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="10">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Sniffer Homepage 1">
    <meta name="author" content="Can Kabuloglu">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Our own CSS stylesheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        html, body {
            height: 100%;
            background-color: #FFFFFF;
        }
        </style>
    </style>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sniffer GPS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"> Track </a></li>
            <li><a href="#"> Profile </a></li>
            <li><a href="#"> Community </a></li>
            <li><a href="#"> Settings </a></li>
          </ul>
        </div>
      </div>
    </nav>

    <ul class="nav nav-tabs">
      <li class="active"><a href="#">Track</a></li>
      <li><a href="#">Devices</a></li>
      <li><a href="#">Dogs</a></li>
      <li><a href="#">Addresses</a></li>
    </ul>

    



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv4u17WqyZAZx6qZ0H6lTxLWA8Ujrnxe8&callback=initMap"async defer></script>

    <script src="js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
