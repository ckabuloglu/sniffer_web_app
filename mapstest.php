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
<html>
    <head>
        <title>Simple Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet" type="text/css">

        <style>
        html, body {
            height: 100%;
        }
        </style>
    </head>

    <body>

        <h2> The latest are </h2>
        <table>
            <tr> <td>Device ID: </td> <td><?php echo $device_id ?></td> </tr>
            <tr> <td>Type: </td> <td><?php echo $type ?></td> </tr>
            <tr> <td>Longitude: </td> <td><?php echo $longitude ?> </td> </tr>
            <tr> <td>Latitude: </td> <td><?php echo $latitude ?></td> </tr>
            <tr> <td>Created: </td> <td><?php echo $created ?></td> </tr>
        </table>
    </br>

    <h2> See it on the map! </h2>
        <div id="map"></div>
            <script>
                var map;
                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: -34.397, lng: 150.644},
                        zoom: 8
                    });
                }
            </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv4u17WqyZAZx6qZ0H6lTxLWA8Ujrnxe8&callback=initMap"async defer>
        </script>
    </body>
</html>
