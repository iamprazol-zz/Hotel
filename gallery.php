<!DOCTYPE html >
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/style.css" rel="stylesheet" />
    <title>Accomodation</title>
</head>

<body>
<?php include("header.php"); ?>

<div class="title">
<h2>Our Gallery</h2>
</div>
<hr>
    <?php
    include("admin/dbcon.php");


    $query = "SELECT * FROM `roomupload`";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){

            ?>


            <div class="dis">

                <div class="form">


                    <table width="70%" >
                        <tr>
                            <td colspan="3" rowspan="3"><img align="center" src="admin/roomimage/<?php echo $row['image'];?>" height="250px" width="400px"/></td>
                        </tr>



                        <tr>
                            <th>Type:</th>
                            <td><?php echo $row['type'];?></td>
                        </tr>

                        <tr>
                            <th>Status:</th>
                            <td><?php echo $row['status'];?></td>
                        </tr>
                    </table>
                </div>

            </div>
            <hr>
        <?php }}?>
<?php include("footer.php"); ?>
</body>
</html>