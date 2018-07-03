<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/12/18
 * Time: 7:36 PM
 */

include ('dbcon.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM `roomupload` WHERE `id`='$id'";
    $run=mysqli_query($con,$query);
    if($run==true){
        ?>
        <script>
            alert('Room details have been deleted');
            window.open('room-detail.php','self');
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Room details cannot be deleted at this moment');
            window.open('room-detail.php','self');
        </script>
        <?php
    }
}



?>