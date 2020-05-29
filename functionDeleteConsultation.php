<?php

include "conn.php";

$id = intval($_GET['id']);

$sql = "DELETE FROM consultation WHERE ID_consultation = $id";
$result = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)<=0)
{
    echo "<script>alert('Impossible de supprimer les données!');";
    die ("window.location.href='pageViewData.php';</script>");
}

mysqli_close($conn);

echo "<script>alert('Consultation supprimée !');";
echo "window.location.href='pageViewData.php';</script>";