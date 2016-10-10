<?php

include("function.php");

$sql = "SELECT device_id, type, longitude, latitude, created FROM location
        WHERE device_id = '11111' AND current = (SELECT MAX(current)";
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
    <title> Test GPS Device </title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
    html, body {
        height: 100%;
        margin: 10px;
        padding: 0;
    }
    #map {
        height: 50%;
        width: 50%;
        border: solid black 2px;
    }
    </style>
</head>

<body>
        <h2> Submit data: </h2>
        <form method="POST" id="infoForm">
            <input type="text" name="device_id" id="" value="" placeholder="Device ID" /> </br>
            <input type="text" name="longitude" id="longitude" value="" placeholder="Longitude" /> </br>
            <input type="text" name="latitude" id="latitude" value="" placeholder="Latitude" /> </br>
            <button type="submit" name='submit'> Submit </button>
        </form>

        <h2> Latest position of the testing device </h2>
        <table>
            <tr> <td>Device ID: </td> <td> <?php echo $device_id ?> </td> </tr>
            <tr> <td>Latest Connection: </td> <td> <?php echo $created ?> </td> </tr>
            <tr> <td>Wifi Connection: </td> <td> <?php echo $type ?> </td> </tr>
            <tr> <td>Longitude: </td> <td id="lon"> <?php echo $longitude ?> </td> </tr>
            <tr> <td>Latitude: </td> <td id="lat"> <?php echo $latitude ?> </td> </tr>
        </table>
    </br>

    <h2> See it on the map! </h2>

    <div id="map">
    </div>

    <script>
        var map;
        var longitude = <?php echo $longitude ?>;
        var latitude = <?php echo $latitude ?>;

        var myCoords = {lat: latitude, lng: longitude}

        console.log(longitude);
        console.log(latitude);

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: myCoords,
                zoom: 8
          });

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv4u17WqyZAZx6qZ0H6lTxLWA8Ujrnxe8&callback=initMap"async defer>
    </script>
</body>

</html>
