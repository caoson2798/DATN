<?php

function searchByDiemXaThai($key)
{
    require("conn.php");
    $sql = "SELECT tendn as name,thon,diachi,kenhnhan,sogp,sdt ,ngaycap,xa,loaikenh,ST_AsGeoJson(geom) as geo from diem_xa_thai_point Where UPPER(tendn) Like UPPER('%$key%') 
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
function getAllDataDiemXaThai()
{
    require("conn.php");
    $sql = "SELECT * from diem_xa_thai_point";
    $result = pg_query($dbconn, $sql);
    return $result;
}
function getDataLimitDiemXaThai($limit, $start)
{
    require("conn.php");
    $sql = "SELECT * FROM diem_xa_thai_point ORDER BY gid LIMIT $limit OFFSET $start";
    $result = pg_query($dbconn, $sql);
    return $result;
}
function updateDiemXaThai($gid, $dia_chi, $thon, $kenh_nhan, $loai_kenh, $nganhsx,$sogp,$sdt)
{
    require("conn.php");
    $sql = "UPDATE diem_xa_thai_point SET diachi=N'$dia_chi', thon=N'$thon', kenhnhan=N'$kenh_nhan',  loaikenh=N'$loai_kenh',nganhsx=N'$nganhsx', sogp=N'$sogp', sdt=N'$sdt' WHERE gid='$gid'";
    // echo $sql;
    $result = pg_query($dbconn, $sql);
    return $result;
}
