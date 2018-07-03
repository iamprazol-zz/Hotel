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
    <title>Guest Management</title>
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include ('dbcon.php');
include('dash.php');
?>

<div class="manage">

<div class="search">
    <form action="" method="post">
        <h2>Firstname:</h2><input type="text" name="firstname" placeholder="Enter guest firstname" />
        <input type="submit" name="submit" value="search"/>
    </form>
</div>

<div class="box">
    <h3>User Management</h3>
    <table width="100%" border="2">
        <tr style="background-color: #000000; color: #ffffff">
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Username</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date of Reg</th>
            <th>Action</th>
        </tr>

<?php

if(isset($_POST['submit'])){
    $firstname=$_POST['firstname'];

    $query=" SELECT * FROM `guest_record` WHERE `firstname` LIKE '%$firstname%'";
    $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);
    if($row==null){
        ?>
        <script>
            alert('No Record Found');
            window.open('display-user.php','_self');
        </script>
        <?php
    } else {
        while($data=mysqli_fetch_assoc($run)){
            ?>
    <tr>
        <td><?php echo $data['id'];?></td>
        <td><?php echo $data['firstname'];?></td>
        <td><?php echo $data['lastname'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['username'];?></td>
        <td><?php echo $data['gender'];?></td>
        <td><?php echo $data['phone'];?></td>
        <td><?php echo $data['address'];?></td>
        <td><?php echo $data['date_of_reg'];?></td>
        <td>
            <a href="delete-user.php?id=<?php echo $data['id'];?>"><button>Delete</button></a>
        </td>

    </tr>
            <?php
        }
    }
}
?>
    </table>
</div>
</div>
<?php include ('../footer.php');?>
</body>
</html>
