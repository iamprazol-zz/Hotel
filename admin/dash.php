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
    <title>Admin Dashboard</title>
    <link href="../css/dash.css" rel="stylesheet" type="text/css">
	
</head>

<body>
<div class="panel">
    <div class="header">
        <h1>Admin Panel</h1>
    </div>
     <div class="module">
           <ul>
                <li>
                    <a href="display-user.php">Guest User Management<br/><br/><img src="images/User-icon.png" alt="user icon" height="100px" width="100px"/> </a>
                </li>    
                <li>
                    <a href="room-reserved.php">Room Booked<br/><br/><img src="images/full_basket_shopping-512.jpg" alt="icon" height="100px" width="100px"></a>
                </li>
                <li>
                    <a href="employee-record.php">Employee Management<br/><br/><img src="images/emp.png" alt="icon" height="100px" width="100px"></a>
                </li>    
                <li>
                    <a href="room-detail.php">Accomodation And Rates<br/><br/><img src="images/room.png" alt="room" height="100px" width="100px"></a>
                </li>
               
            
            	<li>
			<a href="content.php">Gallery Management<br /> <br /> <img src="images/commercestack_icon_final_1_1.png" alt="product mgmt
pic" height="100px" width="100px" /></a>
		</li>

            <li>
		<a href="logout.php">Logout<br><br><img src="images/logout.png" alt="logout" height="100px" width="100px"/> </a>
	</li>        
           </ul>
    </div>
</div>

</body>
</html>

