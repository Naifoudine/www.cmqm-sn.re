var mymap = L.map('mapid').setView([-21.114533, 55.532062], 10);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 20,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
        minZoom: 11,
		zoomOffset: -1
	}).addTo(mymap);


    var leafletIcon = L.icon ({
        iconUrl: 'https://zupimages.net/up/21/07/fa9q.png',
        iconSize: [45,60],
        iconAnchor: [10, 47],
        popupAnchor: [10, -40],
      })
  

// var mymap = L.map('mapid').setView([-21.114533, 55.532062], 10);

// 	L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}@2x.png', {
// 		maxZoom: 18,
// 		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="https://carto.com/attribution">CARTO</a>',
//         maxZoom: 20,
//         minZoom:10
// 	}).addTo(mymap);


coords = [[-20.95516, 55.65354], [-21.038710, 55.713615], 
    [-20.950930, 55.317501], 
    [-20.893270, 55.475212], 
    [-20.965080, 55.659187], 
    [-20.891609, 55.478722], 
    [-20.882299, 55.450401], 
    [-20.941446, 55.298813], 
    [-20.895582, 55.449871], 
    [-21.103775, 55.301323], 
    [-21.048838, 55.714573], 
    [-20.911839, 55.478710], 
    [-21.373981, 55.624073], 
    [-21.274120, 55.519676], 
    [-20.902653, 55.489418] 
]; 

etable = [
    'AFPAR', 
    'CCI La Reunion',
    'CNAM',
    'DUCRETET',
    'EPITECH',
    'ESIROI',
    'GRETA',
    'ILOI',
    'Lycée BELLEPIERRE',
    'Lycée Trois Bassin',
    'Lycée Nelson Mandela',
    'LYCEE NORD',
    'lycée Pierre Poivre',
    'lycée Roland Garros',
    'SupInfo'];

adresse = [
        '421, chemin Lagourgue  B.P. 501  97440 Saint-André ', 
        '15 rue Pierre Benoît Dumas 97470 Saint Benoît',
        '18 Rue Claude Chappe, La Réunion',
        'Avenue Stanislas GIMART 97490 Ste CLOTILDE',
        '234 Chemin Pente Sassy, 97440, La Réunion',
        'Bâtiment 2, 4, 5 & 6, 2 Rue Joseph Wetzell, Sainte-Clotilde 97490, La Réunion',
        '8 route Philibert Tsiranana, 97490 SAINT DENIS',
        'Rue du 8 mars - Parc de l Oasis - FAC Pierre Ayma, B.P. 232, Le Port - Reunion 97826, La Réunion',
        'Boulevard Gaston Monerville, Saint-Denis 97400, La Réunion',
        '81 Rue Georges Brassens, La Réunion',
        '69 Rue des alamandas, Saint-Benoît 97470, La Réunion',
        '1 Chemin des Francisceas, Sainte-Clotilde, La Réunion',
        'Rue Hippolyte Foucque, Saint-Joseph 97480, La Réunion',
        '72 Rue Roland Garros, 97430, La Réunion',
        '97490, 42 Rue de Anjou, Sainte-Clotilde, La Réunion',
    ];

	let l = coords.length;

    var etablissement1 = document.querySelector('#etablissement1');
    var etablissement2 = document.querySelector('#etablissement2');
    var etablissement3 = document.querySelector('#etablissement3');
    var etablissement4 = document.querySelector('#etablissement4');
    var etablissement5 = document.querySelector('#etablissement5');
    var etablissement6 = document.querySelector('#etablissement16');
    var etablissement7 = document.querySelector('#etablissement17');
    var etablissement8 = document.querySelector('#etablissement18');
    var etablissement9 = document.querySelector('#etablissement19');
    var etablissement10 = document.querySelector('#etablissement20');
    var etablissement11 = document.querySelector('#etablissement21');
    var etablissement12 = document.querySelector('#etablissement22');
    var etablissement13 = document.querySelector('#etablissement23');
    var etablissement14 = document.querySelector('#etablissement24');
    var etablissement15 = document.querySelector('#etablissement25');

etableFocus = [
    etablissement1, etablissement2, etablissement3, 
    etablissement4, etablissement5, etablissement6,
    etablissement7, etablissement8, etablissement9,
    etablissement10, etablissement11, etablissement12, 
    etablissement13, etablissement14, etablissement15
];

	for (let i = 0; i < l; i++) {
        // Info bulle
        var pop = L.popup({
            closeONclick: false,
        }).setContent('<center><h4><font face="serif">' + etable[i] + '</font></h4></center>' + adresse[i]);
		var marker = L.marker(coords[i], {
            icon: leafletIcon,
        }).addTo(mymap).bindPopup(pop);
        etableFocus[i].addEventListener("mouseover", ()=> {
            mymap.flyTo(coords[i], 18);
        })

                //zoom de l'etablissement
                //coords[i].addEventListener("onclick", ()=> {
                  // console.log(etableFocus[i])
                //})

	}