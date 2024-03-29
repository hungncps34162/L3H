
<?php
    //thao tác dữ liệu trong CSDL
    include_once 'model/m_pdo.php';
    // lấy ra sách mới và có giới hạn
    function product_getNew($limit){
        return pdo_query("SELECT * FROM sanpham ORDER BY MaSP DESC LIMIT $limit");
    }
    // lấy ra sách nổi bật được chỉ định
    function product_getPin($limit){
        return pdo_query("SELECT * FROM sanpham WHERE GhimTrangChu = 1 LIMIT $limit");
    }
    // Lấy ra sách có hot và có giới hạn
    function product_getHot($limit){
        return pdo_query("SELECT * FROM sanpham LIMIT $limit");
    }
    // Lấy sách theo id
    function product_getById($id){
        return pdo_query_one("SELECT * FROM sanpham s INNER JOIN danhmuc dm ON s.MaDM = dm.MaDM WHERE s.MaDM = ?", $id);
    }
    
    // get random product by category
    function product_getRandomByCategory($id){
        return pdo_query("SELECT * FROM sanpham WHERE MaCD = ? ORDER BY RAND() LIMIT 4", $id);
    }
    //function product_getCategory(id)
    function product_getCategory($id){
        return pdo_query("SELECT * FROM sanpham WHERE MaDM = ?", $id);
    }
    // search product and page NO limit
        // function product_search($keyword, $page, $limit){
        //     $offset = ($page - 1) * $limit;
        //     return pdo_query("SELECT * FROM sanpham WHERE sanpham.TenSP LIKE '%".$keyword."%' LIMIT $offset, $limit");
        // }
    function product_search($keyword){
        return pdo_query("SELECT * FROM sanpham WHERE TenSP LIKE '%$keyword%'");
    }
    // tổng số sách đếm được
    // function product_countSearch($keyword){
    //     return pdo_query_value("SELECT COUNT(*) FROM sanpham WHERE TenSP LIKE '%$keyword%'");
    
    // }
    // product decrease Amount
    function product_decreaseAmount($MaSP, $SLDat) {
    try {
        pdo_execute("UPDATE sanpham SET SoLuong = SoLuong - ? WHERE MaSP = ?", $SLDat, $MaSP);

        // Cập nhật SLDat về 0 trong cơ sở dữ liệu
        pdo_execute("UPDATE sanpham SET SLDat = 0 WHERE MaSP = ?", $MaSP);
    } catch (PDOException $e) {
        throw $e;
    }
    }

//  Tăng số lượng sản phẩm đặt
    function product_increaseAmount($MaSP, $SLDat) {
        try {
            pdo_execute("UPDATE sanpham SET SLDat = SLDat + ? WHERE MaSP = ?", $SLDat, $MaSP);
        } catch (PDOException $e) {
            throw $e;
        }
}
    //tăng số lượng trong chi tiêt hóa đơn
    function product_getAmount($ID,$SLDat,$MaSP){
        try {
            return pdo_execute("UPDATE chitiethoadon SET SLDat = SLDat + ? WHERE ID=? AND MaSP = ?", $ID,$SLDat,$MaSP);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    // Tăng Tiền trong hóa đơn  
    function product_updateTotal($MaHD, $GiaTien){
        pdo_execute("UPDATE chitiethoadon SET GiaTien = ? WHERE MaHD = ?", $GiaTien, $MaHD);
    }
    // function product_count
    function product_count(){
        return pdo_query_value("SELECT COUNT(*) FROM sanpham");
    }
    // product_getAll
    function product_getAll(){
        return pdo_query("SELECT * FROM sanpham");
    }
    //detail product
    function product_GetSPbyID($id){
        return pdo_query_one("SELECT * FROM sanpham s INNER JOIN danhmuc dm ON s.MaDM = dm.MaDM WHERE s.MaSP = ?", $id);
    }
    // product getByCategory
    
    // product_addNew
    function product_addNew($TenSP,$HinhAnh,$SoLuong,$GiaGoc,$MucSP,$MaDM){
        pdo_execute("INSERT INTO sanpham(`TenSP`,`HinhAnh`,`SoLuong`,`GiaGoc`,`MucSP`,`MaDM`) VALUES(?,?,?,?,?,?)",$TenSP,$HinhAnh,$SoLuong,$GiaGoc,$MucSP,$MaDM);
    }
    // chỉnh sửa sản phẩm
    function product_edit($MaSP,$TenSP,$HinhAnh,$SoLuong,$GiaGoc,$MucSP,$MaDM){
        pdo_execute("UPDATE sanpham SET TenSP = ?, HinhAnh = ?, SoLuong = ?, GiaGoc = ?, MucSP = ?, MaDM = ? WHERE MaSP = ?", $TenSP,$HinhAnh,$SoLuong,$GiaGoc,$MucSP,$MaDM,$MaSP);
    }
    //product_checkSP
    function product_checkSP($TenSP){
        return pdo_query_one("SELECT * FROM sanpham WHERE TenSP = ?", $TenSP);
    }
    // product_delete
    function product_delete($MaSP){
        pdo_execute("DELETE FROM sanpham WHERE MaSP = ?", $MaSP);
    }
    function product_getCata($limit){
        return pdo_query("SELECT * FROM sanpham LIMIT $limit");
     }
     function product_getdm($limit){
        return pdo_query("SELECT * FROM sanpham LIMIT $limit");
    }

    // Hùng
    function product_getNew1($limit){
        return pdo_query("SELECT * FROM sanpham WHERE MucSP = 'new' ORDER BY MaSP ASC LIMIT $limit");
    }

    function product_getNew2($limit){
        return pdo_query("SELECT * FROM sanpham ORDER BY MaSP DESC LIMIT $limit");
    }

    //Hiển thị 
    function product_visible(){
        return pdo_query("SELECT * FROM sanpham WHERE HienThi = 1");
    }
    
?>