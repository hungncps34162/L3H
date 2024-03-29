<?php
    // Gửi nhận dữ liệu thông qua model
    // Gửi nhận dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'profile':
            // l Argentine dữ liệu
            $MaTK = $_SESSION['user']['MaTK'];
            include_once 'model/m_user.php';
            // lấy dữ liệu
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
            $view_name = 'user_profile';
            break;
            case 'login':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                //if isset
                if(isset($_POST['SoDienThoai']) && isset($_POST['MatKhau'])){
                    // lấy dữ liệu
                    $kq = user_login($_POST['SoDienThoai'], $_POST['MatKhau']);
                    if($kq){
                        // Đúng, đăng nhập thành công
                        // lưu thông tin vào session
                        $_SESSION['user'] = $kq;
                        // chuyển hướng
                        header('location: '.$base_url.'page/home');
                        }
                        else{
                        // đăng nhập thất bại
                        $_SESSION['loi'] = 'Vui lòng nhập lại số điện thoại hoặc mật khẩu.';
                        
                    }
                    
                    }
                    
                
                // hiển thị dữ liệu
                $view_name = 'user_login';
                break;
            case 'logout':
                // xóa session
                unset($_SESSION['user']);
                // chuyển hướng
                header('location: '.$base_url.'page/home');
                break; 
            case 'blog':
                // lấy dư liệu
                include_once 'model/m_blog.php';
                $dsBlog = blog_getAll();
                // hiển thị dữ liệu
                $view_name = 'blog';
                break;
            case 'profile':
                // l Argentine dữ liệu
                $MaTK = $_SESSION['user']['MaTK'];
                include_once 'model/m_user.php';
                // lấy dữ liệu
                if(isset($_POST['submit'])){
                        $SoDienThoai=$_POST['SoDienThoai'];
                        $HoTen=$_POST['HoTen'];
                        $MatKhau=$_POST['MatKhau'];
                        $NgaySinh =date_format(date_create( $_POST['NgaySinh']), "Y-m-d");
                        $kq = user_checkPhone($SoDienThoai);
                        if ($kq) {
                            // đúng, bị trùng, không thêm
                            $_SESSION['loi'] = 'Số điện thoại đã tồn tại <strong>'.$SoDienThoai.'</strong>. vui lòng nhập lại';
                        }
                        else{
                            //Sai , không trùng , thêm tài khoản
                            $HinhAnh='default.png';
                            user_uploat( $SoDienThoai, $HoTen, $MatKhau,$NgaySinh , $MaTK);
                            $_SESSION['thongbao'] = 'Cập nhật thông tin thành công';
                        }
                    }
                $tk = user_getById($MaTK);
                // hiển thị dữ liệu
                $view_name = 'user_profile';
                break;
            case 'signin':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                
                if(isset($_POST['submit'])){
                    $SoDienThoai=$_POST['SoDienThoai'];
                    $MatKhau = $_POST['MatKhau'];
                    $HoTen=$_POST['HoTen'];
                    $NgaySinh=$_POST['NgaySinh'];
                    // $HinhAnh=$_POST['HinhAnh'];
                    $kq = user_checkPhone($SoDienThoai);
                    if ($kq) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi2'] = 'Số điện thoại đã tồn tại <strong>'.$SoDienThoai.'</strong>. Vui lòng đăng nhập.';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        
                        $HinhAnh = 'default.png';
                        $VaiTro = 0;
                        user_signin($SoDienThoai, $MatKhau, $HoTen,$NgaySinh, $HinhAnh, $VaiTro);
                        header('location: '.$base_url.'user/login');
                    }
                }

                // hiển thị dữ liệu
                $view_name = 'user_signin';
                break;
            default:
                # code...
                break;
            }
        }
        include_once 'view/v_user_layout.php';
    
?>