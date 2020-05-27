<?php
session_start();
include "navbar.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Search Page</title>
    <link rel="stylesheet" href="cssEditProfile.css">
</head>

<body>

<header>
    <?php
    navbar();
    ?>
</header>

<div id="seeProfile">
    <h1>Modification de votre profil</h1>
    <?php
    include "conn.php";

    if($_SESSION['role'] == "0")
    {
        $sql="SELECT * FROM patient WHERE id_patient = '".$_SESSION['id']."'";
        $id = $_SESSION['id'];
    }
    else
    {
        $sql="SELECT * FROM patient WHERE id_patient = '".$_GET['id']."'";
        $id = $_GET['id'];
    }

    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_array($result);
    ?>

    <form  action="<?php echo 'functionUpdate.php?id='.$id ?>" method="post">
        <table>
            <tr>
                <?php
                echo "<a>"."Nom : ".$rows['Nom']."</a>";
                ?>
                <br><input class="inputRegister" placeholder = "Nouveau nom"  type="text" name="nom" autocomplete="off"> <br><br>
            </tr>
            <tr>
                <?php
                echo "<a>"."Catégorie Sociale : ".$rows['Categorie_sociale']."</a>";
                ?>
                <br><select class="inputRegister" type="text" name="categorie_sociale">
                    <option value="Garder" selected="selected"> Ne pas changer </option>
                    <option value="Homme"> Homme (age > 18 ans) </option>
                    <option value="Femme"> Femme (age > 18 ans) </option>
                    <option value="Adolescent"> Adolescent (13ans < age < 17 ans) </option>
                    <option value="Enfant"> Enfant (age < 13 ans) </option>
                    <option value="Couple"> Couple </option>
                </select> <br><br>
            </tr>
            <tr>
                <?php
                echo "<a>"."Email : ".$rows['Email']."</a>";
                ?>
                <br><input class="inputRegister" placeholder = "Nouveau mail" type="email" name="adresse_email" autocomplete="off"> <br><br>
            </tr>
        </table>
        <input class="button" type="submit" value="Valider">
    </form>
</div>

</body>

</html>