
<?php session_start();
    if(!isset($_SESSION["uid"]))
        {
          header('location:login.php');
        }
    ?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" charset="UTF-8" content="text/html"/>
    <title>Accomodation Management</title>
    <link href="../css/login.css" rel="stylesheet" type="text/css">
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
</head>
<body>

    <?php
    /**
     * Created by PhpStorm.
     * User: prajjwal
     * Date: 2/12/18
     * Time: 5:43 PM
     */

    include ('dbcon.php');
    include ('dash.php');
    ?>

  <div class="manage">

    <div class="search">
        <h2>Accomodation Management</h2>
    </div>
        <a href="room-upload.php"><button>New Room</button></a>

      <div class="box">
        <table  width="100%" border="2">
            <tr>
                <th>Id</th>
                <th>Room no.</th>
                <th>Type</th>
                <th>Status</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php

            $query="SELECT * FROM `roomupload` ";
            $run=mysqli_query($con,$query);
            $row=mysqli_num_rows($run);
            if($row>0){
                while($data=mysqli_fetch_assoc($run)){


            ?>
            <tr>
                <td align="center" ><?php echo $data['id'];?></td>
                <td align="center"><?php echo $data['room_no'];?></td>
                <td align="center"><?php echo $data['type'];?></td>
                <td align="center"><?php echo $data['status'];?></td>
                <td align="center"><?php echo $data['price'];?></td>
                <td align="center"><img src="roomimage/<?php echo $data['image'];?>" height="100px" width="150px"/></td>
                <td><a href="room-edit.php?id=<?php echo $data['id'];?>"><button>Edit</button></a>
                <a href="delete-room.php?id=<?php echo $data['id'];?>"><button>Delete</button></a> </td>

            </tr>

            <?php } }?>
        </table>

    </div>
  </div>
    <?php include ('../footer.php');?>

</body>
</html>
