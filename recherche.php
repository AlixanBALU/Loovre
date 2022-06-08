<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();


// Connexion à la base de données
include('include/connexion.php');
	$pdo = connexion();

include('include/localisation.php');
	$count_sleep = select_count_sleep($pdo);
	$count_pays = select_count_pays($pdo);

include('include/etiquette.php');
	$count_tag = select_count_tag($pdo);

include('include/populaire.php');
	$popular = select_popular($pdo);

echo $twig->render('recherche.twig', [
	'popular' => $popular,
	'count_tag' => $count_tag,
	'count_sleep' => $count_sleep,
	'count_pays' => $count_pays,
	'css' => "./style/recherche.css"
]);
