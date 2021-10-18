<?php

function searchByTramBom($key)
{
    require("conn.php");
    $sql = "SELECT name,ST_AsGeoJson(geom) as geo from tram_bom_point Where UPPER(name) Like UPPER('%$key%')";
    // echo $sql;
    $result = pg_query($dbconn, $sql);
    return $result;
}
function getAllTramBom()
{
    require("conn.php");
    $sql = "SELECT * from tram_bom_point";
    $result = pg_query($dbconn, $sql);
    return $result;
}
function getDataLimitTramBom($limit, $start)
{
    require("conn.php");
    $sql = "SELECT * FROM tram_bom_point ORDER BY gid LIMIT $limit OFFSET $start";
    $result = pg_query($dbconn, $sql);
    return $result;
}
