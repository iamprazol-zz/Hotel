

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css"  />

    <title>Untitled Document</title>
</head>

<body>

<?php include('header.php');?>
    <div id="about">
        <h1>About us</h1>

       <?php
       include 'admin/dbcon.php';
        $query="SELECT  `content` FROM `about` WHERE `id`='1'";
        $run=mysqli_query($con,$query);
        $data=mysqli_fetch_assoc($run);
        if($run==true){
            echo '<p>'.$data['content'].'</p>';
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
 * Time: 9:47 PM
 */
include('footer.php');
?>