<h3 class="fw-bold text-center my-3">SỬA DANH MỤC</h3>

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
    <div class="mb-3 ">
        <label for="TenDM" class="form-label fw-bold">TÊN DANH MỤC</label>
        <input type="text" class="form-control rounded-0 " name="TenDM" value="<?=$dm['TenDM']?>" id="TenDM">
    </div>
    <div class="mb-3 ">
        <label for="MaLoaiDM" class="form-label fw-bold">MÃ LOẠI DANH MỤC</label>
        <input type="text" class="form-control rounded-0 " name="MaLoaiDM" value="<?=$dm['MaLoaiDM']?>" id="MaLoaiDM">
    </div>
    <button type="submit" name="submit" value="submit" style="width: 100%" class="btn btn-info text-light rounded-0 " >XÁC NHẬN</button>
</form>