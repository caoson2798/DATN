<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong ke cau</title>
</head>
<body>
<?php include 'header_1.php'?>
    <div class="container">
        <?php
              $conn_string = "host=localhost port=5432 dbname=BTL user=postgres password=geoserver";
              $dbconn = pg_connect($conn_string);
              $result = pg_query($dbconn,"SELECT * FROM cau ORDER BY gid");
        ?>
        <div class="col-8"><h1>Dữ Liệu Cầu</h1></div>
      <!-- <div class="row">
        <div class="col-8"><h1>Dữ Liệu Cầu</h1></div>
        <div class="col-4"><form action="export.php" method="POST" class="pull-right">
          <input type="submit" name="export_cau" class="btn btn-success export" value="export">
        </form>
      </div> -->
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">gid</th>
                        <th scope="col">name</th>
                        <th scope="col">geom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = pg_fetch_assoc($result)):?>
                    <tr>
                            <td><?php echo $row['gid'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['geom'];?></td>
                    </tr>
                </tbody>
                        <?php endwhile;?>
        </table>
    </div>
    
    
  
</body>
</html>