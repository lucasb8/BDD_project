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

    $id = $_POST['id'];
    $nature = $_POST['nature'];
    $indicateur = $_POST['anxiete'];
    $moyen_paiement = $_POST['methodePaiement'];
    $prix = $_POST['prix'];
    $commentaires = $_POST['commentaire'];

    if (((!empty($id)) && ($id != "Garder")) || (!empty($nature)) || ((!empty($indicateur)) && ($indicateur != "Garder")) || ((!empty($moyen_paiement)) && ($moyen_paiement != "Garder")) || (!empty($prix)) || (!empty($commentaires)))
    {
        if((!empty($id)) && ($id != "Garder"))
        {
            $sql = new mysqli("localhost", "root", "", "bdd_project");
            $sql->query("UPDATE consultation SET ID_patient = '".$id."' WHERE ID_consultation = '".$uid."'");
        }

        if((!empty($nature)))
        {
            $sq2 = new mysqli("localhost", "root", "", "bdd_project");
            $sq2->query("UPDATE consultation SET Nature ='".$nature."' WHERE ID_consultation='".$uid."'");
        }

        if((!empty($indicateur)) && ($indicateur != "Garder"))
        {
            $sq3 = new mysqli("localhost", "root", "", "bdd_project");
            $sq3->query("UPDATE consultation SET Indicateur_anxiete = '".$indicateur."' WHERE ID_consultation = '".$uid."'");
        }

        if((!empty($moyen_paiement)) && ($moyen_paiement != "Garder"))
        {
            $sq4 = new mysqli("localhost", "root", "", "bdd_project");
            $sq4->query("UPDATE consultation SET Methode_paiement = '".$moyen_paiement."' WHERE ID_consultation = '".$uid."'");
        }

        if(!empty($prix))
        {
            $sq5 = new mysqli("localhost", "root", "", "bdd_project");
            $sq5->query("UPDATE consultation SET Prix = '".$prix."' WHERE ID_consultation = '".$uid."'");
        }

        if(!empty($commentaires))
        {
            $sq6 = new mysqli("localhost", "root", "", "bdd_project");
            $sq6->query("UPDATE consultation SET Commentaire = '".$commentaires."' WHERE ID_consultation = '".$uid."'");
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
    }
    else
    {
        echo "<script>alert(' Aucune modification demandée !');";

        if($_SESSION['role'] == "0")
        {
            echo "window.location.href='pageSeeProfile.php';</script>";
        }
        else
        {
            echo "window.location.href='pageViewData.php';</script>";
        }
    }
}
?>