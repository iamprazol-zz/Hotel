<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/9/18
 * Time: 8:08 PM
 */

session_start();
session_destroy();
header("location: guest-login.php");
exit;
?>




