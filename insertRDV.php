<?php

session_start();
include("conn.php");

$admin = false;

$sqlAdmin = "SELECT * FROM patient WHERE role = 1";
$resultAdmin = mysqli_query($conn, $sqlAdmin);

while($rows = mysqli_fetch_array($resultAdmin))
{
    if($_SESSION['id'] == $rows['ID_patient'])
    {
        $admin = true;
    }
}

if($admin == true)          // La psy veut valider un rdv
{
    $validation = 1;
	
	$choix = $_POST['choix'];
    $rdvid = $_GET['ID'];


	if ($choix == "Accepter"){
		$sql = "UPDATE rendez_vous SET ".
			"valide = '$validation' Where ID_rendez_vous = '$rdvid'";

		mysqli_query($conn, $sql);

		echo mysqli_error($conn);
		if(mysqli_affected_rows($conn)<=0)
		{
			die("<script>alert('Cannot update data!');
			window.location.href='pageLogin.php;</script>");
		}

		echo "<script> alert('Le rendez a été confirmé !'); </script>";
		echo "<script> window.location.href='pageSeeProfile.php'; </script>";
	} else if ($choix == "Refuser"){
		$sql = "DELETE FROM rendez_vous WHERE ID_rendez_vous = '$rdvid'";
		mysqli_query($conn, $sql);

		echo mysqli_error($conn);
		if(mysqli_affected_rows($conn)<=0)
		{
			die("<script>alert('Cannot update data!');
			window.location.href='pageLogin.php;</script>");
		}

		echo "<script> alert('Le rendez a été refusé !'); </script>";
		echo "<script> window.location.href='pageSeeProfile.php'; </script>";
		
	}
}
else                        // Le patient demande un rdv
{
    $date = $_POST['date'];
    $heure = isset($_POST['heure'] ) ? $_POST['heure'] : NULL;
    $minute = isset($_POST['minute'] ) ? $_POST['minute'] : NULL;
    $id_patient = $_SESSION['id'];
    $valide = 0;

    if($heure == NULL)
    {
        die("La valeur de l'heure n'est pas set !");
    }
    else if($minute == NULL)
    {
        die("La valeur des minutes n'est pas set !");
    }


    $sql = "SELECT * FROM rendez_vous WHERE Date = '".$date."'
										AND Heure = '".$heure."' 
										AND Minute = '".$minute."'";            // Vérifier si même date
    $result = mysqli_query($conn, $sql);


    if($result->num_rows > 0)
    {
        echo '<script>alert("Horaire déjà pris !");';
        echo "window.location.href='pageSeeProfile.php';</script>";
        mysqli_close($conn);
    }
    else
    {
        $sqlAjout = "INSERT INTO rendez_vous(Date, Heure, Minute, ID_patient, Valide)
            VALUE
            ('$date', '$heure ', '$minute', '$id_patient', '$valide')";


        if (!mysqli_query($conn, $sqlAjout))
        {
            die("Erreur : " . mysqli_error($conn));
        }

        echo '<script>alert("1 rendez-vous ajouté!");';
        echo "window.location.href='pageSeeProfile.php';</script>";
        mysqli_close($conn);
    }
}



