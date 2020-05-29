<?php
session_start();

include("conn.php");

$idRDV = 12;

$ID_patient = (int)$_POST['id'];
$nature = $_POST['nature'];
$anxiete = (int)$_POST['anxiete'];
$prix = $_POST['prix'];
$methodePaiement = $_POST['methodePaiement'];
$commentaire = $_POST['commentaire'];



$sql1 = "INSERT INTO consultation(Nature, Indicateur_anxiete, ID_patient, ID_rendez_vous, Prix, Methode_paiement, Commentaire)
	VALUE ('$nature', '$anxiete', '$ID_patient', '$idRDV', '$prix', '$methodePaiement', '$commentaire')";

if (!mysqli_query($conn, $sql1))
{
	die("Erreur : " . mysqli_error($conn));
}

echo '<script>alert("1 consultation ajouté!");';
echo "window.location.href='pageLogin.php';</script>";
mysqli_close($conn);

?>