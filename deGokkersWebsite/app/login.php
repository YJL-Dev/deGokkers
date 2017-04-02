<?php

require ("database.php");

$usernameLogin = $_POST['usernameLogin'];
$passwordLogin = $_POST['passwordLogin'];

$sql = "SELECT username FROM tbl_accounts WHERE username = '$usernameLogin'";
$sth = $database->prepare($sql);
$sth->execute();
$count = $sth->rowCount();

if ($count > 0)
{
    $passwordHash = hash('ripemd160', $passwordLogin);
    $sql = "SELECT password FROM tbl_accounts WHERE password = '$passwordHash'";
    $sth = $database->prepare($sql);
    $sth->execute();
    $count = $sth->rowCount();

    if ($count > 0)
    {
        session_start();
        $_SESSION['user'] = $usernameLogin;

        $message = "Login Succesvol!";
        header("location: ../public/index.php?message=$message");
    }
    else{
        $message = "Wrong password or username!";
        header("location: ../public/index.php?message=$message");
    }
}
else{
    $message = "Account doesn't exits!";
    header("location: ../public/index.php?message=$message");
}