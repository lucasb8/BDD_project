<?php

session_start();
include "navbar.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Search Page</title>
    <link rel="stylesheet" href="cssEditProfile.css">
</head>

<body>

<?php
// if don't have session user..then
if(! isset($_SESSION['nom']))
{
    die("<script>alert('Je ne sais pas qui vous êtes, il faut se login !');window.location.href=pageLogin.php;</script>");
}
?>

<header>
    <?php
        navbar();
    ?>
</header>

<div id="seeProfile">
    <h1>Voici votre profil</h1>

    <?php
    include "conn.php";

    $sql="SELECT * FROM patient WHERE id_patient = '".$_SESSION['id']."'";
    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_array($result);

        echo "<a>"."Nom : ".$rows['Nom']."</a><br/><br/>";
        echo "<a>"."Prénom : ".$rows['Prenom']."</a><br/><br/>";
        echo "<a>"."Catégorie Sociale : ".$rows['Categorie_sociale']."</a><br/><br/>";
        echo "<a>"."Email : ".$rows['Email']."</a><br/><br/>";
        echo "<a>"."Comment m'avez-vous connue : ".$rows['Moyen_connaissance']."</a><br/><br/>";
        echo "<a class='button' href='pageEditProfile.php?id=".$rows['ID_patient']."'>Modifier votre profil</a>";

    ?>
</div>

<div class="rents">
    <h1>Demander un rendez-vous</h1>

    <?php
    echo "<a class='button' href='pageRDV.php?id=".$rows['ID_patient']."'>Demander un rendez-vous</a>";
    ?>
</div>

<div class="rents">
    <h1>Vos rendez-vous</h1>

    <?php
        $date = date("Y-m-d");

        $sql1 = "SELECT * FROM rendez_vous WHERE ID_patient = '".$_SESSION['id']."' AND Date > '".$date."'";
        $result1 = mysqli_query($conn, $sql1);

    while($rows = mysqli_fetch_array($result1))
    {
         echo "<br/><br/>";
         echo "<a>" . "Date : " . $rows['Date'] . "</a><br/><br/>";

         if($rows['Minute'] == 0) { echo "<a>" . "Heure : " . $rows['Heure'] ."h00</a><br/><br/>"; }
         else { echo "<a>" . "Heure : " . $rows['Heure'] ."h". $rows['Minute'] . "</a><br/><br/>"; }
    }

    ?>

</div>

</body>

</html>