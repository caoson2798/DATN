<?php

// function searchByCong($key)
// {
//     require("conn.php");
//     $sql = "SELECT name,ST_AsGeoJson(geom) as geo from cong_point Where UPPER(name) Like UPPER('%$key%')";
//     // echo $sql;
//     $result = pg_query($dbconn, $sql);
//     return $result;
// }

function getAllDataKenh()
{
    require("conn.php");
    $sql = "SELECT * from kenh_polyline";
    $result = pg_query($dbconn, $sql);
    return $result;
}
function getDataLimitKenh($limit, $start)
{
    require("conn.php");
    $sql = "SELECT * FROM kenh_polyline ORDER BY gid LIMIT $limit OFFSET $start";
    $result = pg_query($dbconn, $sql);
    return $result;
}

function updateKenh($gid, $ketcau,$chieudai,$cqql)
{
    require("conn.php");
    $sql = "UPDATE kenh_polyline SET ket_cau=N'$ketcau',chieu_dai='$chieudai',cqql=N'$cqql' WHERE gid='$gid'";
    // echo $sql;
    $result = pg_query($dbconn, $sql);
    return $result;
}
