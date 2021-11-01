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
// if (isset($_POST['btn_update'])) {

//     $gid = $_POST['ma_id'];
//     $name = $_POST['ten_kenh'];
//     $ketcau = $_POST['ket_cau'];
//     $cqql = $_POST['cqql'];
//     $chieudai = $_POST['shape_leng'];

//     $resultUpdate = updateKenh($gid, $ketcau,$chieudai,$cqql);
//     // if($resultUpdate){
//     //     echo "ok nhe";
//     // }else{
//     //     echo "eo ok";
//     // }

// }
?>


<body style="overflow-y: scroll;">
    <div style="position: relative;" class="container">
        <h3 class="my-3">Dữ liệu Kênh</h3>
        <div class="mx-5 my-2" style="position: absolute; top:0; right: 0;">
            <form action="export.php" method="POST" class="pull-right">
                <button class="btn btn-primary export">
                    <i class="fas fa-download"></i>
                    <labe class="font-weight-bold" for="">Xuất excel</label>
                </button>

                <!-- <input type="submit" name="export_dam" class="btn btn-primary export" value="Xuất excel"> -->
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">gid</th>
                    <th scope="col">Tên NMN</th>
                    <th scope="col">Tên hồ sơ</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Đơn vị quản lý</th>
                    <th scope="col">Trạng thái hoạt động</th>

                </tr>
            </thead>
            <tbody>
                <?php



                //b1: tim tong so ban ghi
                $alldata = getAllDataNMNS();
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
                    $endPage = $total_page > 10 ? 10 : $total_page;
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

                $dataPage = getDataLimitNMNS($limit, $start);
                $count = pg_num_rows($dataPage);
                if ($count > 0) {
                    while ($row = pg_fetch_assoc($dataPage)) {
                ?>
                        <tr>
                            <td scope="row"><?php echo $row['gid'] ?></th>
                            <td><?php echo $row['ten_nmn'] ?></td>
                            <td><?php echo $row['ten_hso'] !== null ? $row['ten_hso'] : "chưa có dữ liệu" ?></td>
                            <td><?php echo $row['dia_chi'] ?></td>
                            <td><?php echo $row['dvi_qly'] ?></td>
                            <td class="d-flex justify-content-center font-italic"><?php echo $row['tt_hdong'] ?></td>

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
                    <a class="page-link" href="tabNMNS.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>&sNext=<?php echo $_GET['sNext'] - 10 ?>" tabindex="-1">Previous</a>
                </li>
                <?php
                for ($i = $beginPage; $i <= $endPage; $i++) {
                ?>
                    <li class="page-item <?php echo $current_page == $i ? "active" : "" ?>"><a class="page-link" href="tabNMNS.php?page=<?php echo $i ?>&sNext=<?php echo isset($_GET['sNext']) ? $_GET['sNext'] : 1 ?>"><?php echo $i ?></a></li>
                <?php
                }
                ?>
                <li class="page-item  <?php if (isset($_GET['sNext']) && $_GET['sNext'] + 9 > $total_page)
                                            echo "disabled";
                                        else echo "" ?> ">
                    <a class="page-link" href="tabNMNS.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>&sNext=<?php echo $endPage + 1 ?>">Next</a>
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


                <form method="POST">
                    <div class="modal-body">


                        <div class="form-group">
                            <label>gid</label>
                            <input readonly type="text" class="form-control" name="ma_id" id="gid" placeholder="Enter area">
                        </div>

                        <div class="form-group">
                            <label>Tên kênh</label>
                            <input readonly type="text" class="form-control" name="ten_nmn" id="ten_nmn" placeholder="Enter leng">
                        </div>

                        <div class="form-group">
                            <label>Kết cấu</label>
                            <input type="text" class="form-control" name="ten_hso" id="ten_hso" placeholder="Enter leng">
                        </div>

                        <div class="form-group">
                            <label>Cơ quan quản lý</label>
                            <input type="text" class="form-control" name="cqql" id="dia_chi" placeholder="Enter leng">
                        </div>

                        <div class="form-group">
                            <label>Chiều dài</label>
                            <input type="text" class="form-control" name="shape_leng" id="dvi_qly" placeholder="Enter leng">
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
                    $('#ten_nmn').val(data[1]);
                    $('#ten_hso').val(data[2]);
                    $('#dia_chi').val(data[3]);
                    $('#dvi_qly').val(data[4]);


                });
            });
        </script>
</body>

<?php require("footer.php") ?>