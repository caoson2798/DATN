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
          <span style="font-size: 15px; color: rgba(90, 90, 90, 0.8); font-weight: bold;">Công trình hiện có</span>
          <div>
            <label class="switch ml-5 my-3">
              <input type="checkbox" />
              <span class="slider round"></span>
            </label>
            <span class="mx-2">Cống</span>
          </div>

          <div>
            <label class="switch ml-5 my-3">
              <input type="checkbox" />
              <span class="slider round"></span>
            </label>
            <span class="mx-2">Trạm bơm</span>
          </div>

          <div>
            <label class="switch ml-5 my-3">
              <input type="checkbox" />
              <span class="slider round"></span>
            </label>
            <span class="mx-2">Kênh</span>
          </div>

          <div>
            <label class="switch ml-5 my-3">
              <input type="checkbox" />
              <span class="slider round"></span>
            </label>
            <span class="mx-2">Đê</span>
          </div>
          <div>
            <label class="switch ml-5 my-3">
              <input type="checkbox" />
              <span class="slider round"></span>
            </label>
            <span class="mx-2 t-label">Điểm nhận thải</span>
          </div>

          <div>
            <label class="switch ml-5 my-3">
              <input type="checkbox" />
              <span class="slider round"></span>
            </label>
            <span class="mx-2">Điểm xả thải</span>
          </div>

          <div class="line-style"></div>
          <!-- ban ddo nen osm -->
          <span style="font-size: 15px; color: rgba(90, 90, 90, 0.8); font-weight: bold;">Bản đồ nền</span>
          <div>
            <label class="switch ml-5 my-3">
              <input type="checkbox" checked />
              <span class="slider round"></span>
            </label>
            <span class="mx-2">OSM</span>
          </div>

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
</body>

</html>