<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Basic stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

  <!-- Default Theme -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

  <!-- You can use latest version of jQuery  -->
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

  <!-- Include js plugin -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
</head>

<body>

  <div class="container1">
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
    <div class="map" id='mapid'></div>

    <a href="#" data-etab="1" data-toggle="modal" data-target="#myModal"> test </a>
    <div class="owl-carousel owl-theme">
      <!-- <div> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div>
        <div> Your Content </div> -->

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

      <!-- <div class="view_data" data-toggle="modal" data-target="#myModal" data-etab="1" >
                        <img src="https://zupimages.net/up/21/08/9u1y.png" alt="AFPAR" id="etablissement1">
                  </div> -->
      <!-- <div class="view_data" data-etab="1" data-toggle="modal" data-target="#myModal" data-lat="-20.879587" data-lng="55.451595">
        <div class="card card1">
          <img class="card-img-top" id="etablissement1" src="https://zupimages.net/up/21/07/yxl8.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">AFPAR</h5>
            <p class="card-text">421, chemin Lagourgue B.P. 501 97440 Saint-Andr?? <br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="2" data-toggle="modal" data-target="#myModal" data-lat="-21.038710" data-lng="55.713615">
        <div class="card">
          <img class="card-img-top" id="etablissement2" src="https://zupimages.net/up/21/07/nrb3.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">CFA CCI EST SAINT BENO??T</h5>
            <p class="card-text">15 rue Pierre Beno??t Dumas
              97470 Saint Beno??t<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="3" data-toggle="modal" data-target="#myModal" data-lat="-20.950930" data-lng="55.317501">
        <div class="card">
          <img class="card-img-top" id="etablissement3" src="https://zupimages.net/up/21/07/5ofv.jpg" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">CNAM</h5>
            <p class="card-text">18 Rue Claude Chappe, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="4" data-toggle="modal" data-target="#myModal" data-lat="-20.893270" data-lng="55.475212">
        <div class="card">
          <img class="card-img-top" id="etablissement4" src="https://zupimages.net/up/21/07/p8dp.jpg" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">DUCRETET (CMAR)</h5>
            <p class="card-text">Avenue Stanislas GIMART
              97490 Sainte-Clotilde<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="5" data-toggle="modal" data-target="#myModal" data-lat="-20.965080" data-lng="55.659187">
        <div class="card">
          <img class="card-img-top" id="etablissement5" src="https://zupimages.net/up/21/07/pfcr.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">EPITECH</h5>
            <p class="card-text">234 Chemin Pente Sassy, 97440, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="16" data-toggle="modal" data-target="#myModal" data-lat="-20.891609" data-lng="55.478722">
        <div class="card">
          <img class="card-img-top" id="etablissement16" src="https://zupimages.net/up/21/07/uywd.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">ESIROI</h5>
            <p class="card-text">B??timent 2, 4, 5 & 6, 2 Rue Joseph Wetzell, Sainte-Clotilde 97490, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="17" data-toggle="modal" data-target="#myModal" data-lat="-20.882299" data-lng="55.450401">
        <div class="card">
          <img class="card-img-top" id="etablissement17" src="https://zupimages.net/up/21/07/ou3k.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">GRETA REUNION</h5>
            <p class="card-text">8 r Philibert Tsiranana, 97490 Saint-Denis<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="18" data-toggle="modal" data-target="#myModal" data-lat="-20.941446" data-lng="55.298813">
        <div class="card">
          <img class="card-img-top" id="etablissement18" src="https://zupimages.net/up/21/07/m5lk.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">ILOI - Institut de L'image de l'Oc??an Indien</h5>
            <p class="card-text">Rue du 8 mars - Parc de l Oasis - FAC Pierre Ayma, B.P. 232, Le Port - Reunion 97826, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="19" data-toggle="modal" data-target="#myModal" data-lat="-20.895582" data-lng="55.449871">
        <div class="card">
          <img class="card-img-top" id="etablissement19" src="https://zupimages.net/up/21/07/hfct.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">Lyc??e BELLEPIERRE</h5>
            <p class="card-text">Boulevard Gaston Monerville, Saint-Denis 97400, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="20" data-toggle="modal" data-target="#myModal" data-lat="-21.103775" data-lng="55.301323">
        <div class="card">
          <img class="card-img-top" id="etablissement20" src="https://zupimages.net/up/21/07/r9p1.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">Lyc??e de Trois Bassins</h5>
            <p class="card-text">81 Rue Georges Brassens, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="21" data-toggle="modal" data-target="#myModal" data-lat="-21.048838" data-lng="55.714573">
        <div class="card">
          <img class="card-img-top" id="etablissement21" src="https://zupimages.net/up/21/07/umzr.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">Lyc??e NELSON MANDELA</h5>
            <p class="card-text">69 Rue des alamandas, Saint-Beno??t 97470, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="22" data-toggle="modal" data-target="#myModal" data-lat="-20.911839" data-lng="55.478710">
        <div class="card">
          <img class="card-img-top" id="etablissement22" src="https://zupimages.net/up/21/07/tc9d.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title"> Lyc??e M??mona Hintermann-Aff??jee</h5>
            <p class="card-text">1 Chemin des Francisceas, Sainte-Clotilde, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="23" data-toggle="modal" data-target="#myModal" data-lat="-21.373981" data-lng="55.624073">
        <div class="card">
          <img class="card-img-top" id="etablissement23" src="https://zupimages.net/up/21/07/2epy.jpg" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">Lyc??e PIERRE POIVRE</h5>
            <p class="card-text">Rue Hippolyte Foucque, Saint-Joseph 97480, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="24" data-toggle="modal" data-target="#myModal" data-lat="-21.274120" data-lng="55.519676">
        <div class="card">
          <img class="card-img-top" id="etablissement24" src="https://zupimages.net/up/21/07/z957.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">Lyc??e Roland Garros</h5>
            <p class="card-text">72 Rue Roland Garros, 97430, La R??union<br /></p>
          </div>
        </div>
      </div>
      <div class="view_data" data-etab="25" data-toggle="modal" data-target="#myModal" data-lat="-20.902653" data-lng="55.489418">
        <div class="card">
          <img class="card-img-top" id="etablissement25" src="https://zupimages.net/up/21/07/n6f5.png" alt="Card image" style="width:100%; height:50%;">
          <div class="card-body">
            <h5 class="card-title">SUPINFO</h5>
            <p class="card-text">97490, 42 Rue de l'Anjou, Sainte-Clotilde, La R??union<br /></p>
          </div>
        </div>
      </div> -->

    </div>

    <script>
      // Script modal
      $('.view_data').click(function(e) {
        e.preventDefault();
        var etab = $(this).data('etab');
        $.ajax({
          url: '../ajax.php',
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

    <script src="code2.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
  </div>
  <script>
    $(document).ready(function() {

      //  $(".owl-carousel").owlCarousel();
      $('.owl-carousel').owlCarousel({
        // margin: 10,
        loop: false,
        autoplayTimeOut: 10000000000,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          640: {
            items: 2,
            nav: false
          },
          700: {
            items: 3,
            nav: false
          },
          1000: {
            items: 4,
            nav: false
          }
        }
      });

    });
  </script>
</body>

</html>