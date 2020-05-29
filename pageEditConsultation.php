<?php
session_start();
include "navbar.php";
include "conn.php";

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

<?php
    $sqlConsult="SELECT * FROM consultation WHERE ID_consultation =".$_GET['id'];
    $resultConsult = mysqli_query($conn, $sqlConsult);
    $rowsConsult = mysqli_fetch_array($resultConsult);
?>

<div id="seeProfile">
    <h1>Modification de la consultation</h1>
    <form Method="post" action="<?php echo 'functionUpdateConsultation.php?id='.$_GET['id'] ?>" name="submit">
        <table>
            <?php
            include "conn.php";
                $sql="SELECT * FROM patient ORDER BY Nom";
                $result = mysqli_query($conn, $sql);
            ?>
            <tr>
                <?php echo "Nom du patient : "; ?>
                <select name="id">
                    <option value="Garder" selected="selected"> Ne pas changer </option>
                    <?php
                    while($rows = mysqli_fetch_array($result))
                    {
                        if ($rows['Nom'] != "La Psy")
                        {
                            ?>
                                <option value="<?php echo $rows['ID_patient'] ?>"> <?php echo $rows['Nom']." ".$rows['Prenom'];?> </option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </tr><br><br>
            <tr>
                Nature : <input class="inputRegister" type="text" name="nature" autocomplete="off" placeholder="<?php echo $rowsConsult['Nature'] ?>">
            </tr><br><br>
            <tr>
                Indicateur anxiété :
                <select class="inputRegister" type="text" name="anxiete">
                    <option value="Garder" selected="selected"> Ne pas changer </option>
                    <?php for ($i = 0; $i <= 10; $i++){ ?>
                        <option value="<?php echo $i ?>"> <?php echo $i; ?> </option>
                    <?php } ?>
                </select>
            </tr><br><br>
            <tr>
                Moyen de payement :
                <select class="inputRegister" type="text" name="methodePaiement">
                    <option value="Garder" selected="selected"> Ne pas changer </option>
                    <option value="Carte bleue"> Carte bleue </option>
                    <option value="Chèque"> Chèque </option>
                    <option value="Espèce"> Espèce </option>
                </select>
            </tr><br><br>
            <tr>
                Prix : <input class="inputRegister" autocomplete="off" type="number" name="prix" placeholder = "<?php echo $rowsConsult['Prix'] ?>"> <br><br>
            </tr>
            <tr>
                Commentaire sur la seance :
                <textarea class="inputRegister" autocomplete="off" name="commentaire" placeholder="<?php echo $rowsConsult['Commentaire'] ?>"></textarea>
            </tr><br><br>
        </table>
        <input class="button" type="submit" value="Valider">
    </form>

</div>

</body>

</html>