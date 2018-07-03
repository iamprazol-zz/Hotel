<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/14/18
 * Time: 6:58 PM
 */


if(isset($_GET["id"])) {
    include("dbcon.php");

    $id= $_GET["id"];
    $sql = "DELETE FROM `home` WHERE `id`='$id'";

    $run=mysqli_query($con,$sql);
    if($run==true){
        ?>
        <script>
            alert('Data Deleted Successfully');
            window.open('home-admin.php','self');
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Data cannot be deleted');
            window.open('home-admin.php','self');
        </script>
        <?php
    }
}
?>
