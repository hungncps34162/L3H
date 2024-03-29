<h3 class="fw-bold my-3 mx-3">BLOG CỦA CÔNG TY L3H</h3>
<div class="container-fuild m-3">
<div class="row">
    <div class="col-md-7 ">
        <!-- Nội dung cột 1 -->
        <button type="button" class="btn btn-outline-dark my-1"># KHÁM PHÁ TIỂU BANG CỦA BẠN</button>
        <button type="button" class="btn btn-outline-dark my-1">ĐỘI CƯỠI NGỰA CỦA BẠN</button>
        <button type="button" class="btn btn-outline-dark my-1">ĐÁNH GIẤ</button>
        <button type="button" class="btn btn-outline-dark my-1">SUY NGHĨ CỦA MỘT NGƯỜI ĐI XE ĐẠP</button>
        <button type="button" class="btn btn-outline-dark my-1">HƯỚNG DẪN KHÁM PHÁ ĐỊA HÌNH</button>
        <button type="button" class="btn btn-outline-dark my-1">ĐỘNG LỰC</button>
        <button type="button" class="btn btn-outline-dark my-1">CUỘC ĐUA</button>
        <button type="button" class="btn btn-outline-dark my-1">RA KHỎI YÊN XE</button>
        <button type="button" class="btn btn-outline-dark my-1">HÌNH NỀN</button>
        <button type="button" class="btn btn-outline-dark my-1">GIAI ĐIỆU</button>
    </div>
    <div class="col-md-4 ">
        <!-- Nội dung cột 2 -->
        <select id="inputState" class="form-select">
            <option selected>XEM TẤT CẢ THẺ</option>
            <option># KHÁM PHÁ TIỂU BANG CỦA BẠN</option>
        </select>
    </div>
</div>
</div>
<div class="container-fluid m-1">
    
    <div class="row my-3">
    <?php foreach ($dsBlog as $blog):?>
        <div class="col-md-4">
            <!-- Cột 1 -->
            <div class="card" >
                <img src="<?=$base_url?>upload/product/<?=$blog['HinhAnh']?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><?=$blog['Ngay']?></p>
                    <h5 class="fw-bold"><?=$blog['TenBaiViet']?></h5>
                    <hr>
                    <p><?=$blog['NoiDung']?></p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>


</div>
