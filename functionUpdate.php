<?php
session_start();

include("conn.php");

if(isset($_SESSION['id']) && !empty($_SESSION['id']))
{
    $uid = $_SESSION['id'];
    $nom = $_POST['nom'];
    $categorie_sociale = $_POST['categorie_sociale'];
    $email = $_POST['adresse_email'];

    if ((!empty($nom)) || ((!empty($categorie_sociale)) && ($categorie_sociale != "Garder")) || (!empty($email))){
        if(!empty($nom)){
            $sql = new mysqli("localhost", "root", "", "bdd_project");
            $sql->query("UPDATE patient SET Nom = '".$nom."' WHERE id_patient = '".$uid."'");
        }

        if((!empty($categorie_sociale)) && ($categorie_sociale != "Garder")){
            $sq2 = new mysqli("localhost", "root", "", "bdd_project");
            $sq2->query("UPDATE patient SET Categorie_sociale='".$categorie_sociale."' WHERE id_patient='".$uid."'");
        }

        if(!empty($email)){
            $sq3 = new mysqli("localhost", "root", "", "bdd_project");
            $sq3->query("UPDATE patient SET Email = '".$email."' WHERE id_patient = '".$uid."'");
        }
        echo "<script>alert(' Modification faite !');";
        echo "window.location.href='pageSeeProfile.php';</script>";
    }
    else {
        echo "<script>alert(' Aucune modification demandée !');";
        echo "window.location.href='pageSeeProfile.php';</script>";
    }
}
?>