<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong ke cau</title>
    <style>
      .export{
        margin-top:10px;
        margin-left:260px;
      }
    </style>
</head>
<body>
<?php include 'header_1.php'?>
    <div class="container">
        <?php
              $conn_string = "host=localhost port=5432 dbname=BTL user=postgres password=geoserver";
              $dbconn = pg_connect($conn_string);
              $result = pg_query($dbconn,"SELECT * FROM dam_polygon ORDER BY gid");
        ?>
      <div class="row">
        <div class="col-8"><h1>Dữ Liệu Đầm</h1></div>
        <!-- <div class="col-4"><form action="export.php" method="POST" class="pull-right">
          <input type="submit" name="export_dam" class="btn btn-success export" value="export">
        </form>
      </div> -->
      </div>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">gid</th>
                        <th scope="col">Tên</th>
                        <th scope="col">chiều dài</th>
                        <th scope="col">chiều rộng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = pg_fetch_assoc($result)):?>
                    <tr>
                            <td><?php echo $row['gid'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['shape_leng'];?></td>
                            <td><?php echo $row['shape_area'];?></td>
                            <!-- <td>
                              <button class="btn btn-info editbtn" type="button">Edit</button>
                            </td> -->
                    </tr>
                </tbody>
                        <?php endwhile;?>
        </table>
    </div>
    
</body>
</html>