<?php
include "conn.php";

$uid = $_GET['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$categorie = $_POST['categorie'];
$email = $_POST['email'];
$moyen = $_POST['moyen'];

$sql = "Update patient SET ".
    "Nom = '$nom', ".
    "Prenom = '$prenom', ".
    "Categorie_sociale = '$categorie', ".
    "Email = '$email', ".
    "Moyen_connaissance = '$moyen' Where ID_patient = '$uid'";

mysqli_query($conn, $sql);

echo mysqli_error($conn);
if(mysqli_affected_rows($conn) <= 0)
{
    die("<script>alert('Impossible de modifier !');
        window.location.href='pageEditProfile.php?id=$uid';</script>");
}

echo "<script>alert('Données modifiées !');</script>";
echo "<script>window.location.href='pageEditProfile.php?id=$uid';</script>";



