<?php

try{
    $pdo=new PDO("mysql:host=localhost;dbname=cartographie","admin","Cmqm&sn974", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}
$etab = isset($_GET[ 'etab' ]) ? $_GET[ 'etab' ] : false; 

if ($etab) {

    $query =  $pdo->query("select * FROM etablissement inner JOIN disponible on disponible.idEtablissement_Etablissement=etablissement.idEtablissement_Etablissement INNER JOIN formation on disponible.idformation_Formation = formation.idformation_Formation WHERE etablissement.idEtablissement_Etablissement=".$etab);
    
$response='<div class="table-responsive">

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Organisme</th>
      <th scope="col">Formation</th>
      <th scope="col">Etablissement</th>
      <th scope="col">Ville</th>
      <th scope="col">Tél</th>
    </tr>
  </thead>
  <tbody>';

  while ($row = $query->fetch()){
    $id_Formation = $row['idformation_Formation'];
    $nm_Etablissement = $row['nomEtablissement_Etablissement'];
    $nm_formation = $row['nom_Formation'];
    $ville_formation = $row['ville_Etablissement'];
    $url_formation = $row ['url_Formation'];
    $tel_Etablissement = $row ['tel_Etablissement'];
    $response .= '<tr onclick="'.$url_formation.'">
  <th scope="row"><a href='.$url_formation.' target="_blank">'.$id_Formation.'</th>
  <td><a href='.$url_formation.' target="_blank">'.$nm_Etablissement.'</td>
  <td><a href='.$url_formation.' target="_blank">'.$nm_formation.'</td>
  <td><a href='.$url_formation.' target="_blank">'.$nm_Etablissement.'</td>
  <td><a href='.$url_formation.' target="_blank">'.$ville_formation.'</td>
  <td><a href="tel:'.$tel_Etablissement.'target="_blank"">'.$tel_Etablissement.'</td>
</tr></a>';
}

$response .= '</tbody>
</table>';
 
echo $response;

}
?>