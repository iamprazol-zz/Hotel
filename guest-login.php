<?php
session_start();
if(isset($_SESSION['uid']) || isset($_SESSION['user']))
{
    header('location:room-display.php');
}


include ('admin/dbcon.php');

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash=md5($password);
    $query = "SELECT *  FROM `guest_record` WHERE `username`='$username' AND `password`='$password_hash'";
    $run = mysqli_query($con, $query);
    if (mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_assoc($run);
        $id = $data['id'];
        $username = $data['username'];
        $_SESSION['uid']=$id;
        $_SESSION['user']=$username;
        header('location:room-display.php');
        exit;

    } else {
        ?>
        <script>
            alert('Username And Password Doesn\'t Match');
            window.open('guest-login.php', '_self');
        </script>
        <?php

    }
}

?>



<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta http-equiv="content-type" content="text/html"charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="css/guest.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <title>Guest-Login</title>
    </head>


<body>


<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/9/18
 * Time: 8:17 AM
 */


include('header.php');
include ('admin/dbcon.php');
$query="SELECT * FROM `logo` WHERE `id`='3'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);

?>

<div class="guest">
    <?php echo '<img class="avatar" src="images/'.$data['image'].'" height="80px" width="80px" />';?>
        <h1>Guest-Login</h1>
    <form action="guest-login.php" method="post">

        <p>Username:</p>
        <input type="text" name="username" placeholder="Enter your username" required>
        <p>Password:</p>
        <input type="password" name="password" placeholder="Enter your password" required>
        <input type="submit" name="submit" value="Login"><br>
    </form>
        <a href="forget-user-pass.php"><h3>Forgot your password??</h3></a>
        <h4>Dont have account?</h4>
        <a href="user-reg.php"><h3>Register Now</h3></a>
        </div>







<?php


include('footer.php');

?>


</body>


</html>