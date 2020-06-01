<?php
session_start();
include "navbar.php";
include "conn.php";

if(! isset($_SESSION['nom']))
{
    echo "<script>alert('Je ne sais pas qui vous êtes, il faut se login ! !');</script>";
    echo "<script>window.location.href='index.php';</script>";
}
else if($_SESSION['role'] === "1")
{
    echo "<script>alert('Je suis la psy, je ne vais prendre un rendez-vous avec moi-même enfin !');</script>";
    echo "<script>window.location.href='pageSeeProfile.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prendre rendez-vous</title>
    <link rel="stylesheet" href="cssRegister.css">
</head>

<body class="background">

<header>
    <div id="nav">
        <?php
            navbar();
        ?>
</header>

<?php
    $currentDateTime = date('Y-m-d');
?>

<div id="boite_register">
    <h2>Quand voulez-vous me rencontrer ?</h2>
    <form  method="post" action="insertRDV.php" >
        <table>
            <tr>
                <p>Date : </p><input type="date" name="date" min="<?php echo $currentDateTime;?>" required="required"> <br><br>
            </tr>
            <tr>

                <form method="post">
                    <p>Heure : </p>
                    <select name="heure" id="heure">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                    </select>
                    <p>Minute : </p>
                    <select name="minute" id="minute">
                        <option value="00">00</option>
                        <option value="30">30</option>
                    </select>
                </form>
                <br><br>
            </tr>
            <tr>
                <br><br>
            </tr>
        </table>
        <input class="button" type="submit" value="Confirmer">
        &nbsp; &nbsp;<input class="button" type="reset" name="Reset">
    </form>
</div>

</body>
</html>