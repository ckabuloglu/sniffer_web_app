<?php

include("function.php");

session_start();
checklogin($_SESSION['login']);
logout();

?>
