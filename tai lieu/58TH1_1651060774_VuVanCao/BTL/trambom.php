<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thong ke cau</title>
    <style>
      .export{
        margin-top:10px;
        margin-left:280px;
      }
    </style>
</head>
<body> 
<?php include 'header.php'?>
    <div class="container">
        <div class="row">
            <div class="col-8">
            <h1>Dữ Liệu Trạm Bơm</h1>
            <form action="" method="POST">
                    <input type="text" name="searchbox">
                    <input type="submit" name="search" value="search" class="btn btn-success">
            </form>
            </div>
            
            <div class="col-4">
            <!-- export -->
              <form action="export.php" method="POST">
                  <input type="submit" name="export_trambom" class="btn btn-success export" value="export">
              </form>
        </div>
        <?php
            // connect db
            $output="";
              $conn_string = "host=localhost port=5432 dbname=BTL user=postgres password=geoserver";
              $dbconn = pg_connect($conn_string);
            //   $result = pg_query($dbconn,"SELECT * FROM cong");
            //tim tong record
            $result = pg_query($dbconn, 'SELECT count(gid) as total from tram_bom');
            $row = pg_fetch_assoc($result);
            $total_records = $row['total'];

            // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 10;

            // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
            // tổng số trang
            $total_page = ceil($total_records / $limit);

            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;

            // $result = pg_query($dbconn, "SELECT * FROM cong ORDER BY gid LIMIT $limit OFFSET $start ");
              $query = "SELECT * FROM tram_bom ORDER BY gid LIMIT $limit OFFSET $start";
              $result=pg_query($dbconn,$query);

            $Previous = $current_page -1;
            $Next = $current_page + 1;
        ?>
      
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">gid</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Quản lý</th>
                        <th scope="col">Thông tin chi tiết</th>
                        <th scope="col">Năm xd</th>
                        <th scope="col">Loại máy</th>
                        <th scope="col">Mã lực</th>
                        <th scope="col">Điện năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = pg_fetch_assoc($result)):?>
                    <tr>
                            <td><?php echo $row['gid'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['folderpath'];?></td>
                            <td><?php echo $row['popupinfo'];?></td>
                            <td><?php echo $row['nam_xd'];?></td>
                            <td><?php echo $row['loai_may'];?></td>
                            <td><?php echo $row['cs_text'];?></td>
                            <td><?php echo $row['dc_text'];?></td>
                            <td>
                              <button class="btn btn-info editbtn" type="button">Edit</button>
                            </td>
                    </tr>
                </tbody>
                        <?php endwhile;?>
        </table>
    </div>
    <!-- phan trang --> 
        <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="trambom.php?page=<?=$Previous;?>">Previous</a></li>
            <?php
                for ($i = 1; $i <= $total_page; $i++) :
            ?>
            <li class="page-item "><a class="page-link" href="trambom.php?page=<?=$i;?>"><?=$i;?></a></li>
                <?php endfor;?>
            <li class="page-item"><a class="page-link" href="trambom.php?page=<?=$Next;?>">Next</a></li>
        </ul>
        </nav>

        <!-- form thong tin tram bom -->
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
                <label>Quản lý</label>
                <input type="text" class="form-control" name="ql_u" id="ql" placeholder="Enter geom">
              </div>
              <div class="form-group">
                <label>Thông tin</label>
                <input type="text" class="form-control" name="popup_u" id="popup" placeholder="Enter geom">
              </div>
              <div class="form-group">
                <label>Năm xd</label>
                <input type="text" class="form-control" name="namxd_u" id="namxd" placeholder="Enter geom">
              </div>
              <div class="form-group">
                <label>Loại máy</label>
                <input type="text" class="form-control" name="loaimay_u" id="loaimay" placeholder="Enter geom">
              </div>
              <div class="form-group">
                <label>Mã lực</label>
                <input type="text" class="form-control" name="maluc_u" id="maluc" placeholder="Enter geom">
              </div>
              <div class="form-group">
                <label>Điện năng</label>
                <input type="text" class="form-control" name="diennang_u" id="diennang" placeholder="Enter geom">
              </div>   
          </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <input type="submit" value="Update" name="update_trambom" class="btn btn-primary">
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
            $('#ql').val(data[2]);
            $('#popup').val(data[3]);
            $('#namxd').val(data[4]);
            $('#loaimay').val(data[5]);
            $('#maluc').val(data[6]);
            $('#diennang').val(data[7]);
        });
      });


    </script>
</div>
</body>
</html>