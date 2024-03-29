<?php

    include_once('config.php');
    //mostView
    // điều hướng đến các controller
    // INCLUDE
    include_once ('model/m_product.php');
    include_once ('model/m_category.php');
    $dsLoaiDM = category_getLoaiDM();
    // $dsDMById = category_getbyId($MaLoaiDM);
    $dsDMById = category_getById();
    
    if (isset($_GET['mod'])) {
        switch ($_GET['mod']) {
            case 'page':
                $ctrl_name= 'page';
                break;
            case 'user':
                $ctrl_name= 'user';
                break;
            case 'product':
                $ctrl_name= 'product';
                break;
            case 'category':
                $ctrl_name= 'category';
                break;
            case 'admin':
                $ctrl_name= 'admin';
                break;
            default:
                # code...
                break;
        }
        // goi file controller
        include_once('controller/c_'.$ctrl_name.'.php');
    } else {
        //chuyển về trang chủ với location
        header('Location: page/home');
        


    }
    
?>