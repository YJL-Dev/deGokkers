<?php

require('database.php');

$userEmail = $_POST['email'];
$userFirstName = $_POST['first_name'];
$userLastName = $_POST['last_name'];
$userName = $_POST['username'];
$userPassword = $_POST['password'];

$userEmail = preg_replace('/\s+/', '', $userEmail);
$userFirstName = preg_replace('/\s+/', '', $userFirstName);
$userLastName = preg_replace('/\s+/', '', $userLastName);
$userName = preg_replace('/\s+/', '', $userName);
$userPassword = preg_replace('/\s+/', '', $userPassword);

if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) === false) {

    if(
        // ik heb dit van http://stackoverflow.com/questions/5576160/checking-a-password-for-upper-lower-numbers-and-symbols

        ctype_alnum($userPassword) // numbers & digits only
        && strlen($userPassword)>6 // at least 7 chars
        && preg_match('`[A-Z]`',$userPassword) // at least one upper case
        && preg_match('`[a-z]`',$userPassword) // at least one lower case
        && preg_match('`[0-9]`',$userPassword) // at least one digit
        && preg_match('`[0-9]`',$userPassword) // at least one digit
    )
    {
        try {
            $passwordHash = hash('ripemd160', $userPassword);
            $sql = "INSERT INTO tbl_accounts (email, first_name, last_name, username, password) 
        VALUES ('$userEmail','$userFirstName','$userLastName','$userName','$passwordHash')";
            $database->query($sql);
        }catch (PDOException $e)
        {
            echo "connection failed" . $e->getMessage();
        }
        $message = "Thanks for your subscribe!";
        header("location: ../public/index.php?message=$message");
    }
    else
    {
        $message = "Password needs to be a minimum of 7 characters with 2 digits and 1 uppercase character!";
        header("location: ../public/index.php?message=$message");
    }
} else {
    $message = "Not a valid Email!";
    header("location: ../public/index.php?message=$message");
}