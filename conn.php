<?php

$conn=mysqli_connect("localhost","root","","bdd_project");

//check connection
if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: ".mysqli_error();
}
