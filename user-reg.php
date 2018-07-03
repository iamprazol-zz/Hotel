<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/10/18
 * Time: 12:22 PM
 */
include('admin/dbcon.php');

if(isset($_POST['submit'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = md5($password);
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $answer = $_POST['answer'];
    $address=$_POST['address'];

    $errors = array();

    if (strlen($firstname) < 2) {
        $errors['firstname1'] = "<span style='color:red'>Your firstname must contain at least 2 characters";
    } else if (!preg_match("/^[a-zA-Z'-]+$/", $firstname)) {
        $errors['firstname2'] = "<span style='color: red'>Only letters allowed";
    } else {
        $firstname = test_input($firstname);
    }

    if (strlen($lastname) < 2) {
        $errors['lastname1'] = "<span style='color:red'>Your lastname must contain at least 2 characters";
    } else if (!preg_match("/^[a-zA-Z'-]+$/", $lastname)) {
        $errors['lastname2'] = "<span style='color: red'>Only letters allowed";
    } else {
        $lastname = test_input($lastname);
    }

    if (strlen($email) < 6) {
        $errors['email1'] = "<span style='color:red'>Your email must contain at least 6 characters";
    }else if (preg_match("/^[a-zA-Z'-]+$/", $email)) {
        $errors['email2'] = "<span style='color: red'>Email must contain special character like @ (i.e. hello@example.com)";
    }else {
        $email = test_input($email);
    }

    if (strlen($username) < 5) {
        $errors['username1'] = "<span style='color:red'>Your username must contain at least 5 characters";
    } else if (!preg_match("/^[a-zA-Z'-]+$/", $username)) {
        $errors['username2'] = "<span style='color: red'>Only letters allowed";
    } else {
        $username = test_input($username);
    }

    if (strlen($password) < 5) {
        $errors['password1'] = "<span style='color:red'>Your password must contain at least 5 characters";
    } else {
        $lastname = test_input($lastname);
    }

    if (strlen($_POST["phone"]) != 10) {
        $errors["phone1"] = "<span style='color:red'>your phone must be at least 10 integer long";
    } else if (!preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $phone)) {
        $errors["phone2"] = "<span style='color:red'>phone number contains only integer";
    } else {
        $phone = test_input($phone);
    }

    if ($gender == "male"){
        $gender = "male";
    }else if ($gender == "female"){
        $gender = "female";
    }

    if (strlen($address) < 4) {
        $errors['address1'] = "<span style='color:red'>Your address must contain at least 4 characters";
    } else if (!preg_match("/^[a-zA-Z'-]+$/", $address)) {
        $errors['address2'] = "<span style='color: red'>Only letters allowed";
    } else {
        $address = test_input($address);
    }



    if (count($errors) == 0) {

        $query = "SELECT * FROM `guest_record` WHERE `username`='" . mysqli_real_escape_string($con, $username) . "' AND `phone`='".mysqli_real_escape_string($con,$phone)."'";
        $run = mysqli_query($con, $query);
        $rows = mysqli_num_rows($run);
        if ($rows == null) {

            $query = "INSERT INTO `guest_record` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `gender`, `phone`, `address`  , `answer`, `date_of_reg`) VALUES (NULL,'" . mysqli_real_escape_string($con, $firstname) . "', '" . mysqli_real_escape_string($con, $lastname) . "', '". mysqli_real_escape_string($con, $email)."', '" . mysqli_real_escape_string($con, $username) . "', '" . mysqli_real_escape_string($con, $password_hash) . "', '" . mysqli_real_escape_string($con, $gender) . "','" . mysqli_real_escape_string($con, $phone) . "', '" . mysqli_real_escape_string($con, $address) . "', '" . mysqli_real_escape_string($con, $answer) . "', CURRENT_TIMESTAMP)";
            $run = mysqli_query($con, $query);
            if ($run == true) {
                ?>
                <script>
                    alert('Registration Successfull');
                    window.open('guest-login.php', '_self');
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Registration unsuccessful');
                    window.open('user-reg.php', '_self');
                </script>
                <?php
            }

        } else {
            ?>
            <script>
                alert('Username already exists');
                window.open('user-reg.php', '_self');
            </script>
            <?php
        }
    }
}

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }





?>


<!DOCTYPE HTML>
<html lang="en-US" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
        <title>User Registration</title>
        <link rel="stylesheet" href="css/menu.css" type="text/css"/>
    </head>

<body>
    <?php include('header.php');?>
        <div class="usr">
            <div class="head">
            <h1>REGISTRATION</h1>
        </div>
        <div class="form">
    <table align="center"  style="width: 50%; margin-top: 2%">
        <form action="user-reg.php" method="post">
            <tr>
                <th align="left">Firstname:</th>
                <td align="right"><input type="text" name="fname" placeholder="Enter your firstname" value="<?php echo $firstname;?>" required/>
                <p><?php if(isset($errors['firstname1'])){echo $errors['firstname1'];}?></p>
                <p><?php if(isset($errors['firstname2'])){echo $errors['firstname2'];}?></p></td>
            </tr>

            <tr>
                <th align="left">Lastname:</th>
                <td align="right"> <input type="text" name="lname" placeholder="Enter your lastname" value="<?php echo $lastname;?>" required/>
                    <p><?php if(isset($errors['lastname1'])){echo $errors['lastname1'];}?></p>
                    <p><?php if(isset($errors['lastname2'])){echo $errors['lastname2'];}?></p></td>
            </tr>

            <tr>
                <th align="left">Email:</th>
                <td align="right"><input type="text" name="email" placeholder="Enter your email" required/>
                    <p><?php if(isset($errors['email1'])){echo $errors['email1'];}?></p>
                    <p><?php if(isset($errors['email2'])){echo $errors['email2'];}?></p></td>

            </tr>

            <tr>
                <th align="left">Username:</th>
                <td align="right"><input type="text" name="username" placeholder="Enter your username" value="<?php echo $username;?>" required/>
                    <p><?php if(isset($errors['username1'])){echo $errors['username1'];}?></p>
                    <p><?php if(isset($errors['username2'])){echo $errors['username2'];}?></p></td>
            </tr>

            <tr>
                <th align="left">Password:</th>
                <td align="right"><input type="password" name="password" placeholder="Enter your password" required/>
                    <p><?php if(isset($errors['password1'])){echo $errors['password1'];}?></p></td>
            </tr>

            <tr>
                <th align="left">Gender:</th>
                <td align="right"><input type="radio" name="gender" value="male" required/><label>Male</label>
                    <input type="radio" name="gender" value="female" required/><label>Female</label></td>
            </tr>


            <tr>
                <th align="left">Phone:</th>
                <td align="right"><input type="text" name="phone" placeholder="Enter your Phone number" required/>
                    <p><?php if(isset($errors['phone1'])){echo $errors['phone1'];}?></p>
                    <p><?php if(isset($errors['phone2'])){echo $errors['phone2'];}?></p></td>
            </tr>

            <tr>
                <th align="left">Address:</th>
                <td align="right"><input type="text" name="address" placeholder="Enter your current address" value="<?php echo $address;?>" required/>
                    <p><?php if(isset($errors['address1'])){echo $errors['address1'];}?></p>
                    <p><?php if(isset($errors['address2'])){echo $errors['address2'];}?></p></td>
            </tr>



            <tr>
                <th align="left">Sequrity Question:</th><td align="right"><input type="text" name="answer" placeholder="Where is Your favourite place??" required/></td>
            </tr>

            <td  align="center" colspan="2"><input type="submit" name="submit" value="Register"></td>
        </form>
    </table>
        </div>
        </div>

<?php include('footer.php');?>
</body>
</html>



