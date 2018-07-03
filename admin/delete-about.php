<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/14/18
 * Time: 7:45 PM
 */


if(isset($_GET["id"])) {
    include("dbcon.php");

    $id= $_GET["id"];
    $sql = "DELETE FROM `about` WHERE `id`='$id'";

    $run=mysqli_query($con,$sql);
    if($run==true){
        ?>
        <script>
            alert('Data Deleted Successfully');
            window.open('about-admin.php','self');
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Data cannot be deleted');
            window.open('about-admin.php','self');
        </script>
        <?php
    }
}
?>

