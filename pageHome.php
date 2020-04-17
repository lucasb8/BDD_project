<?php
    session_start();
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RentPlay</title>
    <link rel="stylesheet" href="cssHomePage.css">


    <style>
        .mySlides {display:none;}
    </style>
</head>


<body class="background">

<<header>
    <?php
    navbar();
    ?>
</header>

<body>

    <div class="background" id="background1">

        <h1> Welcome to BoardGameRenter ! </h1>

        <p>Our objectiv is to be sure you can easily access to any kind of board games.</p>
        <p>So, in this website, you will be able to rent games of our collection. <br> You can choose games to rent many different types of games.</p> <br>

        <h3> Family Games </h3>
        <h3> Card Games </h3>
        <h3> Role Play Games </h3>
        <h3> Strategic Games </h3>

        <p>Enjoy your moment in our site !</p>
    </div>

    <div class="background" id="background2">

        <h1> Feel free to rent board games </h1>

        <p> An easy way to rent board games :</p><br>
        <p> Search the game you love in our different catalogs.</p>
        <p> Once you find it, just click on rent.</p>
        <p> Choose the time of your rent (Begin and End dates)</p><br>

        <p> Finally just confirm your rent, and it's done !</p>
        <p> You will then be able to collect your game in our shop.</p><br>

        <p>You can  also check your rents on your profile page.</p>

    </div>

    <div class="background" id="background3">

        <h1> Create your account to join the family ! </h1>

        <p> Fill your username in order to be create your account</p><br>

        <p> Fill your email to receive newsletters</p>
        <p> and also news about our new games !</p> <br>

        <p> Fill your mailing address to receive your games at home</p><br>

        <p> Finally, fill your phone number to help us contact you quickly</p>
        <p> if we have new information concerning your rents</p><br>

        <p> Then, be free to enjoy board game's universe !!</p>

    </div>

</body>
</html>