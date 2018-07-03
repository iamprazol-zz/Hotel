<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/14/18
 * Time: 9:20 PM
 */

include ('admin/dbcon.php');


if(isset($_POST['submit'])) {
    $email = $_POST['mail'];
    $npassword = $_POST['npassword'];
    $cpassword = $_POST['cpassword'];
    $password_hash = md5($npassword);


    $query = "SELECT * FROM `guest_record` WHERE `email`='".mysqli_real_escape_string($con,$email)."'";
    $run = mysqli_query($con, $query);
    $row=mysqli_num_rows($run);

    if ($row==1) {

        if ($npassword == $cpassword) {


            $query = "UPDATE `guest_record` SET `password`='$password_hash' WHERE `email`='" . mysqli_real_escape_string($con, $email) . "'";
            $run = mysqli_query($con, $query);
            if ($run == true) {
                ?>
                <script>
                    alert('Password changed successfully');
                    window.open('guest-login.php','_self');
                </script>
                <?php


            } else {
                ?>
                <script>
                    alert('Password cannot be changed!!!');
                    window.open('user-password-change.php', '_self');
                </script>
                <?php

            }
        }else {
            ?>
            <script>
                alert('Password Didn\'t Match');
                window.open('user-password-change.php', '_self');
            </script>
            <?php
        }

    } else {
        ?>
        <script>
            alert('The email entered doesn\'t exist!!!');
            window.open('user-password-change.php', '_self');
        </script>
        <?php
    }

}



?>



<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html"charset="UTF-8"/>

    <title>User Password Change</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css"/>
</head>


<body>
<?php include ('header.php');?>
<div class="usr">
    <div class="head">
        <h2 align="center">Password Change</h2>
    </div>

    <div class="form">
        <form   action="" method="post">
            <table align="center" style="width: 50%;">
                <tr>
                    <th>Email :</th>
                    <td><input type="text" name="mail" placeholder="Enter your email" required></td>
                </tr>

                <tr>
                    <th>New Password :</th>
                    <td><input type="password" name="npassword" placeholder="Enter new password" required></td>
                </tr>

                <tr>
                    <th>Confirm Password :</th>
                    <td><input type="password" name="cpassword" placeholder="Confirm your password" required></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
                </tr>
            </table>
        </form>
    </div>
</div>