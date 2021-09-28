// var mymap = L.map('mapid').setView([51.505, -0.09], 13);

// L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
//     maxZoom: 18,
//     attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
//                  '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
//                  'Imagery © <a href="http://mapbox.com">Mapbox</a>',
//     id: 'mapbox.streets'
// }).addTo(mymap);
// var mymap = L.map("mapid").setView([20.8434,106.8369], 10);
var mymap = new L.Map("mapid").fitBounds([
  [21.0364, 106.4881],
  [20.8434, 106.8369],
]);
L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
}).addTo(mymap);
// var marker = L.marker([21.0364,106.4881]).addTo(mymap);
// var circle = L.circle([51.508, -0.11], {
//   color: "red",
//   fillColor: "#f03",
//   fillOpacity: 0.5,
//   radius: 500,
// }).addTo(mymap);
// marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
var popup = L.popup();
mymap.on("click", (e) => {
  popup
    .setLatLng(e.latlng)
    .setContent("You clicked the map at " + e.latlng.toString())
    .openOn(mymap);
  console.log(e.latlng.toString());
});

// xu ly collapse
$("#collapseExample").on("show.bs.collapse", function (e) {
  // do something...
  // $('#icon-arrow').addClass('fa-chevron-right').removeClass('fa-chevron-down');
  if ($("#icon-arrow").hasClass("fa-chevron-right")) {
    $("#icon-arrow")
      .addClass("fa-chevron-down")
      .removeClass("fa-chevron-right");
  }
});

$("#collapseExample").on("hide.bs.collapse", function (e) {
  // do something...
  if ($("#icon-arrow").hasClass("fa-chevron-down")) {
    $("#icon-arrow")
      .addClass("fa-chevron-right")
      .removeClass("fa-chevron-down");
  }
});

$("#collapseExample1").on("show.bs.collapse", function (e) {
  // do something...
  // $('#icon-arrow').addClass('fa-chevron-right').removeClass('fa-chevron-down');
  if ($("#icon-arrow1").hasClass("fa-chevron-right")) {
    $("#icon-arrow1")
      .addClass("fa-chevron-down")
      .removeClass("fa-chevron-right");
  }
});

$("#collapseExample1").on("hide.bs.collapse", function (e) {
  // do something...
  if ($("#icon-arrow1").hasClass("fa-chevron-down")) {
    $("#icon-arrow1")
      .addClass("fa-chevron-right")
      .removeClass("fa-chevron-down");
  }
});
