
<div class="container ">
    <div class="row m-3 justify-content-lg-center">
      <div class="col-md-6 mx-auto">
        <div class="card border-0">
          <div class="card-header">
            <h4 class="card-title text-center fw-bold">ĐĂNG NHẬP</h4>
          </div>
          <div class="card-body ">
            <form method="post" action="">
              <div class="mb-3">
                <label for="SoDienThoai" class="form-label fw-bold">SỐ ĐIỆN THOẠI</label>
                <input type="text" class="form-control rounded-0" id="SoDienThoai" name="SoDienThoai" placeholder="Nhập số điện thoại đăng nhập" value="<?php echo isset($_POST['SoDienThoai']) ? htmlspecialchars($_POST['SoDienThoai']) : ''; ?>">
              </div>
              <div class="mb-3">
                  <label for="MatKhau" class="form-label fw-bold">Mật khẩu</label>
                  <div class="input-group">
                    <input type="password" class="form-control rounded-0" 
                    name="MatKhau" id="MatKhau" placeholder="Nhập mật khẩu" value="<?php echo isset($_POST['MatKhau']) ? htmlspecialchars($_POST['MatKhau']) : ''; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text" onclick="togglePasswordVisibility()">
                        <i class="fa fa-eye my-1" id="eyeIcon"></i>
                      </span>
                    </div>
                  </div>
              </div>
              
              <div class="mb-3">
              <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme" <?php echo isset($_POST['rememberme']) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="rememberme">Ghi nhớ đăng nhập</label>
              </div>
              <button type="submit" class="btn btn-info text-light rounded-0 fw-bold">ĐĂNG NHẬP</button>
              <a type="submit" class="btn btn-info text-light rounded-0 fw-bold float-end" href="<?=$base_url?>user/signin">ĐĂNG KÝ</a>
          </button>
                <?php if(isset($_SESSION['loi'])): ?>
                    <div class="alert alert-danger m-2 text-xl-center" role="alert">
                        <?=$_SESSION['loi']?>
                    </div>
                <?php endif; unset($_SESSION['loi']); ?>
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