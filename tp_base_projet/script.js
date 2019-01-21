function initMap() {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('map').setView([lat, lon], 5);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 200
    }).addTo(macarte);
}


/*-----------------------------
    Genere la liste des villes
    en fonction des caracteres
    tappés dans le input
 ------------------------------*/
function generateData() {
    let my_data = JSON.parse(xhttp.responseText);
    let input = document.getElementById('ville');

    let datalist = document.getElementsByTagName('datalist')[0];

    datalist.innerHTML = "";
    for (let i in my_data) {
        //generation des options
        let option = document.createElement('option');
        option.textContent = my_data[i]['Nom'];
        datalist.appendChild(option);
    }
}

/*-----------------------------
    Affiche la carte centrée
    dans le champ input
 ------------------------------*/
function afficheCarteVille() {
    let my_data = JSON.parse(xhttp.responseText);
    let new_lat = my_data[0]['Latitude'];
    let new_lon = my_data[0]['Longitude'];
    let cp = my_data[0]['CP'];



    macarte.setView(new L.LatLng(new_lat, new_lon), 12);



    macarte.on('dragend', function(){
        let ext_pos = macarte.getBounds();
        let latMin = ext_pos.getSouthWest().lat
        let longMin = ext_pos.getSouthWest().lng;
        let latMax = ext_pos.getNorthEast().lat;
        let longMax = ext_pos.getNorthEast().lng;
        console.log("Nord-Est :  lat->" + latMax + " long->" + longMax);
        console.log("Sud-Ouest : lat->" + latMin + " long->" + longMin);

        $get('recupData.php', {latMin:latMin, longMin:longMin, latMax:latMax, longMax:longMax}, afficheMagasins, erreur);
    });
}

/*-----------------------------
    Affiche les magasins en
    fonction de la ville
 ------------------------------*/
function afficheMagasins(){
    let json = JSON.parse(xhttp.responseText);
    //pour chaque magasin on créé un marker
    for(let i in json){
        var marker = L.marker([json[i]['LatMag'], json[i]['LongMag']]).addTo(macarte);
        marker.bindPopup("<h4>"+json[i]['NomMag']+"</h4>" +
            "<li>" + json[i]['AdresseMag'] + ',' + json[i]['CP'] + "</li>" +
            "<li>" + json[i]['MailMag'] + "</li>" +
            "<li>" + json[i]['TelMag'] + "</li>" +
            "<button id='infoMag'>En savoir plus</button>").openPopup();

       /* document.getElementById('infoMag').onclick = () => {
            let modal = document.createElement('div');
            modal.setAttribute("class", "modal");

            let modal_content = document.createElement('div');
            modal.setAttribute("class", "modal-content");
            modal.textContent = "TEST...";

            modal_content.appendChild(close);
            modal.appendChild(modal_content);
            document.getElementsByTagName("body")[0].appendChild(modal);
        }*/


    }
}

function erreur() {
    console.log('ERREUR');
}