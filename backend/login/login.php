<?php
// session_start();
// require_once("config.php");
// 	// $bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8",
// 	//  "test", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// 	// try {
// 	//  $bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8", "test",
// 	//  "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// 	// }
// 	// catch (Exception $e) {
// 	//  die('Erreur fatale : ' . $e->getMessage());
// 	// }

// 	if(isset($_POST['valider'])){
// 		$mailconnect = htmlspecialchars($_POST['mailconnect']);
// 		$mdpconnect = sha1($_POST['mdpconnect']);
// 		if (!empty($mailconnect) AND !empty($mdpconnect)) {
// 			# code...
// 			$requser = $bdd->prepare("SELECT * FROM  `membres` WHERE `mail` = ? AND motdepasse = ?");
// 			$requser->execute(array($mailconnect, $mdpconnect));
// 			$userexist = $requser->rowCount();
// 			if ($userexist == 1) {
// 				$userinfo = $requser->fetch();
// 				$_SESSION['id'] = $userinfo['id'];
// 				$_SESSION['mail'] = $userinfo['mail'];
// 				header("Location: profil.php?id=" .$_SESSION['id']);


// 			}
// 			else{
// 				$erreur = "Mauvais mail ou mot de passe !";
// 			}
// 		}
// 		else{
// 			$erreur = "Tous les champs doivent êtres complétés !"; 
// 		}

// 	}

?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@v5.0.0/dist/material-components-web.min.css">
    <script src="https://unpkg.com/material-components-web@v5.0.0/dist/material-components-web.min.js"></script>
    <title>Document</title>
</head>

<body> -->

<!-- <style>
    html, body {  
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  /* margin-top: 32px; */
  margin-top: 5em;
  
}
body{
  border-radius: 1rem;
  box-shadow: 0 10px 25px rgba(92,99,105,.2);
}

.demo-headline {
  margin-bottom: 32px;
}

.mdc-text-field {
  margin-bottom: 24px;
  flex-shrink: 0;
}

.greet-message {
  margin-top: 48px; 
}
</style> -->

    <!-- <h6 class="mdc-typography mdc-typography--headline6 demo-headline">CMQM&SN</h6> -->

    <!-- <img src="https://www.education.gouv.fr/sites/default/files/imported_files/image/2018_CMQ_logos_WEB_management_La_Reunion_1044159.44.jpg" alt="">
    <div class="mdc-text-field">
        <input type="text" id="my-text-field" class="mdc-text-field__input first-name-input" name="mailconnect" value="<?php// if(isset($mailconnect)) { echo $mailconnect; }?>">
        <label class="mdc-floating-label" for="my-text-field">Nom d'utilisateur</label>
        <div class="mdc-line-ripple"></div>
    </div>

     <div class="mdc-text-field">
        <input type="text" id="my-text-field" class="mdc-text-field__input last-name-input">
        <label class="mdc-floating-label" for="my-text-field">Prenom</label>
        <div class="mdc-line-ripple"></div>
    </div> -->
    <!--<div class="mdc-text-field">
        <input type="password" id="my-text-field" name="mdpconnect" class="mdc-text-field__input last-name-input">
        <label class="mdc-floating-label" for="my-text-field">Mot de passe</label>
        <div class="mdc-line-ripple"></div>
    </div>
    <button class="mdc-button greet-button" type="submit" name="valider">
        <div class="mdc-button__ripple"></div>
        <div class="mdc-button__label">Se connecter</div>
    </button>
    Pas encore membre? 
				<a href="Inscription.php">Cliquez ici pour vous inscrire</a>
    <div class="mdc-typography mdc-typography--overline greet-message"></div> -->
    
    <!-- <br> -->
				
      
      
        <?php 
			// if (isset($erreur)){
			// 	echo '<font color="red">' . $erreur. '</font';
			// } ?>


    <!-- <script>
        /** Initialize MDC Web components. */
const buttons = document.querySelectorAll('.mdc-button');
for (const button of buttons) {
  mdc.ripple.MDCRipple.attachTo(button);
}

const textFields = document.querySelectorAll('.mdc-text-field');
for (const textField of textFields) {
  mdc.textField.MDCTextField.attachTo(textField);
}

/** Custom javascript code. */
const greetMessageEl = document.querySelector('.greet-message');
const greetButton = document.querySelector('.greet-button');
// greetButton.addEventListener('click', () => {
//   const firstNameInput = document.querySelector('.first-name-input').value;
//   const lastNameInput = document.querySelector('.last-name-input').value;
//   let name;
//   if (firstNameInput || lastNameInput) {
//     name = firstNameInput + ' ' + lastNameInput;
//   } else {
//     name = 'Anonymous';
//   }
//   greetMessageEl.textContent = `Hello, ${name}!`;
// });


    </script>
</body>

</html> -->

<?php
session_start();
require_once("config.php");
	// $bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8",
	//  "test", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	// try {
	//  $bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=utf8", "test",
	//  "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// }
	// catch (Exception $e) {
	//  die('Erreur fatale : ' . $e->getMessage());
	// }

	if(isset($_POST['valider'])){
		$mailconnect = htmlspecialchars($_POST['mailconnect']);
		$mdpconnect = ($_POST['mdpconnect']);
		if (!empty($mailconnect) AND !empty($mdpconnect)) {
			# code...
			$requser = $db->prepare("SELECT * FROM  `Users` WHERE `username` = ? AND `password` = ?");
			$requser->execute(array($mailconnect, $mdpconnect));
			$userexist = $requser->rowCount();
			if ($userexist == 1) {
				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['username'] = $userinfo['username'];
				header("Location: profil.php?id=" .$_SESSION['id']);


			}
			else{
				$erreur = "Identifiant ou mot de passe incorrect !";
			}
		}
		else{
			$erreur = "Tous les champs doivent êtres complétés !"; 
		}

	}

?>
<!DOCYTPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<div align="center">
		<body onLoad="document.fo.login.focus()">
			<h2>
				Authentification
			</h2>
			<form name="fo" method="post" action="">
				<table>
					<tr>
						<td>
							<label align="left" for="mailconnect">E-mail :</label>
						</td>
						<td>
							<input type="text" name="mailconnect" placeholder="Mail" value="<?php if(isset($mailconnect)) { echo $mailconnect; }?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="mailconnect">Mot de passe :</label>
						</td>
						<td>
							<input type="password" name="mdpconnect" placeholder="Mot de passe" />
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="valider" value="S'authentifier" />
						</td>
					</tr>
				</table>
				<br>
				Pas encore membre? 
				<a href="Inscription.php">Cliquez ici pour vous inscrire</a>

			</form>
			<?php 
			if (isset($erreur)){
				echo '<font color="red">' . $erreur. '</font';
			} ?>
			
		</body>
	</div>
</html>

