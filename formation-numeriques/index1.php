<?php

// Si ouvert sur mobile Alors redirection vers version mobile
$useragent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
  header('Location: ./mobile/');
}
?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<style>
  .modal-content {
    position: relative;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    width: 100%;
    top: 100px;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .2);
    border-radius: .3rem;
    outline: 0;
  }

  .modal-backdrop {
    background-color: black;
    opacity: 0.9;
  }
</style>

<body>

  <div class="map-legend" id="map-legend">
    <header class="header">
      <div class="header__logo">
        <img src="https://zupimages.net/up/21/04/6tc4.png" alt="logo" width="250px" />
      </div>

      <!-- <div id="myBtnContainer">
  <button class="btn-flt active" onclick="filterSelection('all')"> Show all</button>
  <button class="btn-flt" onclick="filterSelection('nature')"> Nature</button>
  <button class="btn-flt" onclick="filterSelection('cars')"> Cars</button>
  <button class="btn-flt" onclick="filterSelection('people')"> People</button>
</div> -->

    </header>

    <div class="container" style="position:absolute; width:90%; height: 100%; top:11%; left:5%;">
      <!-- The Modal -->
      <div class="modal fade modalContent" id="myModal">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content" style="position: relative; top: 70px;">
            <!-- Modal body -->
            <div class="modal-body">
              Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>


      <div class="etablissement">
        <!-- <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="1" >
			 <img src="https://zupimages.net/up/21/08/9u1y.png" alt="AFPAR" id="etablissement1">
       </div> -->
        <?php
        try {
          $pdo = new PDO(
            "mysql:host=localhost;dbname=cartographie",
            "admin",
            "Cmqm&sn974",
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
          );
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
        $reponse = $pdo->query("select * FROM etablissement inner JOIN marqueur on marqueur.idEtablissement_Etablissement = etablissement.idEtablissement_Etablissement");
        while ($donnees = $reponse->fetch()) {
          for ($i = 0; $i < 30; $i++); ?>
          <div class="view_data" data-etab="<?php echo $donnees['idEtablissement_Etablissement']; ?>" data-toggle="modal" data-target="#myModal" data-lat="<?php echo $donnees['lat']; ?>" data-lng="<?php echo $donnees['lng']; ?>">
            <div class="card">
              <img class="card-img-top" id="etablissement<?php echo $donnees['idEtablissement_Etablissement']; ?>" src="<?php echo $donnees['img']; ?>" alt="Card image" style="width:100%; height:50%;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $donnees['nomEtablissement_Etablissement']; ?></h5>
                <p class="card-text"><?php echo $donnees['adresse_Etablissement'] . '<br/>'; ?></p>
              </div>
            </div>
          </div>
        <?php } // endfor; 
        ?>

        <!-- <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="2">
			<img src="https://zupimages.net/up/21/08/znu1.png" alt="CCI" id="etablissement2">
  </div>

  <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="3" >
			 <img src="https://zupimages.net/up/21/08/70ql.png" alt="CNAM" id="etablissement3">
       </div>


<div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="4">
			<img src="https://zupimages.net/up/21/08/snis.png" alt="DUCRETET" id="etablissement4">
  </div>


  <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="5">
			 <img src="https://zupimages.net/up/21/08/0lf6.png" alt="EPITECH" id="etablissement5">
       </div>

  <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="16">
			<img src="https://zupimages.net/up/21/08/08ia.png" alt="ESIROI" id="etablissement6">
  </div>


<div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="17">
			<img src="https://zupimages.net/up/21/08/0vtz.png" alt="GRETA" id="etablissement7">
  </div>


  <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="18" >
			 <img src="https://zupimages.net/up/21/08/bmbt.png" alt="ILOI" id="etablissement8">
       </div>


<div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="19">
			<img src="https://zupimages.net/up/21/08/uimb.png" alt="Lycée Bellepierre" id="etablissement9">
  </div>


<div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="20">
			<img src="https://zupimages.net/up/21/08/socd.png" alt="Lycée Trois Bassin" id="etablissement10">
  </div>


  <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="21" >
			 <img src="https://zupimages.net/up/21/08/1oki.png" alt="Lycée Nelson Mandela" id="etablissement11">
       </div>


<div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="22">
			<img src="https://zupimages.net/up/21/08/kuoc.png" alt="Lycée nord" id="etablissement12">
  </div>


  <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="23" >
			 <img src="https://zupimages.net/up/21/08/crmb.png" alt="lycée Pierre Poivre" id="etablissement13">
       </div>


<div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="24">
			<img src="https://zupimages.net/up/21/08/q3sx.png" alt="lycée Roland Garros" id="etablissement14">
  </div>


  <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="25" >
			 <img src="https://zupimages.net/up/21/08/bkjn.png" alt="SupInfo" id="etablissement15">
       </div> -->


        <script>
          // Script modal
          $('.view_data').click(function(e) {
            e.preventDefault();
            var etab = $(this).data('etab');
            $.ajax({
              url: 'ajax.php',
              data: {
                etab: etab
              },
              type: 'GET',
              dataType: 'HTML'
            }).done(function(response) {
              $('.modalContent .modal-body').html(response)
              $('.modalContent').modal('show');
            });
          });
        </script>
        <!-- <div class="etablissement">
			<div id="etablissement1">
				<img src="https://zupimages.net/up/21/08/9u1y.png" alt="AFPAR">
			</div>

			<div id="etablissement2">
				<img src="https://zupimages.net/up/21/08/znu1.png" alt="CCI">
			</div>

			<div id="etablissement3">
				<img src="https://zupimages.net/up/21/08/70ql.png" alt="CNAM">
			</div>
			
			<div id="etablissement4">
				<img src="https://zupimages.net/up/21/08/snis.png" alt="DUCRETET">
			</div>

			<div id="etablissement5">
				<img src="https://zupimages.net/up/21/08/0lf6.png" alt="EPITCH">
			</div>
			
			<div id="etablissement6">
				<img src="https://zupimages.net/up/21/08/08ia.png" alt="ESIROI">
			</div>
		
            <div id="etablissement7">
				<img src="https://zupimages.net/up/21/08/0vtz.png" alt="GRETA">
			</div>

			<div id="etablissement8">
				<img src="https://zupimages.net/up/21/08/bmbt.png" alt="ILOI">
			</div>

			<div id="etablissement9">
				<img src="https://zupimages.net/up/21/08/uimb.png" alt="BELLEPIERRE">
			</div>
			
			<div id="etablissement10">
				<img src="https://zupimages.net/up/21/08/socd.png" alt="TROIS BASSIN">
			</div>

			<div id="etablissement11">
				<img src="https://zupimages.net/up/21/08/1oki.png" alt="MANDELA">
			</div>
			
			<div id="etablissement12">
				<img src="https://zupimages.net/up/21/08/kuoc.png" alt="LYCEE NORD">
			</div>

            <div id="etablissement13">
				<img src="https://zupimages.net/up/21/08/crmb.png" alt="PIERRE POIVRE">
			</div>

			<div id="etablissement14">
				<img src="https://zupimages.net/up/21/08/q3sx.png" alt="ROLAND GARROS">
			</div>
			
			<div id="etablissement15">
				<img src="https://zupimages.net/up/21/08/bkjn.png" alt="SUPINFO">
			</div>

		</div> -->
      </div>

    </div>
  </div>

  <div class="map" id='mapid'></div>

  <script src="code2.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script>
    var numbs = new Array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
    // ...
    // Je met des entrées dans l'Array
    // ...
    numbs.forEach(function(item, index, array) {
      console.log(item);
    });
  </script>




</body>

</html>