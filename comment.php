<?php
// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Connexion à la base de données
include('include/connexion.php');
	$pdo = connexion();

if (isset($_POST['id'])) {
	$id = int_value($_POST['id']);
}
include('include/commentaire.php');
include('include/destination.php');
    if (isset($_POST['id'])) {
        $destination = select_ligne_dest($pdo, $id);
        $destination_all = select_all_destination($pdo);
        $commentaire = select_ligne_comm($pdo, $id);
    }
    else {
        $destination = select_all_destination($pdo);
        $commentaire = select_table_comm($pdo);
    }

    $etiqueter = select_etiquette_by_destination($pdo);

include('include/populaire.php');
	$popular = select_popular($pdo);

if (isset($_POST['id'])) {
    echo $twig->render('comment.twig', [
        'id' => $id,
        'etiqueter' => $etiqueter,
        'commentaire' => $commentaire,
        'destination' => $destination,
        'destination_all' => $destination_all,
        'popular' => $popular,
        'css' => './style/commentaires.css'
    ]);
}
else {
    echo $twig->render('comment.twig', [
        'etiqueter' => $etiqueter,
        'commentaire' => $commentaire,
        'destination' => $destination,
        'popular' => $popular,
        'css' => './style/commentaires.css'
    ]);
}