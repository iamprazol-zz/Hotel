<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/8/18
 * Time: 7:52 PM
 */
$conn_error="Couldn\'t connect to the server";
$mysql_host="Localhost";
$mysql_user="root";
$mysql_pass="lenovog80";
$mysql_db="hms";

$con=@mysqli_connect($mysql_host,$mysql_user,$mysql_pass);


if(!$con || !@mysqli_select_db($con,$mysql_db)) {
    die($conn_error);

}

?>

