<?php

function searchByDiemNhanThai($key)
{
    require("conn.php");
    $sql = "SELECT tendn as name,thon,diachi,kenhnhan,sogp,sdt ,ngaycap,xa,loaikenh,ST_AsGeoJson(geom) as geo from diem_nhan_thai_point Where UPPER(tendn) Like UPPER('%$key%') 
                                                                                    OR  UPPER(diachi) Like UPPER('%$key%')
                                                                                    OR  UPPER(thon) Like UPPER('%$key%') 
                                                                                    OR  UPPER(diachi) Like UPPER('%$key%') 
                                                                                    OR  UPPER(kenhnhan) Like UPPER('%$key%')
                                                                                    OR  UPPER(sogp) Like UPPER('%$key%') 
                                                                                    OR  UPPER(sdt) Like UPPER('%$key%')";
    // echo $sql;
    $result = pg_query($dbconn, $sql);
    return $result;
}
function getAllDataDiemNhanThai()
{
    require("conn.php");
    $sql = "SELECT * from diem_nhan_thai_point";
    $result = pg_query($dbconn, $sql);
    return $result;
}
function getDataLimitDiemNhanThai($limit, $start)
{
    require("conn.php");
    $sql = "SELECT * FROM diem_nhan_thai_point ORDER BY gid LIMIT $limit OFFSET $start";
    $result = pg_query($dbconn, $sql);
    return $result;
}
function updateDiemNhanThai($gid, $ten_hso, $dia_chi, $tt_hd, $dvi_qly, $vung_pvu)
{
    require("conn.php");
    $sql = "UPDATE nha_may_nnuoc_sacch_point SET dvi_qly=N'$dvi_qly', dia_chi=N'$dia_chi', tt_hdong=N'$tt_hd',  ten_hso=N'$ten_hso',vung_pvu=N'$vung_pvu' WHERE gid='$gid'";
    // echo $sql;
    $result = pg_query($dbconn, $sql);
    return $result;
}
