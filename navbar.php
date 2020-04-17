<?php

    function navbar()
    {
        echo "<ul>";
        echo "<li><a href='pageHome.php'>Home</a></li>";
        echo "<li><a href='gameFamily.php'>Family Games</a></li>";
        echo "<li><a href='gameCard.php'>Card Game</a></li>";
        echo "<li><a href='gameRolePlay.php'>Role Play Games</a></li>";
        echo "<li><a href='gameStrategy.php'>Strategy</a></li>";


        if(! isset($_SESSION['username']))
        {
            echo "<li><a href='pageLogin.php'>Login</a></li>";
            echo "<li><a href='pageRegister.php'>Register</a></li>";
        }
        else if($_SESSION['role'] === "0")
        {
            echo "<li><a href='pageSeeProfile.php'>Profile</a></li>";
            echo "<li><a href='functionLogout.php'>Logout</a></li>";
        }
        else
        {
            echo "<li><a href='pageViewData.php'>View Data</a></li>";
            echo "<li><a href='managerAddItem.php'>Add new game</a></li>";
            echo "<li><a href='functionLogout.php'>Logout</a></li>";
        }

        echo "</ul>";
}
?>
