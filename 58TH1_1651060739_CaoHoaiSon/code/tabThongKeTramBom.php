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

?>


<body>
    <?php
    // truy van tat ca ban ghi
    $getAllDataCong = getAllData();
    $getAllDataCongDuoiDe = getAllDataCongDuoiDe();
    $getAllDataNMNS = getAllDataNMNS();
    $getAllDataDiemNhanThai = getAllDataDiemNhanThai();
    $getAllDataDiemXaThai = getAllDataDiemXaThai();
    $getAllDataDe = getAllDataDe();

    // lay ra so luong cua tat ca ban ghi
    $countCong = pg_num_rows($getAllDataCong);
    $countCongDuoiDe = pg_num_rows($getAllDataCongDuoiDe);
    $countDataNMNS = pg_num_rows($getAllDataNMNS);
    $countDiemNhanThai = pg_num_rows($getAllDataDiemNhanThai);
    $countDiemXaThai = pg_num_rows($getAllDataDiemXaThai);
    $countDe = pg_num_rows($getAllDataDe);

    // echo($countDe);

    ?>
    <div class="container">
        <canvas id="myChart" style="width:100%;max-width:600px; margin: auto;"></canvas>
        <p class="d-flex w-100 justify-content-center my-3 font-italic" style="font-size: 20px;">Tổng có tất cả 162 trạm bơm</p>
    </div>
    <script>
        var xValues = ["Tốt", "Trung bình", "Kém"];
        var yValues = [30, 80, 52];
        var barColors = [
            "#00aba9",
            "#b91d47",
            "#2b5797",
            
        ];

        let myChart = document.getElementById('myChart').getContext('2d');
        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 25;
        Chart.defaults.global.defaultFontColor = '#777';

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Thống kê tình trạng các trạm bơm"
                }
            }
        });
    </script>
</body>

<?php require("footer.php") ?>