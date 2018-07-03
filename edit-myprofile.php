<?php
session_start();
include ('admin/dbcon.php');
if(!isset($_SESSION['uid']) || !isset($_SESSION['user'])){
    header('location:guest-login.php');
}
?>

<?php
include ('headeruser.php');

$id=$_SESSION['uid'];

$query="SELECT * FROM `guest_record` WHERE `id`='$id'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);

if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $uname=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];

    $query = "UPDATE `guest_record`  SET `firstname`='$fname' , `lastname`='$lname', `email`=' $email' ,`username`='$uname' , `gender`='$gender' , `phone`=' $phone', `address`='$address' WHERE `id`='$id'";
    $run = mysqli_query($con, $query);
    if ($run == true) {
        ?>
        <script>
            alert("Your record has been updated");
            window.open('my-profile.php', '_self');
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Your record cannot be updated at this moment");
            window.open('edit-myprofile.php', '_self');
        </script>
        <?php
    }

}
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/menu.css" type="text/css">
    <title>Edit User Profile</title>
</head>

<body>
    <div class="usr">
        <div class="head">
        <h3 align="center">Edit your profile:</h3>
        </div>

        <div class="form">
            <table align="center" width="50%">
                <form action="" method="post">
                    <tr>
                        <th>Firstname:</th>
                        <td><input type="text" name="fname" value="<?php echo $data['firstname']; ?>" required></td>
                    </tr>

                    <tr>
                        <th>Lastname:</th>
                        <td><input type="text" name="lname" value="<?php echo $data['lastname']; ?>" required></td>
                    </tr>

                    <tr>
                        <th>Username:</th>
                        <td><input type="text" name="username" value="<?php echo $data['username']; ?>" required></td>
                    </tr>

                    <tr>
                        <th>Email:</th>
                        <td><input type="text" name="email" value="<?php echo $data['email']; ?>" required></td>
                    </tr>

                    <tr>
                        <th>Phone:</th>
                        <td><input type="text" name="phone" value="<?php echo $data['phone']; ?>" required></td>
                    </tr>

                    <tr>
                        <th>Gender:</th>
                        <td><input type="radio" name="gender" value="male"<?php echo ($data['gender']=='male')?'checked':''?>/><label>Male</label>
                            <input type="radio" name="gender" value="female"<?php echo ($data['gender']=='female')?'checked':''?>/><label>Female</label></td>
                    </tr>


                    <tr>
                        <th>Address:</th>
                        <td><input type="text" name="address" value="<?php echo $data['address']; ?>" required></td>
                    </tr>


                    <td colspan="2" align="center"><input type="submit" name="submit" value="Update"></td>
                </form>
            </table>
    </div>
</div>
    <?php include ('footer.php');?>
</body>
</html>
