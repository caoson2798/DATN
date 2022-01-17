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
    $result = thongKeTrangThaiHD();
    $a=[];
    while ($row = pg_fetch_assoc($result)){
        array_push($a,$row['sl']);
    }
    // print_r($a);

    // echo($countDe);

    ?>
    <div class="container">
        <canvas id="myChart" style="width:100%;max-width:600px; margin: auto;"></canvas>
        <p class="d-flex w-100 justify-content-center my-3 font-italic" style="font-size: 20px;">Tổng có 35 nhà máy nước sạch</p>
    </div>
    <script>
        var xValues = ["Tốt", "Bình Thường", "Dừng hoạt động", "HĐ Cầm chừng"];
        var yValues =  <?php echo json_encode($a); ?>;
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
           
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
                    text: "Thống kê trạng thái hoạt động của nhà máy nước sạch"
                }
            }
        });
    </script>
</body>

<?php require("footer.php") ?>