<?php

function searchByNmn($key)
{
    require("conn.php");
    $sql = "SELECT ten_nmn as name,ST_AsGeoJson(geom) as geo from nha_may_nnuoc_sacch_point Where UPPER(ten_nmn) Like UPPER('%$key%') 
                                                                                                OR  UPPER(dia_chi) Like UPPER('%$key%')  
                                                                                                OR  UPPER(dvi_qly) Like UPPER('%$key%')";
    // echo $sql;
    $result = pg_query($dbconn, $sql);
    return $result;
}