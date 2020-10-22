! function() {
    "use strict";
    var t = L.map("mapa").setView([40.416045, -3.694496], 16);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(t), L.marker([40.416045, -3.694496]).addTo(t).bindPopup("GDLWebCamp 2020 <br> Entradas ya disponibles.").openPopup().bindTooltip("GDLWebCamp").openTooltip()
}();