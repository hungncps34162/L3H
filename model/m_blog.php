
<?php
    //thao tác dữ liệu trong CSDL
    include_once 'model/m_pdo.php';
    // Function để kiểm tra quyền chỉnh sửa tài khoản
    function blog_getAll(){
        return pdo_query("SELECT * FROM baiviet");
    }
?>