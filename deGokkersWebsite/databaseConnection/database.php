<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 21-3-2017
 * Time: 11:55
 */
/*
 * 1. DSN STRING <DATABASE:HOST=<HOST>;DBNAME=<DATABASE NAAM>
 * 2. USERNAME SQL = ROOT
 * 2.WACHTWOORD MYSQL ''.
 * */

$database = new PDO('mysql:host=localhost;dbname=brostrisch','root','');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

