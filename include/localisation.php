<?php
function select_ligne_localisation($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT pays.id, pays.nom AS "pays_nom", pays.chaleur, continent.nom AS "continent_nom" FROM pays
  INNER JOIN destination ON pays.id = destination.id_pays
  INNER JOIN continent ON pays.id_continent = continent.id
  WHERE destination.id = :id;';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }
  // Renvoie le tableau
  return $tableau;
}

function select_ligne_couchage($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT couchage.id, couchage.nom, couchage.svg FROM couchage
  INNER JOIN destination ON couchage.id = destination.id_couchage
  WHERE destination.id = :id;';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }
  // Renvoie le tableau
  return $tableau;
}

function select_data_list_pays($pdo) 
{
    // construction de la requête
    $sql = 'SELECT nom FROM pays;';
  
    // préparation et exécution de la requête
    $query = $pdo->prepare($sql);
    $query->execute();
  
    // vérification des erreurs
    if ($query->errorCode() == '00000') {
      // récupération des données dans un tableau
      $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
      echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
      $tableau = null;
    }
    // renvoie le tableau
    return $tableau;
}

function select_data_list_couchage($pdo) 
{
    // construction de la requête
    $sql = 'SELECT nom FROM couchage;';
  
    // préparation et exécution de la requête
    $query = $pdo->prepare($sql);
    $query->execute();
  
    // vérification des erreurs
    if ($query->errorCode() == '00000') {
      // récupération des données dans un tableau
      $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
      echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
      $tableau = null;
    }
    // renvoie le tableau
    return $tableau;
}

function select_nom_pays($pdo)
{
  // construction de la requête
  $sql = 'SELECT nom FROM pays;';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }

  // renvoie le tableau
  return $tableau;
}

function select_nom_couchage($pdo)
{
  // construction de la requête
  $sql = 'SELECT nom FROM couchage;';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }

  // renvoie le tableau
  return $tableau;
}

function update_pays($pdo, $id, $pays)
{
  // construction de la requête
  $sql = 'UPDATE destination SET id_pays = :pays WHERE id = :id';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->bindValue(':pays',$pays,PDO::PARAM_INT);
  $query->execute();
  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }
  
  // renvoie le tableau
  return $tableau;
}

function update_sleep($pdo, $id, $sleep)
{
  // construction de la requête
  $sql = 'UPDATE destination SET id_couchage = :sleep WHERE id = :id';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->bindValue(':sleep',$sleep,PDO::PARAM_INT);
  $query->execute();
  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }
  
  // renvoie le tableau
  return $tableau;
}

function select_id_country($pdo, $pays)
{
  // construction de la requête
  $sql = 'SELECT id FROM pays WHERE nom = :pays;';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':pays',$pays,PDO::PARAM_STR);
  $query->execute();
  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }
  
  // renvoie le tableau
  return $tableau;
}

function select_id_sleep($pdo, $couchage)
{
  // construction de la requête
  $sql = 'SELECT id FROM couchage WHERE nom = :couchage;';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':couchage',$couchage,PDO::PARAM_STR);
  $query->execute();
  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }
  
  // renvoie le tableau
  return $tableau;
}

function select_count_sleep($pdo)
{
  // construction de la requête
  $sql = 'SELECT couchage.nom, COUNT(couchage.nom) AS "count_sleep" FROM couchage 
  INNER JOIN destination ON couchage.id = destination.id_couchage 
  GROUP BY couchage.nom ORDER BY count_sleep DESC, couchage.nom ASC;';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }

  // renvoie le tableau
  return $tableau;
}

function select_count_pays($pdo)
{
  // construction de la requête
  $sql = 'SELECT pays.nom, COUNT(pays.nom) AS "count_pays" FROM pays 
  INNER JOIN destination ON pays.id = destination.id_pays
  GROUP BY pays.nom ORDER BY count_pays DESC, pays.nom ASC;';

  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->execute();

  // vérification des erreurs
  if ($query->errorCode() == '00000') {
    // récupération des données dans un tableau
    $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
    $tableau = null;
  }

  // renvoie le tableau
  return $tableau;
}


