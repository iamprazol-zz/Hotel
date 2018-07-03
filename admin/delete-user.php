<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/11/18
 * Time: 8:39 PM
 */

include('dbcon.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $query="DELETE FROM `guest_record` WHERE `id`='$id'";
    $run=mysqli_query($con,$query);
    if($run==true){
        ?>
        <script>
            alert('Data deleted successfully');
            window.open('display-user.php','self');
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Data cannot be deleted');
            window.open('display-user.php','self')
        </script>
        <?php
    }
}
?>