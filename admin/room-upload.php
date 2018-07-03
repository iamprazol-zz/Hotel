
<?php session_start();
if(!isset($_SESSION["uid"]))
{
    header('location:login.php');
}
?>


<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/12/18
 * Time: 6:34 PM
 */

include ('dbcon.php');

if(isset($_POST['submit'])){
    $room=$_POST['roomno'];
    $type=$_POST['type'];
    $status=$_POST['status'];
    $price=$_POST['price'];
    $image=$_FILES['img']['name'];
    $tmpname=$_FILES['img']['temp_name'];
    $target="roomimage/".basename($image);

    move_uploaded_file($tmpname,$target);

    $query="INSERT INTO `roomupload` (id, room_no, type, status, price, image) VALUES (NULL , '".mysqli_real_escape_string($con,$room)."' , '".mysqli_real_escape_string($con,$type)."' , '".mysqli_real_escape_string($con,$status)."' , '".mysqli_real_escape_string($con,$price)."' , '$image')";
    $run=mysqli_query($con,$query);
    if($run==true){
        ?>
        <script>
            alert('Room data has been uploaded successfully');
            window.open('room-detail.php','_self');
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Room data cannot be uploaded at this moment');
            window.open('room-upload.php','_self');
        </script>
        <?php
    }
}


?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>Room upload</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="reg">

<div class="main">
    <h2 align="center">Room Upload</h2>
</div>
    <div class="form">

        <table align="center" style="width:50%">
            <form  action="" method="post" enctype="multipart/form-data">
                <tr>
                    <th align="center">Room no:</th>
                    <td align="center"><input type="text" name="roomno" placeholder="Enter Room no" required></td>
                </tr>

                <tr>
                    <th align="cener">Type:</th>
                    <td align="center"><input type="text" name="type" placeholder="Enter type of room" required></td>
                </tr>

                <tr>
                    <th align="center">Status:</th>
                    <td align="center"><input type="text" name="status" placeholder="Enter status of room" required></td>
                </tr>

                <tr>
                    <th align="center">Room Price:</th>
                    <td align="center"><input type="text" name="price" placeholder="Enter price of the room" required></td>
                </tr>

                <tr>
                    <th align="center">Upload Photo:</th>
                    <td align="center"><input type="file" name="img" required></td>
                </tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="upload"></td>
            </form>
        </table>
    </div>
    </div>
</body>
<?php include ('../footer.php');?>

</html>
