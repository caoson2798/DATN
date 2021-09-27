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
        <div class="row">
        <div class="col-8">
          <h1>Dữ Liệu Cống</h1>
          <form action="" method="POST">
                <input type="text" name="searchbox">
                <input type="submit" name="search" value="search" class="btn btn-success">
          </form>
        </div>
        <!-- <div class="col-4">
            <form action="export.php" method="POST">
                <input type="submit" name="export_cong" class="btn btn-success export" value="export">
            </form>
      </div> -->
        <?php
            // connect db
            $output="";
              $conn_string = "host=localhost port=5432 dbname=BTL user=postgres password=geoserver";
              $dbconn = pg_connect($conn_string);
            //   $result = pg_query($dbconn,"SELECT * FROM cong");
            //tim tong record
            $result = pg_query($dbconn, 'SELECT count(gid) as total from cong');
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
              $query = "SELECT * FROM cong ORDER BY gid LIMIT $limit OFFSET $start";
              $result=pg_query($dbconn,$query);

            $Previous = $current_page -1;
            $Next = $current_page + 1;
        ?>
      
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">gid</th>
                        <th scope="col">name</th>
                        <th scope="col">poupinfo</th>
                        <th scope="col">namxd</th>
                        <th scope="col">vi tri</th>
                        <th scope="col">quy mo</th>
                        <th scope="col">van hanh</th>
                        <th scope="col">luu luong</th>
                        <th scope="col">cd_day</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = pg_fetch_assoc($result)):?>
                    <tr>
                            <td><?php echo $row['gid'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['popupinfo'];?></td>
                            <td><?php echo $row['nam_xd'];?></td>
                            <td><?php echo $row['vi_tri'];?></td>
                            <td><?php echo $row['quy_mo'];?></td>
                            <td><?php echo $row['van_hanh'];?></td>
                            <td><?php echo $row['luu_luong'];?></td>
                            <td><?php echo $row['cd_day'];?></td>
                            <!-- <td>
                              <button class="btn btn-info editbtn" type="button">Edit</button>
                            </td> -->
                    </tr>
                </tbody>
                        <?php endwhile;?>
        </table>
    </div>
    <!-- phan trang --> 
        <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="Cong_1.php?page=<?=$Previous;?>">Previous</a></li>
            <?php
                for ($i = 1; $i <= $total_page; $i++) :
            ?>
            <li class="page-item "><a class="page-link" href="Cong_1.php?page=<?=$i;?>"><?=$i;?></a></li>
                <?php endfor;?>
            <li class="page-item"><a class="page-link" href="Cong_1.php?page=<?=$Next;?>">Next</a></li>
        </ul>
        </nav>
</div>
</body>
</html>