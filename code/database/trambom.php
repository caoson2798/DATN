<?php

    function searchByTramBom($key){
        require("conn.php");
        $sql = "SELECT name,ST_AsGeoJson(geom) as geo from tram_bom_point Where UPPER(name) Like UPPER('%$key%')" ;
        // echo $sql;
        $result = pg_query($dbconn, $sql);
        return $result;
    }