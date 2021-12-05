<?php


function getAllDataDe()
{
    require("conn.php");
    $sql = "SELECT * from de_tw";
    $result = pg_query($dbconn, $sql);
    return $result;
}

