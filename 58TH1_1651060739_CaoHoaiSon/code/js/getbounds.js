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

var Cong1 = L.Geoserver.wfs("http://localhost:8080/geoserver/DATN/wfs", {
  layers: "DATN:cong_point",
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

var TramBom1 = L.Geoserver.wfs("http://localhost:8080/geoserver/DATN/wfs", {
  layers: "DATN:tram_bom_point",
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

var Kenh1 = L.Geoserver.wfs("http://localhost:8080/geoserver/DATN/wfs", {
  layers: "kenh_polylinet",
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


var De1 = L.Geoserver.wfs("http://localhost:8080/geoserver/DATN/wfs", {
  layers: "DATN:de_tw",
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


var NhaMayNuocSach1 = L.Geoserver.wfs("http://localhost:8080/geoserver/DATN/wfs", {
  layers: "DATN:nha_may_nnuoc_sacch_point",
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


var DiemNhanThai1 = L.Geoserver.wfs("http://localhost:8080/geoserver/DATN/wfs", {
  layers: "DATN:diem_nhan_thai_point",
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


var DiemXaThai1 = L.Geoserver.wfs("http://localhost:8080/geoserver/DATN/wfs", {
  layers: "DATN:diem_xa_thai_point",
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

export { CongDuoiDe1,Cong1,TramBom1,Kenh1,De1,NhaMayNuocSach1,DiemNhanThai1,DiemXaThai1 };


