<?php

// function searchByCong($key)
// {
//     require("conn.php");
//     $sql = "SELECT gid, name,ghi_chu,he_thong, ST_AsGeoJson(geom) as geo from cong_duoi_de_point Where UPPER(name) Like UPPER('%$key%')
//                                                                                         OR  UPPER(ghi_chu) Like UPPER('%$key%')  
//                                                                                         OR  UPPER(he_thong) Like UPPER('%$key%')";
//     // echo $sql;
//     $result = pg_query($dbconn, $sql);
//     return $result;
// }

function getAllDataCongDuoiDe()
{
    require("conn.php");
    $sql = "SELECT * from cong_point";
    $result = pg_query($dbconn, $sql);
    return $result;
}
function getDataLimitCongDuoiDe($limit, $start)
{
    require("conn.php");
    $sql = "SELECT * FROM cong_point ORDER BY gid LIMIT $limit OFFSET $start";
    $result = pg_query($dbconn, $sql);
    return $result;
}

function updateNoteCongDuoiDe($gid, $note)
{
    require("conn.php");
    $sql = "UPDATE cong_point SET ghi_chu=N'$note' WHERE gid='$gid'";
    // echo $sql;
    $result = pg_query($dbconn, $sql);
    return $result;
}
