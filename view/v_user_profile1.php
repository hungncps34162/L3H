<?php if(isset($_SESSION['loi'])): ?>
    <div class="alert alert-danger" role="alert">
        <?=$_SESSION['loi']?>
    </div>
<?php endif; unset($_SESSION['loi']); ?>

<?php if(isset($_SESSION['thongbao'])): ?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['thongbao']?>
    </div>
<?php endif; unset($_SESSION['thongbao']); ?>


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
      <!-- Form chính -->
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">THÔNG TIN NGƯỜI DÙNG</h2>
        </div>
        <div class="card-body">
          <form action="" method="post" onsubmit="return validatePassword();">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="HoTen" class="form-label">Họ và Tên</label>
                  <div class="input-group">
                    <input type="text" class="form-control" 
                    name="HoTen" value="<?=$tk['HoTen']?>"
                    id="HoTen">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="SoDienThoai">Số điện thoại</label>
                  <div class="input-group">
                    <input type="tel" class="form-control" id="sdt" placeholder="Nhập số điện thoại"
                    name="SoDienThoai" value="<?=$tk['SoDienThoai']?>"
                    id="SoDienThoai">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="MatKhau" class="form-label">Mật khẩu</label>
                  <div class="input-group">
                    <input type="password" class="form-control" 
                    name="MatKhau" value="<?=$tk['MatKhau']?>"
                    id="MatKhau">
                    <div class="input-group-append">
                      <span class="input-group-text" onclick="togglePasswordVisibility()">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NgaySinh">Ngày Tháng Năm Sinh</label>
                  <div>
                    <input type="date" class="form-control" 
                    name="NgaySinh" value="<?=$tk['NgaySinh']?>"
                    id="NgaySinh">
                  </div>
                  <small class="form-text text-muted">Chọn ngày tháng năm sinh của bạn.</small>
                </div>
              </div>
            </div>
              <button type="submit" name="submit" class="btn btn-primary btn-block">Cập Nhật</button>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('MatKhau');
        var eyeIcon = document.getElementById('eyeIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }
</script>
