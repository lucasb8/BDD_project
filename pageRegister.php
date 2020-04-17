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
        <h3>Enregistrez-vous s'il vous plait !<br>Je suis très gentille vous verrez !</h3>
        <form  action="insert.php" method="post">
            <table>
                <tr>
                    Nom :<br><input class="inputRegister" type="text" name="nom" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Prénom :<br><input class="inputRegister" type="text" name="prénom" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Catégorie Sociale :<br><input class="inputRegister" type="text" name="categorie_sociale" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Adresse email :<br><input class="inputRegister" type="email" name="adresse_email" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Mot de passe :<br><input class="inputRegister" type="password" name="mot_de_passe" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Comment avez-vous entendu parler de moi ? :<br><input class="inputRegister" type="text" name="moyen_connaissance" required="required" autocomplete="off"> <br><br>
                </tr>
            </table>
            <input class="button" type="submit" value="Submit">
            <input class="button" type="reset" name="Reset">
        </form>
    </div>

</body>
</html>