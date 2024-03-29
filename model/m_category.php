<?php

    // category_getAll
    
    // getTenDM
    function category_getLoaiDM(){
        return pdo_query("SELECT * FROM danhmuc WHERE MaDM = MaLoaiDM IS NULL" );
    }
    // function category_getbyId
    function category_getById(){
        return pdo_query("SELECT * FROM danhmuc WHERE MaLoaiDM");
    }
    //cagetgory_getByIDM
    function category_getByIDM($MaDM){
        return pdo_query_one("SELECT * FROM danhmuc WHERE MaDM = ?", $MaDM);
    }
    // category_getByDM
    function category_getByDM(){
        return pdo_query("SELECT * FROM danhmuc WHERE MaDM IS NOT NULL AND MaLoaiDM IS NOT NULL");  
    }
    // category_add
    function category_add($TenDM,$MaLoaiDM){
        pdo_execute("INSERT INTO danhmuc(TenDM, MaLoaiDM) VALUES(?,?)", $TenDM, $MaLoaiDM);
    }
    // category_checkdanhmuc
    function category_checkdanhmuc($TenDM){
        $sql = "SELECT * FROM danhmuc WHERE TenDM = ?";
        return pdo_query_one($sql, $TenDM);
    }
    //function category_edit
    function category_edit($MaDM, $TenDM){
        pdo_execute("UPDATE danhmuc SET TenDM = ? WHERE MaDM = ?", $TenDM, $MaDM);
    }
    // category_delete
    function category_delete($MaDM){
        pdo_execute("DELETE FROM danhmuc WHERE MaDM = ?", $MaDM);
    }

    function category_count(){
        return pdo_query_value("SELECT COUNT(*) FROM danhmuc");
    }
    function category_statByProduct(){
        return pdo_query("SELECT dm.MaDM, dm.TenDM ,COUNT(s.MaSP) AS SoLuongSP, AVG(s.GiaGoc) AS TrungBinh, 
        MIN(s.GiaGoc) AS ThapNhat, MAX(s.GiaGoc) AS CaoNhat
        FROM danhmuc dm LEFT JOIN sanpham s ON dm.MaDM =s.MaDM
        GROUP BY dm.MaDM ,dm.TenDM;");
    }

?>