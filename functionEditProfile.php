<?php
    session_start();
    include "conn.php";

    $uid = $_GET['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $categorie = $_POST['categorie'];
    $email = $_POST['email'];
    $moyen = $_POST['moyen'];

    $sql = "UPDATE patient SET ".
        "Nom = '$nom', ".
        "Prenom = '$prenom', ".
        "Categorie_sociale = '$categorie', ".
        "Email = '$email', ".
        "Moyen_connaissance = '$moyen' WHERE ID_patient = '$uid'";

    mysqli_query($conn, $sql);

    echo mysqli_error($conn);

    if($conn->affected_rows <= 0)
    {
        die("<script>alert('Impossible de modifier !');
        window.location.href='pageSeeProfile.php';</script>");
    }


    echo "<script>alert('Données modifiées !');</script>";
    if ($_SESSION['role'] == 0)
    {
        echo "<script>window.location.href='pageSeeProfile.php';</script>";
    }
    else
    {
        echo "<script>window.location.href='pageViewData.php';</script>";
    }