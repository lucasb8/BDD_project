<?php

include("conn.php");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$categorie_sociale = $_POST['categorie_sociale'];
$email = $_POST['adresse_email'];
$mot_de_passe = $_POST['mot_de_passe'];
$moyen_connaissance = $_POST['moyen_connaissance'];
$role = 0;

$sql1 = new mysqli("localhost", "root", "", "bdd_project");
$result = $sql1->query("SELECT * FROM patient WHERE Email = '".$email."'");
if($result->num_rows > 0)
{
    echo '<script>alert("Cette adresse email est déjà utilisée");';
    echo "window.location.href='pageRegister.php';</script>";
    mysqli_close($conn);
}
else
{
    $sql = "INSERT INTO patient(Nom, Prenom, Categorie_sociale, Email, Mot_de_passe, Moyen_connaissance, role)
            VALUE
            ('$nom', '$prenom ', '$categorie_sociale', '$email', '" . md5($mot_de_passe) . "', '$moyen_connaissance', '$role')";


    if (!mysqli_query($conn, $sql)) {
        die("Erreur : " . mysqli_error($conn));
    }

    echo '<script>alert("1 client ajouté!");';
    echo "window.location.href='pageLogin.php';</script>";
    mysqli_close($conn);
}