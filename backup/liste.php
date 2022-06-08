<section class="container-searchbar">
        <form action="resultat.php" method="post">
            <h2>Recherche avancées</h2>
            <div class="searchbar-trend">
                <div class="searchbar-trend-loovre">
                    <legend>Tendance Loovre :</legend>
                    <div class="trend-input">
                        <label for="trend">Oui :</label>
                        <input type="radio" id="true" name="trend" value="oui"/>
                    </div>
                    <div class="trend-input">
                        <label for="trend">Non :</label>
                        <input type="radio" id="false" name="trend" value="non" checked/>
                    </div>
                </div>
                <div class="searchbar-destination">
                    <legend>Destination :</legend>
                    <div class="destination-input">
                        <label for="pays">Pays</label>
                        <input list="pays" id="place" name="pays" placeholder="Entrez un pays" />
                    </div>
                    <datalist id="pays">
                        <option value="France"></option>
                        <option value="Espagne"></option>
                    </datalist>
                    <div class="destination-input">
                        <label for="pays">Continent</label>
                        <input list="continent" id="place" name="continent" placeholder="Entrez un continent" />
                    </div>
                    <datalist id="continent">
                        <option value="Europe"></option>
                        <option value="Asie"></option>
                    </datalist>
                </div>
                <div class="searchbar-price-loovre">
                    <legend>Prix :</legend>
                    <div class="price-input">
                        <label for="trend">Minimum :</label>
                        <input type="number" id="minimum" name="price-minimum" placeholder="Prix minimum"/>
                    </div>
                    <div class="price-input">
                        <label for="trend">Maximum :</label>
                        <input type="number" id="maximum" name="price-maximum" placeholder="Prix maximum"/>
                    </div>
                </div>
                <div class="searchbar-agrement-loovre">
                    <div class="container-tag">
                        <div class="price-input">
                            <label for="tag">Etiquette :</label>
                            <input list="tag" id="agrement" name="tag"/>
                        </div>
                        <datalist id="tag">
                            <option value="Relax"></option>
                            <option value="Aventure"></option>
                        </datalist>
                        <div class="price-input">
                            <label for="sleep">Type de Couchage :</label>
                            <input list="sleep" id="agrement" name="sleep"/>
                        </div>
                        <datalist id="sleep">
                            <option value="Hotel"></option>
                            <option value="Villa"></option>
                        </datalist>
                    </div>
                    <div class="container-sleep">
                        <legend>Type de Couchage :</legend>
                        <div class="price-input">
                            <label for="trend">Oui :</label>
                            <input type="text" id="minimum" name="price" placeholder="Prix minimum"/>
                        </div>
                        <div class="price-input">
                            <label for="trend">Non :</label>
                            <input type="text" id="maximum" name="price" placeholder="Prix maximum"/>
                        </div>
                    </div>
                    <div class="container-sleep">
                        <div class="price-input">
                            <label for="trend">Vignette</label>
                            <input type="radio" id="card" name="display"/>
                        </div>
                        <div class="price-input">
                            <label for="trend">Liste</label>
                            <input type="radio" id="list" name="display"/>
                        </div>
                    </div>
                </div>
                <button type="submit" class="sublit-form-button">
                    <img src="./img/svg/search.svg" alt="Envoyer">
                </button>
            </div>
        </form>
    </section>
<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();


// // Connexion à la base de données
include('include/connexion.php');
	$pdo = connexion();

include('include/destination.php');
$destination = select_all_destination($pdo);

echo $twig->render('recherche.twig', [
	list_style($_POST["display"]) => 'display'
]);

request_select_sql($_POST["trend"], $_POST["pays"], $_POST["continent"], $_POST["price-minimum"], $_POST["price-maximum"], $_POST["tag"], $_POST["sleep"]);
// Récupération des données : exemples
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


// // Lancement du moteur Twig avec les données

