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

include('include/destination.php');
    $destination = delete_doublon( select_undefined(
            $pdo, "SELECT *, destination.id AS \"destid\" FROM destination
            INNER JOIN pays ON destination.id_pays = pays.id
            INNER JOIN etiqueter ON destination.id = etiqueter.id_table_destination
            INNER JOIN couchage ON destination.id_couchage = couchage.id
            INNER JOIN etiquette ON etiqueter.id_etiquette = etiquette.id ORDER BY tendance DESC"
            )
        );
    $etiqueter = select_etiquette_by_destination($pdo);
    $commentaires = select_number_comment($pdo);
    // $commentaires = strval($commentaires[0]["count_id"]); 
    // // On transforme le tableau en chaine de caracteres
    // var_dump(delete_doublon($destination));
// include('include/etiquette.php');
// var_dump($destination);
// On decide si la page va afficher le resultat sous forme de liste ou de vignettes

echo $twig->render('card.twig', [
    'destination' => $destination,
    'etiqueter' => $etiqueter,
	'count_tag' => $count_tag,
	'count_sleep' => $count_sleep,
	'count_pays' => $count_pays,
    'css' => './style/card.css'
]);


