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
	$datalist_etiquette = select_data_list_tag($pdo);
    $count_tag = select_count_tag($pdo);

include('include/destination.php');
    $destination = delete_doublon( select_undefined(
            $pdo, request_select_sql(
                str_value($_POST["trend"]),
                str_value($_POST["pays"]), 
                int_value($_POST["price-minimum"]), 
                int_value($_POST["price-maximum"]), 
                str_value($_POST["tag"]), 
                str_value($_POST["sleep"])
            ))
        );
    $etiqueter = select_etiquette_by_destination($pdo);
    $commentaires = select_number_comment($pdo);

if ($_POST["display"] == "card") {
    $generate = "card.twig";
    $css = './style/card.css';
}
else {
    $generate = "list.twig";
    $css = './style/list.css';
}

echo $twig->render($generate, [
    'destination' => $destination,
    'etiqueter' => $etiqueter,
    'commentaires' => $commentaires,
	'count_tag' => $count_tag,
    'count_sleep' => $count_sleep,
	'count_pays' => $count_pays,
    'css' => $css
]);

