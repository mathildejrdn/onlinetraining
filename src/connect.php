<?php

const DBHOST = "db";
const DBNAME = "online";
const DBUSER = "online";
const DBPASS = "online_password";

$dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

try { //ici on essaie de se connecter
    $db = new PDO($dsn, DBUSER, DBPASS);
    // echo "connexion: success" . "<br>";
} catch(PDOException $error) {
    echo "connexion failed: " . $error->getMessage() . "<br>";
}
