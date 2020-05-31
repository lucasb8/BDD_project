<?php
session_start();
include "navbar.php";

$currentDateTime = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="cssRegister.css">
</head>

<body class="background">

<header>
    <?php
        navbar();
    ?>
</header>

    <div id="boite_register">
        <h1>Enregistrement :</h1>
		<h3>Je suis très gentille vous verrez !</h3>
        <form  action="insert.php" method="post">
            <table>
                <tr>
                    Nom :<br><input class="inputRegister" type="text" name="nom" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
                    Prénom :<br><input class="inputRegister" type="text" name="prenom" required="required" autocomplete="off"> <br><br>
                </tr>
                <tr>
					Classification :
                    <br><select class="inputRegister" type="text" name="categorie_sociale" required="required">
						<option value="Homme"> Homme (age > 18 ans) </option>
						<option value="Femme"> Femme (age > 18 ans) </option>
						<option value="Adolescent"> Adolescent (13ans < age < 17 ans) </option>
						<option value="Enfant"> Enfant (age < 13 ans) </option>
						<option value="Couple"> Couple </option>
					</select> <br><br>
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
				<tr>
                    Quel est votre profession actuelle (Facultatif):<br><input class="inputRegister" type="text" name="profession" autocomplete="off"> <br><br>
                </tr>
            </table>
            <input class="button" type="submit" value="Enregistrer">
            &nbsp; &nbsp; <input class="button" type="reset" name="Effacer">
        </form>
    </div>

</body>
</html>