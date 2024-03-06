<?php

use pdo_poo\Database;

include 'banco.php';

$db = Database::getInstance();

$smtm = $db->prepare('select * from jogador;');
$smtm->execute();

print_r($smtm->fetchAll());