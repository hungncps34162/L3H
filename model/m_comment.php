<?php
    //thao tác dữ liệu trong CSDL
    include_once 'model/m_pdo.php';

    // function comment_add

    // comment getByBook
    function binhluanget($MaSP){
        return pdo_query("SELECT * FROM binhluan bl INNER JOIN  taikhoan tk ON bl.MaTK = tk.MaTK WHERE bl.MaSP = ?",$MaSP);
    }

    function admin_binhluan_all(){
        return pdo_query("SELECT * FROM binhluan ");
    }


    function comment_add($MaTK,$MaSP, $NoiDung){
        pdo_execute("INSERT INTO binhluan(`MaTk`, `MaSP`, `NoiDung`)
        VALUES(?,?,?)",$MaTK,$MaSP,$NoiDung);
    }

    function comment_delete($MaBL){
        pdo_execute("DELETE FROM binhluan WHERE MaBL = ?", $MaBL);
    }
    
?>