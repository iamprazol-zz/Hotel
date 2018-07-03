<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/14/18
 * Time: 5:29 PM
 */

session_start();
include ('admin/dbcon.php');
if(!isset($_SESSION['uid']) || !isset($_SESSION['user'])) {
    header('location:guest-login.php');
}
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css"  />

    <title>About Us</title>
</head>

<body>

<?php include('headeruser.php');?>
<div id="about">
    <h1>About Us</h1>
    <?php
    include 'admin/dbcon.php';
    $query="SELECT  `content` FROM `about` WHERE `id`='1'";
    $run=mysqli_query($con,$query);
    $data=mysqli_fetch_assoc($run);
    if($run==true){
        echo '<p>'.$data['content'].'</p>';
    }
    ?>
</div>
</body>
</html>

<?php
include('footer.php');
?>
