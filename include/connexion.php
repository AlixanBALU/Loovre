<?php

function connexion()
{
  $pdo = new PDO('mysql:host=localhost;dbname=loovre;charset=utf8', 'balu_loovre', 'AL!x4nb_0');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

  if ($pdo) {
    return $pdo;
  } else {
    echo '<p>Erreur de connexion</p>';
    exit;
  }
}



  