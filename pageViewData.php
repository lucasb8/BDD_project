<?php
session_start();
include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Read Data from Database</title>
    <link rel="stylesheet" href="cssViewData.css">
</head>

<body>

<header>
    <?php
    navbar();
    ?>
</header>

<div class="group">
    <h1>Recherche de patients :</h1>
    <form action="pageViewData.php" method="post">
        <input type="text" name="search_key" placeholder="Entrer un nom !" autocomplete="off"/>
        <input type="submit" value="Search" onclick=""/> <br/><br/>
    </form>

    <?php
    include "conn.php";

    $search_key = isset($_POST['search_key'])?
        $_POST['search_key']:'';

    $sql= "SELECT* FROM patient WHERE Nom LIKE '%".
        $search_key. "%' AND enregistre = 1";
    $result=mysqli_query($conn, $sql);

    $sql1= "SELECT* FROM patient WHERE Nom LIKE '%".
        $search_key. "%' AND enregistre = 0";
    $result1=mysqli_query($conn, $sql1);


    echo "<h2>Patients enregistrés</h2>";

    echo "<table border=\"1\" style=\"text-align: center\">";
        echo "<tr bgcolor='f08080'>";
        echo "<td>Nom</td>";
        echo "<td>Prénom</td>";
        echo "<td>Catégorie Sociale</td>";
        echo "<td>Email</td>";
        echo "<td>Moyen de connaissance</td>";
        echo "<td>Profession</td>";
        echo "<td>Editer</td>";
        echo "<td>Supprimer</td>";
        echo "</tr>";

        while($rows = mysqli_fetch_array($result))
        {
            $sql2= "SELECT * FROM profession WHERE ID_patient = '".$rows['ID_patient']."' ORDER BY Date DESC";
            $result2=mysqli_query($conn, $sql2);
            $rows2 = mysqli_fetch_array($result2);

            echo "<tr>";
                echo "<td>".$rows['Nom']."</td>";
                echo "<td>".$rows['Prenom']."</td>";
                echo "<td>".$rows['Categorie_sociale']."</td>";
                echo "<td>".$rows['Email']."</td>";
                echo "<td>".$rows['Moyen_connaissance']."</td>";
                echo "<td>".$rows2['Nom_profession']."</td>";
                echo "<td><a href='pageEditProfile.php?id=".$rows['ID_patient']."'><button>Editer</button></a></td>";
                echo "<td><a href='functionDeletePatient.php?id=".$rows['ID_patient']."'><button>Supprimer</button></a></td>";
            echo "</tr>";
        }
    echo "</table>";



    echo "<h2>Patients non enregistrés</h2>";

    echo "<table border=\"1\" style=\"text-align: center\">";
        echo "<tr bgcolor='f08080'>";
        echo "<td>Nom</td>";
        echo "<td>Prénom</td>";
        echo "<td>Catégorie Sociale</td>";
        echo "<td>Email</td>";
        echo "<td>Moyen de connaissance</td>";
        echo "<td>Profession</td>";
        echo "<td>Ajouter</td>";
        echo "<td>Supprimer</td>";
    echo "</tr>";

    while($rows1 = mysqli_fetch_array($result1))
    {
        $sql3= "SELECT * FROM profession WHERE ID_patient = '".$rows1['ID_patient']."' ORDER BY Date DESC";
        $result3=mysqli_query($conn, $sql3);
        $rows3 = mysqli_fetch_array($result3);

        echo "<tr>";
            echo "<td>".$rows1['Nom']."</td>";
            echo "<td>".$rows1['Prenom']."</td>";
            echo "<td>".$rows1['Categorie_sociale']."</td>";
            echo "<td>".$rows1['Email']."</td>";
            echo "<td>".$rows1['Moyen_connaissance']."</td>";
            echo "<td>".$rows3['Nom_profession']."</td>";
            echo "<td><a href='insert.php?ID=".$rows1['ID_patient']."'><button>Ajouter</button></a></td>";
            echo "<td><a href='functionDeletePatient.php?id=".$rows1['ID_patient']."'><button>Supprimer</button></a></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</div>





<div class="group">
    <h1>Toutes les consultations</h1>
    <form action="pageViewData.php" method="post">
        <input type="text" name="search_key" placeholder="Rechercher par nom !" autocomplete="off"/>
        <input type="submit" value="Search" onclick=""/> <br/><br/>
    </form>

    <table border="1" style="text-align: center">
        <tr bgcolor="#f08080">
            <th>Date</th>
            <th>Nom du patient</th>
            <th>Prénom du patient</th>
            <th>Nature</th>
            <th>Indicateur d'anxiété</th>
            <th>Prix</th>
            <th>Méthode de paiement</th>
            <th>Commentaires</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>


        <?php
        include("conn.php");
        
        $search_key = isset($_POST['search_key'])?
            $_POST['search_key']:'';

        $sql1 = "SELECT * FROM consultation c 
                    JOIN patient p ON c.ID_patient = p.ID_patient 
                    JOIN rendez_vous r ON c.ID_rendez_vous = r.ID_rendez_vous 
                WHERE Nom LIKE '%".$search_key."%'";

        $result1 = mysqli_query($conn, $sql1);

        while($rows1 = mysqli_fetch_array($result1))
        {
            echo "<tr>";
            echo "<td>".$rows1['Date']."</td>";
            echo "<td>".$rows1['Nom']."</td>";
            echo "<td>".$rows1['Prenom']."</td>";
            echo "<td>".$rows1['Nature']."</td>";
            echo "<td>".$rows1['Indicateur_anxiete']."</td>";
            echo "<td>".$rows1['Prix']."</td>";
            echo "<td>".$rows1['Methode_paiement']."</td>";
            echo "<td>".$rows1['Commentaire']."</td>";

            $id = $rows1['ID_consultation'];

            echo "<td><a href='pageEditConsultation.php?id=".$id."'><button>Editer</button></a></td>";
            echo "<td><a href='functionDeleteConsultation.php?id=".$id."'><button>Supprimer</button></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>





<div class="group">
    <h3>Ajouter un nouveau client :</h3>
    <form  action="insert.php" method="post">
        <table>
            <tr>
                Nom :<br><input class="inputRegister" type="text" name="nom" required="required" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Prénom :<br><input class="inputRegister" type="text" name="prenom" required="required" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Classification :
                <br><select class="inputRegister" type="text" name="categorie_sociale" required="required">
                    <option value="Homme"> Homme (age > 18 ans) </option>
                    <option value="Femme"> Femme (age > 18 ans) </option>
                    <option value="Adolescent"> Adolescent (13 ans < age < 17 ans) </option>
                    <option value="Enfant"> Enfant (age < 13 ans) </option>
                    <option value="Couple"> Couple </option>
                </select> <br><br>
            </tr>
            <tr>
                Adresse email :<br><input class="inputRegister" type="email" name="adresse_email" required="required" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Mot de passe :<br><input class="inputRegister" type="password" name="mot_de_passe" required="required" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Comment avez-vous entendu parler de moi ? :<br><input class="inputRegister" type="text" name="moyen_connaissance" required="required" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Quel est votre profession actuelle (Facultatif):<br><input class="inputRegister" type="text" name="profession" autocomplete="off"> <br><br>
            </tr>
        </table>
        <input class="button" type="submit" name="psyData" value="Valider">
        <input class="button" type="reset" name="Réinitailiser">
    </form>
</div>

</body>
</html>