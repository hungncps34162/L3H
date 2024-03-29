<div class="container mb-3 my-3 " style="font-family: Roboto, sans-serif;">
      <!-- sanpham -->
      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=$base_url?>page/home">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="<?=$base_url?>category/detail">Sản phẩm</a></li>
    <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
  </ol>
</nav>
        <div class="container" style="background-color: white;">
            <div class="row bg-light" >
              <div class="col-md-6">
                <div class="container text-center" >
                  <div class="row" style="margin-bottom: 10px;">
                      <a href="#">
                        <img class="product-img card-img-top" style="width: 450px; height: 300px; border-radius: 3px; margin: 10px 10px 10px 10px;" src="<?=$base_url?>upload/product/<?=$ctsanpham['HinhAnh'] ?>" alt="Madone SLR 7 - Gen 7">
                      </a>
                      
                  </div>
                  <div class="row">
                    <div id="carouselExample" class="carousel slide" style="margin: 10px 10px;">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="<?=$base_url?>upload/product/<?=$ctsanpham['HinhAnh'] ?>" style="width: 180px; height: 119px;" class="card-img-top rounded float-start" alt="...">
                          <img src="<?=$base_url?>upload/product/Madone_Ruby.jpg" style="width: 180px; height: 119px;" class="card-img-top rounded float-center" alt="...">
                          <img src="<?=$base_url?>upload/product/madorn.jpg" style="width: 180px; height: 119px;" class="card-img-top rounded float-end" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="<?=$base_url?>upload/product/madorn.jpg" style="width: 180px; height: 119px;" class="card-img-top rounded float-center" alt="...">
                          <img src="<?=$base_url?>upload/product/<?=$ctsanpham['HinhAnh'] ?>" style="width: 180px; height: 119px;" class="card-img-top rounded float-end" alt="...">
                          <img src="<?=$base_url?>upload/product/Madone_Ruby.jpg" style="width: 180px; height: 119px;" class="card-img-top rounded float-start" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="<?=$base_url?>upload/product/Madone_Ruby.jpg" style="width: 180px; height: 119px;" class="card-img-top rounded float-end" alt="...">
                          <img src="<?=$base_url?>upload/product/madorn.jpg" style="width: 180px; height: 119px;" class="card-img-top rounded float-start" alt="...">
                          <img src="<?=$base_url?>upload/product/<?=$ctsanpham['HinhAnh'] ?>" style="width: 180px; height: 119px;" class="card-img-top rounded float-center" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-black"  aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  </div>
                  
                  
                </div>
                
              </div>
              <!-- Chi tiết -->
              <div class="col-md-6 align-items-center text-center">
                <div class="col-md-12 text-center" style="margin-top: 50px ;">
                  <h6><?=$ctsanpham['TH'] ?></h6>
                  <h4><?=$ctsanpham['TenSP'] ?></h4>
                  <a href="#" class="text-dark text-decoration-none">Giá Bán: <strong class="text-danger"><?= number_format($ctsanpham['GiaGoc'], 0, ',', '.') ?> VNĐ</strong> 
                  <?php if ($ctsanpham !== null && isset($ctsanpham['GiaKM'])): ?>
                    <?php if (isset($ctsanpham['GiaKM'])): ?>
                    <del class="text-secondary">
                  <?= number_format($ctsanpham['GiaKM'], 0, ',', '.') ?> VNĐ</del>
                  <?php endif; ?>
                              <?php else: ?>
                              <?= ''?>
                              <?php endif; ?>
                <br>
                  <p>Số lượng trong kho : <?=$ctsanpham['SoLuong'] ?> </p>
                  <form action="<?=$base_url?>product/addToCart/<?=$ctsanpham['MaSP']?>" method="post">
                  Số lượng mua:
                    <input type="number" id="SLDat" name="SLDat" min="1" value="1">
                    <div class="row">
                  <!-- add -->
                  <div class="col-md-6 my-1">
                    <div class="button bg-warning">
                          <input class="btn" type="submit" name="addToCart" value="THÊM VÀO GIỎ HÀNG">
                      </div>
                  </div>
                </form>
                  <!-- buy -->
                  <div class="col-md-6 my-1">
                    <div class="button bg-warning">
                      <button type="submit" class="btn">MUA NGAY</button>
                    </div>
                  </div>
                  <?php if(isset($_SESSION['thongbao'])): ?>
                <div class="alert alert-success" role="alert">
                    <?=$_SESSION['thongbao']?>
                </div>
            <?php endif; unset($_SESSION['thongbao']); ?>

            
            <?php if(isset($_SESSION['thongbao2'])): ?>
            <div class="alert alert-success" role="alert">
                <?=$_SESSION['thongbao2']?>
            </div>
            <?php endif; unset($_SESSION['thongbao2']); ?>
                </div>
              </div>
                </div>
            </div>
      </div>

<!-- mota -->
        <div class="container">
          <div class="row bg-light text-dark" style=" margin-top: 20px;">
            <div style=" margin: 10px;">
              <h3>MÔ TẢ</h3>
              <div style="margin: 10px;">
                  <table class="table table-light">
                  <?=$ctsanpham['MoTaCT'] ?>
                  </table>
                
              </div>
            </div>
          </div>

          <!-- danhgia -->
          <div class="row bg-light" style=" margin-top: 20px;">
              <div style="margin: 10px;" >
              <h3>BÌNH LUẬN</h3>
              <div style="margin: 10px;">              
                
                <div class="mb-3">            
                <?php if(isset($_SESSION['user'])): ?>
                  <form action="<?=$base_url?>product/comment" method="post">
                      <input type="text" name="NoiDung" class="form-control"  placeholder="VD: Tôi rất yêu thích chiếc xe này">
                      <input type="hidden" name="MaSP" value="<?=$ctsanpham['MaSP']?>">
                      <button class="btn btn-primary float-end my-2" type="submit" >Binh Luan</button>
                  </form>
              <?php endif; ?>
                </div>
              
              <br>
            <div class="row" style="margin-top:20px;" >
            <?php foreach ($dsbinhluan as $bl): ?>
            <div class="my-2" >
                <h6>
                <img style="width: 30px;" src="<?=$base_url?>upload/product/<?=$bl['HinhAnh'] ?>" alt="">
                <?=$bl['HoTen']?>
                </h6>                 
                <i><?=$bl['NoiDung']?></i>               
                  <p class="float-end" style="color: rgba(128, 128, 128, 0.493);">                
                    Date: <?=$bl['NgayGui']?>
                </p>  
              </div> 
                <?php endforeach;?>
          </div>
          </div>
        </div>
        </div>
          <!-- san pham lien quan -->
            <div class="row text-center align-items-center">
              <h3 class="p-3">SẢN PHẨM LIÊN QUAN</h3>
              <?php foreach ($splq as $sp):?>
            <div class="col">
                <a class="card-link text-decoration-none" href="<?= $base_url?>product/detail/<?= $sp['MaSP']?>">
                    <div class="card h-100">
                        <img src="<?= $base_url?>upload/product/<?= $sp['HinhAnh']?>" class="card-img-top" alt="...">
                        <div class="card-img-overlay">
                            <h5 class="card-title position-absolute top-1">
                                <?php switch ($sp['MucSP']) {
                                case 'khong':
                                        break;
                                    case 'new':
                                        echo '<span class="badge text-bg-primary">NEW</span>';
                                        break;
                                    case 'hot':
                                        echo '<span class="badge text-bg-danger">HOT</span>';
                                        break;
                                    case 'sale':
                                        echo '<span class="badge text-bg-warning">SALE</span>';
                                        break;
                                    default:
                                        # code...
                                        break;
                                    }
                                    ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center fs-6"><?= $sp['TenSP']?></h5>
                            <!-- price xxx.xxx.xxx -->
                            <p class="text-center text-danger">Giá : <?= number_format($sp['GiaGoc'], 0, ',', '.') ?> VNĐ</p>
                        </div>
                    </div>            
                </a>
            </div>
        <?php endforeach;?>   
        
            </div>
    </div>
  </div>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Lấy danh sách các ảnh nhỏ
    var thumbnailImages = document.querySelectorAll(".carousel-inner img.card-img-top");

    // Lặp qua mỗi ảnh nhỏ và thêm sự kiện click
    thumbnailImages.forEach(function (thumbnail) {
      thumbnail.addEventListener("click", function () {
        // Lấy đường dẫn của ảnh nhỏ được click
        var clickedImageUrl = thumbnail.src;

        // Hiển thị ảnh chính bằng cách thay đổi đường dẫn
        document.querySelector(".product-img.card-img-top").src = clickedImageUrl;
      });
    });
  });
</script>

