<?php

// Initialise Twig
include('../include/twig.php');
$twig = init_twig();

// Connexion à la base de données
include('../include/connexion.php');
	$pdo = connexion();

include('../include/destination.php');
include('../include/etiquette.php');
include('../include/localisation.php');

$id = $_GET['id'];
if (isset($_GET['insert'])) {
	insert_tag($pdo, $id);
}
if ((((isset($_POST['action'])) && (isset($_GET['id'])) && (isset($_GET['tag']))))) {
	var_dump($_POST['action'] == 'Modifier');
	if ($_POST['action'] == 'Modifier') {
		$tag = $_GET['tag'];
		$post = 'tag'.$tag;
		var_dump(isset($_POST[$post]));
		$getTag = $_POST[$post];
		$tagID = select_id_tag($pdo, $getTag);
		update_tag($pdo, $id, $tagID[0]["id"], $_GET['id_tag']);

	}
	elseif ($_POST['action'] == 'Supprimer') {
		delete_tag($pdo, $_GET['id_tag'], $id);
	}
}
if ((isset($_GET['alter'])) && ($_GET['alter'] == "content")) {
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
}
header('Location: editing.php?edit='.$id);
