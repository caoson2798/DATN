<?php

function searchByNmn($key)
{
    require("conn.php");
    $sql = "SELECT ten_nmn as name,dia_chi,dvi_qly,nguon_cap,huyen,vung_pvu,dg_kn_ncap as status,ST_AsGeoJson(geom) as geo from nha_may_nnuoc_sacch_point Where UPPER(ten_nmn) Like UPPER('%$key%') 
                                                                                                OR  UPPER(dia_chi) Like UPPER('%$key%')  
                                                                                                OR  UPPER(dvi_qly) Like UPPER('%$key%')";
    // echo $sql;
    $result = pg_query($dbconn, $sql);
    return $result;
}
function getAllDataNMNS()
{
    require("conn.php");
    $sql = "SELECT * from nha_may_nnuoc_sacch_point";
    $result = pg_query($dbconn, $sql);
    return $result;
}
function getDataLimitNMNS($limit, $start)
{
    require("conn.php");
    $sql = "SELECT * FROM nha_may_nnuoc_sacch_point ORDER BY gid LIMIT $limit OFFSET $start";
    $result = pg_query($dbconn, $sql);
    return $result;
}
function updateNMC($gid, $ten_hso,$dia_chi,$tt_hd,$dvi_qly)
{
    require("conn.php");
    $sql = "UPDATE kenh_polyline SET ket_cau=N'$ketcau',chieu_dai='$chieudai',cqql=N'$cqql' WHERE gid='$gid'";
    // echo $sql;
    $result = pg_query($dbconn, $sql);
    return $result;
}