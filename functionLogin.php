<?php

session_start();
include "conn.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "Select * from customer where custUsername = '".$email."'
and custPassword = '".md5($password)."'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)<=0)
{
    $sql = "Select * from customer where custEmail = '".$email."'
and custPassword = '".md5($password)."'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)<=0)
    {
        echo "<script>alert('Wrong email / password ! Please Try Again!');</script>";
        die("<script>window.history.go(-1);</script>");
    }
}

if($row=mysqli_fetch_array($result))
{
    $_SESSION['id'] = $row['custID'];
    $_SESSION['username'] = $row['custUsername'];
    $_SESSION['password'] = $row['custPassword'];
    $_SESSION['role'] = $row['role'];
}

if($_SESSION['role'] === "0")
{
    echo "<script>alert('Welcome back ! ".$_SESSION['username']."');";
    echo "window.location.href='pageHome.php';</script>";
}
else if($_SESSION['role'] === "1")
{
    echo "<script>alert('Welcome back ! Admin ".$_SESSION['username']."');";
    echo "window.location.href='pageHome.php';</script>";
}