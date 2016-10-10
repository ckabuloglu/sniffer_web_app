<?php

include("function.php");

$type = 0;

$postdata = file_get_contents("php://input");
echo $postdata  . "</br>";

$data = explode(":", $postdata);

$device_id = $data[0];
$latitude = $data[1];
$longitude = $data[2];


$sql = "INSERT INTO location (device_id, type, longitude, latitude)
        VALUES ($device_id, $type, $longitude, $latitude)";

mysql_query ($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title> Test GPS Device </title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
</head>

<body>
    <h2> OK </h2>
</body>

</html>
