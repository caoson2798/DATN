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
    $diachi = $_POST['dia_chi'];
    $thon = $_POST['thon'];
    $kenhNhan = $_POST['kenh_nhan'];
    $loaiKenh = $_POST['loai_kenh'];
    $nganhsx = $_POST['nganh_sx'];
    $sogp = $_POST['so_gp'];
    $sdt = $_POST['sdt'];
    

    $resultUpdate = updateDiemNhanThai($gid,$diachi,$thon,$kenhNhan,$loaiKenh,$nganhsx,$sogp,$sdt);
    // if($resultUpdate){
    //     echo "ok nhe";
    // }else{
    //     echo "eo ok";
    // }

}
?>


<body>
    <div style="position: relative;" class="container">
        <h3 class="my-3">Dữ liệu Điểm nhận thải</h3>
        <div class="mx-5 my-2" style="position: absolute; top:0; right: 0;">
            <form action="export.php" method="POST" class="pull-right">
                <button name="export_DNT" class="btn btn-primary export">
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
                    <th scope="col">Tên điểm nhận thải</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Thôn</th>
                    <th scope="col">Kênh nhận</th>
                    <th scope="col">Loại kênh</th>
                    <th scope="col">Số điện thoại</th>


                </tr>
            </thead>
            <tbody>
                <?php



                //b1: tim tong so ban ghi
                $alldata = getAllDataDiemNhanThai();
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

                $dataPage = getDataLimitDiemNhanThai($limit, $start);
                $count = pg_num_rows($dataPage);
                if ($count > 0) {
                    while ($row = pg_fetch_assoc($dataPage)) {
                ?>
                        <tr>
                            <td scope="row"><?php echo $row['gid'] ?></th>
                            <td><?php echo $row['tendn'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['thon'] ?></td>
                            <td><?php echo $row['kenhnhan'] ?></td>
                            <td><?php echo $row['loaikenh'] ?></td>
                            <td hidden><?php echo $row['nganhsx'] ?></td>
                            <td hidden><?php echo $row['sogp'] ?></td>
                            <td hidden><?php echo $row['ngaycap'] ?></td>
                            <td><?php echo $row['sdt'] ?></td>

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
                    <a class="page-link" href="tabDiemNhanThai.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>&sNext=<?php echo $_GET['sNext'] - 10 ?>" tabindex="-1">Previous</a>
                </li>
                <?php
                for ($i = $beginPage; $i <= $endPage; $i++) {
                ?>
                    <li class="page-item <?php echo $current_page == $i ? "active" : "" ?>"><a class="page-link" href="tabDiemNhanThai.php?page=<?php echo $i ?>&sNext=<?php echo isset($_GET['sNext']) ? $_GET['sNext'] : 1 ?>"><?php echo $i ?></a></li>
                <?php
                }
                ?>
                <li class="page-item  <?php if (isset($_GET['sNext']) && $_GET['sNext'] + 9 > $total_page)
                                            echo "disabled";
                                        else echo "" ?> ">
                    <a class="page-link" href="tabDiemNhanThai.php?page=<?php echo isset($_GET['page']) ? $_GET['page'] : 1 ?>&sNext=<?php echo $endPage + 1 ?>">Next</a>
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
                            <label>Tên Điểm nhận thải</label>
                            <input readonly type="text" class="form-control" name="ten_dnt" id="ten_dnt" placeholder="Enter leng">
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="dia_chi" id="dia_chi" placeholder="Enter area">
                        </div>
                        <div class="form-group">
                            <label>Thôn</label>
                            <input type="text" class="form-control" name="thon" id="thon" placeholder="Enter area">
                        </div>

                        <div class="form-group">
                            <label>Kênh nhận</label>
                            <input type="text" class="form-control" name="kenh_nhan" id="kenh_nhan" placeholder="Enter leng">
                        </div>

                        <div class="form-group">
                            <label>Loại kênh</label>
                            <input type="text" class="form-control" name="loai_kenh" id="loai_kenh" placeholder="Enter area">
                        </div>
                        <div class="form-group">
                            <label>Ngành sản xuất</label>
                            <input type="text" class="form-control" name="nganh_sx" id="nganh_sx" placeholder="Enter area">
                        </div>

                        <div class="form-group">
                            <label>Số gp</label>
                            <input type="text" class="form-control" name="so_gp" id="so_gp" placeholder="Enter leng">
                        </div>

                        <div class="form-group">
                            <label>Ngày cấp</label>
                            <input readonly type="text" class="form-control" name="ngay_cap" id="ngay_cap" placeholder="Enter area">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt" id="sdt" placeholder="Enter area">
                        </div>



                    </div>

                    <div class="modal-footer">
                        <input readonly type="submit" value="Sửa" name="btn_update" class="btn btn-primary">
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
                    $('#ten_dnt').val(data[1]);
                    $('#dia_chi').val(data[2]);
                    $('#thon').val(data[3]);
                    $('#kenh_nhan').val(data[4]);
                    $('#loai_kenh').val(data[5]);
                    $('#nganh_sx').val(data[6]);
                    $('#so_gp').val(data[7]);
                    $('#ngay_cap').val(data[8]);
                    $('#sdt').val(data[9]);

                });
            });
        </script>
</body>

<?php require("footer.php") ?>