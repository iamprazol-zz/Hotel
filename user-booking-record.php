<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/14/18
 * Time: 3:47 PM
 */


session_start();
include ('admin/dbcon.php');
if(!isset($_SESSION['uid']) || !isset($_SESSION['user'])){
    header('location:guest-login.php');
}
?>



<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/menu.css" type="text/css">
    <title>User Booking Record</title>
</head>

<body>
<?php include ('headeruser.php');?>
<div class="usr">
    <div class="head">
        <h3 align="center">My Booking Record:</h3>
    </div>
    <div class="form">
        <table align="center" width="100%" style="width: 50%; height: 100%;" border="2">

                <tr>
                    <th>Room No:</th>
                    <th>Type:</th>
                    <th>Price</th>
                    <th>Booking Date:</th>
                    <th>For How Many Days:</th>
                    <th>Action:</th>
                </tr>


                    <?php


                 $user=$_SESSION['user'];
                 $query="SELECT * FROM `roombooked` WHERE `username`='$user'";
                 $run=mysqli_query($con,$query);
                 while($data=mysqli_fetch_assoc($run)){

                 ?>

                 <tr>
                     <td align="center"><?php echo $data['room_no'];?></td>
                     <td align="center"><?php echo $data['type'];?></td>
                     <td align="center"><?php echo $data['price'];?></td>
                     <td align="center"><?php echo $data['booking_date'];?></td>
                     <td align="center"><?php echo $data['end'];?></td>
                     <td align="center"><a href="cancel-booking.php?id=<?php echo $data['id'];?>"><button>Cancel</button></a></td>
                 </tr>

                <?php } ?>

        </table>
    </div>
</div>
<?php include ('footer.php');?>
</body>
</html>