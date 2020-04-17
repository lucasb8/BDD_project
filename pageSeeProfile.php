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

<?php
// if don't have session user..then
if(! isset($_SESSION['username']))
{
    die("<script>alert('Please login first before proceed!');window.location.href=pageLogin.php;</script>");
}
?>

<header>
    <?php
        navbar();
    ?>
</header>

<div id="seeProfile">
    <h1>Here is your profile</h1>

    <?php
    include "conn.php";


    $sql="SELECT * FROM customer WHERE custUsername = '".$_SESSION['username']."'";
    $result = mysqli_query($conn, $sql);

    $rows = mysqli_fetch_array($result);

        echo "<a>"."Username : ".$rows['custUsername']."</a><br/><br/>";
        echo "<a>"."Password : ".$rows['custPassword']."</a><br/><br/>";
        echo "<a>"."Email : ".$rows['custEmail']."</a><br/><br/>";
        echo "<a>"."Phone Number : ".$rows['custPhone']."</a><br/><br/>";
        echo "<a>"."Mailing Address : ".$rows['custMailing']."</a><br/><br/>";
        echo "<a>"."Date of Birth : ".$rows['custDateOfBirth']."</a><br/><br/>";
        echo "<a class='button' href='pageEditProfile.php?id=".$rows['custID']."'>Edit</a>";

    ?>
</div>

<div class="rents">
    <h1>Your rents</h1>

    <?php

    $sql1 = "SELECT * FROM rent WHERE custID = '".$_SESSION['id']."'";
    $result1 = mysqli_query($conn, $sql1);

    while($rows = mysqli_fetch_array($result1)) {

        $sql2 = "SELECT gameName FROM game WHERE gameID = '".$rows['gameID']."'";
        $result2 = mysqli_query($conn, $sql2);
        $rows1 = mysqli_fetch_array($result2);

        echo "<br/><br/>";
        echo "<a>" . "Game Name : " . $rows1['gameName'] . "</a><br/><br/>";
        echo "<a>" . "Begin Date : " . $rows['beginDate'] . "</a><br/><br/>";
        echo "<a>" . "End Date : " . $rows['endDate'] . "</a><br/><br/>";
    }

    ?>
</div>
</body>

</html>