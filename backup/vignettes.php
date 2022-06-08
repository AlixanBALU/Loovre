<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Récupère les données GET sur l'URL
// if (isset($_GET['id'])) $id = $_GET['id']; else $id = 0;

// Grace a cette condition, on determine si le str est un nombre, si oui alors on le met en integer.
// if (is_numeric($id)) {
// 	$id = intval($id);
// }

// Connexion à la base de données
// include('include/connexion.php');
// 	$pdo = connexion();

// // Récupération des données : exemples
// include('include/editeurs.php');
// 	$editeurs = select_table($pdo);

// include('include/auteur.php');
// 	$auteurs = select_table_aut($pdo);

// include('include/livres.php');
// 	if ((gettype($id) == 'integer') || (gettype($id) == 'string')) {
// 		$livres = select_lignes_livres($pdo, $id);
// 	}
// 	else {
// 		$livres = select_table_livres($pdo);
// 	}



// Lancement du moteur Twig avec les données
echo $twig->render('recherche.twig', [
	// 'auteurs' => $auteurs,
	// 'livres' => $livres,
	// 'editeurs' => $editeurs,
	// 'id' => $id
]);
