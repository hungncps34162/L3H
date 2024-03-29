<div class="container-fuild bg-secondary-subtle">
    <div class="container p-4 ">
        <div class="row">
            <div class="col-md-6">
                <div class="container-fuild ">
                    <nav aria-label="breadcrumb" class="m-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="<?=$base_url?>page/home">TRANG CHỦ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">SẢN PHẨM</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <h3 class=" text-center fw-bold my-3 mb-3 lines"><?= $dsIDM['TenDM']?></h3>
        <div class="row row-cols-1 row-cols-md-3 g-4 ">
            <?php foreach ($dsSP as $sp):?>
                <div class="col">
                    <a class="card-link text-decoration-none" href="<?= $base_url?>product/detail/<?= $sp['MaSP']?>">
                        <div class="card h-100 position-relative border-0 rounded-0">
                           <div class="container my-3">
                               <img src="<?= $base_url?>upload/product/<?= $sp['HinhAnh']?>" class="card-img-top " alt="...">
                           </div>
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
                                    } ?>
                                </h5>
                            </div>
                            
                            <!-- giá gốc -->
                            <div class="card-body d-flex flex-column justify-content-end">
                                <h5 class="card-title text-center fs-6"><?= $sp['TenSP']?></h5>
                                <div class="row my-2">
                                    <?php if ($sp !== null && isset($sp['GiaKM'])): ?>
                                        <div class="col-md-6 text-center">
                                            <!-- Giá Gốc -->
                                            <div class="col">
                                                <div class="col-md-8">Giá gốc:</div>
                                                <div class="col-md-8 text-decoration-line-through">
                                            <?= number_format($sp['GiaGoc'], 0, ',', '.') ?> VNĐ
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <!-- Giá KM -->
                                            <p class="text-danger">Giá khuyến mãi: <?= number_format($sp['GiaKM'], 0, ',', '.') ?> VNĐ</p>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-md-12">
                                            <!-- Giá gốc nếu không có giá km -->
                                            <p class="text-center text-danger">Giá : <?= number_format($sp['GiaGoc'], 0, ',', '.') ?> VNĐ</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>


                            
                        </div>            
                    </a>
                </div>
            <?php endforeach;?>   
        </div>
    </div>
</div>