<?php

session_start();

echo "<script>alert('Vous êtes bien déconnecté!".
    $_SESSION['username'] ." !')</script>";

session_destroy();

echo "<script>window.location.href='pageLogin.php'</script>";