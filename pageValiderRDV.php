<?php
session_start();
include "navbar.php";

$currentDateTime = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choisir RDV</title>
    <link rel="stylesheet" href="cssRegister.css">
</head>

<body class="background">

<header>
    <?php
    navbar();
    ?>
</header>




<div id="registerCard">
    <h3>Voici les nouvelles demandes de rendez-vous. Lesquels voulez-vous accepter ?</h3>
    <?php

    include "conn.php";
    $sql = "SELECT * FROM rendez_vous WHERE valide = 0";
    $result = mysqli_query($conn, $sql);

    while($rows = mysqli_fetch_array($result))
    {
        $idPatient = $rows['ID_patient'];
        $sqlPatient = "SELECT * FROM patient WHERE ID_patient = '".$idPatient."'";
        $resultPatient = mysqli_query($conn, $sqlPatient);
        $rowsPatient = mysqli_fetch_array($resultPatient);

        echo "<div class='patients'>";

            echo "<div class='desc'>".$rowsPatient['Nom']." : le ".$rows['Date']." à ".$rows['Heure']."h".$rows['Minute']."</div>";

            echo "<div class='add_button'>";
                echo "<form action='insertRDV.php?ID=".$rows['ID_rendez_vous']."' method='post'>";
				echo "<input type='submit' class='game_rent_choose' name='choix' value='Refuser' onclick=''/>";
                echo "<input type='submit' class='game_rent_choose' name='choix' value='Accepter' onclick=''/>";
                echo "</form>";
                echo "</br>";
            echo "</div>";

        echo "</div>";
    }

    ?>
</div>

</body>
</html>