<?php

include('function.php');
// $user_id = $_SESSION['user_id'];



if (isset($_POST['create'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $result = mysql_query("SELECT user_id FROM user WHERE email = '$email'");

    if (mysql_num_rows($result) > 0) {
        $msg = "</br> <span style= 'color: red;'> That email address already exists! </span>";
    } elseif (!($password == $password2)){
        $msg = "</br> <span style= 'color: red;'> Passwords do not match! </span>";
    } elseif (strlen($password) < 5) {
        $msg = "</br> <span style= 'color: red;'> Password too short, must be 6 or more characters! </span>";
    } else {
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (email, password) VALUES ('$email', '$hashed_pass')";
        $query = mysql_query($sql) or die (mysql_error());

        $msg = "</br> <span style= 'color: green;'> Account created! Please verify your email address by logging in to your email account. </span>";
    }
}

?>

<html>

<head>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Sniffer Homepage 1">
    <meta name="author" content="Can Kabuloglu">
    <link rel="icon" href="../../favicon.ico">

    <title> Sniffer Login Page </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Our own CSS stylesheet -->
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/function.js"></script>

</head>

<body>
    <div class="container" id="login_box">
        <img class="img-responsive" id="logo" src="images/logoSniff.png" alt="Sniffer">
        </br>
        </br>
        <h2> Create an account now! </h2>
        <form role="form" method="POST">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password2" placeholder="re-enter password">
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="create" value="Create now">
        </form>
        <form action="index.php">
            <input type="submit" class="btn btn-link btn-block" name="back" value="Go Back">
        </form>

        <?php echo $msg; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
