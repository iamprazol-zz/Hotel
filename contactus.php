
<?php include('header.php');?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css"  />
    <title>Contact us</title>
</head>

<body>
 <div id="contact">
   <h1>Contact us</h1>
    <?php
        include 'admin/dbcon.php';
        $query="SELECT  `content` FROM `contact` WHERE `id`='1'";
        $run=mysqli_query($con,$query);
        $data=mysqli_fetch_assoc($run);
        if($run==true){
            echo $data['content'];
        }
        ?>
    </div>
</body>
</html>




<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/8/18
 * Time: 10:04 PM
 */
include('footer.php');

?>