<?php

require ("database.php");

$usernameLogin = $_POST['usernameLogin'];
$passwordLogin = $_POST['passwordLogin'];

$sql = "SELECT username FROM tbl_accounts WHERE username = '$usernameLogin'";
$sth = $database->prepare($sql);
$sth->execute();
$count = $sth->rowCount();

if(!isset($usernameLogin) || trim($usernameLogin) == '')
{
    $message = " Login failed! You did not fill out the username field!";
    header("location: ../public/index.php?message=$message");
}
else
{
    if(!isset($passwordLogin) || trim($passwordLogin) == '')
    {
        $message = "Login failed! You did not fill out the password field!";
        header("location: ../public/index.php?message=$message");
    }
    else{
        if ($count > 0)
        {
            $sql = "SELECT `username` FROM tbl_accounts WHERE username= '$usernameLogin' AND `activated` = 1";
            $sth = $database->prepare($sql);
            $sth->execute();
            $count = $sth->rowCount();
            if ($count > 0)
            {
                $passwordHash = hash('ripemd160', $passwordLogin);
                $sql = "SELECT password FROM tbl_accounts WHERE password = '$passwordHash' AND `activated` = 1";
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
                    $message = "Login failed! Wrong password!";
                    header("location: ../public/index.php?message=$message");
                }
            }
            else{
                $message = "Login failed! Check email for activation!";
                header("location: ../public/index.php?message=$message");
            }
        }
        else{
            $message = "Login failed! Account doesn't exits!";
            header("location: ../public/index.php?message=$message");
        }
    }
}
