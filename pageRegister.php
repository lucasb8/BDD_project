<?php
session_start();
include "navbar.php";

$currentDateTime = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RentPlay</title>
    <link rel="stylesheet" href="cssRegister.css">
</head>

<body class="background">

<header>
    <?php
        navbar();
    ?>
</header>

    <div id="registerCard">
        <h3>Please register !<br>Join us !</h3>
        <form  action="insert.php" method="post">
            <table>
                <tr>
                    Username :<br><input class="inputRegister" type="text" name="username" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Password :<br><input class="inputRegister" type="tel" name="password" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Email address :<br><input class="inputRegister" type="email" name="emailAddress" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Phone number :<br><input class="inputRegister" name="phoneNumber" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Mailing address :<br><textarea id="mailingAddress" name="mailingAddress" required="required" autocomplete="off"></textarea> <br><br>
                </tr>
                <tr>
                    Date of Birth :<br><input type="date" max="<?php echo $currentDateTime;?>" name="dateOfBirth"> <br><br>
                </tr>
            </table>
            <input class="button" type="submit" value="Submit">
            <input class="button" type="reset" name="Reset">
        </form>
    </div>

</body>
</html>