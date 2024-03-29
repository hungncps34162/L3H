<?php
    // function user
    include_once'm_pdo.php';
    function history_hasCart($MaTK){
        return pdo_query_one("SELECT * FROM hoadon WHERE MaTK = ? and TrangThai = ?", $MaTK, 'dat-hang');
    }
    // history_hasProduct
    function history_hasProduct($MaHD, $MaSP){
        return pdo_query_one("SELECT * FROM chitiethoadon WHERE MaHD = ? and MaSP = ?", $MaHD, $MaSP);
    }

    // add
    function history_add($MaTK){
        pdo_execute("INSERT INTO hoadon(`MaTK`,`NgayDat`,`TrangThai`) VALUES(?,?,?)", $MaTK, date('Y-m-d H:i:s'),'dat-hang');
    }

    // Thêm sản phẩm vào giỏ hàng
    function history_addToCart($MaHD, $MaSP,$SLDat,$GiaTien){
        pdo_execute("INSERT INTO chitiethoadon(`MaHD`,`MaSP`,`SLDat`,`GiaTien`) VALUES(?,?,?,?)",
        $MaHD, $MaSP, $SLDat, $GiaTien);
    }
    // lấy san phẩm ra giỏ hàng theo MaTK 
    function history_getCart($MaTK){
        return pdo_query("SELECT * FROM hoadon hd INNER JOIN chitiethoadon ct ON hd.MaHD = ct.MaHD INNER JOIN sanpham s ON ct.MaSP = s.MaSP WHERE hd.MaTK = ? and hd.TrangThai = ?", $MaTK, 'dat-hang');
    }
    // removeFromCart
    function history_removeFromCart($MaHD, $MaSP){
        pdo_execute("DELETE FROM chitiethoadon WHERE MaHD = ? AND MaSP = ?", $MaHD, $MaSP);
    }
    // history_updateRemove
    function history_updateRemove($MaSP){
        pdo_execute("UPDATE sanpham SET SLDat = 0 WHERE MaSP = ?", $MaSP);
    }
    // removeCart
    function history_removeCart($MaHD){
        pdo_execute("DELETE FROM chitiethoadon WHERE MaHD = ?", $MaHD);
    }
    // get history updateCart
    function history_updateCart($MaHD,$NgayDat, $SoLuongSP, $TongTien, $TrangThai){
    //pdo
        pdo_execute("UPDATE hoadon SET NgayDat = ?, SoLuongSP = ?, TongTien = ?, TrangThai = ? WHERE MaHD = ?",$NgayDat ,$SoLuongSP, $TongTien, $TrangThai, $MaHD);
    }
    
    //history_count thống kê đơn hàng
    function history_count(){
        return pdo_query_value("SELECT COUNT(*) FROM hoadon");
    }
    // stat
    function history_stat(){
        return pdo_query("SELECT YEAR(hd.NgayDat) AS nam , MONTH(hd.NgayDat) AS thang,
        COUNT(DISTINCT hd.MaTK) AS SoKhachHang, COUNT(hd.MaHD) AS SoDonHang,
        SUM(hd.SoLuongSP) AS SoLuongSP, SUM(hd.TongTien) AS DoanhThu
        FROM hoadon hd
        GROUP BY YEAR(hd.NgayDat), MONTH(hd.NgayDat)");
    }
    function history_getById(){
        return pdo_query("SELECT * FROM hoadon WHERE MaHD IS NOT NULL AND TrangThai IS NOT NULL");
    }
    // history_getByMaHD
    function history_getByMaHD($MaHD){
        return pdo_query_one("SELECT * FROM hoadon WHERE MaHD = ?", $MaHD);
    }
    function history_checkMaHD($MaHD){
        return pdo_query_one("SELECT * FROM hoadon WHERE MaHD = $MaHD");    
    }
    function history_edit($MaHD, $TrangThai){
        pdo_execute("UPDATE hoadon SET TrangThai = ? WHERE MaHD = ?", $TrangThai, $MaHD);
    }

    // Hiệp 
    function history_getAllByAccount($MaTK){
        return pdo_query("SELECT * FROM hoadon WHERE MaTK = ?", $MaTK);
    }
    //get_All
    function history_getAll(){
        return pdo_query("SELECT * FROM hoadon");
    }
    // delete
    function history_delete($MaHD){
        pdo_execute("DELETE FROM hoadon WHERE MaHD = ?", $MaHD);
    }
    //Hùng
    // history_viewCart
    function history_viewCart($MaHD){
        return pdo_query("SELECT * FROM hoadon hd INNER JOIN chitiethoadon ct ON hd.MaHD = ct.MaHD INNER JOIN sanpham sp ON ct.MaSP = sp.MaSP WHERE hd.MaHD = ?", $MaHD);
    }
?>