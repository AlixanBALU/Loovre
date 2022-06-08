<?php
function select_ligne_comm($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT * FROM commentaire
  WHERE id_destination = :id ORDER BY id DESC;';
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

// Compte le nombre de commentaires sans prendre en compte les réponses
function count_comm($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT COUNT(commentaire.id) AS "count_comm" FROM commentaire WHERE id_destination = :id AND id_commentaire IS NULL;';
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
  return $tableau[0]["count_comm"];
}

function select_avg_note($pdo, $id)
{
  // construction de la requête
  $sql = 'SELECT ROUND(AVG(note), 1) AS "avg_note" FROM commentaire WHERE id_destination = :id AND id_commentaire IS NULL;';
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
  return floatval($tableau[0]["avg_note"]);
}

function insert_comm($pdo, $id, $note, $pseudo, $date, $comment)
{
  // construction de la requête
  $sql = 'INSERT INTO commentaire (pseudo, texte, date_com, note, id_destination) VALUES (:pseudo, :comment, :date_com, :note, :id);';
  // préparation et exécution de la requête
  $query = $pdo->prepare($sql);
  $query->bindValue(':id',$id,PDO::PARAM_INT);
  $query->bindValue(':note',$note,PDO::PARAM_STR);
  $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
  $query->bindValue(':date_com',$date,PDO::PARAM_STR);
  $query->bindValue(':comment',$comment,PDO::PARAM_STR);  
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

function select_table_comm($pdo)
{
  // construction de la requête
  $sql = 'SELECT * FROM commentaire;';

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