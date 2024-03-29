<!-- Trang Lịch Sử Mua Hàng -->
<div class="container mt-5">
  <div class="row">
  <div class="col-md-3">
      <ul class="list-group">
        <li class="list-group-item active ">Tài Khoản Của Tôi</li>
        <li class="list-group-item"class="text-dark" ><a href="<?=$base_url?>page/history">Lịch sử mua hàng</a></li>
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
            <th>Hình Ảnh</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Sản Phẩm</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Kiểm tra xem giỏ hàng có tồn tại không
          if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
              foreach ($_SESSION['cart'] as $item):
          ?>
            <tr>
              <td><img class="rounded-3" style="width:50px" src="<?=$base_url?>upload/product/<?=$item['HinhAnh']?>" alt=""></td>
              <td><?=$item['TenSP']?></td>
              <td><?=number_format($item['GiaGoc'])?>đ</td>
              <td><?=$item['SoLuong']?></td>
              <td><?=number_format($item['GiaGoc'] * $item['SoLuong'])?>đ</td>
            </tr>
          <?php
              endforeach;
          } else {
              echo '<tr><td colspan="5">Không có sản phẩm trong lịch sử mua hàng.</td></tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
