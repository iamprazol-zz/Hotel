<?php
/**
 * Created by PhpStorm.
 * User: prajjwal
 * Date: 2/14/18
 * Time: 8:50 PM
 */

include ('dbcon.php');
?>


    <!DOCTYPE HTML>
    <html lang="en-US">
    <head>
        <meta http-equiv="content-type" content="text/html"charset="UTF-8"/>
        <title>Password Change</title>
        <link href="../css/dash.css" type="text/css" rel="stylesheet"/>
    </head>


    <body>
    <div class="reg">
    <div class="main">
        <h2 align="center">Password Change</h2>
    </div>

        <div class="form">
        <form action="" method="post" >
            <table align="center" style="width: 100%; height: 100px;">
                <tr>
                    <th align="center">Insert your phonenumber:</th>
                     <td align="center"><input type="text" name="phone"/></td>
                </tr>

                <tr>
                    <th align="center">Security Question:</th>
                    <td align="center"><input type="text" name="answer" placeholder="What is your favourite place"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Go"/></td>
                </tr>
            </table>
        </form>
    </div>
    </div>

</body>
</html>



<?php


if(isset($_POST['submit'])) {
    $phone=$_POST['phone'];
    $answer=$_POST['answer'];

    $query="SELECT * FROM `admin` WHERE `security`='".mysqli_real_escape_string($con,$answer)."' AND `phone`='".mysqli_real_escape_string($con,$phone)."'";
    $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);
    if($row==null) {
        ?>
        <script>
            alert('No any matches!!!');
            window.open('forget-admin-pass.php', '_self');
        </script>
        <?php
    } else {
        header("location:admin-password-change.php");
    }

}


?>