<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/14/18
 * Time: 4:24 PM
 */

include ('admin/dbcon.php');

$id=$_GET['id'];
$query="SELECT * FROM `roombooked` WHERE `id`='$id'";
$run=mysqli_query($con,$query);
if($run==true){
    while ($data=mysqli_fetch_assoc($run)){
        $room=$data['room_no'];
        $query="DELETE FROM `roombooked` WHERE `room_no`='$room'";
        $run=mysqli_query($con,$query);
        if($run==true){
            $query="UPDATE `roomupload` SET `status`='available' WHERE `room_no`='$room'";
            $run=mysqli_query($con,$query);
            if($run==true){
                ?>
                <script>
                    alert('Booking Cancelled');
                    window.open('user-booking-record.php','_self');
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert(('Booking Cannot Be Cancelled At This Moment');
                    window.open('cancel-booking','_self');
                </script>
                <?php
            }
        }
    }
}
?>