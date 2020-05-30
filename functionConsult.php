<?php
session_start();

include("conn.php");

$idRDV = (int) $_GET['id_C'];
$ID_patient = (int) $_GET['id_P'];
$nature = $_POST['nature'];
$anxiete = (int)$_POST['anxiete'];
$prix = $_POST['prix'];
$methodePaiement = $_POST['methodePaiement'];
$commentaire = $_POST['commentaire'];
$id_inv1 = (int) $_POST['invite1'];
$id_inv2 = (int) $_POST['invite2'];



if($id_inv1 == $id_inv2){
	if($id_inv1 == (-1)){
		$sql1 = "INSERT INTO consultation(Nature, Indicateur_anxiete, ID_patient, ID_rendez_vous, Prix, Methode_paiement, Commentaire)
					VALUE ('$nature', '$anxiete', '$ID_patient', '$idRDV', '$prix', '$methodePaiement', '$commentaire')";
	} else {
		$sql1 = "INSERT INTO consultation(Nature, Indicateur_anxiete, ID_patient, ID_rendez_vous, Prix, Methode_paiement, Commentaire, ID_invite1)
					VALUE ('$nature', '$anxiete', '$ID_patient', '$idRDV', '$prix', '$methodePaiement', '$commentaire', '$id_inv1')";
	}
} else {
	if ($id_inv1 == (-1)){
		$sql1 = "INSERT INTO consultation(Nature, Indicateur_anxiete, ID_patient, ID_rendez_vous, Prix, Methode_paiement, Commentaire, ID_invite1)
					VALUE ('$nature', '$anxiete', '$ID_patient', '$idRDV', '$prix', '$methodePaiement', '$commentaire', '$id_inv2')";
	} else if ($id_inv2 == (-1)){
		$sql1 = "INSERT INTO consultation(Nature, Indicateur_anxiete, ID_patient, ID_rendez_vous, Prix, Methode_paiement, Commentaire, ID_invite1)
					VALUE ('$nature', '$anxiete', '$ID_patient', '$idRDV', '$prix', '$methodePaiement', '$commentaire', '$id_inv1')";
	} else {
		$sql1 = "INSERT INTO consultation(Nature, Indicateur_anxiete, ID_patient, ID_rendez_vous, Prix, Methode_paiement, Commentaire, ID_invite1, ID_invite2)
					VALUE ('$nature', '$anxiete', '$ID_patient', '$idRDV', '$prix', '$methodePaiement', '$commentaire', '$id_inv1', '$id_inv2')";
	}
}
		
if (!mysqli_query($conn, $sql1))
{
	die("Erreur : " . mysqli_error($conn));
}

echo '<script>alert("1 consultation ajouté!");';
echo "window.location.href='pageLogin.php';</script>";
mysqli_close($conn);

?>