<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
}
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>Edit Employee</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include('dbcon.php');
$id=$_GET['id'];
$query="SELECT * FROM `employee_record` WHERE `id`='$id'";
$run=mysqli_query($con,$query);
$data = mysqli_fetch_assoc($run);

    if(isset($_POST['submit'])){
        $id=$_GET['id'];
        $firstname=$_POST['fname'];
        $lastname=$_POST['lname'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $post=$_POST['post'];
        $salary=$_POST['salary'];
        $doj=$_POST['doj'];

        $query = "UPDATE `employee_record`  SET `firstname`='$firstname' , `lastname`='$lastname', `email`=' $email' , `gender`='$gender' , `phone`=' $phone', `address`='$address' , `post`='$post' , `salary`='$salary', `date_of_join`='$doj' WHERE `id`='$id'";
        $run = mysqli_query($con, $query);
        if ($run == true) {
            ?>
                <script>
                    alert("Employee record has been updated");
                    window.open('employee-record.php', '_self');
                </script>
            <?php
        } else {
            ?>
                <script>
                    alert("Employee record cannot be updated at this moment");
                    window.open('edit-employee.php', '_self');
                    </script>
                    <?php
                }


}

?>
<div class="reg">
<div class="main">
    <h2>Edit Employee</h2>
</div>
    <div class="form">

        <table align="center" width="50%">
            <form action="" method="post">
                <tr>
                    <th>Firstname:</th>
                    <td><input type="text" name="fname" value="<?php echo $data['firstname'];?>" required></td>
                </tr>

                <tr>
                    <th>Lastname:</th>
                    <td><input type="text" name="lname" value="<?php echo $data['lastname'];?>" required></td>
                </tr>

                <tr>
                    <th>Email:</th>
                    <td><input type="text" name="email" value="<?php echo $data['email'];?>" required></td>
                </tr>

                <tr>
                    <th>Gender:</th>
                    <td><input type="radio" name="gender" value="male"<?php echo ($data['gender']=='male')?'checked':''?>/>Male
                        <input type="radio" name="gender" value="female"<?php echo ($data['gender']=='female')?'checked':''?>/>Female</td>
                </tr>

                <tr>
                    <th>Phone:</th>
                    <td><input type="text" name="phone" value="<?php echo $data['phone'];?>" required></td>
                </tr>

                <tr>
                    <th>Address:</th>
                    <td><input type="text" name="address" value="<?php echo $data['address'];?>" required></td>
                </tr>

                <tr>
                    <th>Salary:</th>
                    <td><input type="text" name="salary" value="<?php echo $data['salary'];?>" required></td>
                </tr>


                <tr>
                    <th>Post:</th>
                    <td><input type="text" name="post" value="<?php echo $data['post'];?>" required></td>
                </tr>


                <tr>
                    <th>Date Of Join</th>
                    <td><input type="text" name="doj" value="<?php echo $data['date_of_join'];?>" required></td>
                </tr>

                <td align="center" colspan="2"><input type="submit" name="submit" value="Update"></td>

            </form>
        </table>
    </div>
</div>
<?php include ('../footer.php');?>
</body>
</html>
