<?php

include('function.php');
// $user_id = $_SESSION['user_id'];

if (isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO email_list (name, email) VALUES ('$name','$email')";
    $query = mysql_query($sql) or die (mysql_error());

    $msg = "</br> <span style= 'color: green;'> Signed up successfully! </span>";
}

?>

<html>

<head>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Sniffer Homepage 1">
    <meta name="author" content="Can Kabuloglu">
    <link rel="icon" href="../../favicon.ico">

    <title> Mail Signup </title>
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
        <h2> Sign up for our mailing list! </h2>
        <form role="form" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Full name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <input type="submit" class="btn btn-primary btn-block" name="signup" value="Sign-up Now">
        </form>

        <?php echo $msg; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
