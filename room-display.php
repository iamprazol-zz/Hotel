<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/13/18
 * Time: 12:09 PM
 */

session_start();
include ('admin/dbcon.php');
if(!isset($_SESSION['uid']) || !isset($_SESSION['user'])){
    header('location:guest-login.php');
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>Room Display</title>
    <link href="css/menu.css" rel="stylesheet" type="text/css"/>

</head>
<body>
    <?php include ('headeruser.php');?>




        <div class="title">
            <h2>Welcome To Our Resort</h2>
        </div>
        <hr>
        <?php
        $id= $_SESSION['uid'] ;
        $query="SELECT * FROM `roomupload`";
            $run=mysqli_query($con,$query);

            if(mysqli_num_rows($run)>0){
                while($data=mysqli_fetch_assoc($run)){
                    ?>

    <div class="dis">

            <div class="form">
                <table width="70%" >
                    <tr>
                        <td colspan="3" rowspan="6"><img align="center" src="admin/roomimage/<?php echo $data['image'];?>" height="300px" width="550px"/></td>
                    </tr>

                    <tr>
                        <th>Room No:</th>
                        <td><?php echo $data['room_no'];?></td>
                    </tr>

                    <tr>
                        <th>Price per night:</th>
                        <td><?php echo $data['price'];?></td>
                    </tr>

                    <tr>
                        <th>Type:</th>
                        <td><?php echo $data['type'];?></td>
                    </tr>

                    <tr>
                        <th>Status:</th>
                        <td><?php echo $data['status'];?></td>

                     </tr>

                    <td colspan="2" align="center"><a href="room-booked.php?id=<?php echo $data['id'];?>"><button>Book Now</button></a></td>

                </table>
            </div>
<hr>
    </div>
<?php } } ?>
<?php include ('footer.php');?>
</body>
</html>
