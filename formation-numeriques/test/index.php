<!DOCTYPE html>
    <head>
	<meta charset="UTF-8">
  <link rel="stylesheet" media="" href="style.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

<style>

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

 <div class="container" style="position:absolute; width:96%; height: 100%; top:11%; left:2%">
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
                          try{
                            $pdo=new PDO("mysql:host=localhost;dbname=cartographie","admin","Cmqm&sn974", 
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
              }
              catch(PDOException $e){
                  echo $e->getMessage();
              }
                          $reponse = $pdo->query("select * FROM etablissement inner JOIN marqueur on marqueur.idEtablissement_Etablissement = etablissement.idEtablissement_Etablissement");
                          while ($donnees = $reponse->fetch()){
                              for($i = 0; $i< 30; $i++); ?>
            <div class="profile-card">
            <div class="view_data" data-etab="<?php echo $donnees['idEtablissement_Etablissement']; ?>" data-toggle="modal" data-target="#myModal" data-lat="<?php echo $donnees['lat']; ?>" data-lng="<?php echo $donnees['lng']; ?>">
           <header>
       <a><img id="etablissement<?php echo $donnees['idEtablissement_Etablissement']; ?>" src="<?php echo $donnees['img']; ?>"></a>
       <h1><?php echo $donnees['nomEtablissement_Etablissement']; ?></h1>
       <h2>✆ <?php echo $donnees['tel_Etablissement'] .'<br/>'; ?></h2>
     </header>
   <div class="profile-bio">
    <p><?php echo $donnees['adresse_Etablissement'] .'<br/>'; ?></p>
    </div>
     </div>
    </div>
           <?php } // endfor; ?> 


  <script>
// Script modal
$('.view_data').click(function(e) {
  e.preventDefault();
  var etab = $(this).data('etab');
  $.ajax({
    url: 'ajax.php',
    data: {etab: etab},
    type: 'GET',
    dataType: 'HTML'
  }).done(function(response) {
    $('.modalContent .modal-body').html(response)
  $('.modalContent').modal('show');
  });
});
</script>


</div>
</div>
</div>

<div class="map" id='mapid'></div>

<script src="code2.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
 var numbs = new Array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15");
// ...
// Je met des entrées dans l'Array
// ...
numbs.forEach(function(item, index, array){
    console.log(item);
});
</script>




</body>
</html>