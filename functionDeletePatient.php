<?php

include "conn.php";

$id = intval($_GET['id']);

$sql = "DELETE FROM patient WHERE ID_patient = $id";
mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)<=0)
{
    echo "<script>alert('Impossible de supprimer les données!');";
    die ("window.location.href='pageViewData.php';</script>");
}

$sql2 = "DELETE FROM profession WHERE ID_patient = $id";
mysqli_query($conn, $sql2);

$sql3 = "DELETE FROM rendez_vous WHERE ID_patient = $id";
mysqli_query($conn, $sql3);

$sql4 = "DELETE FROM consultation WHERE ID_patient = $id";
mysqli_query($conn, $sql4);


mysqli_close($conn);

echo "<script>alert('Patient supprimé !');";
echo "window.location.href='pageViewData.php';</script>";