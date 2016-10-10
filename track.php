<?php

include("function.php");

session_start();
checklogin($_SESSION['login']);
$user_id = $_SESSION['user_id'];

$device_id = 0;
$type = 0;
$longitude = 0;
$latitude = 0;
$created = 0;

$sql = "SELECT device_id, type, longitude, latitude, created FROM location
        WHERE device_id = '1111' AND created = (SELECT MAX(created))";
$query = mysql_query($sql);

while ($row = mysql_fetch_array($query)) {
        $device_id = $row['device_id'];
        $type = $row['type'];
        $longitude = $row['longitude'];
        $latitude = $row['latitude'];
        $timestamp= $row['created'];
}

$sql = "SELECT is_out, created FROM zone WHERE created = (SELECT MAX(created))";
$query = mysql_query($sql);

while ($row = mysql_fetch_array($query)) {
        $out_zone = $row['is_out'];
        $created = $row['created'];
}

if ($out_zone == 1) {
    $lost_message = "<div class='alert alert-danger'>
                        <strong>DANGER!</strong> YOUR DOG MAX IS OUTSIDE THE SAFE ZONE NOW!
                    </div>";
} else {
    $lost_message = "";
}

$table_data = '';

$sql = "SELECT type, longitude, latitude, created FROM location
        WHERE device_id = '1111')";
$query = mysql_query($sql);

while ($row = mysql_fetch_array($query)) {
        $type_table = $row['type'];
        $longitude_table = $row['longitude'];
        $latitude_table = $row['latitude'];
        $timestamp_table = $row['created'];

        $table_data = $table_data . "<tr>
                        <td> " . $timestamp_table . "</td>
          <td> " . $latitude_table . "</td>
          <td> " . $longitude_table . "</td>
        </tr>";

}

?>

<!DOCTYPE html>
<html lang="en">
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
            <li class="active"><a href="track.php"> Track </a></li>
            <li><a href="profile.php"> Profile </a></li>
            <li><a href="community.php"> Community </a></li>
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
                <li id="li_dashboard" class="active"><a class="sidebar_item" id="menu_dashboard" href="#dashboard"><i class="fa fa-map-o fa-2x"></i> &nbsp Dashboard </a></li>
                <li id="li_history"><a class="sidebar_item" id="menu_history" href="#history"><i class="fa fa-history fa-2x"></i> &nbsp &nbsp History </a></li>
                <li id="li_logout"><a class="sidebar_item" id="menu_logout" href="logout.php"><i class="fa fa-power-off fa-2x"></i> &nbsp &nbsp Logout </a></li>
              </ul>
            </div>

        <!--  ********* SIDEBAR ********** -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="alerts">
            <?php echo $lost_message; ?>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="dashboard">
        <div id="location_div" style="align:center">
            <div class="row placeholders">

            <div class="col-xs-12 col-sm-4 placeholder">
              <h4> Select Your Dog </h4> </br>
              <div class="dropdown" id="dog_select">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    Max <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Max</a></li>
                    <li><a href="#">Haley</a></li>
                    <li><a href="#">Lassie</a></li>
                  </ul>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 placeholder">
              <h4> Choose ping rate</h4> </br>
              <div class="radio">
                <label><input type="radio" name="optradio" checked>Every 10 seconds</label>
                </div>
                <div class="radio">
                <label><input type="radio" name="optradio">Every 2 minutes</label>
                </div>
                <div class="radio disabled">
                <label><input type="radio" name="optradio">Every 5 minutes</label>
            </div>
            </div>
            <div class="col-xs-12 col-sm-4 placeholder">
             <h4> Notify me when ... </h4></br>
             <div class="dropdown">
                 <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                   WiFi connection is lost <span class="caret"></span>
                 </button>
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                   <li><a href="#">WiFi connection is lost</a></li>
                   <li><a href="#">Bluetooth connection is lost</a></li>
                 </ul>
               </div>
              <span class="text-muted"> </span>
            </div>
            </div>

            <div id="map">
            </div>

            <script>

            // var map;
            // function initMap() {
            //     map = new google.maps.Map(document.getElementById('map'), {
            //         center: {lat: -34.397, lng: 150.644},
            //         zoom: 8
            //     });
            // }

                var longitude = <?php echo $longitude ?>;
                var latitude = <?php echo $latitude ?>;

                console.log("Lon: " + longitude);
                console.log("Lat: " + latitude);

                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: latitude, lng: longitude},
                        zoom: 16
                    });

                    var dog_marker = new google.maps.Marker({
                      position: {lat: latitude, lng: longitude},
                      map: map,
                      title: 'Max'
                    });
                }

            </script>

          </div>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="history" style="display:none;">
            <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Timestamp</th>
                  <th>Longitude</th>
                  <th>Latitude</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $table_data; ?>
              </tbody>
            </table>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv4u17WqyZAZx6qZ0H6lTxLWA8Ujrnxe8&callback=initMap"async defer>

    <script src="js/bootstrap-slider.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
