<h3 class="fw-bold text-center my-3" >SỬA ĐƠN HÀNG</h3>

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
<form action="" method="post" >
  <div class="mb-3">
    <label for="MaHD" class="form-label fw-bold" >Mã hóa đơn</label>
    <input type="number" class="form-control rounded-0" name="MaHD" value="<?=$ds['MaHD']?>" id="MaHD">
  </div>
  <div class="mb-3">
    <label for="TrangThai" class="form-label fw-bold">Trạng Thái</label>
      <select class="form-select rounded-0" name="TrangThai" id="TrangThai">
        <option value="dat-hang" <?=($ds['TrangThai']=='dat-hang')?'selected':''?>>Đặt hàng</option>
        <option value="dang-xu-ly" <?=($ds['TrangThai']=='dang-xu-ly')?'selected':''?>>Đang xử lý</option>
        <option value="da-giao" <?=($ds['TrangThai']=='da-giao')?'selected':''?>>Đã giao</option>
      </select>
  </div>
  <button type="submit" name="submit" value="submit" class="btn btn-info text-light fw-bold rounded-0" style="width:100%">XÁC NHẬN</button>
</form>