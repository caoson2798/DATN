<?php
require('header.php');
// if(isset($_POST['b-search'])){
//   echo 'alo';
// }


?>
<div class="body">
  <div class="row my-row">
    <div class="body-left">
      <div class="bg-logo d-flex justify-content-center">
        <img class="img-logo" src="img/logo.png" alt="" />
      </div>
      <nav class="mt-3 mx-3">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-link  <?php echo !isset($_POST['b-search']) ? 'active' : '' ?>   cursor-pointer" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
            Lớp dữ liệu
          </a>
          <a class="nav-link <?php echo isset($_POST['b-search']) ? 'active' : '' ?>   cursor-pointer" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" role="button" aria-controls="nav-profile" aria-selected="fasle">
            Tìm kiếm
          </a>
        </div>
      </nav>

      <!-- tab content -->
      <div class="tab-content" id="nav-tabContent">
        <!-- tab du lieu -->
        <div class="tab-pane fade   <?php echo !isset($_POST['b-search']) ? 'show active' : '' ?>   px-3 py-3 ml-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

          <div data-toggle="collapse" href="#collapseExample" aria-controls="collapseExample" style="width: 100%; position: relative; cursor: pointer;">
            <i class="fas fa-list-alt mr-2"></i>
            <a class="w-100" style="font-size: 15px; color: black;">Công trình hiện có</a>
            <i id="icon-arrow" style="position: absolute; right: 0;top: 6px;" class="fas fa-chevron-down"></i>
          </div>
          <div class="collapse show" id="collapseExample">
            <div>
              <label class="switch ml-5 my-3">
                <input id="chk-cong-duoi-de" type="checkbox" />
                <span class="slider round"></span>
              </label>
              <span class="mx-2">Cống dưới đê</span>
            </div>

            <div>
              <label class="switch ml-5 my-3">
                <input id="chk-cong" type="checkbox" />
                <span class="slider round"></span>
              </label>
              <span class="mx-2">Cống</span>
            </div>

            <div>
              <label class="switch ml-5 my-3">
                <input id="chk-trambom" type="checkbox" />
                <span class="slider round"></span>
              </label>
              <span class="mx-2">Trạm bơm</span>
            </div>

            <div>
              <label class="switch ml-5 my-3">
                <input id="chk-kenh" type="checkbox" />
                <span class="slider round"></span>
              </label>
              <span class="mx-2">Kênh</span>
            </div>

            <div>
              <label class="switch ml-5 my-3">
                <input id="chk-de" type="checkbox" />
                <span class="slider round"></span>
              </label>
              <span class="mx-2">Đê</span>
            </div>
            <div>
              <label class="switch ml-5 my-3">
                <input id="chk-nhamaynuocsach" type="checkbox" />
                <span class="slider round"></span>
              </label>

              <span class="mx-2">Nhà máy nước sạch</span>
            </div>

            <div>
              <label class="switch ml-5 my-3">
                <input id="chk-diemnhanthai" type="checkbox" />
                <span class="slider round"></span>
              </label>
              <span class="mx-2">Điểm nhận thải</span>
            </div>

            <div>
              <label class="switch ml-5 my-3">
                <input id="chk-diemxathai" type="checkbox" />
                <span class="slider round"></span>
              </label>
              <span class="mx-2">Điểm xả thải</span>
            </div>

          </div>

          <!-- <div class="line-style"></div> -->
          <div data-toggle="collapse" href="#collapseExample1" aria-controls="collapseExample1" style="width: 100%; position: relative; cursor: pointer; margin-top: 5px;">
            <i style="font-size: 13px;" class="far fa-map mr-2"></i>
            <a class="w-100" style="font-size: 15px; color: black;">Bản đồ nền</a>
            <i id="icon-arrow1" style="position: absolute; right: 0;top: 6px;" class="fas fa-chevron-right"></i>
          </div>
          <div class="collapse" id="collapseExample1">
            <div>
              <label class="switch ml-5 my-3">
                <input type="checkbox" checked />
                <span class="slider round"></span>
              </label>
              <span class="mx-2">OSM</span>
            </div>
          </div>
          <!-- ban ddo nen osm -->
          <!-- <span class="d-block" style="font-size: 15px; color: rgba(90, 90, 90, 0.8); font-weight: bold;">Bản đồ nền</span>
          <div>
            <label class="switch ml-5 my-3">
              <input type="checkbox" checked />
              <span class="slider round"></span>
            </label>
            <span class="mx-2">OSM</span>
          </div> -->

        </div>

        <!-- tab tim kiem -->
        <div class="tab-pane fade  <?php echo isset($_POST['b-search']) ? 'show active' : '' ?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          blo
        </div>
      </div>
    </div>

    <div class="body-map">
      <div id="mapid"></div>
    </div>
  </div>
</div>
<!-- <div class="container">
      <div id="mapid"></div>
    </div> -->
<!-- js -->
<script src="js/script.js"></script>

<script src="bootrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="lib/L.Geoserver.js"></script>
<script src="js/map.js"></script>
</body>

</html>