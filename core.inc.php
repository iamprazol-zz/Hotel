<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/13/18
 * Time: 8:08 PM
 */


ob_start();
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
$http_referer=$_SERVER['HTTP_REFERER'];

function logged_in(){
    if((isset($_SESSION['user'])) && !empty($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}
?>