<?php
    // Gửi nhận dữ liệu thông qua model
    // Gửi nhận dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'dashboard':
                // lấy dữ liệu
                include_once 'model/m_product.php';
                include_once 'model/m_user.php';
                include_once 'model/m_category.php';
                include_once 'model/m_history.php';
                $tkDM = category_count();
                $tkSP = product_count();
                $tkTK = user_count();
                $tkHD = history_count();
                $tkDoanhThu = history_stat();
                $tkSPTheoDM = category_statByProduct();
                // hiển thị dữ liệu
                $view_name = 'admin_dashboard';
                break;
            case 'user':
                // lấy dữ liệu
                include_once 'model/m_user.php';
            
                $dsTK = user_getAll();
                // hiển thị dữ liệu
                $view_name = 'admin_user';
                break;
            case 'user-add':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                
                if(isset($_POST['submit'])){
                    $SoDienThoai=$_POST['SoDienThoai'];
                    $HoTen=$_POST['HoTen'];
                    $MatKhau=$_POST['MatKhau'];
                    $VaiTro=$_POST['VaiTro'];
                    $kq = user_checkPhone($SoDienThoai);
                    if ($kq) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'Số điện thoại đã tồn tại <strong>'.$SoDienThoai.'</strong>.';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        
                        $HinhAnh = 'default.png';
                        user_add($SoDienThoai, $HoTen, $MatKhau, $VaiTro, $HinhAnh);
                        $_SESSION['thongbao'] = 'Thêm tài khoản thành công. với số điện thoại <strong>'.$SoDienThoai.'</strong> và mật khẩu <strong>'.$MatKhau.'</strong>';
                    }
                }

                // hiển thị dữ liệu
                $view_name = 'admin_user_add';
                break;
            case 'user-edit':
                    // lấy dữ liệu
                include_once 'model/m_user.php';
                $MaTK = $_GET['id'];
                if(isset($_POST['submit'])){
                    $SoDienThoai=$_POST['SoDienThoai'];
                    $HoTen=$_POST['HoTen'];
                    $MatKhau=$_POST['MatKhau'];
                    $VaiTro=$_POST['VaiTro'];
                    $kq = user_checkPhone($SoDienThoai);
                    if ($kq) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'Số điện thoại đã tồn tại <strong>'.$SoDienThoai.'</strong>. vui lòng nhập lại';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        $HinhAnh='default.png';
                        user_edit($MaTK, $SoDienThoai, $HoTen, $MatKhau, $VaiTro);
                        $_SESSION['thongbao'] = 'Cập nhật thông tin thành công';
                    }
                }

                
                $tk = user_getById($MaTK);
                // hiển thị dữ liệu
                $view_name = 'admin_user_edit';
                break;  
            case 'user-delete':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                user_delete($_GET['id']);
                header('location: '.$base_url.'admin/user');
                
                // hiển thị dữ liệu
                

                break;
            case 'category':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                // $dsCD = category_getAll();
                // hiển thị dữ liệu
                $view_name = 'admin_category';
                break;
            case 'category-add':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                
                if(isset($_POST['submit'])){
                    $TenDM=$_POST['TenDM'];
                    $MaLoaiDM = $_POST['MaLoaiDM'];
                    $kq = category_checkdanhmuc($TenDM);
                    if ($kq && $kq['TenDM'] != $TenDM) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'chủ đề <strong>'.$TenDM.'</strong>.đã tồn tại ';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        category_add($TenDM,$MaLoaiDM);
                        $_SESSION['thongbao'] = 'Thêm danh mục  <strong>'.$TenDM.'</strong>. thành công';
                    }
                }
                
                // hiển thị dữ liệu
                $view_name = 'admin_category_add';
                break;
            case 'category-edit':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                $MaDM = $_GET['id'];
                if(isset($_POST['submit'])){
                    $TenDM=$_POST['TenDM'];
                    $MaLoaiDM = $_POST['MaLoaiDM'];
                    $kq = category_checkdanhmuc($TenDM);
                    if ($kq && $kq['TenDM'] != $TenDM) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'Danh mục <strong>'.$TenDM.'</strong>.đã tồn tại ';
                    }
                    else{
                        //Sai , không trùng , thêm danh mục
                        category_edit($MaDM,$TenDM,$MaLoaiDM);
                        $_SESSION['thongbao'] = 'Sửa danh mục <strong>'.$TenDM.'</strong>. thành công';
                    }
                }
                $dm = category_getByIDM($MaDM);
                // hiển thị dữ liệu
                $view_name = 'admin_category_edit';
                break;
            case 'category-delete':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                category_delete($_GET['id']);
                header('location: '.$base_url.'admin/category');
                break;
            case 'product':
                // lấy dữ liệu
                include_once 'model/m_product.php';
                $QuanLySP = product_getAll();
                
                // hiển thị dữ liệu
                $view_name = 'admin_product';
                break;
            case 'product-add':
                // lấy dữ liệu
                include_once 'model/m_product.php';
                include_once 'model/m_category.php';
                
                
                if(isset($_POST['submit'])){
                    $TenSP=$_POST['TenSP'];
                    $MaDM = $_POST['MaDM'];
                    $HinhAnh = $_POST['HinhAnh'];
                    $GiaGoc = $_POST['GiaGoc'];
                    $SoLuong = $_POST['SoLuong'];
                    $MucSP = $_POST['MucSP'];
                    $kq = product_checkSP($TenSP);
                    if ($kq && $kq['TenSP'] != $TenSP) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'Sản phẩm <strong>'.$TenSP.'</strong>.đã tồn tại ';
                    }
                    else{
                        //Sai , không trùng , thêm sp
                        product_addNew($TenSP,$HinhAnh,$SoLuong,$GiaGoc,$MucSP,$MaDM);
                        $_SESSION['thongbao'] = 'Thêm sản phẩm <strong>'.$TenSP.'</strong>. thành công';
                    }
                }
                $dm = category_getByDM();
                // hiển thị dữ liệu
                $view_name = 'admin_product_add';
                break;
            case 'product-edit':
                include_once 'model/m_product.php';
                include_once 'model/m_category.php';
                $MaSP = $_GET['id'];
                if(isset($_POST['submit'])){
                    $TenSP=$_POST['TenSP'];
                    $MaDM = $_POST['MaDM'];
                    $HinhAnh = $_POST['HinhAnh'];
                    $GiaGoc = $_POST['GiaGoc'];
                    $SoLuong = $_POST['SoLuong'];
                    $MucSP = $_POST['MucSP'];
                    $kq = product_checkSP($TenSP);
                    if ($kq && $kq['TenSP'] != $TenSP) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'Sản phẩm <strong>'.$TenSP.'</strong>.đã tồn tại ';
                    }
                    else{
                        //Sai , không trùng , thêm sp
                        product_edit($MaSP,$TenSP,$HinhAnh,$SoLuong,$GiaGoc,$MucSP,$MaDM);
                        $_SESSION['thongbao'] = 'Sửa sản phẩm <strong>'.$TenSP.'</strong>. thành công';
                    }
                }
                $dm = category_getByDM();
                $sp =  product_GetSPbyID($MaSP);
                // hiển thị dữ liệu
                $view_name = 'admin_product_edit';
                break;  
            case 'product-delete':
                // lấy dữ liệu
                include_once 'model/m_product.php';
                product_delete($_GET['id']);
                header('location: '.$base_url.'admin/product');
                break;
            case 'category-add':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                
                if(isset($_POST['submit'])){
                    $TenDM=$_POST['TenDM'];
                    $kq = category_checkdanhmuc($TenDM);
                    if ($kq && $kq['MaDM'] != $MaDM) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'chủ đề <strong>'.$TenDM.'</strong>.đã tồn tại ';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        category_add($TenDM,$MaLoaiDM);
                        $_SESSION['thongbao'] = 'Thêm chủ đề  <strong>'.$TenDM.'</strong>. thành công';
                    }
                }
                
                // hiển thị dữ liệu
                $view_name = 'admin_product_add';
                break;
            case 'history':
                // lấy dữ liệu
                include_once 'model/m_history.php';
                $dsHoaDon  = history_getAll();
                // hiển thị dữ liệu
                $view_name = 'admin_history';
                break;
            case 'history-edit':
                // lấy dữ liệu
                include_once 'model/m_history.php';
                $MaHD = $_GET['id'];
                $kq = history_checkMaHD($MaHD);
                    if(isset($_POST['submit'])){
                    $MaHD = $_POST['MaHD'];
                    $TrangThai=$_POST['TrangThai'];
                    
                        if($kq){
                            //Đúng bị trùng không thay đổi
                            history_edit($MaHD, $TrangThai);
                            header('location: '.$base_url.'admin/history');
                            
                        }else{
                            // sai
                            $_SESSION['loi'] = 'Hóa đơn <strong>'.$MaHD.'</strong>.đã tồn tại ';
                        }
                    }
                    $ds = history_getByMaHD($MaHD);
                // hiển thị dữ liệu
                $view_name = 'admin_history_edit';
                break;
            case 'history-delete':
                // lấy dữ liệu
                include_once 'model/m_history.php';
                history_delete($_GET['id']);
                header('location: '.$base_url.'admin/history');
                break;
            case 'history-view':
                // lấy dữ liệu
                include_once 'model/m_history.php';
                include_once 'model/m_product.php';
                $MaHD = $_GET['id'];
                $ctGioHang = history_viewCart($MaHD);
                $viewCart = history_hasCart($MaHD);
                if($viewCart){
                    $ctGioHang = history_viewCart($MaHD);
                }
                else{
                    $ctGioHang = [];
                }
                // hiển thị dữ liệu
                $view_name = 'admin_history_view';
                break;
            case 'removeFromCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $MaSP=$_GET['id'];
                $GioHang = history_hasCart($MaTK);
                if($GioHang){
                    history_removeFromCart($GioHang['MaHD'], $MaSP);
                }
                header('Location:'.$base_url.'admin/history/watch');
                break;
            case 'removeCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioHang = history_hasCart($MaTK);
                if($GioHang){
                    history_removeCart($GioHang['MaHD']);
                }
                header('Location: '.$base_url.'admin/history/watch');
                break;
            case 'comment':
                // lấy dữ liệu
                include_once 'model/m_comment.php';
                $dsbinhluanad= admin_binhluan_all();
                // hiển thị dữ liệu
                $view_name = 'admin_comment';
                break;
            case 'comment-delete':
                // lấy dữ liệu
                include_once 'model/m_comment.php';
                comment_delete($_GET['id']);
                header('location: '.$base_url.'admin/comment');
                break;
            case 'post':
                // lấy dữ liệu
                include_once 'model/m_blog.php';
                $dsblog = blog_getAll();
                $view_name = 'admin_post';
                break;
            case 'post-add':
                // lấy dữ liệu
                break;
            case 'post-edit':
                // lấy dữ liệu
                break;
            case 'post-delete':
                break;
            default:
                # code...
                break;
        }
        include_once 'view/v_admin_layout.php';
    }  
?>