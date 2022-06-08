<?php
// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Connexion à la base de données
include('include/connexion.php');
	$pdo = connexion();

include('include/destination.php');
    $destination = select_all_destination($pdo);

if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    delete_destination_ligne($pdo, $delete);
    header('Location: ./.edit.php');
}


echo $twig->render('edit.twig', [
    'destination' => $destination,
    'css' => './style/edit.css'
]);


