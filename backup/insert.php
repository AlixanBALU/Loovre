<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Connexion à la base de données
include('include/connexion.php');
	$pdo = connexion();


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
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

//On récupere l'id
if (isset($_GET['edit'])) {
	if ((isset($_GET['update']) && ($_GET['update'] == true ))) {
		$modifyImage = $_POST['image'];
		$modifyTitle = $_POST['title'];
		$modifyDescription = $_POST['description'];
		$modifyPrice = $_POST['price'];
		$modifyPrice = intval($modifyPrice);
		$modifyTrend = $_POST['trend'];
		$modifyTrend = intval($modifyTrend);
		update_destination_ligne($pdo, $id, $modifyImage, $modifyTitle, $modifyDescription, $modifyPrice, $modifyTrend);
		$modifyPays = $_POST['pays'];
		$paysID = select_id_country($pdo, $modifyPays);
		update_pays($pdo, $id, $paysID[0]["id"]);
		$modifySleep = $_POST['sleep'];
		$sleepID = select_id_sleep($pdo, $modifySleep);
		update_sleep($pdo, $id, $sleepID[0]["id"]);
		$getTag1 = $_POST['tag1'];
		$getTag2 = $_POST['tag2'];
		$getTag3 = $_POST['tag3'];
		// Etiquette n°1
		if (isset($etiquette[0]["nom"])) {
			$tag1ID = select_id_tag($pdo, $getTag1);
			$tag1IDActual = select_id_tag($pdo, $etiquette[0]["nom"]);
			update_tag($pdo, $id, $tag1ID[0]["id"], $tag1IDActual[0]["id"]);
		}
		else {
			$tag1ID = select_id_tag($pdo, $getTag1);
			insert_tag($pdo, $tag1ID[0]["id"], $destination[0]["id"]);
		}
		// Etiquette n°2
		if (isset($etiquette[1]["nom"])) {
			$tag2ID = select_id_tag($pdo, $getTag2);
			$tag2IDActual = select_id_tag($pdo, $etiquette[1]["nom"]);
			update_tag($pdo, $id, $tag2ID[0]["id"], $tag2IDActual[0]["id"]);
		}
		else {
			$tag2ID = select_id_tag($pdo, $getTag2);
			insert_tag($pdo, $tag2ID[0]["id"], $destination[0]["id"]);
		}
		// Etiquette n°3
		if (isset($etiquette[2]["nom"])) {
			$tag3ID = select_id_tag($pdo, $getTag3);
			$tag3IDActual = select_id_tag($pdo, $etiquette[2]["nom"]);
			update_tag($pdo, $id, $tag3ID[0]["id"], $tag3IDActual[0]["id"]);
		}
		else {
			$tag3ID = select_id_tag($pdo, $getTag3);
			insert_tag($pdo, $tag3ID[0]["id"], $destination[0]["id"]);
		}
		header('Location: .edit.php');
	}
}
else {
	// header('Location: .edit.php');
}





echo $twig->render('insert.twig', [
	'destination' => $destination,
	'localisation' => $localisation,
	'couchage' => $couchage,
	'etiquette' => is_enough($etiquette),
	'data_etiquette' => $data_etiquette,
	'data_pays' => $data_pays,
	'data_couchage' => $data_couchage,
	'data_tag' => $data_etiquette
]);

// $etiquette = is_enough($etiquette);