<?php
//  if(!isset($_SESSION)) 
//  { 
//     ob_start();
//      session_start(); 
//  } 


// if (!isset($_SESSION['user'])) {
//     header("location:login.php");
// }
require("header.php");
if (isset($_POST['btn_update'])) {

    $gid = $_POST['ma_id'];
    $name = $_POST['ten_cong'];
    $note = $_POST['ghi_chu'];

    $resultUpdate = updateNote($gid, $note);
    // if($resultUpdate){
    //     echo "ok nhe";
    // }else{
    //     echo "eo ok";
    // }

}
?>


<body>
    <div style="position: relative;" class="container">
        <div class="d-flex flex-row w-100">
            <a class="my-3 w-100" href="tabCong.php">
                <h3>Dữ liệu Cống</h3>
            </a>
            <div class=" my-2 w-100">
                <form method="POST" class="pull-right form-inline w-100 d-flex justify-content-center">
                    <div class="inner-addon left-addon">
                        <i class="glyphicon fas fa-search"></i>
                        <input value="<?php echo isset($key) ? $key : "" ?>" name="key-search" required placeholder="nhập từ khóa" type="text" class="form-control input-search" />
                    </div>

                    <button class="btn btn-search my-2 " name="b-search">
                        Tìm kiếm
                    </button>

                    <!-- <input type="submit" name="export_dam" class="btn btn-primary export" value="Xuất excel"> -->
                </form>
            </div>
        </div>
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
                
                if (!isset($_POST['b-search'])) {
                    $dataPage = getDataLimit($limit, $start);
                } else {
                    $key = $_POST['key-search'];

                    $dataPage = searchByCong($key);
                }
                $count = pg_num_rows($dataPage);
                if ($count > 0) {
                    while ($row = pg_fetch_assoc($dataPage)) {
                ?>
                        <tr>
                            <td scope="row"><?php echo $row['gid'] ?></th>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['he_thong'] ?></td>
                            <td><?php echo $row['ghi_chu'] ?></td>
                            <td>
                                <button style="border-top-left-radius:0px ;" class="btn btn-success btn-detail" data-toggle="modal" data-target="#modalDetail">
                                    <i style="color:white;" class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <p>ko có dữ liệu</p>
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
                    <?php
                    if (!isset($_POST['b-search'])) {
                    ?>
                        <a class="page-link" href="tabCong.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>&sNext=<?php echo $_GET['sNext'] - 10 ?>" tabindex="-1">Previous</a>
                    <?php } ?>
                </li>
                <?php
                if (!isset($_POST['b-search'])) {
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
                <?php
                }
                ?>
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


                <form method="POST">
                    <div class="modal-body">


                        <div class="form-group">
                            <label>gid</label>
                            <input readonly type="text" class="form-control" name="ma_id" id="gid" placeholder="Enter area">
                        </div>

                        <div class="form-group">
                            <label>Tên cống</label>
                            <input readonly type="text" class="form-control" name="ten_cong" id="name" placeholder="Enter leng">
                        </div>

                        <div class="form-group">
                            <label>ghi chú</label>
                            <input type="text" class="form-control" name="ghi_chu" id="note" placeholder="Enter area">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="submit" value="Sửa" name="btn_update" class="btn btn-primary">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>

                    </div>
                </form>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('.btn-detail').on('click', function() {
                    // $('#modalDetail').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#gid').val(data[0]);
                    $('#name').val(data[1]);
                    $('#note').val(data[3]);

                });
            });
        </script>
</body>

<?php require("footer.php") ?>