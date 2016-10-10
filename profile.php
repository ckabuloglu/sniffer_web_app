<?php

include("function.php");

session_start();
checklogin($_SESSION['login']);
$user_id = $_SESSION['user_id'];

$sql = "SELECT  first_name, middle_name, last_name, phone, address1,
                address2, city, zip, state, country, picture, date_of_birth,
                lost_message FROM user WHERE user_id = '$user_id'";

$query = mysql_query($sql);

while ($row = mysql_fetch_array($query)) {

        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $phone = $row['phone'];
        $address1 = $row['address1'];
        $address2 = $row['address2'];
        $city = $row['city'];
        $zip = $row['zip'];
        $state = $row['state'];
        $country = $row['country'];
        $picture = $row['picture'];
        $date_of_birth = $row['date_of_birth'];
        $lost_message = $row['lost_message'];
}

if(isset($_POST['update_user'])) {

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $picture = $_POST['picture'];
    $date_of_birth = $_POST['date_of_birth'];
    $when_lost= $_POST['when_lost'];

    $sql = "UPDATE user
            SET first_name = '$first_name',
                middle_name = '$middle_name',
                last_name = '$last_name',
                phone = '$phone',
                address1 = '$address1',
                address2 = '$address2',
                city = '$city',
                zip = '$zip',
                state = '$state',
                country = '$country',
                picture = '$picture',
                date_of_birth = '$date_of_birth',
                lost_message = '$when_lost'
            WHERE user_id = '$user_id'";

            $query = mysql_query($sql) or die (mysql_error());
            $msg = "<div class='alert alert-success'>
                                <strong>SUCCESS!</strong> You have updated your profile!
                            </div>";

}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <li><a href="track.php"> Track </a></li>
            <li class="active"><a href="profile.php"> Profile </a></li>
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
            <li id="li_profile" class="active"><a class="sidebar_item" id="menu_profile" href="#profile"><i class="fa fa-user fa-2x"></i> &nbsp Profile </a></li>
            <li id="li_dogs"><a class="sidebar_item" id="menu_dogs" href="#dogs"><i class="fa fa-paw fa-2x"></i> &nbsp Dogs </a></li>
            <li id="li_devices"><a class="sidebar_item" id="menu_devices" href="#devices"><i class="fa fa-hdd-o fa-2x"></i> &nbsp Devices </a></li>
            <li id="li_logout"><a class="sidebar_item" id="menu_logout" href="logout.php"><i class="fa fa-power-off fa-2x"></i> &nbsp &nbsp Logout </a></li>
          </ul>
        </div>

        <!--  ********* SIDEBAR ********** -->

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="div_container">

            <?php echo $msg; ?>

        <div class="alert" id="profile" >
            <table id="user_form_table">
                <form role="form" method="POST">
                    <h2> Profile </h2>
                    <tr> <td class="col-xs-3 col-sm-4 col-md-5"> </td>
                    <td class="col-xs-9 col-sm-8 col-md-7"></td> </tr>

                    <tr> <td> <label for="first_name">First Name: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="<?php echo $first_name ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="middle_name">Middle Name: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle name" value="<?php echo $middle_name ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="last_name">Last Name: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name" value="<?php echo $last_name ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="phone">Phone: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="123 456 7890" value="<?php echo $phone ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="address1">Address Line 1: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="address1" name="address1" placeholder="Number, Street, Road ... " value="<?php echo $address1 ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="address2">Address Line 2: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Building, Floor, Apartement ..." value="<?php echo $address2 ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="city">City: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $city ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="state">State: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php echo $state ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="zip">Zip: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip number" value="<?php echo $zip ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="country">Country: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $country ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="picture">Picture: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Browse a picture" value="<?php echo $picture ?>">
                    </div></label> </td>
                    <td> &nbsp </td></tr>

                    <tr> <td> <label for="date_of_birth">Date of Birth: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Please choose a date" value="<?php echo $date_of_birth ?>">
                    </div></label> </td> </tr>

                    <tr> <td> <label for="when_lost">Lost Message: </td>
                    <td><div class="form-group">
                        <input type="text" class="form-control" id="when_lost" name="when_lost" placeholder="Enter a message to display when your dog is lost" value="<?php echo $when_lost ?>">
                    </div></label> </td> </tr></br>

                    <tr><td colspan="2"><button type="submit" class="btn btn-success btn-block" name="update_user"> Update </button></td></tr>
                </form>
                <? echo $msg ?>
            </table>
        </div>

        <div id="dogs" style="display:none;">
        </div>

        <div id="devices" style="display:none;">
        </div>

    </div>
</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCv4u17WqyZAZx6qZ0H6lTxLWA8Ujrnxe8&callback=initMap"async defer></script>

    <script src="js/bootstrap-slider.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
