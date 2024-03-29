<!-- Trang Lịch Sử Mua Hàng -->
<div class="container mt-5">
  <div class="row">
  <div class="col-md-3 p-0 bg-dark collapse collapse-horizontal show">
      <ul class="list-group list-group-item-dark rounded-0 m-3">
        <li><a href="<?=$base_url?>user/profile"class="list-group-item list-group-item-action fw-bold">Tài Khoản Của Tôi</a></li>
        <li  class="list-group-item list-group-item-action fw-bold">Lịch sử mua hàng</li>
        <!-- <li class="list-group-item"class="text-dark">Ngân Hàng</li>
        <li class="list-group-item"class="text-dark">Đổi Mật Khẩu</li>
        <li class="list-group-item" class="text-dark">Cài Đặt Thông Báo</li>
        <li class="list-group-item"class="text-dark">Sản Phẩm Yêu Thích</li> -->
      </ul>
    </div>

    <div class="col-md-9">
      <table class="table text-center">
        <thead>
          <tr>
            <th>Số Lượng</th>
            <th>Tổng Tiền</th>
            <th>Trạng Thái</th>
            <th>Ngày Đặt</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Kiểm tra xem giỏ hàng có tồn tại không
            foreach ($getall_cart as $item){
            extract($item);
            // var_dump($getall_cart);
            echo '<tr>
            <td class="text-end" id="SoLuong_">'.$SoLuongSP.'</td>
            <td class="text-end" id="TongTien_">'.$TongTien.'</td>
            <td class="text-end" id="TrangThai_">'.$TrangThai.'</td>
            <td class="text-end" id="NgayDat_">'.$NgayDat.'</td>


          </tr>';
        }
          ?>
            
      
        


        </tbody>
      </table>
    </div>
  </div>
</div>
