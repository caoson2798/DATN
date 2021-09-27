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
<?php include 'header.php'?>
    <div class="container">
        <?php
              $conn_string = "host=localhost port=5432 dbname=BTL user=postgres password=geoserver";
              $dbconn = pg_connect($conn_string);
              $result = pg_query($dbconn,"SELECT * FROM dam_polygon ORDER BY gid");
        ?>
      <div class="row">
        <div class="col-8"><h1>Dữ Liệu Đầm</h1></div>
        <div class="col-4"><form action="export.php" method="POST" class="pull-right">
          <input type="submit" name="export_dam" class="btn btn-success export" value="export">
        </form>
      </div>
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
                            <td>
                              <button class="btn btn-info editbtn" type="button">Edit</button>
                            </td>
                    </tr>
                </tbody>
                        <?php endwhile;?>
        </table>
    </div>
    
    <!-- form thong tin cong -->
    <div class="modal" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="process.php" method="POST">

          <div class="modal-body">
              <input type="hidden" name="gid_u" id="gid">

              <div class="form-group">
                <label>name</label>
                <input type="text" class="form-control" name="name_u" id="name"  placeholder="Enter name">
              </div>

              <div class="form-group">
                <label>Chiều dài</label>
                <input type="text" class="form-control" name="leng_u" id="leng" placeholder="Enter leng">
              </div> 

               <div class="form-group">
                <label>Chiều rộng</label>
                <input type="text" class="form-control" name="area_u" id="area" placeholder="Enter area">
              </div>     
                      
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <input type="submit" value="Update" name="update_dam" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
      $(document).ready(function(){
        $('.editbtn').on('click',function(){
            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
              return $(this).text();
            }).get();

            // console.log(data);

            $('#gid').val(data[0]);
            $('#name').val(data[1]);
            $('#leng').val(data[2]);
            $('#area').val(data[3]);
        });
      });
    </script>
</body>
</html>