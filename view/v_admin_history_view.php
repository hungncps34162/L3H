<div class="container p-3">
<h1 class="text-center my-3 fw-bold">XEM ĐƠN HÀNG</h1>
<?php if(isset($_SESSION['thongbao'])): ?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['thongbao']?>
    </div>
<?php endif; unset($_SESSION['thongbao']); ?>
<!-- form -->
    <form action="<?=$base_url?>product/updateCart" method="post">
    <input type="hidden" name="SoLuongSP" id="SoLuongSP">
    <input type="hidden" name="TongTien" id="TongTien">
    <div class="row">
        <div class="justify-content-center col-md-4">
            <div class="input-group flex-nowrap text-center">
                <span class="input-group-text">Ngày đặt hàng</span>
                <input type="datetime-local"  
                name="NgayDat" id="NgayDat"
                value="<?=$GioHang['NgayDat']?>"
                class="form-control" >
            </div>
        </div>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th class="text-start">Tên sản phẩm</th>
                <th class="text-end">Giá Trị</th>
                <th class="text-end">Số lượng</th>
                <th class="text-end">Thành Tiền</th>

            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($ctGioHang as $item): ?>
=p4ê4éé3ws3            <tr>
                <!-- hình ảnh -->
                <td><img class="rounded-3" style="width:50px" src="<?=$base_url?>upload/product/<?=$item['HinhAnh']?>" alt=""></td>
                <!-- Tên SP -->
                <td class="text-start"><?=$item['TenSP']?></td>
                <!-- Giá Trị-->
                <td class="text-end" data-gia-goc="<?=$item['GiaGoc']?>"><?=number_format($item['GiaGoc'])?>đ</td>

                <!-- Số lượng -->
                <td class="text-end">
                    <input type="number" name="SLDat" value="<?=$item['SLDat']?>" class="form-control text-end" min="1">
                </td>
                <!--thành tiền-->
                <td class="text-end" id="ThanhTien <?=$item['MaSP']?>"></td>
                
                <td><a href="<?=$base_url?>product/removeFromCart/<?=$item['MaSP']?>" class="btn btn-outline-danger btn-sm">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>

        <tfoot>
            <tr>
                <th colspan="4" class="text-end">TỔNG THÀNH TIỀN</th>
                <th class="text-end" id="TongThanhTien">0đ</th>
            </tr>
        </tfoot>
    </table>
    </form>
</div>