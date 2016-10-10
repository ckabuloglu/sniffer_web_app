<?php

include("function.php");

session_start();
checklogin($_SESSION['login']);
$user_id = $_SESSION['user_id'];

?>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <meta http-equiv="refresh" content="10"> -->

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="Sniffer Homepage 1">
  <meta name="author" content="Can Kabuloglu">
  <link rel="icon" href="../../favicon.ico">

  <title>Dashboard Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">

  <!-- Our own CSS stylesheet -->
  <link href="css/style.css" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/function.js"></script>

  <script src="https://use.fortawesome.com/d76bceb1.js"></script>

  <style>
      html, body {
          height: 100%;
          background-color: #FFFFFF;
      }
      </style>
  </style>

</head>

<body id="menu_item">

    <!-- ********** TOP NAVIGATION BAR ********** -->

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color: #9D9D9D" href="profile.php"> <? echo "Hi, " . getuser($user_id); ?> </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="track.php"> Track </a></li>
            <li><a href="profile.php"> Profile </a></li>
            <li class="active"><a href="community.php"> Community </a></li>
            <li><a href="settings.php"> Settings </a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- ********** TOP NAVIGATION BAR ********** -->

    <div class="container-fluid">

        <!--  ********* SIDEBAR ********** -->

        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="li_community" class="active"><a class="sidebar_item" id="menu_community" href="#community"><i class="fa fa-globe fa-2x"></i> &nbsp Community </a></li>
            <li id="li_logout"><a class="sidebar_item" id="menu_logout" href="logout.php"><i class="fa fa-power-off fa-2x"></i> &nbsp &nbsp Logout </a></li>
          </ul>
        </div>

        <!--  ********* SIDEBAR ********** -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="div_container">
            <div class="main_element" id="community">
                <h1> Under Construction ... </h1>
            </div>
        </div>

    </div>





</body>

</html>
