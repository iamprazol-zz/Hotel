<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
        <title>Admin Login</title>
        <link href="../css/login.css" rel="stylesheet" type="text/css">
    </head>

    <body>


    <div class="wrap">
        <div class="head">
        <h1>~Admin Login~</h1>
        </div>
            <?php

            session_start();
            include('dbcon.php');

            if(isset($_POST['submit'])){
                $username=$_POST['username'];
                $password=$_POST['password'];
                $password_hash=md5($password);

                $query="SELECT * FROM `admin` WHERE `username`='".mysqli_real_escape_string($con,$username)."' AND `password`='".mysqli_real_escape_string($con,$password_hash)."'";
                $run=mysqli_query($con,$query);
                if(mysqli_num_rows($run)>0){
                    $data=mysqli_fetch_assoc($run);
                    $id=$data['id'];
                    $_SESSION['uid']=$id;
                    header("Location:dash.php");
                    exit;
                } else{
                    ?>
                    <script>
                        alert('Username and password didn\'t match!!!');
                        window.open('login.php','_self');
                    </script>
                    <?php
                }
            }


            ?>
            <div class="form">
                <form action="" method="post">
                    <p>Username:</p> <input type="text" name="username" placeholder="Enter your username" required/><br><br>
                    <p>Password:</p> <input type="password" name="password" placeholder="Enter your password" required/><br>
                    <input type="submit" name="submit" value="Login"/>
                </form>
            </div>
            <div class="sigin">
            <a href="forget-admin-pass.php"><h3>Forget password??</h3></a>
            <a href="../index.php"><h3>Back to home</h3></a>
        </div>
    </div>
    </body>
</html>




