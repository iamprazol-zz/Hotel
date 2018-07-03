<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/13/18
 * Time: 1:15 PM
 */
session_start();
include('admin/dbcon.php');
if(!isset($_SESSION['uid']) || !isset($_SESSION['user'])){
    header('location:guest-login.php');
}
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>Room Booking</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<?php include('headeruser.php'); ?>

<?php

$username=$_SESSION['user'];
$id = $_GET['id'];


$query = "SELECT * FROM `roomupload` WHERE `id`='$id'";
$run = mysqli_query($con, $query);

    while ($data = mysqli_fetch_assoc($run)) {

        $type = $data['type'];
        $room = $data['room_no'];
        $status = $data['status'];
        $price = $data['price'];
        $image = $data['image'];
    }

$ids=$_SESSION['uid'];
$s="SELECT * FROM `guest_record` WHERE `id`='$ids'";
$r=mysqli_query($con,$s);


while($row = mysqli_fetch_assoc($r))
{
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];

    $email = $row['email'];

    $user = $row['username'];
    $phone=$row['phone'];
    $address=$row['address'];

}
?>


<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $type = $_POST['type'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $fullname = $fname . $lname;
    $email = $_POST['email'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $room = $_POST['roomno'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $date = $year . '-' . $month . '-' . $day;
    $end = $_POST['end'];
    $status = $_POST['status'];
    $phone = $_POST['phone'];

    $errors = array();


    if (strlen($_POST["phone"]) != 10) {
        $errors["phone1"] = "<span style='color:red'>your phone must be at least 10 integer long";
    } else if (!preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $phone)) {
        $errors["phone2"] = "<span style='color:red'>phone number contains only integer";

    } else {
        $phone = test_input($phone);
    }


    if (!preg_match("/^['available'-]+$/", $status)) {
        $errors["status"] = "<span style='color:red'>this room is currently unavailable";

    } else {
        $status = test_input($_POST["status"]);

    }

    if (count($errors) == 0) {
        $query = "INSERT INTO `roombooked` (username, type, full_name, email, phone, address, price, room_no, booking_date, end, status, date) VALUES ('$username' , '$type' , '$fullname' , '$email' , '$phone' , '$address' , '$price' , '$room' , '$date' ,'$end' , '$status', CURRENT_TIMESTAMP )";
        $run = mysqli_query($con, $query);
        if ($run == true) {
            $query = "UPDATE `roomupload` SET `status`='unavailable' where `room_no`='$room' ";
            $run = mysqli_query($con, $query);
            ?>
            <script>
                alert('Room have been booked');
                window.open('room-display.php', '_self');
            </script>
            <?php
        } else {
            echo 'Booking unsuccessfull';
        }
    }

}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>




<div class="usr">
    <div class="head">
        <h2 align="center">Room Book</h2>
    </div>
    <div class="form">
        <table align="center" width="50%">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

                <tr>
                    <td colspan="2" ><img src="<?php echo "admin/roomimage/$image";?>" height="250px" width="450px"/></td>
                </tr>

                <tr>
                    <th align="left">Room No:</th>
                    <td align="left"><input type="text" name="roomno" value="<?php echo $room; ?>" readonly/></td>
                </tr>

                <tr>
                    <th align="left">Type:</th>
                    <td align="left"><input type="text" name="type" value="<?php echo $type; ?>" readonly/></td>
                </tr>

                <tr>
                    <th align="left">Status:</th>
                    <td align="left"><input type="text" name="status" value="<?php echo $status; ?>" readonly>
                        <p><?php if (isset($errors['status'])) {
                                echo $errors['status'];
                            } ?></p></td>
                </tr>

                <tr>
                    <th align="left">Price:</th>
                    <td><input type="text" name="price" value="<?php echo $price; ?>" readonly/></td>
                </tr>

                <tr>
                    <th align="left">Username:</th>
                    <td align="left"><input type="text" name="username" placeholder="username" value="<?php echo $username; ?>" required/></td>
                </tr>

                <tr>
                    <th align="left">Firstname:</th>
                    <td align="left"><input type="text" name="fname" placeholder="firstname" value="<?php echo $firstname; ?>" required/>
                    </td>
                </tr>

                <tr>
                    <th align="left">Lastname:</th>
                    <td align="left"><input type="text" name="lname" placeholder="lastname" value="<?php echo $lastname; ?>" required/>
                    </td>
                </tr>

                <tr>
                    <th align="left">Email:</th>
                    <td align="left"><input type="text" name="email" placeholder="email" value="<?php echo $email; ?>" required/></td>
                </tr>

                <tr>
                    <th align="left">Phone:</th>
                    <td align="left"><input type="text" name="phone" placeholder="phone" value="<?php echo $phone; ?>" required/>
                        <p><?php if (isset($errors['phone1'])) {echo $errors['phone1'];} ?></p>
                        <p><?php if (isset($errors['phone2'])) {echo $errors['phone2'];} ?></p>
                    </td>
                </tr>

                <tr>
                    <th align="left">Address:</th>
                    <td align="left"><input type="text" name="address" placeholder="address" value="<?php echo $address; ?>" required/>
                    </td>
                </tr>

                <tr>
                    <th  align="left">Booking Date:</th>
                    <td colspan="3" align="left">Year: <input type="number" name="year" placeholder="year" min="2018" max="2030"/>&nbsp;
                        Month: <input type="number" name="month" placeholder="month" min="1" max="12"/>&nbsp;
                        Day: <input type="number" name="day" placeholder="month" min="1" max="30"/>&nbsp;
                    </td>
                </tr>

                <tr>
                    <th align="left">For How Many Days:</th>
                    <td align="left"><input type="number" name="end" placeholder="end" min="1" max="10"/> Day</td>
                </tr>

                <td colspan="2" align="center"><input type="submit" name="submit"  value="Book"></td>


            </form>
        </table>
    </div>
</div>
<?php include ('footer.php');?>
</body>
</html>


