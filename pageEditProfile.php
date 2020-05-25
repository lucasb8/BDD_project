<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Edit Page</title>
    <link rel="stylesheet" href="cssEditProfile.css">
</head>

<body>
<div id="seeProfile">
    <h1>Edit profile</h1>

    <?php
    session_start();
    $uid = $_GET['id'];

    include("conn.php");

    $sql = "Select * from patient where ID_patient = $uid";

    $result = mysqli_query($conn, $sql);

    if($rows = mysqli_fetch_array($result))
    {
    ?>

    <form action="functionEditProfile?id=<?php echo $_GET['id']; ?>.php" method="post">
        <table style="text-align: left">
            <tr>
                Nom : <input class="input" type="text" value="<?php echo $rows['Nom'] ?>" name="nom" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Prénom : <input class="input" type="text" value="<?php echo $rows['Prenom'] ?>" name="prenom" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Catégorie Sociale : <input class="input" type="text" value="<?php echo $rows['Categorie_sociale'] ?>" name="categorie" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Email : <input class="input" type="email" name="email" value="<?php echo $rows['Email']; ?>" autocomplete="off"> <br><br>
            </tr>
            <tr>
                Moyen de Connaissance : <input class="input" type="tel" name="moyen" value="<?php echo $rows['Moyen_connaissance']; ?>"><br><br>
            </tr>

            <tr>
                <td> <input class="button" type="submit" value="Modifier"> </td>
                <?php
                    if($_SESSION['role'] == 0)
                    {
                        echo "<td> <input class=\"button\" type=\"submit\" value=\"Retour\" formaction=\"pageSeeProfile.php\"> </td>";
                    }
                    else
                    {
                        echo "<td> <input class=\"button\" type=\"submit\" value=\"Retour\" formaction=\"pageViewData.php\"> </td>";
                    }
                ?>

            </tr>
        </table>
    </form>
</div>

<?php
}
else
{
    die("<script>alert('Pas de patient trouvé');
            window.location.href='pageViewData.php'</script>");
}

?>

</body>
</center>
</html>