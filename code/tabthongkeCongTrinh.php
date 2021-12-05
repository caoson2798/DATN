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
        $getAllDataCong= getAllData();
        $getAllDataCongDuoiDe = getAllDataCongDuoiDe();
        $getAllDataNMNS = getAllDataNMNS();
        $getAllDataDiemNhanThai= getAllDataDiemNhanThai();
        $getAllDataDiemXaThai = getAllDataDiemXaThai();
        $getAllDataDe= getAllDataDe();

        // lay ra so luong cua tat ca ban ghi
        $countCong= pg_num_rows($getAllDataCong);
        $countCongDuoiDe= pg_num_rows($getAllDataCongDuoiDe);
        $countDataNMNS= pg_num_rows($getAllDataNMNS);
        $countDiemNhanThai= pg_num_rows($getAllDataDiemNhanThai);
        $countDiemXaThai= pg_num_rows($getAllDataDiemXaThai);
        $countDe= pg_num_rows($getAllDataDe);

        // echo($countDe);
    
    ?>
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');
        // Global Options
        Chart.defaults.global.defaultFontFamily = 'Lato';
        Chart.defaults.global.defaultFontSize = 18;
        Chart.defaults.global.defaultFontColor = '#777';

        let massPopChart = new Chart(myChart, {
            type: 'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data: {
                labels: ['Cống dưới đê', 'Nhà máy nước sạch', 'Điểm nhận thải', 'Điểm xả thải', 'Đê'],
                datasets: [{
                    label: 'Số lượng',
                    data: [
                     
                        162,
                        35,
                        7,
                        7,
                        3
                    ],
                    //backgroundColor:'green',
                    backgroundColor: [
                       
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1,
                    borderColor: '#777',
                    hoverBorderWidth: 3,
                    hoverBorderColor: '#000'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Thông kê số lượng công trình',
                    fontSize: 25
                },
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        fontColor: '#000'
                    }
                },
                layout: {
                    padding: {
                        left: 50,
                        right: 0,
                        bottom: 0,
                        top: 0
                    }
                },
                tooltips: {
                    enabled: true
                }
            }
        });
    </script>
</body>

<?php require("footer.php") ?>