<!DOCTYPE html>
<html>
<head>
<title>Espace Admin</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css" integrity="sha512-jNfYp+q76zAGok++m0PjqlsP7xwJSnadvhhsL7gzzfjbXTqqOq+FmEtplSXGVI5uzKq7FrNimWaoc8ubP7PT5w==" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css">
</head>

<style>

/*
** Fonts & Variables
***********************************************************/
@import url("https://fonts.googleapis.com/css?family=Cookie");
@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600,700");
@import url("https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
/*
** Reset
***********************************************************/
*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  height: 100%;
  overflow-y: scroll;
  scrollbar-width: thin;
}

body {
  height: 100%;
  font: 13px/1 'Open Sans', sans-serif;
  color: #555;
  background: #eeeeee;
}

a {
  cursor: pointer;
}

ul {
  list-style: none;
}

p {
  line-height: 1.5;
}


::-webkit-scrollbar {
    height: 12px;
    width: 7px;
    background: #ddd;
}

::-webkit-scrollbar-thumb {
    background: #aaa;
}

::-webkit-scrollbar-corner {
    background: #000;
}

button,
input,
select,
textarea {
  font-family: inherit;
  font-size: 100%;
  vertical-align: baseline;
  border: 0;
  outline: 0;
}

input, select {
  border: 1px solid silver;
  padding: 4px;
  margin: 5px;
}

button::-moz-focus-inner,
input::-moz-focus-inner {
  border: 0;
  padding: 0;
}

/*
** Layout
***********************************************************/
.wrapper {
  display: flex;
  flex-direction: column;
  min-height: 100%;
}

.header, .header a {
  height: 70px;
  color: #eeeeee;
  background: #444;
}

.header img {
  padding: 7px;
}

.header a {
  text-decoration: none;
}

.header .title {
  width: 200px;
  font: 30px/50px Cookie, sans-serif;
  text-align: center;
}

.header .user {
  position: absolute;
  top: 30px;
  right: 35px;
  font-weight: 600;
}

.header .name,
.header .logout {
  position: relative;
  display: inline-block;
  padding-left: 20px;
}

.header .name:before,
.header .logout:before {
  content: '\f007';
  font-family: fontawesome;
  position: absolute;
  top: 0;
  left: 0;
}

.header .name {
  margin-right: 15px;
  padding-right: 15px;
  border-right: 1px solid #eeeeee;
}

.header .logout:before {
  content: '\f023';
}

.main {
  display: flex;
  flex: 1;
}

.nav {
  width: 220px;
  display:block;
  background: #404040;
  user-select: none;
  -o-user-select: none;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
}

.nav header {
  position: relative;
  height: auto;
  padding: 20px 0 0 15px;
  font-size: 16px;
  color: #fff;
  background: #444;
}

.nav span {
  position: relative;
  display: inline-block;
  width: 100px;
  height: 100px;
  margin: 0 10px 0 0;
  vertical-align: middle;
  border: 1px solid #fff;
}

.nav span:before {
  top: 5px;
  left: 5px;
}

.nav a:before {
  content: '\f08b';
  font: normal 20px fontawesome;
  margin: 5px;
  top: 28px;
  right: 15px;
}

.nav .search {
  position: relative;
  height: 45px;
  border-bottom: 1px solid #272727;
}

.nav .search:before {
  content: '\f002';
  font: 14px fontawesome;
  position: absolute;
  top: 14px;
  left: 20px;
  color: #777;
}

.nav .search input {
  position: absolute;
  top: 0;
  left: 50px;
  display: block;
  width: 150px;
  height: 45px;
  font-size: 12px;
  font-weight: 600;
  color: #777;
  background: none;
  border: none!important;
}

.nav .search [placeholder]::-webkit-input-placeholder {
  color: #777;
}

.nav .search [placeholder]:hover::-webkit-input-placeholder {
  color: #555;
}

.nav .search [placeholder]:focus::-webkit-input-placeholder {
  color: transparent;
}

.nav li a {
  position: relative;
  display: block;
  padding: 15px 15px 15px 50px;
  font-size: 12px;
  font-weight: 600;
  color: #eeeeee;
  border-bottom: 1px solid #272727;
  text-decoration: none;
}

.nav li a:before {
  font: 14px fontawesome;
  position: absolute;
  top: 8px;
  left: 20px;
}

.nav li:nth-child(1) a:before {
  content: '\f00a';
}

.nav li:nth-child(2) a:before {
  content: '\f012';
}

.nav li:nth-child(3) a:before {
  content: '\f085';
}

.nav li:nth-child(4) a:before {
  content: '\f115';
}

.nav li a:hover {
  background: #535353;
}

.nav li a.active {
  box-shadow: inset 5px 0 0 #dd3333, inset 6px 0 0 #272727;
  background: #535353;
}

.nav li a.active2 {
  box-shadow: inset 5px 0 0 #DD8B33, inset 6px 0 0 #272727;
  background: #7A7A7A;
}

.nav ul ul {
  background: #333333;
}

.nav li li a {
  padding: 10px 10px 10px 50px;
}

.nav li li a:before {
  content: '\f148' !important;
  font: 10px fontawesome;
  top: 10px;
  left: 25px;
  transform: rotate(90deg);
}

.content {
  flex: 1;
  padding: 30px;
  transition: background 0.1s linear;
  -webkit-transition: background 0.1s linear;
  -moz-transition: background 0.1s linear;
  -ms-transition: background 0.1s linear;
  -o-transition: background 0.1s linear;
}

.content .title {
  margin: 0 0 30px;
  font: 35px Cookie, sans-serif;
}

.menu_accueil li {
  float: left;
  margin: 11px;
  text-align: center;
}

a {
  text-decoration: none;
  color: #4EB7E9;
  font-weight: bold;
}

.menu_cacher {
  display: none;
}

.display_block {
  display: block!important;
}

/*
** Grid
***********************************************************/
.grid {
  display: flex;
}

.grid .col {
  flex: 1;
  margin: 0 30px 30px 0;
  padding: 15px;
  border-radius: 3px;
  background: #fff;
  box-shadow: inset 0 -1px 0 1px rgba(0, 0, 0, 0.1);
}

.grid .col:last-child {
  margin-right: 0;
}

.grid .col .head {
  margin: -15px -15px 15px -15px;
  padding: 15px;
  font-size: 14px;
  font-weight: 600;
  border-bottom: 1px solid #eeeeee;
}

/*
** Tables
***********************************************************/
table {
  width: calc(100% + 28px);
  border-collapse: collapse;
  margin: -16px -14px;
}

th, td {
  padding: 10px;
  border: 1px solid #eeeeee;
}

th:first-child,
td:first-child {
  border-left: 0;
}

th:last-child,
td:last-child {
  border-right: 0;
}

th {
  background: #f8f8f8;
}

tr:nth-child(odd) {
  background: #f8f8f8;
}

/*
** Buttons
***********************************************************/
.btnset {
  margin: 15px -15px -15px -15px;
  padding: 15px;
  text-align: right;
  border-top: 1px solid #eeeeee;
}

.btn {
  display: inline-block;
  min-width: 100px;
  margin-left: 10px;
  padding: 10px 15px 12px;
  font: 700 12px/1 'Open Sans', sans-serif;
  text-align: center;
  border-radius: 3px;
  cursor: pointer;
}

.btn.act {
  color: #fff;
  background: #59d;
}

.btn.act:hover {
  background: #4488cc;
}

.btn.pri {
  color: #fff;
  background: #6b6;
}

.btn.pri:hover {
  background: #55aa55;
}

/*
** Media Queries
***********************************************************/
@media (max-width: 1000px) {
  .grid {
    flex-direction: column;
  }

  .grid .col {
    margin-right: 0;
  }
}
@media (max-width: 800px) {
  .nav {
    width: 180px;
  }

  .nav .search input {
    width: 130px;
  }
}
@media (max-width: 600px) {
  .nav {
    width: 160px;
  }

  .nav .search input {
    width: 110px;
  }
}

/* css pour bootstrap */

.table td, .table th {
    padding: .75rem;
    vertical-align: middle;
    border-top: 1px solid #dee2e6;
}

table {
    width: calc(100% + 28px);
    border-collapse: collapse;
    margin: 0;
}

.table-responsive {
    display: block;
    width: 100%;
    overflow-x:visible;
}

a {
    color: #999;
    font-weight: bold;
}

a:hover {
    color: #333;
    font-weight: bold;
}

</style>

<body>



  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>

  <div class='wrapper'>
    <div class='header'>
      <div class='title'>
        <img classe ="cmqmsn" src="https://zupimages.net/up/21/08/4iui.png" alt="cmqmsn"/>
      </div>
      <div class='user'>
        <div class='name'>
          <a href="#" title="Mon profile">Administrateur</a>
        </div>
        <div class='logout'>
          <a href="#" title="Déconnecter">Déconnecter</a>
        </div>
      </div>
    </div>
    <div class='main'>
          <div class='nav'>
            <header>
                <center><span><img src="https://zupimages.net/up/21/08/4i4d.png" alt="logo" width="100px" /></span></center>
                <br><center>Administrateur<a></a></center><br>
            </header>
        <div class='search'>
          <input placeholder='Rechercher' type='text'>
        </div>
        <ul id='menu'>
          <li>
            <a class='deroule_menu'>Pages</a>
            <ul class="menu_cacher">
              <li>
                <a class='' href="#">Accueil</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="deroule_menu">Configuration</a>
            <ul class="menu_cacher">
              <li>
                <a class="" href="#">Général</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="deroule_menu">Participant</a>
            <ul class="menu_cacher">
              <li>
                <a class="" href="#">Général</a>
              </li>
              <li>
                <a href="#">Utilisateurs</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>  <div class='content'>
        <div class='title'>Liste des établissements<a href="#" style="float: right;" class="light"></a>
        </div>

        <!-- //////////////////////////////////////

        mettre le contenant de la page ici
        

      ///////////////////////////////////////////// -->

      <?php
session_start();
require("config.php");
require("connect.php");


if(!$_SESSION['id']){
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



<main class="container-fluid">
			<div class="row">
				<div class="col-12">
				<?php 
				
				if (!empty($_SESSION['erreur'])) {
					echo '<div class="alert alert-danger" role="alert">
					'. $_SESSION['erreur'] .'
				  </div>';
				  $_SESSION['erreur'] = "";
				}?>
				<?php 
				
				if (!empty($_SESSION['message'])) {
					echo '<div class="alert alert-success" role="alert">
					'. $_SESSION['message'] .'
				  </div>';
				  $_SESSION['message'] = "";
				}?>
					
				<section class="table table-responsive">
					<h1></h1>
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
									foreach($result1 as $count){
								?>	
								<tr>
									<td><?= $count['idEtablissement_Etablissement']; ?></td>
									<td><img class="logo" src="<?= $count['img']; ?>" /></td>
									<td><?= $count['nomEtablissement_Etablissement']; ?></td>
									<td><?= $count['codeEtab_Etablissement']; ?></td>
									<td><?= $count['adresse_Etablissement'] ; //. '<br />' . $etablisement['ville_Etablissement'] . ' ' ['codep_Etablissement'];  ?></td>
									<td><?= $count['nbEtab']; ?></td>
									<td>
										<p><a href="details.php?idEtablissement_Etablissement=<?= $count['idEtablissement_Etablissement'] ?>"><i class="bi bi-eye"> Plus de détails</i></a></p> <br>
										<p><a href=""><i class="bi bi-pencil-square"> Modifier</i></a></p> <br>
										<a href=""><i class="bi bi-trash"> Supprimer</i></a>
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


      </div>
    </div>
  </div>


</body>
</html>
