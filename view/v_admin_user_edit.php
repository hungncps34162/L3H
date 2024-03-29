<h3 class="fw-bold text-center my-3" >SỬA TÀI KHOẢN</h3>

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
  
<form action="" method="post" onsubmit="return validatePassword();">
  <div class="mb-3">
    <label for="SoDienThoai" class="form-label fw-bold" >SỐ ĐIỆN THOẠI</label>
    <input type="number" class="form-control rounded-0" name="SoDienThoai" value="<?=$tk['SoDienThoai']?>" id="SoDienThoai">
  </div>
  <div class="mb-3">
    <label for="HoTen" class="form-label fw-bold">HỌ & TÊN</label>
    <input type="text" class="form-control rounded-0" name="HoTen" value="<?=$tk['HoTen']?>" id="HoTen">
  </div>
  <div class="mb-3">
    <label for="MatKhau" class="form-label fw-bold">MẬT KHẨU</label>
    <input type="text" class="form-control rounded-0" name="MatKhau" value="<?=$tk['MatKhau']?>" id="MatKhau">
  </div>
  <div class="mb-3">
    <label for="VaiTro" class="form-label fw-bold">VAI TRÒ</label>
      <select class="form-select rounded-0" name="VaiTro" id="VaiTro">
        <option value="0" <?=($tk['VaiTro']==0)?'selected':''?>>Khách hàng</option>
        <option value="1" <?=($tk['VaiTro']==1)?'selected':''?>>Quản lý</option>
        <option value="2" <?=($tk['VaiTro']==2)?'selected':''?>>Quản lý cấp cao</option>
      </select>
  </div>
  <button type="submit" name="submit" value="submit" class="btn btn-info text-light fw-bold rounded-0" style="width:100%">XÁC NHẬN</button>
</form>
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

</script>