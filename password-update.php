<?php
session_start();
include ('admin/dbcon.php');
if(!isset($_SESSION['uid']) || !isset($_SESSION['user'])){
    header('location:guest-login.php');
}
?>


<?php

include("headeruser.php");

if(isset($_POST['submit'])) {

    $id = $_SESSION['uid'];
    $ids = $_GET['id'];


    $password = ($_POST['password']);
    $newpassword = ($_POST['newpassword']);
    $confirmnewpassword = ($_POST['confirmnewpassword']);
    $password_hash=md5($password);
    $new_hash=md5($newpassword);



        $result = mysqli_query($con, "SELECT * FROM `guest_record` WHERE `id`='$ids'");
        $data=mysqli_fetch_assoc($result);
        $p=$data['password'];
        if ($password_hash==$p) {
            if ($newpassword == $confirmnewpassword) {

                $sql = mysqli_query($con, "UPDATE `guest_record` SET `password`='$new_hash' WHERE `id` ='$ids'");
                if ($sql == true) {
                    ?>
                    <script>
                        alert('Password Changed Successfully');
                        window.open('guest-login.php', '_self');
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert('Password Cannot Be Changed At This Moment');
                        window.open('password-update.php', '_self');
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert('New password and confirm password must be the same!');
                    window.open('password-update.php', '_self');
                </script>
                <?php
            }

        } else {

            ?>
            <script>
                alert('Entered an incorrect password');
                window.open('password-update.php', '_self');
            </script>
            <?php
        }

}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/menu.css" type="text/css">
    <title>Password Update</title>
</head>

<body>
<div class="usr">
    <div class="head">
        <h3 align="center">Change Password:</h3>
    </div>

    <div class="form">
        <table align="center" width="50%">
            <form name="newprwd" action="" method="post">
                <tr>
                    <th>Password :</th>
                    <td><input type="password" name="password" placeholder="Enter old password" required></td>
                </tr>

                <tr>
                    <th>New Password :</th>
                    <td><input type="password" name="newpassword" placeholder="Enter new password" required></td>
                </tr>

                <tr>
                    <th>Confirm Password :</th>
                    <td><input type="password" name="confirmnewpassword" placeholder="Confirm new password" required></td>
                </tr>

                <td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td>
            </form>
        </table>
    </div>
</div>
<?php include ('footer.php');?>
</body>
</html>