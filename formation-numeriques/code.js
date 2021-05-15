function initialize() {
    var map = L.map('map').setView([-21.114533, 55.532062], 10); // LIGNE 18

    var osmLayer = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}@2x.png', { // LIGNE 20
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="https://carto.com/attribution">CARTO</a>',
        maxZoom: 20,
        minZoom:11
    });

    map.addLayer(osmLayer);

    // ajout des maqueurs

    var leafletIcon = L.icon ({
      iconUrl: 'https://zupimages.net/up/21/07/fa9q.png',
      iconSize: [45,60],
      iconAnchor: [10, 47],
      popupAnchor: [10, -40],
    })

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = () => {
        // La transaction est terminée ?
        if (xmlhttp.readyState == 4) {
            // Si la transaction est un succès
            if (xmlhttp.status == 200) {
                // On traite les données reçues
                let donnees = JSON.parse(xmlhttp.responseText)
                // On boucle sur les données (ES8)
                Object.entries(donnees.etablissements).forEach(etablissement => {
                    // Ici j'ai un seul etablissement
                    // On crée un marqueur pour l'etablissement
                    let marker = L.marker([etablissement[1].lat, etablissement[1].lng], {
                        icon:leafletIcon,
                        title: (etablissement[1].nomEtablissement),
                        }).addTo(map)
                    marker.bindPopup(
                        '<strong><h5><center>' + etablissement[1].nomEtablissement + '</center></h5></strong>'
                        + '<p>' + etablissement[1].adresse + '</p>'
                        
                        )
                    // console.log(etablissement)
                })
            } else {
                console.log(xmlhttp.statusText);
            }
        }
    }

    xmlhttp.open("GET", "./cartographie/liste_simple.php");

    xmlhttp.send(null);
}