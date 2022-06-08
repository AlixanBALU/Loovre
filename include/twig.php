<?php
require_once('vendor/autoload.php');

// Fonction qui permet d'initialiser Twig en fixant le dossier des modèles
function init_twig()
{
    // Indique le répertoire ou sont placés les modèles (templates)
    $loader = new \Twig\Loader\FilesystemLoader('templates');

    // Crée un nouveau moteur Twig
    $twig = new \Twig\Environment($loader, ['debug' => true]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());

    // Renvoie le moteur
    return $twig;
}

function list_style($list) {
    if ($list == "on") {
        $return = "card";
    }
    else {
        $return = "list";
    }
    return $return;
}

//Renvoie une valeur testée et filtrée de type "integer" pour securiser notre page
function int_value($int) {
    if (((isset($int)) && ($int != null)) && (is_numeric($int))) {
      $int = intval($int);
      return $int;
    }
    else {
      return 0;
    }
  }
  
  //Renvoie une valeur testée et filtrée de type "integer" pour securiser notre page
  function str_value($str) {
    if ((isset($str)) && ($str != null)) {
      $str = strip_tags($str);
      $str = htmlspecialchars($str);
      return $str;
    }
    else {
      return "";
    }
  }