<?php

// $_host = "localhost";
// $_username = "root";
// $_password = "fre_abRu4U";
// $_dbname = "snifferApp";
//
// mysql_connect($_host, $_username, $_password) or die(mysql_error());
// mysql_select_db($_dbname) or die (mysql_error());
// mysql_set_charset('utf8');

// ************************* FOR LOCALHOST ****************************

$user = 'root';
$password = 'root';
$db = 'snifferApp';
$host = 'localhost';
$port = 8889;

$link = mysql_connect(
   "$host:$port",
   $user,
   $password
);
$db_selected = mysql_select_db(
   $db,
   $link
);

// ************************* FOR LOCALHOST ****************************

define("PASSWORD_DEFAULT", 213);

function checklogin($login){
    if (!(isset($login) && $login != '')) {
        header ("location: index.php");
    }
}

function logout() {						// logs out
    session_destroy();
    header("location: index.php");
}

function getuser($user_id){			// matches the user id with user's first and last name

	$sql = "SELECT first_name FROM user WHERE user_id = '$user_id' ";
	$query = mysql_query($sql) or die('mysql_error_1');

	while($row = mysql_fetch_array($query)){
		$firstname = $row['first_name'];
	}

	return $firstname;
}

function updateCoordinates($device_id) {
    $sql = "SELECT device_id, type, longitude, latitude, created FROM location
            WHERE device_id = '$device_id' AND created = (SELECT MAX(created))";
    $query = mysql_query($sql);

    while ($row = mysql_fetch_array($query)) {
            $type = $row['type'];
            $longitude = $row['longitude'];
            $latitude = $row['latitude'];
            $timestamp = $row['created'];
    }

    $array = array($type, $longitude, $latitude, $timestamp);
    return $array;

}

	// function getusername ($id) {			// matches the user id with username
    //
	// 	$sql = "SELECT username FROM user WHERE user_id=$id";
	// 	$query = mysql_query($sql) or die('mysql_error_2');
    //
	// 	while ($row = mysql_fetch_array($query)) {
	// 		$username = $row['username'];
	// 	}
	// 		return $username;
	// }

	// function getusertype ($id) {			// determines what kind of user is logged in to display the correct menu
    //
	// 	$sql = "SELECT user_type FROM user WHERE user_id=$id";
	// 	$query = mysql_query($sql) or die('mysql_error_2');
    //
	// 	while ($row = mysql_fetch_array($query)) {
	// 		$user_type = $row['user_type'];
	// 	}
	// 		return $user_type;
	// }



	// function humanDate ($date){				// matches the month number with month name
	//     $months = array ('','January','February','March','April','May','June','July','August','September','October','November','December');
	//     $date = explode("-", $date);
	//     $month = $date[1];
	//     $month = intval($month);
	// 	$date = $date[2] . " " . $months[$month] . " " .  $date[0];
    //
    //     return $date;
	// }
?>
