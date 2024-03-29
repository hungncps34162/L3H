
<div class="container">
        <a href="<?=$base_url?>admin/product/add" class="btn btn-info text-light rounded-0 fw-bold float-end float-md-end overflow-auto mb-3"><i class="fa-solid fa-plus"></i></a>

        <!-- <a href="<?=$base_url?>admin/product/add" class="btn btn-info text-light rounded-0 fw-bold float-start float-md-end overflow-auto mb-3">THÊM SẢN PHẨM</a> -->

        <h3 class="my-3 fw-bold ">SẢN PHẨM</h3>
        <table class="table text-center align-middle">
            <thead>
            <tr>
                <th>STT</th>
                
                <th>TÊN SẢN PHẨM</th>
                <th>HÌNH ẢNH</th>
                <!-- <th>Tac Giả</th> -->
                <th>GIÁ TRỊ</th>
                <!-- <th>Mô tả</th> -->
                <th>Tên danh mục</th>
                <th>SỐ LƯỢNG</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
            </thead>
            <tbody>   

            <?php $i=1; foreach ($QuanLySP as $sp): ?>
            <tr>
                <td><?=$i?></td>
            
                <td ><?=$sp['TenSP']?></td>
                <td><img src="<?=$base_url?>upload/product/<?=$sp['HinhAnh']?>" width="100px"></td>
                <!-- <td ><?=$sp['TacGia']?></td> -->
                <td ><?=$sp['GiaGoc']?>đ</td>
                <!-- <td ><?=$sp['MoTa']?></td> -->
                <!-- tên DM -->
                <td>
                <?php
                    foreach ($dsDMById as $item) {
                        if ($item['MaDM'] == $sp['MaDM']) {
                            echo $item['TenDM'];
                        }
                    }
                ?>
                </td>
                <td ><?=$sp['SoLuong']?></td>
                <td class="text-end">
                <a class="btn btn-warning rounded-0" href="<?=$base_url?>admin/product/edit/<?=$sp['MaSP']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <button onclick="deleteCD(<?=$sp['MaSP']?>)" class="btn btn-danger rounded-0" href="<?=$base_url?>admin/product/delete/<?=$sp['MaSP']?>"><i class="fa-solid fa-trash"></i></button>
                </td>
                
            </tr>
            <?php $i++; endforeach; ?>

            </tbody>
        </table>
    </div>

            
<script >
    function deleteCD(MaSP){
    var kq = confirm('Bạn có chắc chắn muốn xóa Sản phẩm này không?');
    if(kq){
        window.location= '<?=$base_url?>admin/product/delete/'+MaSP;
    }
    
    }
</script>            