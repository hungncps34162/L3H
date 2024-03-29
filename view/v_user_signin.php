
<div class="container ">
    <div class="row m-3 justify-content-lg-center">
      <div class="col-md-6 mx-auto">
        <div class="card border-0">
          <div class="card-header">
            <h4 class="card-title text-center fw-bold">ĐĂNG KÝ</h4>
          </div>
          <div class="card-body">
            <form method="post" action="" onsubmit="return validatePassword();">
              
              <div class="mb-3">
                <label for="SoDienThoai" class="form-label fw-bold">SỐ ĐIỆN THOẠI</label>
                <input type="text" class="form-control rounded-0" id="SoDienThoai" name="SoDienThoai" placeholder="Ex: 012345678" value="<?php echo isset($_SESSION['SoDienThoai']) ? $_SESSION['SoDienThoai'] : ''; ?>">
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
                <label for="NhaplaimatKhau" class="form-label fw-bold">NHẬP LẠI MẬT KHẨU</label>
                <input type="password" class="form-control rounded-0" id="NhaplaimatKhau" name="NhaplaimatKhau" placeholder="Nhập lại mật khẩu" value="<?php echo isset($_POST['NhaplaimatKhau']) ? htmlspecialchars($_POST['NhaplaimatKhau']) : ''; ?>">

              </div>
              <div class="mb-3">
                <label for="HoTen" class="form-label fw-bold">HỌ & TÊN</label>
                <input type="text" class="form-control rounded-0" id="HoTen" name="HoTen" placeholder="EX: Nguyễn Văn A" value="<?php echo isset($_SESSION['HoTen']) ? $_SESSION['HoTen'] : ''; ?>">
              </div>
              <div class="mb-3">
                <label for="NgaySinh" class="form-label fw-bold">NGÀY THÁNG NĂM SINH</label>
                <input type="date" class="form-control rounded-0" id="NgaySinh" name="NgaySinh" placeholder="EX: dd/mm/yyyy" value="<?php echo isset($_SESSION['NgaySinh']) ? $_SESSION['NgaySinh'] : ''; ?>">
                </div>

              <button type="submit" name="submit" value="submit" class="btn btn-info text-light fw-bold rounded-0 w-100" >ĐĂNG KÝ</button>
             <div class="container my-3">
                 <?php if(isset($_SESSION['loi2'])): ?>
                     <div class="alert alert-danger" role="alert">
                         <?=$_SESSION['loi2']?>
                     </div>
                 <?php endif; unset($_SESSION['loi2']); ?>
                 <?php if(isset($_SESSION['thongbao'])): ?>
                     <div class="alert alert-success" role="alert">
                         <?=$_SESSION['thongbao']?>
                     </div>
                 <?php endif; unset($_SESSION['thongbao']); ?>
             </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <script>
      function validatePassword() {
        var password = document.getElementById("MatKhau").value;
        var confirmPassword = document.getElementById("NhaplaimatKhau").value;
        var regex = /^(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;

        if (password !== confirmPassword) {
            alert("Mật khẩu không khớp. Vui lòng nhập lại.");
            return false;
        }

        if (!regex.test(password)) {
            alert("Mật khẩu cần ít nhất 8 ký tự và phải chứa ít nhất một ký tự đặc biệt.");
            return false;
        }

        return true;
    }
      function togglePasswordVisibility() {
        var passwordInput = document.getElementById('MatKhau');
        var passwordVisibility = passwordInput.type === 'password';
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