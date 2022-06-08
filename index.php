<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();
$css = "./style/accueil.css";

// Connexion à la base de données
include('include/connexion.php');
	$pdo = connexion();

include('include/populaire.php');
	$popular = select_popular($pdo);

include('include/destination.php');
	$count_dest = count_destination($pdo);
// Lancement du moteur Twig avec les données
echo $twig->render('main.twig', [
	'css' => $css,
	'popular' => $popular,
	'count_dest' => $count_dest[0]["count_dest"]
]);