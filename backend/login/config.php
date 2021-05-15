<?php
// $DB_serveur = 'localhost'; // Nom du serveur
// $DB_utilisateur = 'admin'; // Nom de l'utilisateur de la base
// $DB_motdepasse = 'Cmqm&sn974'; // Mot de passe pour accèder à la base
// $DB_base = 'user'; // Nom de la base

// $connection = mysql_connect($DB_serveur, $DB_utilisateur, $DB_motdepasse) // On se connecte au serveur
// or die (mysql_error().' sur la ligne '.__LINE__);

// mysql_select_db($DB_base, $connection) // On se connecte à la BDD
// or die (mysql_error().' sur la ligne '.__LINE__);
?>

<?php 
try {
  $db = new PDO('mysql:host=localhost;dbname=users;charset=utf8mb4', 'admin', 'Cmqm&sn974');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
} catch (PDOException $e) {
  echo "Connection échouée : ". $e->getMessage();
}
?>