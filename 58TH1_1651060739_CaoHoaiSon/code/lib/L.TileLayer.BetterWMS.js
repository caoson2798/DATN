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
    // alert(content);
    contentJson = JSON.parse(content);
    console.log(contentJson);

    var noidung = "";
    var layer = this.wmsParams.layers;
    // alert(layer+"");
    //   this._map.fitBounds(layer.getBounds());
    var data = contentJson.features[0].properties;
    var ten = data.name;
    // console.log(ten)

    // cong duoi de va cong
    var hethong = data.name;
    var popupinfo =
      data.popupinfo === null ? "khong co thong tin" : data.popupinfo;

    //kenh
    var tenKenh = data.ten_kenh;
    var cqql = data.cqql;
    var ketCau = data.ket_cau;
    var chieuDai = data.shape_leng;
    // de
    var ten_de= data.ten_tuyen;
    var loai_de= data.loai_de;
    var cap_de = data.cap_de;
    var chieu_dai_de= data.chieu_dai;
    // nha may nuoc
    var ngayCapNhat = data.cap_nhat;
    var cl_dky = data.cl_dky;
    var cs_thucte = data.cs_thucte;
    var dieukien = data.dg_kn_ncap;
    var diachi = data.dia_chi;
    var donViQLy = data.dvi_qly;
    var huyen = data.huyen;
    var NguonCap = data.nguon_cap;
    var tenNMN = data.ten_nmn;
    var vungpv = data.vung_pvu;

    // diem nhan thai
    var diaChiNhanThai = data.diachi;
    var kenhNhan = data.kenhnhan;
    var loaiKenh = data.loaikenh;
    var ngayCap = data.ngaycap;
    var sdt = data.sdt;
    var sogp = data.sogp;
    var tendn = data.tendn;
    var xa = data.xa;

    if (layer == "cong_duoi_de_point") {
      noidung += "<b>Thông tin chi tiết</b>";
      noidung += "<br>";
      noidung += "<b>Tên: </b>" + ten + "<br>";
      noidung += "<b>Thông tin: </b>" + popupinfo + "<br>";
    } else if (layer == "cong_point") {
      noidung += "<b>Thông tin chi tiết</b>";
      noidung += "<br>";
      noidung += "<b>Tên: </b>" + ten + "<br>";
      noidung += "<b>Thông tin: </b>" + popupinfo + "<br>";
    } else if (layer == "tram_bom_point") {
      noidung += "<b>Thông tin chi tiết</b>";
      noidung += "<br>";
      noidung += "<b>Tên trạm bơm: </b>" + ten + "<br>";
      noidung += "<b>Thông tin: </b>" + popupinfo + "<br>";
    } else if (layer == "kenh_polyline") {
      noidung += "<b>Thông tin chi tiết</b>";
      noidung += "<br>";
      noidung += "<b>Tên kênh: </b>" + tenKenh + "<br>";
      noidung += "<b>Dài: </b>" + chieuDai + "<br>";

      L.popup({ maxWidth: 800 })
        .setLatLng(latlng)
        .setContent(noidung)
        .openOn(this._map);
    } else if (layer == "de_tw") {
      noidung += "<b>Thông tin chi tiết</b>";
      noidung += "<br>";
      noidung += "<b>Tên: </b>" + ten_de + "<br>";
      noidung += "<b>Loại đê </b>" + loai_de + "<br>";
      noidung += "<b>Cấp đê </b>" + cap_de + "<br>";
      noidung += "<b>Chiều dài: </b>" + chieu_dai_de + "<br>";
    } else if (layer == "nha_may_nuoc_sach_point") {
      noidung += "<b>Thông tin chi tiết</b>";
      noidung += "<br>";
      noidung += "<b>Tên nhà máy nc: </b>" + tenNMN + "<br>";
      noidung += "<b>Hoạt động: </b>" + dieukien + "<br>";
      noidung += "<b>Địa chỉ: </b>" + diachi + "<br>";
      noidung += "<b>Đơn vị qly: </b>" + donViQLy + "<br>";
      noidung += "<b>Nguồn cấp: </b>" + NguonCap + "<br>";
      noidung += "<b>Huyện: </b>" + huyen + "<br>";
      noidung += "<b>Vùng pv: </b>" + "<p>" + vungpv + "</p>" + "<br>";
    } else if (layer == "diem_nhan_thai_point") {
      noidung += "<b>Thông tin chi tiết</b>";
      noidung += "<br>";
      noidung += "<b>Tên: </b>" + tendn + "<br>";
      noidung += "<b>Kênh nhận: </b>" + kenhNhan + "<br>";
      noidung += "<b>Ngày cấp: </b>" + ngayCap + "<br>";
      noidung += "<b>Số GP: </b>" + sogp + "<br>";
      noidung += "<b>SDT: </b>" + sdt + "<br>";
      noidung += "<b>Xã: </b>" + xa + "<br>";
      noidung += "<b>Loại kênh: </b>" + loaiKenh + "<br>";
    } else if (layer == "diem_xa_thai_point") {
      noidung += "<b>Thông tin chi tiết</b>";
      noidung += "<br>";
      noidung += "<b>Tên: </b>" + tendn + "<br>";
      noidung += "<b>Kênh nhận: </b>" + kenhNhan + "<br>";
      noidung += "<b>Ngày cấp: </b>" + ngayCap + "<br>";
      noidung += "<b>Số GP: </b>" + sogp + "<br>";
      noidung += "<b>SDT: </b>" + sdt + "<br>";
      noidung += "<b>Xã: </b>" + xa + "<br>";
      noidung += "<b>Loại kênh: </b>" + loaiKenh + "<br>";
    }

    if (contentJson.features.length > 0) {
      // console.log("2")
      L.popup({ maxWidth: 800 })
        .setLatLng(latlng)
        .setContent(noidung)
        .openOn(this._map);
    }
  },
});

// L.tileLayer.betterWms = function (url, options) {
//   return new L.TileLayer.BetterWMS(url, options);
// };
L.tileLayer.betterWms = function (options, url) {
  return new L.TileLayer.BetterWMS(options, url);
};
