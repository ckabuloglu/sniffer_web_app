<?php

include("function.php");

if (isset($_SESSION['login'])){		//logged in
    header("location:track.php");
}

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    $sql = "SELECT password, user_id, email FROM user WHERE email = '$email' ";
    $query = mysql_query($sql);

    while($row = mysql_fetch_array($query)){
        $truepass = $row['password'];
        $user_id = $row['user_id'];
    }

    if (password_verify($password, $truepass)) {
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['user_id'] = $user_id;
        header("location:track.php");
        $msg = " <br/> <br/> <span style = 'color: green'> Password verified! </span> ";
    } else {
        session_start();
        $_SESSION['login'] = '';
        $msg = " <br/> <br/> <span style = 'color: #DE2626'> Wrong username or password </span> ";
    }
}

?>

<html>

<head>
    <title> Sniffer Login Page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/function.js"></script>

    <meta name="google-signin-client_id" content="1037406156096-oi3jatsra91j118c7dhvm184ln365u3d.apps.googleusercontent.com">

</head>

<body>
    <div class="container" id="login_box">
        <img class="img-responsive" id="logo" src="images/logoSniff.png" alt="Sniffer">
        <h3 id="tagline"> Making the world a safer place for man's best friend. </h3>
        <form role="form" method="POST">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <div id="forgotLink">
                <a href="forgot.html" style="color: black; align: right"> forgot password? </a>
            </div>
            </br>
            <button type="submit" class="btn btn-success btn-block" name="login"> Login </button>
        </form>
        <form action="create.php">
             <button type="submit" class="btn btn-primary btn-block" name="login"> Signup </button>
         </form>
         <!-- <div class="g-signin2" id="google_login" data-onsuccess="onSignIn"></div> -->
         <?php echo $msg; ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>
