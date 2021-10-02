L.TileLayer.BetterWMS = L.TileLayer.WMS.extend({
  onAdd: function (map) {
    // Triggered when the layer is added to a map.
    //   Register a click listener, then do all the upstream WMS things
    L.TileLayer.WMS.prototype.onAdd.call(this, map);
    map.on("click", this.getFeatureInfo, this);
  },

  onRemove: function (map) {
    // Triggered when the layer is removed from a map.
    //   Unregister a click listener, then do all the upstream WMS things
    L.TileLayer.WMS.prototype.onRemove.call(this, map);
    map.off("click", this.getFeatureInfo, this);
  },

  getFeatureInfo: function (evt) {
    // Make an AJAX request to the server and hope for the best
    var url = this.getFeatureInfoUrl(evt.latlng),
      showResults = L.Util.bind(this.showGetFeatureInfo, this);
    $.ajax({
      // url: url,
      url: "proxy.php?url=" + encodeURIComponent(url),
      success: function (data, status, xhr) {
        var err = typeof data === "string" ? null : data;
        showResults(err, evt.latlng, data);
      },
      error: function (xhr, status, error) {
        showResults(error);
      },
    });
  },

  getFeatureInfoUrl: function (latlng) {
    // Construct a GetFeatureInfo request URL given a point
    var point = this._map.latLngToContainerPoint(latlng, this._map.getZoom()),
      size = this._map.getSize(),
      params = {
        request: "GetFeatureInfo",
        service: "WMS",
        srs: "EPSG:4326",
        styles: this.wmsParams.styles,
        transparent: this.wmsParams.transparent,
        version: this.wmsParams.version,
        format: this.wmsParams.format,
        bbox: this._map.getBounds().toBBoxString(),
        height: size.y,
        width: size.x,
        layers: this.wmsParams.layers,
        query_layers: this.wmsParams.layers,
        // info_format: 'text/html'
        info_format: "application/json",
      };

    params[params.version === "1.3.0" ? "i" : "x"] = point.x;
    params[params.version === "1.3.0" ? "j" : "y"] = point.y;

    return this._url + L.Util.getParamString(params, this._url, true);
  },

  showGetFeatureInfo: function (err, latlng, content) {
    if (err) {
      console.log(err);
      return;
    } // do nothing if there's an error
    //   alert(content)
    content = JSON.parse(content);
    //   console.log(content);
    //   t1 = content;
    var noidung = "aloo";
    var layer = this.wmsParams.layers;
    //   this._map.fitBounds(layer.getBounds());

    //   var ten = t1.features[0].properties.name;
    //   // cong
    //   var namxd = t1.features[0].properties.nam_xd;
    //   var vitri = t1.features[0].properties.vi_tri;
    //   var quymo = t1.features[0].properties.quy_mo;
    //   var vanhanh = t1.features[0].properties.van_hanh;
    //   var luuluong = t1.features[0].properties.luu_luong;
    //   // dam
    //   var shape_leng = t1.features[0].properties.shape_leng;
    //   var shape_area = t1.features[0].properties.shape_area;
    //   //tram bom
    //   var loai_may = t1.features[0].properties.loai_may;

    //   if(layer == "cau"){
    //     noidung+='<b>Thông tin chi tiết</b>';
    //     noidung+='<br>';
    //     noidung+='<b>Tên: </b>'+ten+'<br>';
    //   }else if(layer == 'cong'){
    //     noidung+='<b>Thông tin chi tiết</b>';
    //     noidung+='<br>';
    //     noidung+='<b>Tên: </b>'+ten+'<br>';
    //     noidung+='<b>Năm xd: </b>'+namxd+'<br>';
    //     noidung+='<b>vị trí: </b>'+vitri+'<br>';
    //     noidung+='<b>quy mô: </b>'+quymo+'<br>';
    //     noidung+='<b>vân hành: </b>'+vanhanh+'<br>';
    //     noidung+='<b>lưu lượng: </b>'+luuluong+'<br>';
    //   }else if(layer == 'dam_polygon'){
    //     noidung+='<b>Thông tin chi tiết</b>';
    //     noidung+='<br>';
    //     noidung+='<b>Tên: </b>'+ten+'<br>';
    //     noidung+='<b>Dài: </b>'+shape_leng+'<br>';
    //     noidung+='<b>Rộng: </b>'+shape_area+'<br>';
    //   }else if(layer == 'song_polygon'){
    //     noidung+='<b>Thông tin chi tiết</b>';
    //     noidung+='<br>';
    //     noidung+='<b>Tên: </b>'+ten+'<br>';
    //     noidung+='<b>Dài: </b>'+shape_leng+'<br>';
    //     noidung+='<b>Rộng: </b>'+shape_area+'<br>';
    //   }else if(layer == 'tram_bom'){
    //     noidung+='<b>Thông tin chi tiết</b>';
    //     noidung+='<br>';
    //     noidung+='<b>Tên: </b>'+ten+'<br>';
    //     noidung+='<b>Năm xd: </b>'+namxd+'<br>';
    //     noidung+='<b>Loại máy: </b>'+loai_may+'<br>';
    //   }

    if (content.features.length > 0)
      L.popup({ maxWidth: 800 })
        .setLatLng(latlng)
        .setContent(noidung)
        .openOn(this._map);
  },
});

// L.tileLayer.betterWms = function (url, options) {
//   return new L.TileLayer.BetterWMS(url, options);
// };
L.tileLayer.betterWms = function (options, url) {
  return new L.TileLayer.BetterWMS(options, url);
};
