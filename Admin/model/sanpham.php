<?php
require_once 'pdo.php';
function sanpham_insert($id_category, $product_name, $image, $description, $price, $price_sale, $stock_quantity, $sold) {
    // Kiểm tra nếu các giá trị quan trọng không bị NULL hoặc trống
    if (empty($id_category) || empty($product_name) || empty($price) || empty($stock_quantity)) {
        die("Error: Missing required fields.");
    }
    // Câu lệnh SQL thêm sản phẩm
    $sql = "INSERT INTO products (id_category, product_name, image, description, price, price_sale, stock_quantity, sold) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    // Thực thi câu lệnh SQL
    pdo_execute($sql, $id_category, $product_name, $image, $description, $price, $price_sale, $stock_quantity, $sold);
}
function sanpham_update($id_category, $product_name, $image, $description, $price, $price_sale, $stock_quantity, $sold){
    $sql = "UPDATE products SET id_category, product_name, image, description, price, price_sale, stock_quantity, sold WHERE id=?";
    pdo_execute($sql, $id_category, $product_name, $image, $description, $price, $price_sale, $stock_quantity, $sold);
}

function sanpham_delete($id){
    $sql = "DELETE FROM products WHERE  id=".$id;
        pdo_execute($sql);
}

function sanpham_select_all($idkyw,$iddm){
    $sql = "SELECT * FROM products where 1"; // lấy tất cả sản phẩm
    if($idkyw !=""){
        $sql .= " and product_name LIKE '%".$idkyw."%'"; // Tìm kiếm theo từ khóa
    }
    if($iddm >0){
        $sql .= " and id_category ='".$iddm."'"; // lọc theo danh mục
    }
    $sql .= " ORDER BY id DESC ";
    return pdo_query($sql);
}

function sanpham_select_one($id){
    $sql = "SELECT * FROM products WHERE id=".$id;
    return pdo_query_one($sql, $id);
}

function sanpham_exist($ma_hh){
    $sql = "SELECT count(*) FROM sanpham WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }