<?php
function select_all_destination($pdo)
{
  // construction de la requête
  $sql = 'SELECT * FROM destination;';

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

function count_destination($pdo)
{
  // construction de la requête
  $sql = 'SELECT COUNT(id) AS "count_dest" FROM destination;';

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

function select_ligne_dest($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT * FROM destination 
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
  
  // renvoie le tableau
  return $tableau;
}

function actual_destination($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT nom FROM destination 
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
  
  // renvoie le tableau
  return $tableau;
}

function select_number_comment_by_id($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT nom FROM destination 
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
  
  // renvoie le tableau
  return $tableau;
}

function select_destination_filter($pdo, $sql)
{
  // construction de la requête
  $sql = 'SELECT * FROM destination';

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

// WHERE etiqueter.id_table_destination = :id;
function select_etiquette_by_destination($pdo)
{
  // construction de la requête
  $sql = 'SELECT * FROM etiquette 
  INNER JOIN etiqueter ON etiquette.id = etiqueter.id_etiquette;';

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

function select_number_comment($pdo)
{
  // construction de la requête
  $sql = 'SELECT id_destination, COUNT(commentaire.id) AS "count_id", destination.id FROM commentaire
  INNER JOIN destination ON commentaire.id_destination = destination.id;';

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

function request_select_sql($trend, $pays, $price_min, $price_max, $tag, $sleep) {
  $request = "SELECT *, destination.id AS \"destid\" FROM destination
  INNER JOIN pays ON destination.id_pays = pays.id
  INNER JOIN etiqueter ON destination.id = etiqueter.id_table_destination
  INNER JOIN couchage ON destination.id_couchage = couchage.id
  INNER JOIN etiquette ON etiqueter.id_etiquette = etiquette.id";
  $count = 0;
  if ($trend == "oui") {
      $request = $request.count_update($count);
      $request = $request." tendance >= 400";
      $count += 1;
  }
  if ($pays != null ) {
    $request = $request.count_update($count);
    $request = $request." pays.nom = \"".$pays."\"";
    $count += 1;
  }
  if (($price_min != null) || ($price_max != null)) {
    if (($price_min != null) && ($price_max != null)) {
      $request = $request.count_update($count);
      $request = $request." prix >= ".$price_min." AND prix <= ".$price_max;
      $count += 1;
    }
    elseif (($price_min != null) && ($price_max == null)) {
      $request = $request.count_update($count);
      $request = $request." prix >= ".$price_min;
      $count += 1;
    }
    elseif (($price_min == null) && ($price_max != null)) {
      $request = $request.count_update($count);
      $request = $request." prix <= ".$price_max;
      $count += 1;
    }
  }
  if ($tag != null) {
    $request = $request.count_update($count);
    $request = $request." etiquette.nom = \"".$tag."\"";
    $count += 1;
  }
  if ($sleep != null) {
    $request = $request.count_update($count);
    $request = $request." couchage.nom = \"".$sleep."\"";
    $count += 1;
  }
  return $request." ORDER BY destid;";
}

function count_update($count) {
  if ($count >= 1) {
    $add = " AND";
  }
  else {
    $add = " WHERE";
  }
  return $add;
}

function select_undefined($pdo, $request) {
  // préparation et exécution de la requête
  $query = $pdo->prepare($request);
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

// Fonction qui permet de supprimer les doublons potentiels
function delete_doublon($array) {
  error_reporting(E_ERROR | E_PARSE);
  $len = count($array);
  $compare = "";
  for ($i = 0; $i <= $len; $i++) {
    if (isset($array[$i]["destid"])) {
      if ($compare == $array[$i]["destid"]) {
        unset($array[$i]);
      }
      else {
        $compare = $array[$i]["destid"];
      }
    }
    else {
      break;
    }
  }
  return $array;
}

function delete_destination_ligne($pdo, $id)
{
  // construction de la requête
  $sql = 'DELETE FROM destination WHERE destination.id = :id;';
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
  
  // renvoie le tableau
  return $tableau;
}

function update_destination_ligne($pdo, $id, $image, $title, $desc, $price, $trend)
{
  // construction de la requête
  $sql = 'UPDATE destination SET image = :image, titre = :title, description = :desc, prix = :price, tendance = :trend WHERE id = :id;';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->bindValue(':image',$image,PDO::PARAM_STR);
  $query->bindValue(':title',$title,PDO::PARAM_STR);
  $query->bindValue(':desc',$desc,PDO::PARAM_STR);
  $query->bindValue(':price',$price,PDO::PARAM_INT);
  $query->bindValue(':trend',$trend,PDO::PARAM_INT);
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