<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */
function danhmuc_insert($tendm){
    $sql = "INSERT INTO categories(category_name) VALUES('$tendm')";
    pdo_execute($sql);
}
/**
 * Cập nhật tên loại
 * @param int $ma_loai là mã loại cần cập nhật
 * @param String $ten_loai là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function danhmuc_update($id, $tendm){
    $sql = "UPDATE categories SET category_name='$tendm' WHERE id=".$id;
    pdo_execute($sql);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function danhmuc_delete($id){
    $sql = " DELETE FROM categories WHERE id=".$id;  
        pdo_execute($sql);
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_all(){
    $sql = "SELECT * FROM categories order by id desc";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $ma_loai là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_by_id($id){
    $sql = "SELECT * FROM categories WHERE id=".$id;
    $suadm=pdo_query_one($sql);
    return $suadm;
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $ma_loai là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_exist($ma_loai){
    $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
    return pdo_query_value($sql, $ma_loai) > 0;
}