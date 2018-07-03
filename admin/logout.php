<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/10/18
 * Time: 9:53 PM
 */

session_start();
session_destroy();
header("Location:login.php");
?>