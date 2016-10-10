<?php

include("function.php");

$in = 0;
$sql = "INSERT INTO zone (is_out) VALUES ($in)";

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
    <h2> Your dog is back! </h2>
</body>

</html>
