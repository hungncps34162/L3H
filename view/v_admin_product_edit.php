<h3 class="text-center fw-bold my-3" >SỬA SẢN PHẨM</h3>

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
                    <label for="TenSP" class="form-label fw-bold">TÊN SẢN PHẨM</label>
                    <input type="text" class="form-control rounded-0"
                    name="TenSP" value="<?= $sp['TenSP'] ?>"
                    id="TenSP">
                  </div>
                  <div class="mb-3">
                    <label for="HinhAnh" class="form-label fw-bold">HÌNH ẢNH</label>
                    <input type="text" class="form-control rounded-0"
                    name="HinhAnh" value="<?= $sp['HinhAnh'] ?>"
                    id="HinhAnh">
                  </div>
                  <div class="mb-3">
                    <label for="GiaGoc" class="form-label fw-bold">GIÁ GỐC</label>
                    <input type="number" class="form-control rounded-0"
                    name="GiaGoc" value="<?= $sp['GiaGoc'] ?>"
                    id="GiaGoc">
                  </div>
                  <div class="mb-3">
                    <label for="SoLuong" class="form-label fw-bold">SỐ LƯỢNG</label>
                    <input type="number" class="form-control rounded-0" min="1"
                    name="SoLuong"value="<?= $sp['SoLuong'] ?>"
                    id="SoLuong">
                  </div>
                  <!-- MucSP -->
                  <div class="mb-3"></div>
                    <label for="MucSP" class="form-label fw-bold">MỤC SẢN PHẨM</label>
                    <select class="form-select rounded-0" name="MucSP" id="MucSP">
                      <option value="1" <?=($sp['MucSP']=1)?'selected':''?> >không</option>
                      <option value="2" <?=($sp['MucSP']==2)?'selected':''?> >new</option>
                      <option value="3" <?=($sp['MucSP']==3)?'selected':''?> >hot</option>
                      <option value="4" <?=($sp['MucSP']==4)?'selected':''?> >sale</option>
                    </select>
                  <!-- MaDM -->
                  <div class="mb-3">
                      <label for="MaDM" class="form-label fw-bold">LOẠI DANH MỤC</label>
                    <select class="form-select rounded-0" name="MaDM" id="MaDM"  ?>">
                      <?php foreach ($dm as $cate): ?>
                        <option value="<?=$cate['MaDM']?>" <?=($sp['MaDM']==$cate['MaDM'])?'selected':''?>><?=$cate['TenDM']?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <button type="submit" name="submit" value="submit" class="btn btn-info fw-bold rounded-0 w-100 text-light">SỬA</button>
</form>