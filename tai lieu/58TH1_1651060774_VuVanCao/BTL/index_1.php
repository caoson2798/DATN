<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.vectorgrid@latest/dist/Leaflet.VectorGrid.bundled.js"></script>
    <style>
        #map {
            position: absolute;
            top:50px;
            right: 0px;
            bottom: 0px;
            left: 0px;
            } 
    </style>
</head>
<body>
    <?php include 'header_1.php';?>
    <div id="map"></div>
    <!-- <script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script> -->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="./script/map.js"></script>
    <script src="./script/layer.js"></script>
</body>
</html>