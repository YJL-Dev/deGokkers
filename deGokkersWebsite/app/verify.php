<?php
require 'database.php';
if (isset($_GET['username']))
{
    $username = $_GET['username'];
}
else{
    header("location:../index.php");
}

$sql = "UPDATE `tbl_accounts` SET `activated` = 1 WHERE `username` = '$username'";
$database->query($sql);
header("location:../index.php");