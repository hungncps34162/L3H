<!-- div contaitner -->
<!-- carosel -->
<div id="carouselExampleIndicators" class="carousel slide ">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner ">
        <div class="carousel-item active">
            <img src="https://www.statebicycle.com/cdn/shop/t/136/assets/slideshow_1.jpg?v=3988903469076084401699984257" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="https://wallpapercosmos.com/w/middle-retina/e/6/b/1205088-3840x2160-desktop-4k-girl-and-bike-background-photo.jpg" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="https://wallpapercosmos.com/w/full/2/c/1/1101833-3004x1567-desktop-hd-gamer-girl-background-photo.jpg" class="d-block w-100" alt="">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Nổi bật -->
<div class="container-fluid bg-light text-dark">
    <h1 class="fw-bold mb-2 text-center m-3">HÀNG MỚI NHẤT</h1>
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <?php foreach ($dsMoi as $sp) : ?>

                    <div class="card h-100 rounded-0 border-0 ">

                        <a class="card-link text-decoration-none" href="<?= $base_url ?>product/detail/<?= $sp['MaSP'] ?>">
                            <img src="<?= $base_url ?>upload/product/<?= $sp['HinhAnh'] ?>" class="card-img-top" alt="...">

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
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $sp['TenSP'] ?></h5>
                                <p class="card-text"><strong class="text-danger"><?= number_format($sp['GiaGoc'], 0, ',', '.') ?> VNĐ</strong></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-md-6">
                <div class="row mb-3">
                    <?php foreach ($dsMoi1 as $sp) : ?>
                        <div class="col-md-6 my-2">
                            <a class="card-link text-decoration-none" href="<?= $base_url ?>product/detail/<?= $sp['MaSP'] ?>">
                                <div class="card h-100 rounded-0 border-0">

                                    <img src="<?= $base_url ?>upload/product/<?= $sp['HinhAnh'] ?>" class="card-img-top" alt="...">
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
                                                    break;
                                            }
                                            ?>
                                        </h5>
                                    </div>
                                    <div class="card-body text-center d-flex flex-column justify-content-end">
                                        <h6 class="card-title"><?= $sp['TenSP'] ?></h6>
                                        <p class="card-text"> <strong class="text-danger"><?= number_format($sp['GiaGoc'], 0, ',', '.') ?> VNĐ</strong></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
        <a href="<?= $base_url ?>category/detail/<?= $sp['MaSP'] ?>" class="btn btn-outline-info my-2 fw-bold rounded-0 border-0 " style="width: 200px;">XEM THÊM</a>
    </div>

</div>
<!-- Bài Viết -->
<div class="nav">
    <div class="container mb-3">
        <h1 class="fw-bold text-center m-2">BÀI VIẾT</h1>
        <div class="row">
            <!-- First row with a single column -->
            <div class="col mb-3">
                <div class="card h-100 border-0 ">
                    <!-- Content for the first row -->
                    <div class="row g-0 ">
                        <div class="col-md-7 ">
                            <img src="https://cdn.shopify.com/s/files/1/0232/3305/files/StateBicycleCo.6061BlackLabelv3-Black_Mirror-11.jpg?v=1696827045" style="width: 700px height 200px" class="card-img-top rounded-0" alt="...">
                        </div>
                        <div class="col-md-5">
                            <div class="card-body text-left">
                                <h5 class="fw-bold card-title">CÁI NHÌN ĐẦU TIÊN 👀 : STATE BICYCLE CO. 6061 BLACK LABEL V3</h5>
                                <p class="card-text">Giới thiệu chương tiếp theo trong Dòng Nhãn Đen của chúng tôi, Nhãn Đen 6061 v3. Dựa trên sự thành công và được hoan nghênh của phiên bản gốc trong bản phát hành "V2" năm 2014 và 2016, v3 gói gọn những tiến bộ mới nhất của chúng tôi về kiểu dáng, tiện ích và chức năng, thiết lập tiêu chuẩn mới cho việc đạp xe trong đô thị tập trung vào hiệu suất.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Second row with three equal columns -->
            <div class="col">
                <div class="card h-100 border-0">
                    <!-- Content for the first column of the second row -->
                    <img src="https://cdn.shopify.com/s/files/1/0232/3305/files/Homepage_CoreLine_1_d8c4d2a7-1c87-40f5-97a0-3765b8ef0158.jpg?v=1696359639" style="height: 250px;" class="card-img-top rounded-0" alt="...">
                    <div class="card-body text-center">
                        <h6 class="fw-bold card-title">CÁI NHÌN ĐẦU TIÊN 👀 : STATE BICYCLE CO. X RIPNDIP</h6>
                        <p class="card-text">Cái nhìn đầu tiên về sự hợp tác của chúng tôi với RIPNDIP.Lord Nermal và nhóm RIPNDIP đang tiếp quản xe đạp của chúng tôi, quay đầu bất cứ nơi nào bạn lăn bánh. Hãy sở hữu ngay bây giờ và lái xe như thể bạn đã đánh cắp nó!</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0">
                    <!-- Content for the second column of the second row -->
                    <img src="https://cdn.shopify.com/s/files/1/0232/3305/files/DSC06452_49c8092c-3433-4f49-9a19-931ded66fa65.jpg?v=1695757287" style="height: 250px;" class="card-img-top rounded-0" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title">CÁI NHÌN ĐẦU TIÊN 👀 : PHUỘC SỎI TREO TRÊN MỌI ĐƯỜNG (40MM)</h6>
                        <p class="card-text">Cái nhìn đầu tiên về Cái nhìn đầu tiên của chúng tôi 👀 : Phuộc sỏi treo trên mọi con đường (40mm) Nâng cao trải nghiệm đạp xe sỏi của bạn. Hãy giữ vững các thanh của bạn, bởi vì State Bicycle Co. sắp cách mạng hóa những cuộc phiêu lưu trên sỏi với Phuộc treo dành cho mọi con đường! Hãy sẵn sàng trải nghiệm mức độ thoải mái và khả năng kiểm soát mới khi bạn vượt qua các địa hình gồ ghề, ván giặt và bất kỳ nơi nào khác mà hai bánh xe và chân có thể đưa bạn đi. Điều tuyệt vời nhất là nó sẽ không phá sản ngân hàng.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border-0">
                    <!-- Content for the third column of the second row -->
                    <img src="https://cdn.shopify.com/s/files/1/0232/3305/files/cycle.png?v=1692811847" style="height: 250px;" class="card-img-top rounded-0" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title">HƯỚNG DẪN CỦA CÔNG TY XE ĐẠP TIỂU BANG: GIÚP TÔI CHỌN - 4130 ALL-ROAD VÀ 6061 ALL-ROAD?</h6>
                        <p class="card-text">Cần trợ giúp để quyết định giữa 4130 All-Road và 6061 All-Road? Không cần tìm đâu xa. Hướng dẫn này nêu bật những điểm mạnh và nhược điểm của từng mẫu xe này, đồng thời nêu ra những điểm tương đồng và khác biệt giữa 2 dòng xe đạp sỏi phổ biến nhất của chúng tôi!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ABOUT -->
<div id="about" class="bg-image p-2 nav m-3" style="background-image: url('https://i.ytimg.com/vi/sJwLYwq3GQo/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDHifqr2C2PqP6-KrD3nK9u-UWnng'); background-position: center; background-size: center;">
    <div class="container">
        <div class="text-center ">
            <div class="card-body">
                <a class="navbar-brand m-3 " href="<?= $base_url ?>page/home"><img src="<?= $base_url ?>upload/product/png.png" alt="" width="100" class="justify-content-center"></a>
                <p class="card-text text-light ">L3H ra đời vào ngày 1.11.2023 là nơi tập hợp những người đam mê du lịch và xe đạp. Bên cạnh là đơn vị chuyên tổ chức các tour Du lịch dài hoặc ngắn ngày bằng xe Đạp tại Việt Nam, chúng tôi tự hào là đại lý ủy quyền của thương hiệu Trek bycicle tại Việt Nam. Tại L3H bạn sẽ tìm được cho mình những chiếc xe đạp từ dòng xe gia đình cho đến dòng xe thể thao chuyên dụng và phụ kiện của các hãng nổi tiếng thế giới. Chúng tôi cũng cung cấp dịch vụ nâng cấp, sửa chữa và bảo dưỡng. Là nơi gặp gỡ của những người yêu xe đạp để mọi người có cơ hội trao đổi, học hỏi kinh nghiệm và truyền thêm cảm hứng cho nhau. Mr Biker Saigon thường xuyên tạo cơ hội thực tập cho các bạn sinh viên Du lịch tham gia các tour thực tế, sửa xe miễn phí cho những người có hoàn cảnh khó khăn trong khu vực, …. với mong muốn được đóng góp được nhiều hơn cho cộng đồng và xã hội.</p>
                <a href="#" class="btn btn-outline-light m-5  rounded-0 border-0">XEM CHI TIẾT</a>
            </div>

        </div>
    </div>
</div>