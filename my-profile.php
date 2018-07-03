<?php
session_start();
include ('admin/dbcon.php');
if(!isset($_SESSION['uid']) || !isset($_SESSION['user'])){
    header('location:guest-login.php');
}
?>

<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/13/18
 * Time: 5:13 PM
 */


$id=$_SESSION['uid'];
$query="SELECT * FROM `guest_record` WHERE `id`='$id'";
$run=mysqli_query($con,$query);

while ($row=mysqli_fetch_assoc($run)) {

    $firstname = $row['firstname'];
    $lastname = $row["lastname"];
    $full_name = $firstname . ' ' . $lastname;
    $phone = $row['phone'];
    $user = $row['username'];
    $email = $row['email'];
    $address = $row['address'];
    $gender = $row['gender'];
}
?>


<?php

$qu="SELECT `username` FROM `roombooked` WHERE `username` ='$user' ";
$re=mysqli_query($con,$qu);
@$nums= mysqli_num_rows($re);
$order = $nums;
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/menu.css" type="text/css">
    <title>User Profile</title>
</head>

<body>


<?php
include ('headeruser.php');
    ?>
<div class="usr">
    <div class="head">
        <h3 align="center">Welcome <?php echo $_SESSION['user'];?></h3>
    </div>

    <div class="form">
        <table align="center" width="40%" border="2">
            <thead>
            <th colspan="2">Your Information</th>
            </thead>

            <tr>
                <th>Fullname:</th>
                <td><?php echo $full_name;?></td>
            </tr>

            <tr>
                <th>Username:</th>
                <td><?php echo $user;?></td>
            </tr>

            <tr>
                <th>email:</th>
                <td><?php echo $email;?></td>
            </tr>

            <tr>
                <th>Phone:</th>
                <td><?php echo $phone;?></td>
            </tr>

            <tr>
                <th>Gender:</th>
                <td><?php echo $gender;?></td>
            </tr>

            <tr>
                <th>Address:</th>
                <td><?php echo $address;?></td>
            </tr>

            <tr>
                <th>Booked:</th>
                <td><strong><?php echo $order;?></strong><a href="user-booking-record.php?un=<?php echo $user;?>">&nbsp;&nbsp;&nbsp;Booking</a></td>
            </tr>
        <td colspan="4" align="center">
        <a href="edit-myprofile.php?id=<?php echo $id;?>"><button>Edit Your Profile</button></a>
        <a href="password-update.php?id=<?php echo $id;?>"><button>Change Password</button></a>
        </td>
        </table>
    </div>
</div>
</body>
</html>
<?php include ('footer.php');?>