<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();


//On récupere l'id
if (isset($_GET['id'])) {
	$id = int_value($_GET['id']); 
}
elseif (($_GET['id'] == null) || (is_numeric($_GET['id']) == false)) {
	// Erreur 404
	header('Location: erreur 404');
}

// Connexion à la base de données
include('include/connexion.php');
	$pdo = connexion();

include('include/destination.php');
	$destination = select_ligne_dest($pdo, $id);

include('include/etiquette.php');
	$etiquette = select_ligne_tag($pdo, $id);

include('include/localisation.php');
	$localisation = select_ligne_localisation($pdo, $id);
	$couchage = select_ligne_couchage($pdo, $id);

include('include/commentaire.php');
	$commentaire = select_ligne_comm($pdo, $id);
	$count_comm = count_comm($pdo, $id);
	$avg_note = select_avg_note($pdo, $id);
	
if ((isset($_POST["stars"]) && (isset($_POST["pseudo"])) && (isset($_POST["comment"])))) {
	$note = int_value($_POST["stars"]);
	$date = date('Y-m-d');
	insert_comm($pdo, $id, $note, str_value($_POST["pseudo"]), $date, str_value($_POST["comment"]));
	header('Location: detail.php?id='.$id);	
}

include('include/populaire.php');
	$popular = select_popular($pdo);

echo $twig->render('detail.twig', [
	'destination' => $destination,
	'etiquette' => $etiquette,
	'localisation' => $localisation,
	'couchage' => $couchage,
	'commentaire' => $commentaire,
	'count_comm' => $count_comm,
	'avg_note' => $avg_note,
	'popular' => $popular,
	'css' => './style/detail.css'
]);

