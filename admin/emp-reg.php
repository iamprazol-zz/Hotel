<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
}
?>


<?php
include('dbcon.php');

if(isset($_POST['submit'])){
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $post=$_POST['post'];
    $salary=$_POST['salary'];
    $doj=$_POST['doj'];

    $errors=array();

    if(strlen($firstname)<2){
        $errors['firstname1']="<span style='color:red'>your firstname must be at least 2 characters long";
    }else if(!preg_match("/^[a-zA-z'-]+$/",$firstname)){
        $errors['firstname2']="<span style='color:red'>Only letters are allowed";
    }
    else{
        $firstname=test_input($firstname);
    }

    if(strlen($lastname)<2){
        $errors['lastname1']="<span style='color:red'>your lastname must be at least 2 characters long";
    }else if(!preg_match("/^[a-zA-z'-]+$/",$lastname)){
        $errors['lastname2']="<span style='color:red'>Only letters are allowed";
    }
    else {
        $lastname=test_input($lastname);
    }

    if(strlen($email)<6) {
        $errors['email1'] = "<span style='color:red'>your firstname must be at least 6 characters long";
    } else if (preg_match("/^[a-zA-Z'-]+$/", $email)) {
        $errors['email2'] = "<span style='color: red'>Email must contain special character like @ (i.e. hello@example.com)";
    }else{
        $email=test_input($email);
    }


    if ($gender == "male"){
        $gender = "male";
    }else if ($gender == "female"){
            $gender = "female";
    }

    if(strlen($phone)!=10){
        $errors['phone1']="<span style='color:red'>Phone number must consists 10 numbers";
    } else{
        $phone=test_input($phone);
    }

    if(strlen($address)<5) {
        $errors['address1'] = "<span style='color:red'>your firstname must be at least 5 characters long";
    }else{
        $address=test_input($address);
    }

    if(strlen($post)<4) {
        $errors['post1'] = "<span style='color:red'>your lastname must be at least 4 characters long";
    } else {
        $post =test_input($post);
    }

    if(count($errors)==0) {

        $query = "SELECT * FROM `employee_record` WHERE `email`='" . mysqli_real_escape_string($con, $email) . "' AND `phone`='" . mysqli_real_escape_string($con, $phone) . "'";
        $run = mysqli_query($con, $query);
        $row = mysqli_num_rows($run);
        if ($row == null) {
            $query = "INSERT INTO `employee_record` (`id`,`firstname`, `lastname`, `email`, `gender`, `phone`, `address`, `post`, `salary`, `date_of_join`) VALUES (NULL , '" . mysqli_real_escape_string($con, $firstname) . "' , '" . mysqli_real_escape_string($con, $lastname) . "' ,  '" . mysqli_real_escape_string($con, $email) . "' ,  '" . mysqli_real_escape_string($con, $gender) . "' ,  '" . mysqli_real_escape_string($con, $phone) . "' ,  '" . mysqli_real_escape_string($con, $address) . "' ,  '" . mysqli_real_escape_string($con, $post) . "' ,  '" . mysqli_real_escape_string($con, $salary) . "' ,  '" . mysqli_real_escape_string($con, $doj) . "') ";
            $run = mysqli_query($con, $query);
            if ($run == true) {
                ?>
                <script>
                    alert("Employee has been registered");
                    window.open('employee-record.php', '_self');
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Employee cannot be registered at this moment");
                    window.open('emp-reg.php', '_self');
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("The employee is already registered");
                window.open('emp-reg.php', '_self');
            </script>
            <?php
        }
    }
}

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>




<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>Admin Dashboard</title>
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="reg">
    <div class="main">
            <h2 >Registration</h2>
    </div>
        <div class="form">
            <table align="center" width="40%">
                <form action="" method="post">
                    <tr>
                        <th align="center">Firstname:</th>
                        <td align="center"><input type="text" name="fname" placeholder="Enter employee's firstname" value="<?php if(isset($_POST['fname'])){ echo $firstname;}?>" required/>
                        <p><?php if(isset($errors['firstname1'])){echo $errors['firstname1'];}?></p>
                        <p><?php if(isset($errors['firstname2'])){echo $errors['firstname2'];}?></p></td>
                    </tr>

                    <tr>
                        <th align="center">Lastname:</th>
                        <td align="center"><input type="text" name="lname" placeholder="Enter employee's lastname" value="<?php if(isset($_POST['lname'])){ echo $lastname;}?>" required>
                        <p><?php if(isset($errors['lastname1'])){echo $errors['lastname1'];}?></p>
                        <p><?php if(isset($errors['lastname2'])){echo $errors['lastname2'];}?></p></td>
                    </tr>

                    <tr>
                        <th align="center">Email:</th>
                        <td align="center"><input type="text" name="email" placeholder="Enter employee's email"   value="<?php if(isset($_POST['email'])){ echo $email;}?>" required>
                            <p><?php if(isset($errors['email1'])){echo $errors['email1'];}?></p>
                            <p><?php if(isset($errors['email2'])){echo $errors['email2'];}?></p></td>
                    </tr>

                    <tr>
                        <th align="center">Gender:</th>
                        <td align="center"><input type="radio" name="gender" value="male" required/>Male
                        <input type="radio" name="gender" value="female" required/>Female</td>
                    </tr>

                    <tr>
                        <th align="center">Phone:</th>
                        <td align="center"><input type="text" name="phone" placeholder="Enter employee's Phone number" value="<?php if(isset($_POST['phone'])){ echo $phone;}?>" required>
                            <p><?php if(isset($errors['phone1'])){echo $errors['phone1'];}?></p></td>
                    </tr>

                    <tr>
                        <th align="center">Address:</th>
                        <td align="center"><input type="text" name="address" placeholder="Enter employee's current Address" value="<?php if(isset($_POST['address'])){ echo $address;}?>" required>
                            <p><?php if(isset($errors['address1'])){echo $errors['address1'];}?></p></td>
                    </tr>

                    <tr>
                        <th align="center">Post:</th>
                        <td align="center"><input type="text" name="post" placeholder="Enter employee's post" value="<?php if(isset($_POST['post'])){ echo $post;}?>" required>
                        <p><?php if(isset($errors['post1'])){echo $errors['post1'];}?></p></td>
                    </tr>

                    <tr>
                        <th align="center">Salary:</th>
                        <td align="center"><input type="text" name="salary" placeholder="Enter employee's salary" value="<?php if(isset($_POST['salary'])){ echo $salary;}?>" required></td>
                    </tr>

                    <tr>
                        <th align="center">Date Of Join</th>
                        <td align="center"><input type="text" name="doj" placeholder="Enter employee's date of join" value="<?php if(isset($_POST['doj'])){ echo $doj;}?>" required></td>
                    </tr>

                    <td align="center" colspan="2"><input type="submit" name="submit" value="Register"></td>

                </form>
            </table>
        </div>
    </div>
<?php include ('../footer.php');?>

</body>
</html>
