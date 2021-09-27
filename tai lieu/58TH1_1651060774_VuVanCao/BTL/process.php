<?php
    $conn_string = "host=localhost port=5432 dbname=BTL user=postgres password=geoserver";
    $dbconn = pg_connect($conn_string);

    //update cau
    if (isset($_POST['update'])){

        $gid = $_POST['gid_u'];
        $name = $_POST['name_u'];
        $geom = $_POST['geom_u'];
      
        $query = "UPDATE cau SET name=N'$name' WHERE gid='$gid'";
        $result = pg_query($dbconn,$query);

        if(!$result){
            echo "Update failed";
        }
        else{
            header("Location: Cau.php");
        }
     }
     // update cong
     if (isset($_POST['update_cong'])){

        $gid = $_POST['gid_u'];
        $name = $_POST['name_u'];
        $popupinfo = $_POST['popupinfo_u'];
        $namxd = $_POST['namxd_u'];
        $vitri = $_POST['vitri_u'];
        $quymo = $_POST['quymo_u'];
        $vanhanh = $_POST['vanhanh_u'];
        $luuluong = $_POST['luuluong_u'];
        $cd_day = $_POST['cd_day_u'];
      
        $query = "UPDATE cong SET name=N'$name', popupinfo = N'$popupinfo', nam_xd='$namxd',
        vi_tri=N'$vitri', quy_mo=N'$quymo', van_hanh=N'$vanhanh', 
        luu_luong = '$luuluong', cd_day=N'$cd_day'  WHERE gid='$gid'";
        $result = pg_query($dbconn,$query);

        if(!$result){
            echo "Update failed";
        }
        else{
            header("Location: Cong.php");
        }
     }


     // update dam
     if (isset($_POST['update_dam'])){

        $gid = $_POST['gid_u'];
        $name = $_POST['name_u'];
        $leng = $_POST['leng_u'];
        $area = $_POST['area_u'];
      
        $query = "UPDATE dam_polygon SET name=N'$name',shape_leng='$leng', shape_area='$area' WHERE gid='$gid'";
        $result = pg_query($dbconn,$query);

        if(!$result){
            echo "Update failed";
        }
        else{
            header("Location: Dam.php");
        }
     }

     //update song
       // update dam
       if (isset($_POST['update_song'])){

        $gid = $_POST['gid_u'];
        $name = $_POST['name_u'];
        $leng = $_POST['leng_u'];
        $area = $_POST['area_u'];
      
        $query = "UPDATE song_polygon SET name=N'$name',shape_leng='$leng', shape_area='$area' WHERE gid='$gid'";
        $result = pg_query($dbconn,$query);

        if(!$result){
            echo "Update failed";
        }
        else{
            header("Location: Song.php");
        }
     }


     // update tram bom 
     if (isset($_POST['update_trambom'])){

        $gid = $_POST['gid_u'];
        $name = $_POST['name_u'];
        $ql = $_POST['ql_u'];
        $popup = $_POST['popup_u'];
        $namxd = $_POST['namxd_u'];
        $loaimay = $_POST['loaimay_u'];
        $maluc = $_POST['maluc_u'];
        $diennang = $_POST['diennang_u'];
      
        $query = "UPDATE tram_bom SET name=N'$name', folderpath = N'$ql', popupinfo=N'$popup',
        nam_xd='$namxd', loai_may=N'$loaimay', cs_text=N'$maluc', 
        dc_text= N'$diennang'  WHERE gid='$gid'";
        $result = pg_query($dbconn,$query);

        if(!$result){
            echo "Update failed";
        }
        else{
            header("Location: trambom.php");
        }
     }
?>