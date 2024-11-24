<?php
function sanPhamBanChay($limit){
    $sql = "SELECT * FROM products ";
    $sql.=" order by sold desc";
    if($limit>0) $sql .=" limit 0,".$limit;
    return pdo_query_all($sql);
}
function sanPhamHot($limit){
    $sql = "SELECT * FROM products where hot=1 ";
    $sql.=" order by id desc ";
    if($limit>0) $sql .=" limit 0,".$limit;
    return pdo_query_all($sql);
}
function layTatCaSanPham($cate,$limit, $status){
    $sql = "SELECT * FROM products where 1";
    if($cate>0) {
        $sql.=" and id =".$cate;
    }
    if($status=="hot") {
        $sql.=" and hot = 1";
    }
    $best="";
    $sales="";
    if($status=="bestseller"){
        $best = " sold ASC,";
    }

    if($status=="sales"){
        $sales=" price_sale ASC,";
    }

    $sql.=" order by ".$best.$sales." id desc";
    if($limit>0){ $sql .=" limit 0,".$limit;}
    return pdo_query_all($sql);
}
function layMotSanPham($id){
    $sql = "SELECT * FROM products ";
    if($id>0) $sql.=" where id =".$id;
    $sql.=" order by id desc";
    return pdo_query_one($sql);
}
function laySoTrang ($dssp){
    $sotrang=ceil(count($dssp)/SO_SP_TREN_TRANG);
    $dssotrang="";
    for ($i=1;$i<=$sotrang;$i++) {
        $dssotrang.="<a href='index.php?page=product&iddm=2&trang=".$i."'>".$i."</a>";
    }
    return $dssotrang;
}
function laySanPhamTheoDanhMuc($iddm){
    $sql = "SELECT * FROM products ";
    if($iddm>0) $sql.=" where id_category=".$iddm;
    $sql.=" order by id desc";
    return pdo_query_all($sql);
}
function laySanPhamChiTiet($id){
    $sql = "SELECT * FROM products where id=".$id;
    return pdo_query_one($sql);
}
function laySanPhamTuongTu($id,$iddm){
    $sql = "SELECT * FROM products where id_category='.$iddm.' AND id<> ".$id;
    return pdo_query_all($sql);
}
function select_all_sanpham($kyw,$iddm){
    $sql = "SELECT * FROM products where 1"; // lấy tất cả sản phẩm
    if($kyw !=""){
        $sql .= " and product_name LIKE '%".$kyw."%'"; // Tìm kiếm theo từ khóa
    }
    if($iddm >0){
        $sql .= " and id_category ='".$iddm."'"; // lọc theo danh mục
    }
    $sql .= " ORDER BY id DESC ";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadTenTheoDanhMuc($iddm){
    if($iddm>0){
        $sql = "SELECT * FROM categories WHERE id=".$iddm;
        $dm= pdo_query_one($sql);
        extract($dm);
        return $name;
    }
}