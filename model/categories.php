
<?php


function layTatCaDanhMuc(){
    $sql = "SELECT * FROM categories where status= 1";
    return pdo_query_all($sql);
}
function layMotDanhMuc($id){
    $sql = "SELECT * FROM categories WHERE id=".$id;
    return pdo_query_one($sql);
}
function layTenDanhMuc($id){
    $sql = "SELECT category_name FROM categories WHERE id=".$id;
    $kq=pdo_query_one($sql);
    return $kq['category_name'];
}
function layTatCaSanPhamDanhMuc($id_category) {
    $sql_args = array_slice(func_get_args(), 1);
    $conn = dbConnection();
        $sql = "SELECT * FROM products WHERE 1";
        if($id_category>0) $sql.="AND id_category=".$id_category;
        $stmt = $conn->prepare($sql);
        $stmt -> execute($sql_args);
        $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch all rows
    return  $row;
    }


