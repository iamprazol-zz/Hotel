<?php

session_start();
if(!isset($_SESSION['uid'])) {
    header('location:login.php');
}
?>

<?php


include("dbcon.php");
include ("dash.php");


?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>About Page Management</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="manage">
    <div class="box">
<h2>About page management</h2>
<table width="95%"  border="1">
    <tr>
        <th>Id</th>
        <th>content</th>

        <th>Action</th>

    </tr>

    <?php
    $sql = "SELECT * FROM `about`";


    $result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["content"];?></td>

            <td>
                <a href="edit-about.php?id=<?php echo $row["id"];?>"><button>Edit</button></a>
                <a href="delete-about.php?id=<?php echo $row["id"];?>"><button>Delete</button></a>
            </td>
        </tr>

    <?php }?>


</table>
    </div>
</div>
</body>

<?php include("../footer.php"); ?>
