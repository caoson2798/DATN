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
        <canvas id="myChart" style="width:100%;max-width:800px; margin: auto;"></canvas>
    </div>
    <script>
        var xValues = ["Tốt", "Trung bình", "Kém"];
        var yValues = [50, 80, 40];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
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
                    text: "Thống kê tình trạng công trình cống"
                }
            }
        });
    </script>
</body>

<?php require("footer.php") ?>