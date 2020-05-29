<?php

include "conn.php";

$id = intval($_GET['id']);

$sql = "DELETE FROM patient WHERE ID_patient = $id";
$result = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)<=0)
{
    echo "<script>alert('Impossible de supprimer les données!');";
    die ("window.location.href='pageViewData.php';</script>");
}

mysqli_close($conn);

echo "<script>alert('Patient supprimé !');";
echo "window.location.href='pageViewData.php';</script>";