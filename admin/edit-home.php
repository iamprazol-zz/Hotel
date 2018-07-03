<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/14/18
 * Time: 6:52 PM
 */

session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>Home Page Management</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php

include("dbcon.php");

if(isset($_POST["edit"])){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $title=$_POST["title"];
    $description=$_POST["description"];
    $sql = "UPDATE `home` SET `title`='$name', `title1`='$title',`content`='$description' WHERE `id`=$id";

    $result=mysqli_query($con,$sql);


    header("Location:home-admin.php"); exit;
}

$id = $_GET["id"];
$sql = "SELECT * FROM `home` WHERE `id`=$id";
$result = mysqli_query($con,$sql);

$data = mysqli_fetch_assoc($result);
?>
<div class="reg">
    <div class="main">
        <h2>Page Edit</h2>
    </div>
    <div class="form">
        <form action="" method="post">
            <table align="center" >
            <input type="hidden" name="id" value="<?php echo $id ?>" />

            <tr>
                <th>Name:</th>
                <td><input type="text" name="name" value="<?php echo $data["title"];?>" /></td>
            </tr>

                <tr>
                    <th>Title:</th>
                    <td><input type="text" name="title" value="<?php echo $data["title1"];?>" /></td>
                </tr>

                <tr>
                    <th>Description:</th>
                    <td><textarea rows="10" column="10" name="description"><?php echo $data["content"];?>"</textarea></td>
                </tr>

                <td colspan="2" align="center"><input type="submit" name="edit" value="Update" /></td>
            </table>
        </form>

    </div>
</div>

<hr>
<?php
include("../footer.php")
?>
