<?php
session_start();
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RentPlay</title>
    <link rel="stylesheet" href="cssLogin.css">
</head>

<body>
    <header>
        <?php
            navbar();
        ?>
    </header>

    <div id="loginDiv">
        <h1>Login:</h1>
        <form method="post" action="functionLogin.php">
            <table>
                <tr>
                    <th>Adresse email : </th><td><input id="email" name="email" type="text" required="required" autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Mot de passe : </th><td><input id="password" name="mot_de_passe" type="password" required="required" autocomplete="off"></td>
                </tr>
                <tr>
                    <th colspan="2"><br/>
                        <input class="button" id="login" type="submit" value="Login"/>
                        &nbsp; &nbsp; <input class="button" type="reset" value="Réinitialiser">
                    </th>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>