<?php

    function navbar()
    {
        echo "<ul>";
        echo "<li><a href='pageHome.php'>Accueil</a></li>";

        if(! isset($_SESSION['id']))
        {
            echo "<li><a href='pageLogin.php'>Login</a></li>";
            echo "<li><a href='pageRegister.php'>S'enregistrer</a></li>";
        }
        else if($_SESSION['role'] === "0")
        {
            echo "<li><a href='pageSeeProfile.php'>Profil</a></li>";
            echo "<li><a href='functionLogout.php'>Logout</a></li>";
        }
        else
        {
            echo "<li><a href='pageViewData.php'>View Data</a></li>";
            echo "<li><a href='nouveauPatient.php'>Ajouter un nouveau client</a></li>";
            echo "<li><a href='calendrier.php'>Planning</a></li>";
            echo "<li><a href='functionLogout.php'>Logout</a></li>";
        }

        echo "</ul>";
}
?>
