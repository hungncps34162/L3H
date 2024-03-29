
<?php
    //thao tác dữ liệu trong CSDL
    include_once 'model/m_pdo.php';
    // Function để kiểm tra quyền chỉnh sửa tài khoản
function canEditProfile($currentUserID, $profileUserID) {
    return $currentUserID == $profileUserID;
}

    //user login
    function user_login($phone, $pass){
        return pdo_query_one("SELECT * FROM taikhoan WHERE SoDienThoai = ? AND MatKhau = ?", $phone, $pass);
    }
    // user signin
    function user_signin($SoDienThoai, $MatKhau, $HoTen ,$NgaySinh, $HinhAnh, $VaiTro){
        pdo_execute("INSERT INTO taikhoan(`SoDienThoai`, `MatKhau`, `HoTen`,`NgaySinh`, `HinhAnh`, `VaiTro`) VALUES(?,?,?,?,?,?)", $SoDienThoai, $MatKhau, $HoTen,$NgaySinh, $HinhAnh, $VaiTro);
    }
    //function user_getAll
    function user_getAll(){
        return pdo_query("SELECT * FROM taikhoan");
    
    }

    // checkPhone
    function user_checkPhone($SoDienThoai){
        return pdo_query_one("SELECT * FROM taikhoan WHERE SoDienThoai = ?", $SoDienThoai);
    }
    // check MatKhau
    function user_checkMatKhau($MatKhau){
        return pdo_query_one("SELECT * FROM taikhoan WHERE MatKhau = ?", $MatKhau);
    }
    // user_add
    function user_add($SoDienThoai, $HoTen, $MatKhau, $VaiTro, $HinhAnh){
        pdo_execute("INSERT INTO taikhoan(`SoDienThoai`, `HoTen`, `MatKhau`, `VaiTro`, `HinhAnh`) VALUES(?,?,?,?,?)", $SoDienThoai, $HoTen, $MatKhau, $VaiTro, $HinhAnh);
    }

    // user_ getById
    function user_getById($MaTK){
        return pdo_query_one("SELECT * FROM taikhoan WHERE MaTK = ?", $MaTK);
    }

    // user_edit($MaTK, $SoDienThoai, $HoTen, $MatKhau, $VaiTro);
    function user_edit($MaTK, $SoDienThoai, $HoTen, $MatKhau, $VaiTro){
        pdo_execute("UPDATE taikhoan SET SoDienThoai = ?, HoTen = ?, MatKhau = ?, VaiTro = ? WHERE MaTK = ?", $SoDienThoai, $HoTen, $MatKhau, $VaiTro, $MaTK);
    }
    //user_delete
    function user_delete($MaTK){
        pdo_execute("DELETE FROM taikhoan WHERE MaTK = ?", $MaTK);
    }
    //function user_count
    function user_count(){
        return pdo_query_value("SELECT COUNT(*) FROM taikhoan WHERE VaiTro = 0");
    }
    function user_uploat($SoDienThoai, $HoTen, $MatKhau, $NgaySinh, $MaTK){
        pdo_execute("UPDATE taikhoan SET SoDienThoai = ?, HoTen = ?, MatKhau = ?, NgaySinh = ? WHERE MaTK = ?", $SoDienThoai, $HoTen, $MatKhau, $NgaySinh, $MaTK);
    }

?>