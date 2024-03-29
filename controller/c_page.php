<?php
    // Gửi nhận dữ liệu thông qua model
    // Gửi nhận dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'home':
                // lấy dữ liệu
                include_once 'model/m_product.php';
                $dsMoi = product_getNew(1);
                $dsMoi1 = product_getNew1(4);
                
                // hiển thị dữ liệu
                $view_name ='page_home';
                break;
            case 'about':
                // Lấy dữ liệu
                include_once 'model/m_pdo.php';
                // Hiển thị dữ liệu
                $view_name = 'blog';
                break;
            case 'aboutUs':
                // Lấy dữ liệu
                include_once 'model/m_pdo.php';
                // Hiển thị dữ liệu
                $view_name = 'aboutUs';
                break;
            case 'cart':
                // lấy dữ liệu
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioHang = history_hasCart($MaTK);
                if($GioHang){
                    $ctGioHang = history_getCart($MaTK);
                }
                else{
                    $ctGioHang = [];
                }
                $view_name ='page_cart';
                break;
            case 'history':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $dsHoaDon=history_getAllByAccount($MaTK);
                $getall_cart = history_getAll();
                $view_name ='page_history';
                break;
            default:
                # code...
                break;
        }
        include_once 'view/v_user_layout.php';
    }  
?>