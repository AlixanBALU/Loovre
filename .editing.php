<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Connexion à la base de données
include('include/connexion.php');
	$pdo = connexion();


if (isset($_GET['edit'])) {
    $id = int_value($_GET['edit']);
}
else {
	header('Location: .edit.php');
}

//On les place ici pour les condition ci-dessous
include('include/destination.php');
include('include/etiquette.php');
include('include/localisation.php');
// De destination.php
	$destination = select_ligne_dest($pdo, $id);

// De etiquette.php
	$etiquette = select_ligne_tag($pdo, $id);		
	$data_etiquette = select_data_list_tag($pdo);

// De localisation.php
	$localisation = select_ligne_localisation($pdo, $id);
	$couchage = select_ligne_couchage($pdo, $id);
	$data_pays = select_nom_pays($pdo);
	$data_couchage = select_nom_couchage($pdo);

echo $twig->render('editing.twig', [
	'destination' => $destination,
	'localisation' => $localisation,
	'couchage' => $couchage,
	'etiquette' => $etiquette,
	'data_etiquette' => $data_etiquette,
	'data_pays' => $data_pays,
	'data_couchage' => $data_couchage,
	'data_tag' => $data_etiquette,
	'css' => './style/editing.css'
]);