<?php

$database = new PDO('mysql:host=84.26.202.94;dbname=brostrisch', 'root', 'anime');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);