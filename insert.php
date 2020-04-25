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
    $sql1 = "INSERT INTO patient(Nom, Prenom, Categorie_sociale, Email, Mot_de_passe, Moyen_connaissance, role)
            VALUE
            ('$nom', '$prenom ', '$categorie_sociale', '$email', '" . md5($mot_de_passe) . "', '$moyen_connaissance', '$role')";
	   
	if (!mysqli_query($conn, $sql1)) {
        die("Erreur : " . mysqli_error($conn));
    }
	
	
	if(!empty($_POST['profession'])){
		$profession = $_POST['profession'];
		
		$sql1 = "SELECT * FROM patient";
		$result = mysqli_query($conn, $sql1);

		while ($row = $result->fetch_array()){
			if ($row["Email"] == $email) {
				$id_patient = $row["ID_patient"];
				
				$sql1 = "INSERT INTO profession(Nom_profession, ID_patient) 
						VALUE('$profession', $id_patient)";
				if (!mysqli_query($conn, $sql1)) {
					die("Erreur : " . mysqli_error($conn));
				}
			}
		}
		$result->free();
	}

    echo '<script>alert("1 client ajouté!");';
    echo "window.location.href='pageLogin.php';</script>";
    mysqli_close($conn);
}
?>