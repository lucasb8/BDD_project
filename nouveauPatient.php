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




<div id="registerCard">
    <h3>Voici les nouvelles demandes d'enregistrement. Qui voulez-vous accepter ?</h3>
    <?php

    include "conn.php";
    $sql = "Select * from patient WHERE enregistre = 0";
    $result = mysqli_query($conn, $sql);

    while($rows = mysqli_fetch_array($result))
    {
        echo "<div class='patients'>";

        echo "<div class='desc'>".$rows['Nom']."</div>";

        echo "</div>";

        echo "</div>";
    }

    ?>
</div>

</body>
</html>