<?php

    function searchByCong($key){
        require("conn.php");
        $sql = "SELECT name,ST_AsGeoJson(geom) as geo from cong_point Where UPPER(name) Like UPPER('%$key%')" ;
        // echo $sql;
        $result = pg_query($dbconn, $sql);
        return $result;
    }
