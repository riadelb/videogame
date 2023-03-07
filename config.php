<?php

const DB_HOST = 'database';
const DB_USER = 'admin';
const DB_PASS = 'admin';
const DB_NAME = 'video-games';
// on etablie la connexion
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// on verifie la connexion

if(!$connection){
    die('error: '. mysqli_connect_error());
}
// echo 'connexion réussi';

mysqli_query($connection, "SET NAMES UTF8");
?>