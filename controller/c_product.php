    <?php
        // Gửi nhận dữ liệu thông qua model
        // Gửi nhận dữ liệu thông qua view
        if(isset($_GET['act'])){
            switch ($_GET['act']) {
                
                case 'detail':
                    // lấy dữ liệu
                    include_once 'model/m_product.php';
                    include_once 'model/m_comment.php';
                    
                    $ctsanpham= product_GetSPbyID($_GET['id']);
                    $splq=product_getdm(3);
                    $dsbinhluan= binhluanget($_GET['id']);
                    
                    // hiển thị dữ liệu
                    $view_name = 'product_detail';
                    break;
                case 'search':
                    if(isset($_POST['search'])){
                        $keyword = $_POST['keyword'];
                        header("Location: $base_url/product/search/".$_POST['keyword']);
                    }
                    else{
                        $_SESSION['keyword'] = '';
                    }
                    //lấy dữ liệu
                    include_once 'model/m_product.php';
                    // $page = 1;
                    // if(isset($_GET['page'])){
                    //     $page = $_GET['page'];
                    // }
                    // $ketqua = product_search($_POST['keyword'], $page, 8);
                    $ketqua = product_search($_POST['keyword']);
                    // $sotrang = ceil(product_countSearch($_GET['keyword'])/8);
                    // hiển thị dữ liệu
                    $view_name = 'product_search';
                    break;
                    // $sotrang = tong so trang chia 8
                    
                case 'addToCart':
                    if(!isset($_SESSION['user'])){
                        $_SESSION['loi'] = 'Bạn cần đăng nhập để thực hiện chức năng này';
                        header('Location: '.$base_url.'user/login');
                        return;
                    }
                    //Thêm sản phẩm vào giỏ hàng
                    //lấy dữ liệu
                    $MaSP = $_GET['id'];
                    $ID = $_GET['id'];
                    $MaTK= $_SESSION['user']['MaTK'];
                    if(isset($_POST['SLDat'])){
                        $SLDat = $_POST['SLDat'];
                    }
                    else{
                        $SLDat = 1;
                    }
                        try {
                            //kiểm tra đã có hóa đơn hay chưa?
                            include_once 'model/m_history.php';
                            
                            $kq = history_hasCart($MaTK);
                            if ($kq) {
                                //Nếu có hóa đơn rồi , sẽ cho sản phẩm vào và không cần tạo thêm hóa đơn
                                
                                //Kiểm tra giỏ hàng đã có sản phẩm chưa
                                $kq2= history_hasProduct($kq['MaHD'], $MaSP);
                                if ($kq2) {
                                    // cập nhật số lượng sản phẩm có trong giỏ hàng
                                    product_increaseAmount($MaSP, $SLDat);
                                    product_getAmount($ID,$SLDat,$MaSP);
                                    $_SESSION['thongbao'] = 'Đã cập nhật số lượng sản phẩm trong giỏ hàng';
                                }
                                else {
                                    //Thêm sản phẩm vào giỏ hàng
                                    history_addToCart($kq['MaHD'], $MaSP, $SLDat, $GiaTien);
                                    product_increaseAmount($MaSP,$SLDat);
                                
                                    $_SESSION['thongbao'] = 'Đã thêm sản phẩm vào giỏ hàng';
                                }
                            }
                            else {
                                // Nếu chưa có hóa đơn sẽ tạo hóa đơn và thêm sản phẩm vào
                                history_add($MaTK);
                                $kq= history_hasCart($MaTK);
                                history_addToCart($kq['MaHD'],$MaSP,$SLDat,$GiaTien);
                                product_increaseAmount($MaSP, $SLDat);
                                
                                $_SESSION['thongbao'] = 'Đã thêm sản phẩm vào giỏ hàng';
                            }
                            
                            
                            
                        } catch (\Throwable $th) {
                            // product_increaseAmount($MaSP, $SLDat);
                            // product_getAmount($MaSP,$SLDat);
                            $_SESSION['thongbao2'] = 'Lỗi ';
                        }
                    
                    // quay lại trang này bằng //
                    header('Location: '.$base_url.'product/detail/'.$_GET['id']);
                    break;
                case 'removeFromCart':
                    include_once 'model/m_history.php';
                    $MaTK = $_SESSION['user']['MaTK'];
                    $MaSP=$_GET['id'];
                    $GioHang = history_hasCart($MaTK);
                    if($GioHang){
                        history_removeFromCart($GioHang['MaHD'], $MaSP);
                        history_updateRemove($MaSP);
                    }
                    header('Location:'.$base_url.'page/cart');
                    break;
                case 'removeCart':
                    include_once 'model/m_history.php';
                    $MaTK = $_SESSION['user']['MaTK'];
                    $GioHang = history_hasCart($MaTK);
                    if($GioHang){
                        history_removeCart($GioHang['MaHD']);
                    }
                    header('Location: '.$base_url.'page/cart');
                    break;
                case 'updateCart':
                    include_once 'model/m_history.php';
                    $MaTK = $_SESSION['user']['MaTK'];
                    $GioHang = history_hasCart($MaTK);
                    
                    if(isset($_POST['SLDat'])){
                        $SLDat = $_POST['SLDat'];
                    }
                    else{
                        $SLDat = 1;
                    }
                    if ($GioHang) {
                        if (isset($_POST['SoLuongSP']) && isset($_POST['TongTien'])) {
                            $SoLuongSP = $_POST['SoLuongSP'];
                            $TongTien = $_POST['TongTien'];
                            $TrangThai = 'dang-xu-ly';
                            $NgayDat =date_format(date_create( $_POST['NgayDat']), "Y-m-d H:i:s");
                            include_once 'model/m_product.php';
                            $ctGioHang = history_getCart($MaTK);

                            foreach ($ctGioHang as $sp) {
                                product_decreaseAmount($sp['MaSP'], $SLDat);
                                
                            }
                            
                            history_updateCart($GioHang['MaHD'],$NgayDat, $SoLuongSP, $TongTien, $TrangThai);
                            product_updateTotal($GioHang['MaHD'], $GiaTien);
                            
                            $_SESSION['thongbao'] = 'L3H đã tiếp nhận yêu cầu của bạn';
                            // 
                        } else {
                            $_SESSION['thongbao'] = 'Dữ liệu không hợp lệ. Vui lòng thử lại.';
                        }
                    }
                    header('Location: '. $base_url .'page/cart');
                    break;

                    case 'comment':
                        include_once 'model/m_comment.php';
                        comment_add($_SESSION['user']['MaTK'], $_POST['MaSP'], $_POST['NoiDung']);
                        header('Location: '.$base_url.'product/detail/'.$_POST['MaSP']);
                        break;

                default:
                    # code...
                    break;
            }
            include_once 'view/v_user_layout.php';
        }  
    ?>