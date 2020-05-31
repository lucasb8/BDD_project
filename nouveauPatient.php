<?php
session_start();
include "navbar.php";

$currentDateTime = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choisir patients</title>
    <link rel="stylesheet" href="cssRegister.css">
</head>

<body class="background">

<header>
    <?php
    navbar();
    ?>
</header>




<div id="boite_register">
    <h3>Voici les nouvelles demandes d'enregistrement. Qui voulez-vous accepter ?</h3>
    <?php

    include "conn.php";
    $sql = "Select * from patient WHERE enregistre = 0";
    $result = mysqli_query($conn, $sql);

    while($rows = mysqli_fetch_array($result))
    {
        echo "<div class='patients'>";

            echo "<div class='desc'>".$rows['Nom']."</div>";

            echo "<div class='add_button'>";
                 echo "<form action='insert.php?ID=".$rows['ID_patient']."' method='post'>";
                    echo "<input type='submit' class='game_rent_choose' name='game_rent_choose' value='Accepter' onclick=''/>";
                echo "</form>";
            echo "</br>";
            echo "</div>";

        echo "</div>";
    }

    ?>
</div>

</body>
</html>