<?php

// On démarre une session
session_start();




// Est-ce que l'id existe et n'est pas vide dans l'URL
if (isset($_GET['idEtablissement_Etablissement']) && !empty($_GET['idEtablissement_Etablissement'])) {
    require_once('connect.php');

    // On nettoie l'id envoyé
    $idEtab = strip_tags($_GET['idEtablissement_Etablissement']);


    $sql = "SELECT * FROM `etablissement` INNER JOIN disponible ON etablissement.idEtablissement_Etablissement = disponible.idEtablissement_Etablissement INNER JOIN formation ON disponible.idformation_Formation = formation.idformation_Formation WHERE etablissement.idEtablissement_Etablissement = :idEtablissement_Etablissement;";
    $sqlBis = "SELECT * FROM `etablissement` INNER JOIN disponible ON etablissement.idEtablissement_Etablissement = disponible.idEtablissement_Etablissement INNER JOIN formation ON disponible.idformation_Formation = formation.idformation_Formation WHERE etablissement.idEtablissement_Etablissement = :idEtablissement_Etablissement;";

    $formation =

        // On prepare la requête
        $query = $db_etb->prepare($sql);
    $queryBis = $db_etb->prepare($sqlBis);


    // On "accroche" le paramètre (idEtablissement_Etablissement) avec sa valeur ($idEtab)
    $query->bindValue(':idEtablissement_Etablissement', $idEtab, PDO::PARAM_INT);
    $queryBis->bindValue(':idEtablissement_Etablissement', $idEtab, PDO::PARAM_INT);


    // On execute la requête
    $query->execute();
    $queryBis->execute();


    // On recupère l'etablissement
    $etablissement = $query->fetchAll();
    $etablissementBis = $queryBis->fetch();

    // On vérifie si l'etablissement existe
    if (!$etablissementBis) {
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: profil.php');
    }
} else {
    $_SESSION['erreur'] = "URL INVALIDE";
    header('Location: profil.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css" integrity="sha512-jNfYp+q76zAGok++m0PjqlsP7xwJSnadvhhsL7gzzfjbXTqqOq+FmEtplSXGVI5uzKq7FrNimWaoc8ubP7PT5w==" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des formations <?php echo $etablissementBis['nomEtablissement_Etablissement']; ?></title>
</head>

<body>
    <main class="container"><?php if (!empty($_SESSION['message'])) {
                                echo '<div class="alert alert-success" role="alert">
					' . $_SESSION['message'] . '
				  </div>';
                                $_SESSION['message'] = "";
                            } ?>
        <div class="row">

            <section class="table-responsive">
                <h1>Liste des formations <?php echo $etablissementBis['nomEtablissement_Etablissement']; ?></h1>

                <table class="table table-striped table-borderd">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <div class="position-absolute top-0 end-0">
                                <th> <button type="button" class="btn btn-outline-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
                                        </svg>
                                        <a href="addFormation.php?idEtablissement_Etablissement=<?= $etablissementBis['idEtablissement_Etablissement'] ?>"> Ajouter une formation <br><?php echo $etablissementBis['nomEtablissement_Etablissement']; ?>
                                    </button></th>
                            </div>
                        </tr>
                    </thead>
                    <?php
                    foreach ($etablissement as $details) {
                    ?>
                        <tbody>
                            <tr>
                                <td><strong> ID Formation :</strong></td>
                                <td> <?= $details['idformation_Formation']; ?> </td>
                                <td> <a type="button" class="btn btn-warning btn-sm" style="margin-bottom: 6px;" href="editF.php?idformation_Formation=<?= $details['idformation_Formation'] . '&idEtablissement_Etablissement=' . $etablissementBis['idEtablissement_Etablissement']; ?>"><i class="bi bi-pencil-square"> Modifier</i></a> <br>
                                    <a type="button" class="btn btn-danger btn-sm" href=""><i class="bi bi-trash"> Supprimer</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Nom de la formation :</td>
                                <td> <?= $details['nom_Formation']; ?> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Description :</td>
                                <td> <?= $details['description_Formation']; ?> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Lien internet :</td>
                                <td> <?= $details['url_Formation']; ?> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Diplome :</td>
                                <td> <?= $details['diplome_Formation']; ?> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Reconnaissance National :</td>
                                <td> <?= $details['rec_nationale_Formation']; ?> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Periode formarion :</td>
                                <td> <?= $details['periode_Formation']; ?> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td>Nombre de diplomés par an :</td>
                                <td> <?= $details['nb_diplome_Formation']; ?> </td>
                                <td> </td>
                            </tr>
                        </tbody>


                    <?php
                    }
                    ?>

                </table>
            </section>
        </div>
    </main>


</body>

</html>