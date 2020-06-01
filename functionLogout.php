<?php

session_start();
	
echo "<script>alert('Vous êtes bien déconnecté!')</script>";
session_destroy();

echo "<script>window.location.href='index.php'</script>";