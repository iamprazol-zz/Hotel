<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location:login.php');
}
?>

<link href="../css/login.css" rel="stylesheet" />

<?php
include("dbcon.php");


include("dash.php");

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
<h2>Gallery Management:</h2>
    <div class="season">


        <div class="page">
            <ol>
                <li><a href="insert.php">LOGO MANEGEMENT</a></li>
                <li><a href="home-admin.php">HOME PAGE MANEGEMENT </a></li>
                <li> <a href="about-admin.php">ABOUT PAGE MANEGEMENT</a></li>
                <li><a href="contact-admin.php">CONTACT PAGE MANEGEMENT </a></li>
            </ol>
        </div>
    </div>

</div>
<?php include ('../footer.php');?>


</body>
</html>