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
