<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/14/18
 * Time: 5:30 PM
 */

session_start();
include ('admin/dbcon.php');
if(!isset($_SESSION['uid']) || !isset($_SESSION['user'])) {
    header('location:guest-login.php');
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>Four Season Resort</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body>


<?php
include('headeruser.php');
include ('admin/dbcon.php');
$query="SELECT * FROM `logo` WHERE `id`='1'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);
?>


<div class="main-content">

    <div class="left-content">
        <?php echo '<img src="images/'.$data['image'].'" height="400px" width="100%"/>';?>
    </div>

    <div class="right-content">
        <?php
        $query="SELECT `title` , `title1` , `content` FROM `home` WHERE `id`='1'";
        $run=mysqli_query($con,$query);
        $data=mysqli_fetch_assoc($run);
        if($run==true){
            echo '<h2>'.$data['title'].'</h2>';
            echo '<h3>'.$data['title1'].'</h3>';
            echo '<p>'.$data['content'].'</p>';
        }
        ?>
    </div>
</div>



<?php
include('footer.php');
?>


</body>
</html>
