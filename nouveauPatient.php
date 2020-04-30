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

<?php

include "conn.php";
$sql = "Select * from game WHERE gameType = 'Card'";
$result = mysqli_query($conn, $sql);

while($rows = mysqli_fetch_array($result))
{
    echo "<div class='gallery'>";

    echo "<a target='_blank'><img src='".$rows['gameImage']."' width='600' height='400'></a>";

    echo "<div class='right_part'>";

    echo "<div class='desc'>".$rows['gameDescription']."</div>";

    echo "<div class='rent_button'>";
    echo "<form action='pageGameRent.php?gameId=".$rows['gameID']."' method='post'>";
    echo "<input type='submit' class='game_rent_choose' name='game_rent_choose' value='Rent' onclick=''/>";
    echo "</form>";
    echo "</div>";

    echo "</div>";

    echo "</div>";
}

?>


<div id="registerCard">
    <h3>Voici les nouvelles demandes d'enregistrement. Qui voulez-vous accepter ?</h3>
    <form  action="insert.php" method="post">
        <table>
            <tr>
                Nom :<br><input class="inputRegister" type="text" name="nom" required="required" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Prénom :<br><input class="inputRegister" type="text" name="prenom" required="required" autocomplete="off"> <br><br>
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
        <input class="button" type="submit" value="Valider">
        <input class="button" type="reset" name="Réinitailiser">
    </form>
</div>

</body>
</html>