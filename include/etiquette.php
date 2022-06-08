<?php
function select_ligne_tag($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT id, nom, svg FROM etiqueter
  INNER JOIN etiquette ON etiqueter.id_etiquette = etiquette.id
  WHERE etiqueter.id_table_destination = :id;';
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

function select_data_list_tag($pdo)
{
  // construction de la requête
  $sql = 'SELECT nom FROM etiquette;';

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

function select_id_actual_tag($pdo, $getTag1)
{
  // construction de la requête
  $sql = 'SELECT id FROM etiquette
  WHERE etiquette.nom = :tag;';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':tag',$getTag1,PDO::PARAM_STR);
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

function select_id_tag($pdo, $getTag1)
{
  // construction de la requête
  $sql = 'SELECT id FROM etiquette
  WHERE etiquette.nom = :tag;';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':tag',$getTag1,PDO::PARAM_STR);
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


function update_tag($pdo, $id, $tag, $actual_tag)
{
  // construction de la requête
  $sql = 'UPDATE etiqueter SET id_etiquette = :tag WHERE id_etiquette = :actual_tag AND id_table_destination = :id LIMIT 1;';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->bindValue(':tag',$tag,PDO::PARAM_STR);
  $query->bindValue(':actual_tag',$actual_tag,PDO::PARAM_STR);
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

function insert_tag($pdo, $id)
{
  // construction de la requête
  $sql = 'INSERT INTO etiqueter (id_etiquette, id_table_destination) VALUES (1, :id);';
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

function delete_tag($pdo, $actual, $destination)
{
  // construction de la requête
  $sql = 'DELETE FROM etiqueter WHERE id_etiquette = :actual AND id_table_destination = :destination LIMIT 1;';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':actual',$actual,PDO::PARAM_STR);
  $query->bindValue(':destination',$destination,PDO::PARAM_STR);
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

function select_count_tag($pdo)
{
  // construction de la requête
  $sql = 'SELECT etiquette.nom, COUNT(id_etiquette) AS "count_tag" FROM etiquette 
  INNER JOIN etiqueter ON etiquette.id = etiqueter.id_etiquette 
  GROUP BY etiquette.nom ORDER BY count_tag DESC, etiquette.nom ASC;';

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

// Fonction qui permet de mettre la longuer de etiquette a 3
// function is_enough($array) {
//     for ($i = 0; $i <= 10-1; $i++) {
//       if (!isset($array[$i])) {
//         $array[$i]['nom'] = "";
//       }
//     }
//   return $array;
// }

