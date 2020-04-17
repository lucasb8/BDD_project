<?php

include("conn.php");

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['emailAddress'];
$phone = $_POST['phoneNumber'];
$mailing = $_POST['mailingAddress'];
$dateOfBirth = $_POST['dateOfBirth'];
$role = 0;

$sql1 = new mysqli("localhost", "root", "", "webprojects5");
$result = $sql1->query("SELECT * FROM customer WHERE custEmail = '".$email."'");
if($result->num_rows > 0)
{
    echo '<script>alert("This email is already used");';
    echo "window.location.href='pageRegister.php';</script>";
    mysqli_close($conn);
}
else
{
    $sql = "INSERT INTO customer(custUsername, custPassword, custEmail, custPhone, custMailing, custDateOfBirth, role)
            VALUES
            ('$username', '" . md5($password) . "', '$email', '$phone', '$mailing', '$dateOfBirth', '$role')";


    if (!mysqli_query($conn, $sql)) {
        die("Error : " . mysqli_error($conn));
    }

    echo '<script>alert("1 customer added!");';
    echo "window.location.href='pageLogin.php';</script>";
    mysqli_close($conn);
}
