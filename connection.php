<?php

$dbuser = "root";
$dbpass = "";

try {
    $db = new PDO("mysql:host=localhost;dbname=login_sample_db",$dbuser,$dbpass);
} catch ( PDOException $e ){
    print $e->getMessage();
}