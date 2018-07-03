
<?php session_start();
if(!isset($_SESSION["uid"]))
{
    header('location:login.php');
}
?>
<?php
include("dbcon.php");

$id=$_GET['id'];
$query="SELECT * FROM `roomupload` WHERE `id`='$id'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);

    if(isset($_POST["submit"])) {
        $id = $_GET["id"];
        $room = $_POST["room_no"];
        $type = $_POST["type"];
        $price = $_POST["price"];

        $status = $_POST["status"];

        $image = $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], 'roomimage/' . $_FILES["image"]["name"]);


            $query = "UPDATE `roomupload` SET `room_no`='$room',`type`='$type',`status`='$status',`image`='$image',`price`='$price' WHERE `id`='$id' ";

            $run = mysqli_query($con, $query);
            $data = mysqli_fetch_assoc($run);

            if ($run == true) {
                ?>
                <script>
                    alert('Room data have been updated');
                    window.open('room-detail.php', '_self');
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Room data cannot be updated at this moment');
                    window.open('room-edit.php', '_self');
                </script>
                <?php
            }


        }
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>Room Edit</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="reg">
    <div class="main">
        <h2 align="center">Room Edit</h2>
    </div>

    <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id;?>" />
                <table align="center">
                    <tr>
                        <th>Room no:</th>
                        <td><input type="text" name="room_no" value="<?php echo $data['room_no'];?>"/></td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td><input type="text" name="status" value="<?php echo $data['status'];?>"/></td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td><input type="text" name="price" value="<?php echo $data['price'];?>"/></td>
                    </tr>

                    <tr>
                        <th>Type:</th>
                        <td><input type="text" name="type" value="<?php echo $data['type'];?>"/></td>
                    </tr>

                    <tr>
                    <th>Upload Photo:</th>
                    <td><input type="file" name="image" value="<?php echo $data['image'];?>"/></td>
                    </tr>

                    <td colspan="2" align="center"><input  type="submit" name="submit"  value="update"/></td>
                </table>


            </form>
            </div>
</div>
<?php include ('../footer.php');?>

</body>
</html>
