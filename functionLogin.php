<?php

session_start();
include "conn.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['mot_de_passe']);

$sql = "Select * from patient where Email = '".$email."'
and Mot_de_passe = '".md5($password)."'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)<=0)
{
    $sql = "Select * from patient where Email = '".$email."'
and Mot_de_passe = '".md5($password)."'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)<=0)
    {
        echo "<script>alert('Mauvais email ou mot de passe ! Essayez à nouveau !');</script>";
        die("<script>window.history.go(-1);</script>");
    }
}

if($row=mysqli_fetch_array($result))
{
    $_SESSION['id'] = $row['ID_patient'];
    $_SESSION['nom'] = $row['Nom'];
    $_SESSION['mot_de_passe'] = $row['Mot_de_passe'];
    $_SESSION['role'] = $row['role'];
}

if($_SESSION['role'] === "0")
{
    echo "<script>alert('Bon retour parmis nous, ".$_SESSION['nom']."');";
    echo "<script>alert('Bon retour parmis nous, ".$_SESSION['nom']."');";
    echo "window.location.href='pageHome.php';</script>";
}
else if($_SESSION['role'] === "1")
{
    echo "<script>alert('Ouiiii ! Connexion de la psy ".$_SESSION['nom']."');";
    echo "window.location.href='pageHome.php';</script>";
}