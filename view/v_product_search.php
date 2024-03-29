    <h2 class="text-center">Kết quả tìm kiếm với từ khóa <strong><?=$_POST['keyword']?></strong>:</h2>
    <div class="row">
        <!-- san pham -->
        <div class="container mb-3">
            <!-- <h1 class="m-3 text-center"><?= $dsIDM['TenDM']?></h1> -->
            <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($ketqua as $sp):?>
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