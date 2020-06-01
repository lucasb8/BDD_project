<?php

function navbar()
{
    echo "<ul>";

    if(! isset($_SESSION['id']))
    {
        echo "<li><a href='index.php'>Se connecter</a></li>";
        echo "<li><a href='pageRegister.php'>S'enregistrer</a></li>";
    }
    else if($_SESSION['role'] === "0")
    {
        echo "<li><a href='pageSeeProfile.php'>Profil</a></li>";
        echo "<li><a href='functionLogout.php'>Logout</a></li>";
    }
    else
    {
        echo "<li><a href='pageViewData.php'>Accès aux données</a></li>";
        echo "<li><a href='nouveauPatient.php'>Ajouter un nouveau client</a></li>";
        echo "<li><a href='pageValiderRDV.php'>Demandes de RDV clients</a></li>";
        echo "<li><a href='calendrier.php'>Planning</a></li>";
        echo "<li><a href='functionLogout.php'>Logout</a></li>";
    }

    echo "</ul>";
}
?>
