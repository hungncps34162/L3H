<h3 class="text-center fw-bold my-3" >THÊM DANH MỤC</h3>

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
  
<form action="" method="post">
  <div class="mb-3">
    <label for="TenDM" class="form-label fw-bold">TÊN DANH MỤC</label>
    <input type="text" class="form-control rounded-0" name="TenDM" id="TenDM">
  </div>
  <div class="mb-3">
    <label for="MaLoaiDM" class="form-label fw-bold">MÃ LOẠI DANH MỤC</label>
    <input type="text" class="form-control rounded-0" name="MaLoaiDM" id="MaLoaiDM" placeholder="1: Xe đạp, 2: Phụ tùng, 3: Phụ kiện, 4: Trang phục">
  </div>
  <button type="submit" name="submit" value="submit" class="btn btn-info text-light rounded-0 d-flex justify-content-center fw-bold" style="width:100%">XÁC NHẬN</button>
</form>