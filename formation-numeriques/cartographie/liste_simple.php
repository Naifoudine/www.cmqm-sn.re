<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$db_name = "cartographie";
$username = "admin";
$password = "Cmqm&sn974";
try{
    $db = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
    $db->exec("set names utf8");
}catch(PDOException $exception){
    echo "Erreur de connexion : " . $exception->getMessage();
}

$sql = "SELECT * FROM `etablissement` inner join marqueur ON etablissement.idEtablissement_Etablissement = marqueur.idEtablissement_Etablissement";

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

while($row = $query->fetch(PDO::FETCH_ASSOC)){
    extract($row);

    $etab = [
        "idEtablissement" => $idEtablissement_Etablissement,
        "nomEtablissement" => $nomEtablissement_Etablissement,
        "adresse" => $adresse_Etablissement,
        "ville" => $ville_Etablissement,
        "codep" => $codep_Etablissement,
        "lat" => $lat,
        "lng" => $lng

        // "lat" => $lat,
        // "lon" => $lon,
    ];

    $tableauEtablissements['etablissements'][] = $etab;
}

// On encode en json et on envoie
echo json_encode($tableauEtablissements);