var mymap = L.map("mapid", {
  zoomControl: true,
  maxZoom: 50,
  minZoom: 3,
}).fitBounds([
  [20.61142322792599, 106.38637028789354],
  [20.778631818033, 106.6135772544507],
]);

var OSM = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  attribution:
    '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
  zIndex: 1,
  transparent: true,
});

mymap.addLayer(OSM);

var url = "http://localhost:8080/geoserver/DATN/wms";
var style= {
  
}
//cac layer
var CongDuoiDe1 = L.Geoserver.wfs("http://localhost:8080/geoserver/DATN/wfs", {
  layers: "DATN:cong_duoi_de_point",
  style: {
    color: "#ff7800",
    weight: 5,
    opacity: 0.65,
  },
  onEachFeature: function (feature, layer) {
    console.log(feature);
    layer.bindPopup(
      feature.properties ? feature.properties["objectid"] + "" : "blo"
    );
  },
  // CQL_FILTER: "district='Syangja'",
});
var CongDuoiDe = L.tileLayer.betterWms(url, {
  layers: 'cong_duoi_de_point',
  transparent: true,
  format: 'image/png',
  crs: L.CRS.EPSG4326
});

var Cong = L.Geoserver.wms(url, {
  layers: "DATN:cong_point",
});
var TramBom = L.Geoserver.wms(url, {
  layers: "DATN:tram_bom_point",
});
var Kenh = L.Geoserver.wms(url, {
  layers: "kenh_polyline",
});
var De = L.Geoserver.wms(url, {
  layers: "DATN:de_tw",
});
var NhaMayNuocSach = L.Geoserver.wms(url, {
  layers: "DATN:nha_may_nnuoc_sacch_point",
});
var DiemNhanThai = L.Geoserver.wms(url, {
  layers: "DATN:diem_nhan_thai_point",
});
var DiemXaThai = L.Geoserver.wms(url, {
  layers: "DATN:diem_xa_thai_point",
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
        mymap.fitBounds(CongDuoiDe1.getBounds());
        CongDuoiDe.addTo(mymap);
        // CongDuoiDe.bindPopup(popup).openPopup();
        break;
      case "chk-cong":
        mymap.fitBounds(CongDuoiDe1.getBounds());
        Cong.addTo(mymap);
        break;
      case "chk-trambom":
        TramBom.addTo(mymap);
        break;
      case "chk-kenh":
        Kenh.addTo(mymap);
        break;
      case "chk-de":
        De.addTo(mymap);
        break;
      case "chk-nhamaynuocsach":
        NhaMayNuocSach.addTo(mymap);
        break;
      case "chk-diemnhanthai":
        DiemNhanThai.addTo(mymap);
        break;
      case "chk-diemxathai":
        DiemXaThai.addTo(mymap);
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
      default:
        alert("ko co j het tron a");
    }
  }
}