<?php
session_start();
include("conn.php");

if(isset($_SESSION['id']) && !empty($_SESSION['id']))
{

        if($_SESSION['role'] == "0")
        {
            $uid = $_SESSION['id'];
        }
        else
        {
            $uid = $_GET['id'];
        }

    $nom = $_POST['nom'];
    $categorie_sociale = $_POST['categorie_sociale'];
    $email = $_POST['adresse_email'];
    $profession = $_POST['profession'];

    if ((!empty($nom)) || ((!empty($categorie_sociale)) && ($categorie_sociale != "Garder")) || (!empty($email)) || (!empty($profession)))
    {
        if(!empty($nom))
        {
            $sql = new mysqli("localhost", "root", "", "bdd_project");
            $sql->query("UPDATE patient SET Nom = '".$nom."' WHERE id_patient = '".$uid."'");
        }

        if((!empty($categorie_sociale)) && ($categorie_sociale != "Garder"))
        {
            $sq2 = new mysqli("localhost", "root", "", "bdd_project");
            $sq2->query("UPDATE patient SET Categorie_sociale='".$categorie_sociale."' WHERE id_patient='".$uid."'");
        }

        if(!empty($email))
        {
            $sq3 = new mysqli("localhost", "root", "", "bdd_project");
            $sq3->query("UPDATE patient SET Email = '".$email."' WHERE id_patient = '".$uid."'");
        }

        if(!empty($profession))
        {
            $date = date("Y-m-d");
            $sq4 = new mysqli("localhost", "root", "", "bdd_project");
            $sq4->query("INSERT INTO profession(Nom_profession, ID_patient, Date) VALUE ('$profession', '$uid', '$date')");
        }

        echo "<script>alert(' Modification faite !');";

        if($_SESSION['role'] == "0")
        {
            echo "window.location.href='pageSeeProfile.php';</script>";
        }
        else
        {
            echo "window.location.href='pageViewData.php';</script>";
        }
        echo "window.location.href='pageSeeProfile.php';</script>";
    }
    else
    {
        echo "<script>alert(' Aucune modification demandée !');";
        echo "window.location.href='pageSeeProfile.php';</script>";
    }
}
?>