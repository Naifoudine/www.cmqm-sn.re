<?php
// On demarre la session
ini_set('display_errors', 'on');
session_start();

if($_POST){
    if(isset($_GET['idEtablissement_Etablissement']) && !empty($_GET['idEtablissement_Etablissement'])
    && isset($_POST['idformation_Formation']) && !empty($_POST['idformation_Formation'])
    && isset($_POST['nom_Formation']) && !empty($_POST['nom_Formation'])
    && isset($_POST['iddomaine_Domaine']) && !empty($_POST['iddomaine_Domaine'])
    && isset($_POST['description_Formation']) && !empty($_POST['description_Formation'])
    && isset($_POST['url_Formation']) && !empty($_POST['url_Formation'])
    && isset($_POST['diplome_Formation']) && !empty($_POST['diplome_Formation'])
    && isset($_POST['rec_nationale_Formation']) && !empty($_POST['rec_nationale_Formation'])
    && isset($_POST['periode_Formation']) && !empty($_POST['periode_Formation'])
    && isset($_POST['nb_diplome_Formation']) && !empty($_POST['nb_diplome_Formation'])){

    // On inclu la connection à la base
    require_once('connect.php');

     // On nettoie l'id envoyé
     $idFormation = strip_tags($_GET['idEtablissement_Etablissement']);

    $nomFormation = strip_tags($_POST['nom_Formation']);
    $idDomaine = strip_tags($_POST['iddomaine_Domaine']);
    $descFormation = strip_tags($_POST['description_Formation']);
    $urlFormation = strip_tags($_POST['url_Formation']);
    $diplomeFormation = strip_tags($_POST['diplome_Formation']);
    $recFormation = strip_tags($_POST['rec_nationale_Formation']);
    $periodeFormation = strip_tags($_POST['periode_Formation']);
    $nb_Diplom_Formation = strip_tags($_POST['nb_diplome_Formation']);

    // $db_etb->beginTransaction();

    // try {
    //     //code...
    

     $sql = ('UPDATE `formation` SET `nom_Formation`=:nomFormation, `description_Formation`=:descFormation, `url_Formation`=:urlFormation, `diplome_Formation`=:diplomeFormation, `rec_nationale_Formation`=:recFormation, `periode_Formation`=:periodeFormation, `nb_diplome_Formation`=:nb_Diplom_Formation, `iddomaine_Domaine`=:idDomaine WHERE `idformation_Formation`=:idformation_Formation'); 
     //VALUES (NULL, :nomFormation, :descFormation, :urlFormation, :diplomeFormation, :recFormation, :periodeFormation, :nb_Diplom_Formation, :idDomaine)');
    // // INSERT INTO `formation` (`idformation_Formation`, `nom_Formation`, `description_Formation`, `url_Formation`, `diplome_Formation`, `rec_nationale_Formation`, `periode_Formation`, `nb_diplome_Formation`, `idformation_Formation`) 
    // // VALUES (NULL, ':nomFormation', ':descFormation', ':urlFormation', ':diplome_Formation', ':recFormation', ':periodeFormation', ':nb_Diplom_Formation', ':idDomaine');

    $query = $db_etb->prepare($sql);

    $query->bindValue(':nomFormation', $nomFormation, PDO::PARAM_STR);
    $query->bindValue(':descFormation', $descFormation, PDO::PARAM_STR);
    $query->bindValue(':urlFormation', $urlFormation, PDO::PARAM_STR);
    $query->bindValue(':diplomeFormation', $diplomeFormation, PDO::PARAM_STR);
    $query->bindValue(':recFormation', $recFormation, PDO::PARAM_STR);
    $query->bindValue(':periodeFormation', $periodeFormation, PDO::PARAM_STR);
    $query->bindValue(':nb_Diplom_Formation', $nb_Diplom_Formation, PDO::PARAM_STR);
    $query->bindValue(':idDomaine', $idDomaine, PDO::PARAM_STR);

    $query->execute();

    // // get user_uid from insert for use in other tables below
    // $lastInsertID = $db_etb->lastInsertId();

    // $query = $db_etb->prepare('INSERT INTO `disponible` (`idformation_Formation`, `idEtablissement_Etablissement`) VALUES
    // ( ?, ?)');

    // $query->bindParam(1, $lastInsertID, PDO::PARAM_INT);
    // $query->bindParam(2, $idFormation, PDO::PARAM_INT);

    // $query->execute();

    // // commit transaction
    // $db_etb->commit();

     $_SESSION['message'] = "Formation modifiée";
    
    // //require_once('close.php');

    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
    
}

// Est-ce que l'id existe et n'est pas vide dans l'URL
if (isset($_GET['idformation_Formation']) && !empty($_GET['idformation_Formation'])
    && isset($_GET['idEtablissement_Etablissement']) && !empty($_GET['idEtablissement_Etablissement'])) {
    require_once('connect.php');
 
     // On nettoie l'id envoyé
     $idFormation = strip_tags($_GET['idformation_Formation']);
     $idEtab = strip_tags($_GET['idEtablissement_Etablissement']);
    
 
     $sql = "SELECT * FROM `etablissement` INNER JOIN disponible ON etablissement.idEtablissement_Etablissement = disponible.idEtablissement_Etablissement INNER JOIN formation ON disponible.idformation_Formation = formation.idformation_Formation WHERE formation.idformation_Formation = :idformation_Formation;";
     $sqlBis = "SELECT * FROM `etablissement` INNER JOIN disponible ON etablissement.idEtablissement_Etablissement = disponible.idEtablissement_Etablissement INNER JOIN formation ON disponible.idformation_Formation = formation.idformation_Formation WHERE etablissement.idEtablissement_Etablissement = :idEtablissement_Etablissement;";
 
     // On prepare la requête
     $query = $db_etb->prepare($sql);
     $queryBis = $db_etb->prepare($sqlBis);
 
 
     // On "accroche" le paramètre (idEtablissement_Etablissement) avec sa valeur ($idFormation)
     $query->bindValue(':idformation_Formation', $idFormation, PDO::PARAM_INT);
     $queryBis->bindValue(':idEtablissement_Etablissement', $idEtab, PDO::PARAM_INT);
 
 
     // On execute la requête
     $query->execute();
     $queryBis->execute();
 
 
     // On recupère l'etablissement
     //$etablissement = $query->fetchAll();
     $etablissementBis = $queryBis->fetch();

     // On recupre la formation
     $formation = $query->fetch();
 
     // On vérifie si l'etablissement existe
     if(!$etablissementBis){
         $_SESSION['erreur'] = "Cet id n'existe pas";
        // header('Location: profil.php');
  }
    // On vérifie si l'etablissement existe
    if(!$formation){
        $_SESSION['erreur'] = "Cet id n'existe pas";
    // header('Location: profil.php');
    // echo $idFormation;
    }
     
 
 }else {
     $_SESSION['erreur'] = "URL INVALIDE";
    // header('Location: profil.php');
  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition d'une formation - <?php echo $etablissementBis['nomEtablissement_Etablissement'];?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css" integrity="sha512-jNfYp+q76zAGok++m0PjqlsP7xwJSnadvhhsL7gzzfjbXTqqOq+FmEtplSXGVI5uzKq7FrNimWaoc8ubP7PT5w==" crossorigin="anonymous" />
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
            <?php 
				
				if (!empty($_SESSION['erreur'])) {
					echo '<div class="alert alert-danger" role="alert">
					'. $_SESSION['erreur'] .'
				  </div>';
				  $_SESSION['erreur'] = "";
				}?>
                <h1>Edition d'une Formation <br><h5>Nom de l'établissement : <?php echo $etablissementBis['nomEtablissement_Etablissement'];?> </h5></h1>
            <form method="post">
                <div class="form-group">
                    <label for="nom_Formation">Nom de la formation :	</label>
                    <input class="form-control" type="text" id="nom_Formation" name="nom_Formation" value="<?= $formation['nom_Formation']?>">
                </div>
                <div class="form-group">
                    <label for="iddomaine_Domaine">Domaine :</label>
                    <select name="iddomaine_Domaine" id="iddomaine_Domaine">
                    <?php 
                    require('connect.php');

					$requete = 'SELECT * FROM domaine'; 
					$domaine = $db_etb->query($requete) ;
					
					while ($donnee = $domaine -> fetch()) {
					$idDom = $donnee['iddomaine_Domaine'];
					$libDom = $donnee['lib_domaine_Domaine'];?>

					 <!-- //echo "<option value='$idDom'> $libDom </option>";   -->

                     <option value='<?= $etablissementBis['iddomaine_Domaine'];?>'> <?= $formation['iddomaine_Domaine'];?></option>
					<?php
                    }
				?>
                    </select>
                </div>
               
                <div class="form-group">
                    <label for="description_Formation">Description :</label>
                    <input class="form-control" type="text" id="description_Formation" name="description_Formation" value="<?= $formation['description_Formation']?>">
                </div>
                <div class="form-group">
                    <label for="url_Formation">Lien internet :</label>
                    <input class="form-control" type="text" id="url_Formation" name="url_Formation" value="<?= $formation['url_Formation']?>">
                </div>
                <div class="form-group">
                    <label for="diplome_Formation">Diplôme :</label>
                    <input class="form-control" type="text" id="diplome_Formation" name="diplome_Formation" value="<?= $formation['diplome_Formation']?>">
                </div>
                <div class="form-group">
                    <label for="rec_nationale_Formation">Reconnaissance National :</label>
                    <input class="form-control" type="text" id="rec_nationale_Formation" name="rec_nationale_Formation" value="<?= $formation['rec_nationale_Formation']?>">
                </div>
                <div class="form-group">
                    <label for="periode_Formation">Période formation :</label>
                    <input class="form-control" type="text" id="periode_Formation" name="periode_Formation" value="<?= $formation['periode_Formation']?>">
                </div>
                <div class="form-group">
                    <label for="nb_diplome_Formation">Nombre de diplomés par an :</label>
                    <input class="form-control" type="text" id="nb_diplome_Formation" name="nb_diplome_Formation" value="<?= $formation['nb_diplome_Formation']?>">
                </div>
                <input type="hidden" value="<?= $formation['idformation_Formation']?>">
                <button class="btn btn-primary">Modifier</button>
                
            </form>
            </section>
        </div>
    </main>
</body>
</html>