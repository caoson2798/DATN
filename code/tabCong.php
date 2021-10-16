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



                //b1: tim tong so ban ghi
                $alldata = getAllData();
                $total = pg_num_rows($alldata);

                // b2: Tim current page
                $limit = 10;
                $current_page = isset($_GET['page']) ? $_GET["page"] : 1;

                //b3:tinh toan tong so phan trang
                $total_page = ceil($total / $limit);
                // echo $total_page;

                if (isset($_GET['sNext'])) {
                    $beginPage = $_GET['sNext'] > $total_page ? $total_page : $_GET['sNext'];
                    if (($_GET['sNext'] + 9) > $total_page) {
                        $endPage = $total_page;
                    } else {
                        $endPage =  $_GET['sNext'] + 9;
                    }
                    // $endPage = ($_GET['sNext'] + 9) > $total_page ? $total_page : $_GET['sNext'] + 9 ;
                    // echo $beginPage;
                } else {
                    $beginPage = 1;
                    $endPage = 10;
                }

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
                                    <i style="color:white;" class="fas fa-info-circle"></i>
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
                <li class="page-item <?php if (!isset($_GET['sNext']) || $beginPage == 1)
                                            echo "disabled";
                                        else echo "" ?>">
                    <a class="page-link" href="tabCong.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>&sNext=<?php echo $_GET['sNext'] - 10 ?>" tabindex="-1">Previous</a>
                </li>
                <?php
                for ($i = $beginPage; $i <= $endPage; $i++) {
                ?>
                    <li class="page-item <?php echo $current_page == $i ? "active" : "" ?>"><a class="page-link" href="tabCong.php?page=<?php echo $i ?>&sNext=<?php echo isset($_GET['sNext']) ? $_GET['sNext'] : 1 ?>"><?php echo $i ?></a></li>
                <?php
                }
                ?>
                <li class="page-item  <?php if (isset($_GET['sNext']) && $_GET['sNext'] + 9 > $total_page)
                                            echo "disabled";
                                        else echo "" ?> ">
                    <a class="page-link" href="tabCong.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>&sNext=<?php echo $endPage + 1 ?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin chi tiết</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



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

                </div>

            </div>
        </div>
</body>

<?php require("footer.php") ?>