<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/10/18
 * Time: 7:34 PM
 */

include ('admin/dbcon.php');
$query="SELECT * FROM `logo` WHERE `id`='2'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);

?>




<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/menu.css" type="text/css">

</head>

<body>
    <div class="header">
        <?php echo'<img src="images/'.$data['image'].'"  height="128px" width="200px"/>';?>
        <h2>WELCOME TO FOUR SEASON RESORT</h2>
        <h4>A PLACE WHERE PLEASURE NEVER FADES</h4>
    </div>

    <div class="low-header">
        <div class="menu">
            <ul>
                <li><a href="index-guest.php">Home</a> </li>
                <li><a href="aboutus-guest.php">About us</a></li>
                <li><a href="contactus-guest.php">Contact us</a></li>
                <li><a href="room-display.php">Accomodation</a></li>
                <li><a href="my-profile.php">My Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

</body>
</html>
