<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 21-3-2017
 * Time: 14:41
 */
require ('database.php');
$userEmail = $_POST['email'];
$userFirstName = $_POST['first_name'];
$userLastName = $_POST['last_name'];
$username = $_POST['username'];
$userPassword = $_POST['password'];


try {
    $sql = "INSERT INTO tbl_accounts (email, first_name, last_name, username, password) 
    VALUES ('$userEmail','$userFirstName','$userLastName','$username','$userPassword')";
    $database->query($sql);
}catch (PDOException $e)
{
    echo "connection failed" . $e->getMessage();
}




