<?php

    function searchByCong($key){
        require("conn.php");
        $sql = "SELECT name,ST_AsGeoJson(geom) as geo from cong_point Where UPPER(name) Like UPPER('%$key%')" ;
        // echo $sql;
        $result = pg_query($dbconn, $sql);
        return $result;
    }

    function getAllData(){
        require("conn.php");
        $sql= "SELECT * from cong_point";
        $result = pg_query($dbconn,$sql);
        return $result;
    } 
    function getDataLimit($limit, $start){
        require("conn.php");
        $sql= "SELECT * FROM cong_point ORDER BY gid LIMIT $limit OFFSET $start";
        $result = pg_query($dbconn,$sql);
        return $result;
    }
