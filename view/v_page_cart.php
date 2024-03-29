<div class="container">
<h1 class="text-center my-3 fw-bold">GIỎ HÀNG</h1>
<?php if(isset($_SESSION['thongbao'])): ?>
  <div class="alert alert-success" role="alert">
      <?=$_SESSION['thongbao']?>
  </div>
<?php endif; unset($_SESSION['thongbao']); ?>
<!-- form -->
  <form action="<?=$base_url?>product/updateCart" method="post">
  <input type="hidden" name="SoLuongSP" id="SoLuongSP">
  <input type="hidden" name="TongTien" id="TongTien">
  <input type="hidden" name="GiaTien" id="GiaTien">
  
  <div class="row">
      <div class="justify-content-center col-md-4">
          <div class="input-group flex-nowrap text-center">
              <span class="input-group-text">Ngày đặt hàng</span>
              <input type="datetime-local"  
              name="NgayDat" id="NgayDat"
              value="<?=$GioHang['NgayDat']?>"
              class="form-control" >
          </div>
      </div>
  </div>
  <table class="table text-center">
      <thead>
          <tr>
              <th>Ảnh</th>
              <th class="text-start">Tên sản phẩm</th>
              <th class="text-end">Giá Trị</th>
              <th class="text-end">Số lượng</th>
              <th class="text-end">Thành Tiền</th>
              <th>Hành Động</th>
          </tr>
      </thead>
      
      <tbody>
        <?php foreach ($ctGioHang as $item): ?>
          <tr>
            <!-- hình ảnh -->
              <td><img class="rounded-3" style="width:50px" src="<?=$base_url?>upload/product/<?=$item['HinhAnh']?>" alt=""></td>
              <!-- Tên SP -->
              <td class="text-start"><?=$item['TenSP']?></td>
              <!-- Giá Trị-->
              <td class="text-end" data-gia-goc="<?=$item['GiaGoc']?>"><?=number_format($item['GiaGoc'])?>đ</td>

            <!-- Số lượng -->
              <td class="text-end">
                <input type="number" name="SLDat" value="<?=$item['SLDat']?>" class="form-control text-end " min="1">
              </td>
            <!-- Giá tiền -->
              <td class="text-end" id="GiaTien">
                0đ
              </td> 
            
              <!-- xóa -->
              <td>
                  <a href="<?=$base_url?>product/removeFromCart/<?=$item['MaSP']?>" class="btn btn-outline-danger btn-sm" onclick="return confirmDelete();">
                      <i class="fa-solid fa-minus" style="color: #ca1616;"></i>
                  </a>
              </td>

          </tr>
        <?php endforeach; ?>
      </tbody>

      <tfoot>
        <tr>
              <th colspan="4" class="text-end">TỔNG THÀNH TIỀN</th>
              <th class="text-end" id="TongThanhTien">0đ</th>
              <!-- xóa hết -->
              <th>
                  <a href="<?=$base_url?>product/removeCart" class="btn btn-outline-danger btn-sm" onclick="return confirmDeleteAll();">
                      <i class="fa-regular fa-trash-can"></i>
                  </a>
              </th>

          </tr>
      </tfoot>
  </table>
  <!-- Button trigger modal -->
    <a type="submit" class="m-3 btn btn-info rounded-0 text-light fw-bold fs-5 w-100 #exampleModal " data-bs-toggle="modal" data-bs-target="#exampleModal">
      THANH TOÁN
    </a>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">VUI LÒNG THANH TOÁN</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <img class="w-100" src="https://homepage.momocdn.net/blogscontents/momo-upload-api-fb-190523143852.png" alt="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">HỦY</button>
            <button type="submit" class="btn btn-primary">ĐỒNG Ý</button>
          </div>
        </div>
      </div>
    </div>
  </form>


<script>
  function tinhThanhTien(){
      var dsSP = document.querySelectorAll('tbody tr');
      var tong = 0;
      
      dsSP.forEach(function(sp) {
          var gia = Number(sp.querySelector('td:nth-child(3)').getAttribute('data-gia-goc'));
          var soLuong = Number(sp.querySelector('input[type="number"]').value);
          var tien = gia * soLuong;
          
          sp.querySelector('td:nth-child(5)').innerText = tien.toLocaleString('vi-VN') + 'đ';
          document.querySelector('#GiaTien').value = tien;
          tong += tien;
      });

      document.querySelector('#TongThanhTien').innerText = tong.toLocaleString('vi-VN') + 'đ';
      document.querySelector('#SoLuongSP').value = dsSP.length;
      document.querySelector('#TongTien').value = tong;
    
    

      

  
    }
  // Gọi hàm tính toán khi trang được load
  document.addEventListener('DOMContentLoaded', function() {
      tinhThanhTien();
  }); 

  // Thêm sự kiện cho các input số lượng để tính lại khi có sự thay đổi
  var inputsSoLuong = document.querySelectorAll('input[type="number"]');
  inputsSoLuong.forEach(function(input) {
      input.addEventListener('change', function() {
          tinhThanhTien();
      });
  });
  function confirmDelete() {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?");
    } 
    function confirmDeleteAll() {
        return confirm("Bạn có chắc chắn muốn xóa hết giỏ hàng không?");
    }

</script>






</div>