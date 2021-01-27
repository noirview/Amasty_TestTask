<?php

require_once './bootstrap.php';

$queen = new Queen(1, 1);
$king = new King(4, 3);

try { $queen->Move(7, 3); }
catch (Exception $e) { echo 'Ошибка: '.$e->getMessage().'\n'; }

try { $king->Move(2, 2); }
catch (Exception $e) { echo 'Ошибка: '.$e->getMessage().'\n'; }

var_dump($queen->getPosition());
var_dump($king->getPosition());