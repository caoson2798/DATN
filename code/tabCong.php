<?php require("header.php") ?>


<body>
    <div class="container">
        <h3 class="my-3">Dữ liệu cống</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">gid</th>
                    <th scope="col">Tên cống</th>
                    <th scope="col">Hệ thống</th>
                    <th scope="col">Ghi chú</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $beginPage= 1;
                $endPage = 10;

                //b1: tim tong so ban ghi
                $alldata = getAllData();
                $total = pg_num_rows($alldata);

                // b2: Tim current page
                $limit = 10;
                $current_page = isset($_GET['page']) ? $_GET["page"] : 1;

                //b3:tinh toan tong so phan trang
                $total_page = ceil($total / $limit);

                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }

                // Tìm Start
                $start = ($current_page - 1) * $limit;

                $Previous = $current_page - 1;
                $Next = $current_page + 1;

                $dataPage = getDataLimit($limit, $start);
                $count = pg_num_rows($dataPage);
                if ($count > 0) {
                    while ($row = pg_fetch_assoc($dataPage)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $row['gid'] ?></th>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['he_thong'] ?></td>
                            <td><?php echo $row['ghi_chu'] ?></td>
                            <td>
                                <button style="border-top-left-radius:0px ;" class="btn btn-success" data-toggle="modal" data-target="#modalDetail">
                                    <i style="color:white;" class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>

                <?php
                }
                ?>
            </tbody>
        </table>
        
        <nav class="mt-3" aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="tabCong.php?page=<?php echo $Previous?>" tabindex="-1">Previous</a>
                </li>
                <?php
                for ($i = $beginPage; $i <= $endPage; $i++) {
                ?>
                    <li class="page-item <?php echo $current_page == $i ? "active" : "" ?>"><a class="page-link" href="tabCong.php?page=<?php echo $i?>"><?php echo $i?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="tabCong.php?page=<?php echo $Next?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" name="name_u" id="name" placeholder="Enter name">
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
</body>

<?php require("footer.php") ?>