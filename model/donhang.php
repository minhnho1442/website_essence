<?php 
function bill_insert_id($ma_donhang, $id_user, $ten_kh, $email_kh, $diachi_kh, $phone_kh, $ten_nguoinhan, $diachi_nguoinhan, $phone_nguoinhan, $total, $ship, $voucher, $tong_tt, $pttt) {
    // Chuẩn bị câu lệnh SQL cho việc thêm đơn hàng
    $sql = "INSERT INTO bill (ma_donhang, id_user, ten_kh, email_kh, diachi_kh, phone_kh, ten_nguoinhan, diachi_nguoinhan, phone_nguoinhan, total, ship, voucher, tong_tt, pttt) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Sử dụng hàm pdo_excute_lastId để thêm vào cơ sở dữ liệu và lấy lại ID vừa chèn
    return pdo_excute_lastId($sql, $ma_donhang, $id_user, $ten_kh, $email_kh, $diachi_kh, $phone_kh, $ten_nguoinhan, $diachi_nguoinhan, $phone_nguoinhan, $total, $ship, $voucher, $tong_tt, $pttt);
    
}


