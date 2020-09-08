(function() {
    "use strict";

    var map = L.map('mapa').setView([40.416045, -3.694496], 16);


    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([40.416045, -3.694496]).addTo(map)
        .bindPopup('GDLWebCamp 2020 <br> Entradas ya disponibles.')
        .openPopup()
        .bindTooltip("Un Tooltip")
        .openTooltip();
})();