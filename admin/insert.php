<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/10/18
 * Time: 6:02 PM
 */

session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
}
?>
<link href="../css/login.css" rel="stylesheet" />
<?php
    include('dbcon.php');
    include ('dash.php');

    if(isset($_POST['go'])) {

        $imagename = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];
        $target = "logoupload/" . basename($imagename);
        move_uploaded_file($tempname, $target);

        $query = "SELECT * FROM `logo`";
        $run = mysqli_query($con, $query);
        if ($run == true) {
            $query = "INSERT INTO `logo` (`id`, `image`) VALUES (NULL ,'$imagename')";
            if (mysqli_query($con, $query) == true) {
                echo 'success';
            } else {
                echo 'unsuccessfull';
            }

        }
    }
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>Gallery Management</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>


<body>
    <div class="manage">

        <form action="" method="post" enctype="multipart/form-data">


            <h3>Choose Logo:</h3><input type="file" name="img"/>
            <input type="submit" name="go" value="go" />

        </form>

    </div>
    <?php include ('../footer.php');?>

</body>
</html>