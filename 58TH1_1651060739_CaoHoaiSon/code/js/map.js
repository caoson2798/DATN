var mymap = L.map("mapid", {
  zoomControl: true,
  maxZoom: 50,
  minZoom: 3,
}).fitBounds([
  [20.61142322792599, 106.38637028789354],
  [20.778631818033, 106.6135772544507],
]);

function addControlPlaceholders(mymap) {
  var corners = mymap._controlCorners,
    l = "leaflet-",
    container = mymap._controlContainer;

  function createCorner(vSide, hSide) {
    var className = l + vSide + " " + l + hSide;

    corners[vSide + hSide] = L.DomUtil.create("div", className, container);
  }

  createCorner("verticalcenter", "left");
  createCorner("verticalcenter", "right");
}
addControlPlaceholders(mymap);

// Change the position of the Zoom Control to a newly created placeholder.
mymap.zoomControl.setPosition("verticalcenterright");

// You can also put other controls in the same placeholder.
// L.control.scale({
//   position: 'verticalcenterright'
// }).addTo(mymap);

// ban do nen
googleStreets = L.tileLayer(
  "http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}",
  {
    maxZoom: 20,
    subdomains: ["mt0", "mt1", "mt2", "mt3"],
  }
);

hybrid = L.tileLayer("http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}", {
  maxZoom: 20,
  subdomains: ["mt0", "mt1", "mt2", "mt3"],
});
satellite = L.tileLayer("http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}", {
  maxZoom: 20,
  subdomains: ["mt0", "mt1", "mt2", "mt3"],
});
var OSM = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
  zIndex: 1,
  transparent: true,
});

googleTerrain = L.tileLayer(
  "http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}",
  {
    maxZoom: 20,
    subdomains: ["mt0", "mt1", "mt2", "mt3"],
  }
);

mymap.addLayer(OSM);

var url = "http://localhost:8080/geoserver/DATN/wms";
var style = {};
//cac layer

var CongDuoiDe = L.tileLayer.betterWms(url, {
  layers: "cong_duoi_de_point",
  transparent: true,
  format: "image/png",
  crs: L.CRS.EPSG4326,
});

var Cong = L.tileLayer.betterWms(url, {
  layers: "cong_point",
  transparent: true,
  format: "image/png",
  crs: L.CRS.EPSG4326,
});

var TramBom = L.tileLayer.betterWms(url, {
  layers: "tram_bom_point",
  transparent: true,
  format: "image/png",
  crs: L.CRS.EPSG4326,
});

var Kenh = L.tileLayer.betterWms(url, {
  layers: "kenh_polyline",
  transparent: true,
  format: "image/png",
  crs: L.CRS.EPSG4326,
});

var De = L.tileLayer.betterWms(url, {
  layers: "de_tw",
  transparent: true,
  format: "image/png",
  crs: L.CRS.EPSG4326,
});

var NhaMayNuocSach = L.tileLayer.betterWms(url, {
  layers: "nha_may_nuoc_sach_point",
  transparent: true,
  format: "image/png",
  crs: L.CRS.EPSG4326,
});

var DiemNhanThai = L.tileLayer.betterWms(url, {
  layers: "diem_nhan_thai_point",
  transparent: true,
  format: "image/png",
  crs: L.CRS.EPSG4326,
});

var DiemXaThai = L.tileLayer.betterWms(url, {
  layers: "diem_xa_thai_point",
  transparent: true,
  format: "image/png",
  crs: L.CRS.EPSG4326,
});

// xu ly checkbox layer
var checkboxElems = document.querySelectorAll("input[type='checkbox']");
for (var i = 0; i < checkboxElems.length; i++) {
  checkboxElems[i].addEventListener("click", xulycheck);
}

var popup = L.popup().setContent("I am a standalone popup.");

function xulycheck(e) {
  var idChk = e.target.id;
  // var chkCong=document.getElementById("chk-cong");
  if (e.target.checked) {
    switch (idChk) {
      case "chk-cong-duoi-de":
        // mymap.fitBounds(bouds.CongDuoiDe1.getBounds());
        CongDuoiDe.addTo(mymap);
        // CongDuoiDe.bindPopup(popup).openPopup();
        break;
      case "chk-cong":
        // mymap.fitBounds(Cong1.getBounds());
        Cong.addTo(mymap);
        break;
      case "chk-trambom":
        // mymap.fitBounds(TramBom1.getBounds());
        TramBom.addTo(mymap);
        break;
      case "chk-kenh":
        // mymap.fitBounds(Kenh1.getBounds());
        Kenh.addTo(mymap);
        break;
      case "chk-de":
        // mymap.fitBounds(De1.getBounds());
        De.addTo(mymap);
        break;
      case "chk-nhamaynuocsach":
        // mymap.fitBounds(NhaMayNuocSach1.getBounds());
        NhaMayNuocSach.addTo(mymap);
        break;
      case "chk-diemnhanthai":
        // mymap.fitBounds(DiemNhanThai1.getBounds());
        DiemNhanThai.addTo(mymap);
        break;
      case "chk-diemxathai":
        // mymap.fitBounds(DiemXaThai1.getBounds());
        DiemXaThai.addTo(mymap);
        break;
      case "chk-osm":
        OSM.addTo(mymap);
        break;
      default:
        alert("ko co j het tron a");
    }
  } else {
    // alert("ko dc check");
    switch (idChk) {
      case "chk-cong-duoi-de":
        mymap.removeLayer(CongDuoiDe);
        break;
      case "chk-cong":
        mymap.removeLayer(Cong);
        break;
      case "chk-trambom":
        mymap.removeLayer(TramBom);
        break;
      case "chk-kenh":
        mymap.removeLayer(Kenh);
        break;
      case "chk-de":
        mymap.removeLayer(De);
        break;
      case "chk-nhamaynuocsach":
        mymap.removeLayer(NhaMayNuocSach);
        break;
      case "chk-diemnhanthai":
        mymap.removeLayer(DiemNhanThai);
        break;
      case "chk-diemxathai":
        mymap.removeLayer(DiemXaThai);
        break;
      case "chk-osm":
        mymap.removeLayer(OSM);
        break;
      default:
        alert("ko co j het tron a");
    }
  }
}

// var itemSearch= document.getElementById("item_search");
function handleMove(object, type) {
  // var typesearch = JSON.stringify(type)
  var noidung = "";
  var json = JSON.parse(object.geo);
  console.log(object);
  mymap.setView(new L.LatLng(json.coordinates[1], json.coordinates[0]), 13);
  var marker = L.marker([json.coordinates[1], json.coordinates[0]], {
    elevation: 260.0,
    title: "Transamerica Pyramid",
  }).addTo(mymap);

  switch (type) {
    case "cong":
      noidung += "<b>Th??ng tin chi ti???t</b>";
      noidung += "<br>";
      noidung += "<b>T??n: </b>" + object.name + "<br>";
      // noidung += "<b>Th??ng tin: </b>" + popupinfo + "<br>";
      break;
    case "trambom":
      noidung += "<b>Th??ng tin chi ti???t</b>";
      noidung += "<br>";
      noidung += "<b>T??n tr???m b??m: </b>" + object.name + "<br>";
      // noidung += "<b>Th??ng tin: </b>" + popupinfo + "<br>";
      break;
    case "nmns":
      noidung += "<b>Th??ng tin chi ti???t</b>";
      noidung += "<br>";
      noidung += "<b>T??n nh?? m??y nc: </b>" + object.name + "<br>";
      noidung += "<b>Ho???t ?????ng: </b>" + object.status + "<br>";
      noidung += "<b>?????a ch???: </b>" + object.dia_chi + "<br>";
      noidung += "<b>????n v??? qly: </b>" + object.dvi_qly + "<br>";
      noidung += "<b>Ngu???n c???p: </b>" + object.nguon_cap + "<br>";
      noidung += "<b>Huy???n: </b>" + object.huyen + "<br>";
      noidung += "<b>V??ng pv: </b>" + "<p>" + object.vung_pvu + "</p>" + "<br>";
      break;
    case "diennhanthai":
      noidung += "<b>Th??ng tin chi ti???t</b>";
      noidung += "<br>";
      noidung += "<b>T??n: </b>" + object.name + "<br>";
      noidung += "<b>K??nh nh???n: </b>" + object.kenhnhan + "<br>";
      noidung += "<b>Ng??y c???p: </b>" + object.ngayCap + "<br>";
      noidung += "<b>S??? GP: </b>" + object.sogp + "<br>";
      noidung += "<b>SDT: </b>" + object.sdt + "<br>";
      noidung += "<b>X??: </b>" + object.xa + "<br>";
      noidung += "<b>Lo???i k??nh: </b>" + object.loaikenh + "<br>";

      break;
    case "diemxathai":
      noidung += "<b>Th??ng tin chi ti???t</b>";
      noidung += "<br>";
      noidung += "<b>T??n: </b>" + object.name + "<br>";
      noidung += "<b>K??nh nh???n: </b>" + object.kenhnhan + "<br>";
      noidung += "<b>Ng??y c???p: </b>" + object.ngayCap + "<br>";
      noidung += "<b>S??? GP: </b>" + object.sogp + "<br>";
      noidung += "<b>SDT: </b>" + object.sdt + "<br>";
      noidung += "<b>X??: </b>" + object.xa + "<br>";
      noidung += "<b>Lo???i k??nh: </b>" + object.loaikenh + "<br>";

      break;
    default:
  }
  marker.bindPopup(noidung).openPopup();
}
