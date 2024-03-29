<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L3H</title>
    <link rel="stylesheet" href="<?=$base_url?>template/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-dark "  data-bs-theme="dark">
        <div class="container-fluid flex-column flex-sm-row text-lg-start ">
            <a class="navbar-brand " href="<?=$base_url?>page/home"><img src="<?=$base_url?>upload/product/png.png" style="width: 100px" alt="" class="justify-content-center"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars "></i>
            </button>
            <div class="  collapse navbar-collapse" id="navbarSupportedContent">
                <!-- menu-1 -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <?php foreach ($dsLoaiDM as $dm) : ?>
                    <li class="nav-item ">
                        <div class="dropdown">
                            <a class="btn btn-dark dropdown-toggle fw-bold fs-5"data-bs-toggle="dropdown" aria-expanded="false" data-bs-theme="dark"> <?=$dm['TenDM']?>
                            
                            </a>
                            <ul class="dropdown-menu ">
                                <?php foreach($dsDMById as $dsdm) :?>
                                    <?php if ($dm['MaDM'] == $dsdm['MaLoaiDM']) : ?>
                                        <li><a class="dropdown-item" href="<?=$base_url?>category/detail/<?=$dsdm['MaDM']?>"><?=$dsdm['TenDM']?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <?php endforeach; ?>
                    <li class="nav-item">
                        <div>
                            <a href="<?=$base_url?>page/about" class="btn btn-dark fw-bold  fs-5" type="button">
                                BIKE TOUR
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div>
                            <a href="<?=$base_url?>page/aboutUs" class="btn btn-dark fw-bold  fs-5" type="button">
                                GIỚI THIỆU
                            </a>
                        </div>
                    </li>
                </ul>
                <!-- menu-2 -->
                <ul class="navbar-nav mb-2 mb-lg-0" >
                <p class="search-trigger fw-bold text-light my-2 mb-2" data-bs-toggle="collapse" href="#searchCollapse" role="button" aria-expanded="false" aria-controls="searchCollapse"><i class="fa-solid fa-magnifying-glass"></i></p>
                |||
                <li class="nav-item">
                  <a class="nav-link active navbar-brand" aria-current="page" href="<?=$base_url?>page/cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
                    <?php if ( !isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                        <a class="nav-link active navbar-brand" aria-current="page" href="<?=$base_url?>user/login">Đăng Nhập</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Xin Chào, <?=$_SESSION['user']['HoTen']?>
                        </a>
                        <ul class="dropdown-menu end-0" style="left: auto;">
                            <!-- thông tin tài khoản lấy theo id -->
                            <li><a class="dropdown-item" href="<?=$base_url?>user/profile/<?=$_SESSION['user']['MaTK']?>">Thông tin tài khoản</a></li>
                            <li><a class="dropdown-item" href="<?=$base_url?>page/history">Lịch sử mua hàng</a></li>
                            <?php if($_SESSION['user']['VaiTro']>=1): ?>
                            <li><hr class="dropdown-divider text-warning"></li>
                            <li><a class="dropdown-item" href="<?=$base_url?>admin/dashboard">Trang quản lý</a></li>
                            <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?=$base_url?>user/logout">Đăng Xuất</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            
        </div>
        
    </nav>
    <div class="p-2 bg-dark  " data-bs-theme="light">
      <div class="container bg-dark  " data-bs-theme="light">
        <div class="col-md-12">
          <div class="container-fluid collapse my-2 " id="searchCollapse" >
            <form action="<?=$base_url?>product/search" class=" d-flex rounded-0 " method="POST">
              <input class="form-control me-2 rounded-0" type="search" name="keyword" required placeholder="Nhập sản phẩm cần tìm kiếm" >
              <button class="btn btn-outline-info p-1 w-25 rounded-0"  type="submit">TÌM KIẾM</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
<!-- BỤNG START -->
    <?php
        include_once 'view/v_'.$view_name.'.php';
    ?>
<!-- BỤNG END -->
<!-- footer -->
    <!-- footer -->
    <!-- footer -->
    <footer class="bg-dark text-light fw-bold " data-bs-theme="dark">
                <div class="container py-4 ">
                    <div class="row" >
                        <div class="col-md-6">
                          <h5>ĐỊA CHỈ</h5>
                          <p>
                            -CN1: 159C, Cô Giang, Phường Cô Giang, Quận 1, TP. HCM
                          </p>
                          <p>
                            -CN2: 24 Đường số 6, KDC Trung Sơn, Bình Chánh, TP. HCM
                          </p>
                          <p>
                            -CN3: 4/4 Đường số 2, khu phố 3, Hiệp Bình Chánh, Quận Thủ Đức, TP. HCM
                          </p>
                        </div>
                        <div class="shadow w-100">
                          <iframe class="container" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244.97752984319064!2d106.69409337239192!3d10.762166725759165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f13d0758bed%3A0x2842b21618fce65b!2sMr%20Biker%20Saigon!5e0!3m2!1svi!2s!4v1699773589581!5m2!1svi!2s" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                  </div>
                    <div class="container py-4">
                    <div class="row ">
                       <div class="col-md-4 ">
                        <h5>XE ĐẠP</h5>
                  
                        <li class="list-unstyled"><a href="#" class="text-decoration-none fs- text-light w-100">
                          Xe đạp địa hình
                        </a></li>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          Xe đạp đua
                        </a></li>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          Xe đạp phố
                        </a></li>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          Xe đạp gấp
                        </a></li>
                      </div>
                      <div class="col-md-4">
                        <h5>PHỤ TÙNG</h5>
                  
                        <li class="list-unstyled"><a href="#" class="text-decoration-none fs- text-light w-100">
                          Bàn đạp
                        </a></li>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          Bánh xe
                        </a></li>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          Thắng xe
                        </a></li>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          Ruột xe
                        </a></li>
                      </div>
                      <div class="col-md-4">
                        <h5>THÔNG TIN</h5>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          Giới thiệu: 
                        </a></li>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          Giờ mở cửa: 6h - 20h mỗi ngày.
                        </a></li>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          HOTLINE : 0943098229
                        </a></li>
                        <li class="list-unstyled"><a href="#" class="text-decoration-none text-light w-100">
                          EMAIL : l3h@gmail.com
                        </a></li>
                      </div>
        
    </footer >
    <div class="w-100">
      <p class="text-bg-dark text-center">© 2022 Company, Inc</p>
    </div>
    <script src="<?=$base_url?>template/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/27b9d8f5b1.js" crossorigin="anonymous"></script> 
</body>

</html>