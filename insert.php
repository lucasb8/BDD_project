<?php
session_start();

include("conn.php");

$enregistre = 0;

if(isset($_SESSION['id']))          // Si quelqu'un est login (seule la psy pourra y acceder depuis son menu)
{
    $enregistre = 1;

   if(isset($_POST['psyData']))
   {
       $enregistre = 1;
       goto ajout;
   }
   else
   {
       $uid = $_GET['ID'];

       $sql = "Update patient SET ".
           "enregistre = '$enregistre' Where ID_patient = '$uid'";

       mysqli_query($conn, $sql);

       echo mysqli_error($conn);
       if(mysqli_affected_rows($conn)<=0)
       {
           die("<script>alert('Cannot update data!');
        window.location.href='pageLogin.php;</script>");
       }

       echo "<script> alert('Le client a été ajouté !'); </script>";
       echo "<script> window.location.href='nouveauPatient.php'; </script>";
   }
}
else
{
    ajout :
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $categorie_sociale = $_POST['categorie_sociale'];
    $email = $_POST['adresse_email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $moyen_connaissance = $_POST['moyen_connaissance'];
    $role = 0;


    $sql = new mysqli("localhost", "root", "", "bdd_project");
    $result = $sql->query("SELECT * FROM patient WHERE Email = '".$email."'");
    if($result->num_rows > 0)
    {
        echo '<script>alert("Cette adresse email est déjà utilisée !");';
        echo "window.location.href='pageLogin.php';</script>";
        mysqli_close($conn);
    }
    else
    {
        $sql1 = "INSERT INTO patient(Nom, Prenom, Categorie_sociale, Email, Mot_de_passe, Moyen_connaissance, role, enregistre)
            VALUE
            ('$nom', '$prenom ', '$categorie_sociale', '$email', '" . md5($mot_de_passe) . "', '$moyen_connaissance', '$role', '$enregistre')";

        if (!mysqli_query($conn, $sql1))
        {
            die("Erreur : " . mysqli_error($conn));
        }

        if(!empty($_POST['profession'])){
            $profession = $_POST['profession'];

            $sql2 = "SELECT * FROM patient";
            $result1 = mysqli_query($conn, $sql2);

            while ($row = $result1->fetch_array())
            {
                if ($row["Email"] == $email)
                {
                    $id_patient = $row["ID_patient"];

                    $sql2 = "INSERT INTO profession(Nom_profession, ID_patient) 
						VALUE('$profession', '$id_patient')";
                    if (!mysqli_query($conn, $sql2))
                    {
                        die("Erreur : " . mysqli_error($conn));
                    }
                }
            }
            $result->free();
        }

        echo '<script>alert("1 client ajouté!");';

        if(isset($_SESSION['id']))
        {
            echo "window.location.href='pageViewData.php';</script>";
        }
        else
        {
            echo "window.location.href='pageLogin.php';</script>";
        }

        mysqli_close($conn);
    }
}
?>