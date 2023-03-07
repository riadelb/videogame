<?php
include './config.php';
    global $connection;
  // ON RECUPERE TOUT DE LA TABLE JEU
    $res = $connection->query('SELECT * FROM jeu');
  //ON RECUPERE LABEL DE LA TABLE CONSOLE
    $detail = $connection->query('SELECT label FROM console');


?>