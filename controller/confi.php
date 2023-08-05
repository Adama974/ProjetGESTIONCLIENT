<?php

// Informations d'identification
define('DB_SERVER', 'mysql-projetgestionclientele.alwaysdata.net');
define('DB_USERNAME', '323101_adama');
define('DB_PASSWORD', 'mbaye@7112A');
define('DB_NAME', 'projetgestionclientele_sql');
 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
session_start();
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}