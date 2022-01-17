<?php
$host = "localhost";
$port= "5432";
$db_name="TL_VinhBao";
$user = "postgres";
$password = "chson2798";

// $conn_string = "host='.$host.' port=5432 dbname='.$db_name.' user='.$user.' password='.$password.'";
$conn_string = "host=localhost port=5432 dbname=TL_VinhBao user=postgres password=chson2798";
// $conn_string = "host="..
$dbconn = pg_connect($conn_string);

