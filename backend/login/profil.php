<?php
session_start();
require("config.php");
require("connect.php");


if (!$_SESSION['id']) {
	header('Location: login1.php');
}

// 	// $bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8",
// 	//  "test", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// On inclut la connexion à la base de données


//  if (isset($_GET['id']) AND $_GET['id'] > 0) {
//  	$getid = intval($_GET['id']);
//  	$requser = $db->prepare("SELECT * FROM  `Users` WHERE `id` = ?");
//  	$requser->execute(array($getid));
//  	$userinfo = $requser->fetch(); //Affichage des infos

# code...
// try {
// 	$db_etb = new PDO('mysql:host=localhost;dbname=cartographie;charset=utf8mb4', 'admin', 'Cmqm&sn974');
// 	$db_etb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	$db_etb->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
// 	} catch (PDOException $e) {
// 	echo "Connection échouée : ". $e->getMessage();
// 	}


$sql = 'SELECT * FROM `etablissement` INNER JOIN `marqueur` ON etablissement.idEtablissement_Etablissement = marqueur.idEtablissement_Etablissement';

// On prepare la requête
$query = $db_etb->prepare($sql);

// On execute la requête
$query->execute();

// On stocke la requête dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$sql1 = "SELECT etablissement.img, etablissement.idEtablissement_Etablissement, etablissement.nomEtablissement_Etablissement, etablissement.codeEtab_Etablissement, etablissement.adresse_Etablissement, COUNT(etablissement.idEtablissement_Etablissement) AS nbEtab FROM `etablissement` INNER JOIN disponible ON etablissement.idEtablissement_Etablissement = disponible.idEtablissement_Etablissement INNER JOIN formation ON disponible.idformation_Formation = formation.idformation_Formation GROUP BY etablissement.idEtablissement_Etablissement";
$query1 = $db_etb->prepare($sql1);
$query1->execute();
$result1 = $query1->fetchAll(PDO::FETCH_ASSOC);




?>

<!DOCYTPE html>
	<html>

	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css" integrity="sha512-jNfYp+q76zAGok++m0PjqlsP7xwJSnadvhhsL7gzzfjbXTqqOq+FmEtplSXGVI5uzKq7FrNimWaoc8ubP7PT5w==" crossorigin="anonymous" />
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" type="text/css" href="cssstyle.css" />
	</head>

	<body>
		<main class="container-fluid">
			<div class="row">
				<div class="col-12">
					<?php

					if (!empty($_SESSION['erreur'])) {
						echo '<div class="alert alert-danger" role="alert">
					' . $_SESSION['erreur'] . '
				  </div>';
						$_SESSION['erreur'] = "";
					} ?>
					<?php

					if (!empty($_SESSION['message'])) {
						echo '<div class="alert alert-success" role="alert">
					' . $_SESSION['message'] . '
				  </div>';
						$_SESSION['message'] = "";
					} ?>

					<section class="table table-responsive">
						<h1>Liste des etablissements</h1>
						<table>
							<thead>
								<th>#</th>
								<th>Logo</th>
								<th>Organisme</th>
								<th>Code Etablissement</th>
								<th>Adresse</th>
								<th>NB Formations</th>
								<th>Actions</th>
								<!-- <th>E-m@il</th>
							<th>Tel</th> -->
							</thead>
							<tbody>
								<?php
								//foreach($result as $etablisement){
								foreach ($result1 as $count) {
								?>
									<tr>
										<td><?= $count['idEtablissement_Etablissement']; ?></td>
										<td><img class="logo" src="<?= $count['img']; ?>" /></td>
										<td><?= $count['nomEtablissement_Etablissement']; ?></td>
										<td><?= $count['codeEtab_Etablissement']; ?></td>
										<td><?= $count['adresse_Etablissement']; //. '<br />' . $etablisement['ville_Etablissement'] . ' ' ['codep_Etablissement'];  
											?></td>
										<td><?= $count['nbEtab']; ?></td>
										<td>
											<a type="button" class="btn btn-primary" style="margin-bottom: 6px;" href="details.php?idEtablissement_Etablissement=<?= $count['idEtablissement_Etablissement'] ?>"><i class="bi bi-eye"> Plus de détails</i></a> <br>
											<a type="button" class="btn btn-warning" style="margin-bottom: 6px;" href=""><i class="bi bi-pencil-square"> Modifier</i></a> <br>
											<a type="button" class="btn btn-danger" href=""><i class="bi bi-trash"> Supprimer</i></a>
										</td>
										<!-- <td></td>
									<td></td> -->
									</tr>
								<?php
								}
								?>

							</tbody>
						</table>
					</section>
				</div>
			</div>
		</main>
		<!-- <div align="center">
			<h2>
				Profil de <?php // echo $userinfo['Nom']; 
							?>
			</h2>
			<br /><br />
			Nom = <? php // echo $userinfo['Nom']; 
					?>
			<br />
			Prenom = <?php // echo $userinfo['Prenom']; 
						?>
			<br />
			Mail = <?php // echo $userinfo['mail']; 
					?>
			<br />
			<?php
			//if (isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
			?>
			<a href="#">Editer mon profil</a>
			<a href="deconnection.php">Se déconnecter</a>
			<?php
			//}
			?>
		</div> -->
	</body>

	</html>
	<?php
	//}
	?>