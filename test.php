<?php

session_start();
include("conn.php");

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

$result = mysqli_query($conn, $sql);

if($result->num_rows > 0)
{
    $result1 = $result->query("SELECT * FROM rendez_vous WHERE Heure = '".$heure."'");
    if($result1->num_rows > 0)
    {
        $result2 = $result1->query("SELECT * FROM rendez_vous WHERE Minute = '".$minute."'");
        if($result2->num_rows > 0)
        {
            echo '<script>alert("Horaire déjà pris !");';
            echo "window.location.href='pageSeeProfile.php';</script>";
            mysqli_close($conn);
        }
    }
}
else            // Demander le rdv
{
    $sql = "INSERT INTO rendez_vous(Date, Heure, Minute, ID_patient, Valide)
            VALUE
            ('$date', '$heure ', '$minute', '$id_patient', '$valide')";


    if (!mysqli_query($conn, $sql)) {
        die("Erreur : " . mysqli_error($conn));
    }

    echo '<script>alert("1 rendez-vous ajouté!");';
    echo "window.location.href='pageSeeProfile.php';</script>";
    mysqli_close($conn);
}