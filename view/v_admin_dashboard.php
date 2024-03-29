  <h3 class="my-3 fw-bold">TỔNG QUAN</h3>
                <div class="row">
                  <!-- đầu sản phẩm -->
                    <div class="col-md-3">    
                      <div class="card text-bg-primary rounded-0 border-0 mb-3">
                          <div class="card-body">
                          <h5 class="card-title">SẢN PHẨM</h5>
                          <p class="card-text fs-1 text-center"><?=$tkSP?></p>
                        </div>
                      </div>
                    </div>
                  <!-- bạn đọc -->
                  <div class="col-md-3">    
                      <div class="card text-bg-success rounded-0 border-0 mb-3">
                          <div class="card-body">
                          <h5 class="card-title">KHÁCH HÀNG</h5>
                          <p class="card-text fs-1 text-center"><?=$tkTK?></p>
                        </div>
                      </div>
                    </div>
                  <!-- chủ đề -->
                  <div class="col-md-3">    
                      <div class="card text-bg-info rounded-0 border-0 mb-3">
                          <div class="card-body">
                            <h5 class="card-title">DANH MỤC</h5>
                            <p class="card-text fs-1 text-center"><?=$tkDM?></p>
                          </div>
                      </div>
                  </div>
                  <!-- Lượt Mượn -->
                  <div class="col-md-3">    
                    <div class="card text-bg-danger rounded-0 border-0 mb-3">
                        <div class="card-body">
                          <h5 class="card-title">HÓA ĐƠN</h5>
                          <p class="card-text fs-1 text-center"><?=$tkHD?></p>
                        </div>
                    </div>
                  </div>
                  <!-- post -->
                  <div class="col-md-3">    
                    <div class="card text-bg-danger rounded-0 border-0 mb-3">
                        <div class="card-body">
                          <h5 class="card-title">BÀI VIẾT</h5>
                          <p class="card-text fs-1 text-center"><?=$tkBV?></p>
                        </div>
                    </div>
                  </div>
                </div> 
  <div class="row overflow-auto">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <strong>Thống kê sản phẩm theo danh mục</strong>
        </div>
      </div>
      <!-- Biểu đồ -->
      <div id="myChart" style="width:100%;max-width:700px; height:400px"></div> 
      <div class="card-body">
        <table class="table text-end">
          <thead>
            <tr>
              <th class="text-center">Danh mục</th>
              <th>Số lượng sản phẩm</th>
              <th>Giá trung bình</th>
              <th>Giá thấp nhất</th>
              <th>Giá cao nhất</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tkSPTheoDM as $dm) : ?>
            <tr>
              <td class="text-center"><?=$dm['TenDM']?></td>
              <td><?=$dm['SoLuongSP']?></td>
              <td><?=number_format(round(max(500,$dm['TrungBinh']*0.5/100)))?>đ</td></td>
              <td><?=number_format(round(max(500,$dm['ThapNhat']*0.5/100)))?>đ</td>
              <td><?=number_format(round(max(500,$dm['CaoNhat']*0.5/100)))?>đ</td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>









    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <strong>Thống kê Doanh Thu</strong>
        </div>
      </div>
        <div id="DoanhThuChart" style="max-width:700px; height:400px"></div> 
      <div class="card-body">
        <table class="table text-end">
          <thead>
            <tr>
              <th class="text-center">Tháng/Năm</th>
              <th>Số khách hàng</th>
              <th>Số đơn hàng</th>
              <th>Số lượng sản phẩm đã bán</th>
              <th>Doanh Thu</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tkDoanhThu as $dt) : ?>
            <tr>
              <td class="text-end"><?=$dt['thang']?>/<?=$dt['nam']?></td>
              <td class="text-end"><?=$dt['SoKhachHang']?></td>
              <td class="text-end"><?=$dt['SoDonHang']?></td>
              <td class="text-end"><?=$dt['SoLuongSP']?></td>
              <td class="text-end"><?=$dt['DoanhThu']?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <!-- // Thống Kê sản phẩm theo danh mục -->
  <script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  
// Set Data
const data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng'],
  <?php foreach ($tkSPTheoDM as $sp) {
    echo"['".$sp['TenDM']."',".$sp['SoLuongSP']."],";
  }?>
]);

// Set Options
const options = {
  title: 'Thống kê sản phẩm theo danh mục',
  is3D: true
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);


// Doanh Thu

// Set Data
const data2 = google.visualization.arrayToDataTable([
    ['Tháng/Năm', 'Doanh Thu'],
  <?php foreach ($tkDoanhThu as $dt){
    echo "['" .$dt['thang']."/".$dt['nam']."',".$dt['DoanhThu']."],";
  }?>
  

]);

// Set Options
const options2 = {
  title:'Thống kê doanh thu'
};

// Draw
const chart2 = new google.visualization.ColumnChart(document.getElementById('DoanhThuChart'));
chart2.draw(data2, options2);
}
</script>

