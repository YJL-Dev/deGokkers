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

if (strlen($userFirstName)> 1)
{
    if (strlen($userLastName) > 1)
    {
        if (strlen($userName) > 1)
        {
            $sql = "SELECT username FROM tbl_accounts WHERE username = '$userName'";
            $sth = $database->prepare($sql);
            $sth->execute();
            $count = $sth->rowCount();
            if ($count > 0)
            {
                $message = "Register failed! Username is used!";
                header("location: ../public/index.php?message=$message");
            }
            else{

                if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) == false)
                {
                    $sql = "SELECT email FROM tbl_accounts WHERE email = '$userEmail'";
                    $sth = $database->prepare($sql);
                    $sth->execute();
                    $count = $sth->rowCount();
                    if ($count > 0)
                    {
                        $message = "Register failed! Email is used!";
                        header("location: ../public/index.php?message=$message");
                    }
                    else
                    {
                        if(
                            // ik heb dit van http://stackoverflow.com/questions/5576160/checking-a-password-for-upper-lower-numbers-and-symbols

                            ctype_alnum($userPassword) // numbers & digits only
                            && strlen($userPassword)>6 // at least 7 chars
                            && preg_match('`[A-Z]`',$userPassword) // at least one upper case
                            && preg_match('`[a-z]`',$userPassword) // at least one lower case
                            && preg_match('`[0-9]`',$userPassword) // at least one digit
                        )
                        {
                            try {
                                $passwordHash = hash('ripemd160', $userPassword);
                                
                                $sql = "INSERT INTO tbl_accounts (email, first_name, last_name, username, password) VALUES ('$userEmail','$userFirstName','$userLastName','$userName','$passwordHash')";
                                $database->query($sql);
                                $sth = $database->prepare($sql);
                                $count = $sth->rowCount();
                                $sendEmail = 1;
                                
                                if ($sendEmail === 1)
                                {
                                	$to      = $userEmail;
									$subject = 'Activation';
									$message = "Thanks for registering $userName! Here is your account activation link: http://brostrisch.ddns.net/app/verify.php?username=$userName";
									$headers = 'From: brostrisch@supp.nl' . "\r\n" .
									    'Reply-To: brostrisch@supp.nl' . "\r\n" .
									    'X-Mailer: PHP/' . phpversion();
									if (mail($to, $subject, $message, $headers))
									{
									    $messageRegister = "Register succeeded! Activate your account by clicking the activation link in your mail.";
									    header("location: ../public/index.php?message=$messageRegister");
									}
									else
									{
									    $messageRegister = "Register failed! Something is going wrong...";
									    header("location: ../public/index.php?message=$messageRegister");
									}
                                }
                                else
                                {		$messageRegister = "Something is going wrong... Try again!";
									    header("location: ../public/index.php?message=$messageRegister");
                                }
                            }
                            catch (PDOException $e)
                            {
                                echo "connection failed" . $e->getMessage();
                            }
                        }
                        else
                        {
                            $messageRegister = "Register failed! Password needs to be a minimum of 7 characters with 1 digit and 1 uppercase character!";
                            header("location: ../public/index.php?message=$messageRegister");
                        }
                    }
                }
                else {
                    $messageRegister = "Register failed! Not a valid Email!";
                    header("location: ../public/index.php?message=$messageRegister");
                }
            }
        }
        else
        {
            $messageRegister = "Register failed! Username must be at least 2 characters!";
            header("location: ../public/index.php?message=$messageRegister");
        }
    }
    else
    {
        $messageRegister = "Register failed! Last name must be at least 2 characters!";
        header("location: ../public/index.php?message=$messageRegister");
    }
}
else{
        $messageRegister = "Register failed! First name must be at least 2 characters!";
        header("location: ../public/index.php?message=$messageRegister");
    }