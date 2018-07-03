<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/12/18
 * Time: 9:18 AM
 */


include ('dbcon.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE  FROM `employee_record` WHERE `id`='$id'";
    $run = mysqli_query($con, $query);

    if ($run == true) {
        ?>
        <script>
            alert("Data have been deleted successfully");
            window.open('employee-record.php', 'self');
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Data cannnot be deleted");
            window.open('employee-record.php', 'self');
        </script>
        <?php
    }

}
?>