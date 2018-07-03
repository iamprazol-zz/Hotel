<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
}
?>



<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/13/18
 * Time: 12:03 PM
 */

include ('dbcon.php');
include ('dash.php');
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>Room Reserved</title>
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="manage">
    <div class="box">
    <h2>Booked Rooms</h2>
    <table style="width: 100%" border="2" >
        <tr>
            <th>Id</th>
            <th>Fullname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Room Type</th>
            <th>Room No</th>
            <th>Booking Date</th>
            <th>End After Days</th>
        </tr>
    <?php
        $query="SELECT * FROM  `roombooked`";
        $run=mysqli_query($con,$query);
        while($data=mysqli_fetch_assoc($run)){
            ?>
            <tr>
                <td><?php echo $data['id'];?></td>
                <td><?php echo $data['full_name'];?></td>
                <td><?php echo $data['username'];?></td>
                <td><?php echo $data['email'];?></td>
                <td><?php echo $data['phone'];?></td>
                <td><?php echo $data['address'];?></td>
                <td><?php echo $data['type'];?></td>
                <td><?php echo $data['room_no'];?></td>
                <td><?php echo $data['booking_date'];?></td>
                <td><?php echo $data['end'];?></td>
            </tr>
        <?php
        }
    ?>
    </table>
    </div>
</div>
<?php include ('../footer.php');?>

</body>
</html>

