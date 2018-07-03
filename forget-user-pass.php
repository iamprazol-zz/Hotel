
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html"charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <title>Forget User Password</title>
</head>

<body>
    <?php include('header.php');?>
    <div class="usr">
        <div class="head">
            <h3 align="center">Security Check</h3>
        </div>
    <div class="form">
        <form action="forget-user-pass.php" method="post" >
            <table align="center" style="width: 100%; height: 100px;">
                <tr>
                    <th>Insert your phonenumber:</th>
                     <td><input type="text" name="phone"/></td>
                </tr>

                <tr>
                    <th>Security Question:</th>
                    <td><input type="text" name="answer" placeholder="What is your favourite place"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Go"/></td>
                </tr>
            </table>
        </form>
    </div>

<?php include('footer.php');?>
</body>
</html>



<?php
include('admin/dbcon.php');

if(isset($_POST['submit'])) {
    $phone=$_POST['phone'];
    $answer=$_POST['answer'];

    $query="SELECT * FROM `guest_record` WHERE `answer`='".mysqli_real_escape_string($con,$answer)."' AND `phone`='".mysqli_real_escape_string($con,$phone)."'";
    $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);
    if($row==null) {
        ?>
        <script>
            alert('No any matches!!!');
            window.open('forget-user-pass.php', '_self');
        </script>
        <?php
    } else {
        header("location:user-password-change.php");
    }

}


?>