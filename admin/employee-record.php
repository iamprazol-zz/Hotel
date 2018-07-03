
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>Admin Dashboard</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/11/18
 * Time: 9:43 PM
 */

session_start();

include ('dbcon.php');

if(!isset($_SESSION['uid'])){
    header('location:login.php');
}


?>
<?php include ('dash.php');?>

<div class="manage">
<div class="search">
    <form action="" method="post">
        <h2>Firstname:</h2>
        <input type="text" name="fname" placeholder="Enter Employee name"/>
        <input type="submit" name="submit" value="Search"/>
    </form>
</div>

<div class="box">
    <h3>Employee Management</h3>


    <table border="2" width="100%" >
        <tr style="background-color: #000000; color: #ffffff">
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Post</th>
            <th>Salary</th>
            <th>DateOfJoin</th>
            <th>Action</th>
        </tr>

        <?php

        if(isset($_POST['submit'])){
            $firstname=$_POST['fname'];

            $query="SELECT * FROM `employee_record` WHERE `firstname` LIKE '%$firstname%'";
            $run=mysqli_query($con,$query);
            $row=mysqli_num_rows($run);
            if($row==null){
                ?>
                <script>
                    alert('No Record Found');
                    window.open('employee-record.php','_self');
                </script>
                <?php
            } else{
                while($data=mysqli_fetch_assoc($run)){

                ?>
                <tr>
                    <td><?php echo $data['id'];?></td>
                    <td><?php echo $data['firstname'];?></td>
                    <td><?php echo $data['lastname'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php echo $data['gender'];?></td>
                    <td><?php echo $data['phone'];?></td>
                    <td><?php echo $data['address'];?></td>
                    <td><?php echo $data['post'];?></td>
                    <td><?php echo $data['salary'];?></td>
                    <td><?php echo $data['date_of_join'];?></td>
                    <td>
                        <a href="edit-employee.php?id=<?php echo $data['id'];?>"><button>Edit</button></a>
                        <a href="delete-employee.php?id=<?php echo $data['id'];?>"><button>Delete</button></a>
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
<a href="emp-reg.php"><button>Add New Employee</button></a>
<?php include ('../footer.php');?>

</body>
</html>
