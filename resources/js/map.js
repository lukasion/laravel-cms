import * as L from 'leaflet'

if (document.querySelector('#map')) {
    var map = L.map('map').setView([62.471984960321016, 6.180705348972962], 15);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var mapIcon = L.icon({
        iconUrl: 'images/icon/map-pin.svg',

        iconSize:     [50, 50], // size of the icon
        iconAnchor:   [25, 50], // point of the icon which will correspond to marker's location
        popupAnchor:  [0, -45] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([62.471984960321016, 6.180705348972962], { icon: mapIcon }).addTo(map)
        .bindPopup('Glimren Renhold')
        .openPopup();
}