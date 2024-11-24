<?php
session_start();
ob_start();
if (!isset($_SESSION["giohang"])) {
    $_SESSION["giohang"] = [];
}
include_once 'model/global.php';
include_once 'model/connect.php';
include_once 'model/categories.php';
include_once 'model/products.php';
include_once 'model/user.php';
include_once 'model/giohang.php';
include_once 'model/donhang.php';
include_once 'model/blog.php';
// $kq= layTatCaSanPham(0,3);
// echo print_r($kq);
// echo print_r(layMotSanPham(12));

$tieudetrang = "ESSENCE | Sản phẩm nước hoa nam - nữ";
// include_once 'views/header.php';
if (!isset($_GET['page'])) {
    $spmoi = layTatCaSanPham(0, 8, "");
    $spbanchay = sanPhamBanChay(8);
    $sphot = sanPhamHot(8);
    include_once 'views/header.php';
    include_once 'views/home.php';
} else {
    $page = $_GET['page'];
    switch ($page) {
        case 'product':
            $tieudetrang = "Sản Phẩm";
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $idcate = $_GET['iddm'];
                $tieudetrang = "Sản phẩm trong danh mục" . layTenDanhMuc($idcate);
            } else {
                $idcate = 0;
            }
            $dsdm = layTatCaDanhMuc();
            $status = "";
            if (isset($_GET['hot']) && $_GET['hot'] == 1) {
                $status = "hot";
                $tieudetrang = "Sản phẩm hot";
            }
            if (isset($_GET['bestseller']) && $_GET['bestseller'] == 1) {
                $status = "bán chạy";
                $tieudetrang = "Sản phẩm bán chạy";
            }
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $dm = $_GET['iddm'];
                $tieudetrang = layTenDanhMuc($dm);
                $dssp = laySanPhamTheoDanhMuc($dm);
            } else {
                $dssp = layTatCaSanPham($idcate, SO_SP_TREN_TRANG, $status);
            }           
            include_once 'views/header.php';
            include_once 'views/product.php';
            break;
        case 'products-detail':
            $tieudetrang = "Sản Phẩm Chi Tiết";
            include_once 'views/header.php';
            if (isset($_GET['id']) && (is_numeric($_GET['id']) && $_GET['id'] > 0)) {
                $id = $_GET['id'];
                $sp_chitiet = laySanPhamChiTiet($id);
                $iddm = $sp_chitiet['id_category'];
                $sp_tuongtu = laySanPhamTuongTu($id, $iddm);
                include_once "views/products-detail.php";
            } else {
                $id_product_detail = 0;
                include_once 'views/home.php';
            }

            break;
        case 'blog':
            $tieudetrang = "Blog cá nhân";
            $posts = layTatCaPosts();
            $wishlist = layTatCaPosts();
            include_once 'views/header.php';
            include_once 'views/blog.php';
            break;
        case 'contact':
            $tieudetrang = "Liên hệ";
            include_once 'views/header.php';
            include_once 'views/contact.php';
            break;
        case 'signin':
            $message = "";
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['username'];
                $pwd = $_POST['password'];
                $check = check_user($user, $pwd);
                if ($check == -1) {
                    $message = "Tài khoản không tồn tại. Vui lòng kiểm tra lại.";
                    // Xóa session để đảm bảo người dùng không được đăng nhập
                    session_unset(); // Xóa tất cả các biến session
                    session_destroy(); // Kết thúc phiên làm việc
                } elseif ($check == -2) {
                    $message = "Mật khẩu không chính xác. Vui lòng thử đăng nhập lại hoặc khôi phục mật khẩu.";
                    // Xóa session để đảm bảo người dùng không được đăng nhập
                    session_unset(); // Xóa tất cả các biến session
                    session_destroy(); // Kết thúc phiên làm việc
                } else {
                    // Tài khoản hợp lệ , Xử lí đănhg nhập
                    // Ghi nhận iduser và session
                    $hashed_password = $kq[0]['password'];
                    $_SESSION['password'] = $pwd;
                    $_SESSION['username'] = $user;
                    $role = $kq[0]['role'];
                    if ($check == 1) {
                        $_SESSION['role'] = $check;
                        header('Location: admin/index.php');
                    } else {
                        $_SESSION['role'] = $check;
                        header('Location: index.php?page=product');
                    }
                }
            }
            $tieudetrang = "Đăng nhập";
            include_once 'views/header.php';
            include "views/signin.php";
            break;
        case 'register':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $user = $_POST['username'];
                $pwd = $_POST['password'];
                $email = $_POST['email'];
                // xử lý : Thêm người dùng vào database => trả về iduser mới nhất
                $iduser = insert_user($user, $pwd, $email);
                // Đăng nhập
                // Ghi nhận iduser và session
                $_SESSION['iduser'] = $iduser;
                $_SESSION['username'] = $user;
                // Chuyển trang: header();
                header("location: index.php?page=product");
            }
            $tieudetrang = "Đăng ký tài khoản";
            include_once 'views/header.php';
            include_once 'views/register.php';
            break;
        case 'logout':
            if (isset($_SESSION['username'])) {
                unset($_SESSION['username']);
                unset($_SESSION['password']);
                unset($_SESSION['iduser']);
                header('location: index.php');
            }
            include_once 'views/logout.php';
            break;
        case 'add_to_cart':
            $tieudetrang = "Giỏ Hàng";
            include_once 'views/header.php';
            if (isset($_POST["themgiohang"])) {
                $product_name = $_POST["product_name"];
                $image = $_POST["image"];
                $price_sale = $_POST["price_sale"];
                $stock_quanlity = (int) $_POST["stock_quanlity"];
                $i = $_POST["i"];
                $thanhtien = (int) $stock_quanlity * (int) $price_sale;
                $sp = array("product_name" => $product_name, "image" => $image, "price_sale" => $price_sale, "stock_quanlity" => $stock_quanlity, "i" => $i, "thanhtien" => $thanhtien);
                // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
                $product_exists = false;
                foreach ($_SESSION["giohang"] as &$item) {
                    if ($item["product_name"] === $product_name) {
                        // Tăng số lượng nếu sản phẩm đã có
                        $item["stock_quanlity"] += $stock_quanlity;
                        $item["thanhtien"] = $item["stock_quanlity"] * $item["price_sale"];
                        $product_exists = true;
                        break;
                    }
                }
                // Thêm sản phẩm mới nếu chưa có trong giỏ hàng
                if (!$product_exists) {
                    $_SESSION["giohang"][] = [
                        "product_name" => $product_name,
                        "image" => $image,
                        "price_sale" => $price_sale,
                        "stock_quanlity" => $stock_quanlity,
                        "i" => $i,
                        "thanhtien" => $thanhtien
                    ];
                }
                header('location: index.php?page=viewcart');
                exit();
            }
            include_once "views/viewcart.php";
            break;
        case 'remove_from_cart':
            if (isset($_POST["product_name"])) {
                $product_name = $_POST["product_name"];

                // Duyệt qua giỏ hàng để tìm sản phẩm và xóa
                foreach ($_SESSION["giohang"] as $key => $sp) {
                    if ($sp["product_name"] === $product_name) {
                        unset($_SESSION["giohang"][$key]); // Xóa sản phẩm
                        break; // Dừng lại sau khi xóa
                    }
                }
                // Chuyển hướng về trang giỏ hàng sau khi xóa
                header('location: index.php?page=viewcart');
                exit();
            }
            include_once "views/viewcart.php";
            break;
        case 'viewcart':
            $tieudetrang = "Giỏ Hàng";
            include_once 'views/header.php';
            if (isset($_GET['del']) && $_GET['del'] == 1) {
                unset($_SESSION["giohang"]);
                $_SESSION["giohang"] = [];
                header('location: index.php?page=viewcart');
            } else {
                if (isset($_SESSION["giohang"])) {
                    $tongdonhang = tinhTongDonHang();
                }
                $giatrivoucher = 0;
                if (isset($_GET['voucher']) && ($_GET['voucher'] == 1)) {
                    $tongdonhang = $_POST['tongdonhang'];
                    $mavoucher = $_POST['mavoucher'];
                    $giatrivoucher = 100;
                }
            }
            $thanhtien = (int) $tongdonhang - (int) $giatrivoucher;
            include_once "views/viewcart.php";
            break;
        case 'donhang':
            $tieudetrang = "Trang thanh toán";
            include_once 'views/header.php';
            if (isset($_POST['donhang'])) {
                $ten_kh = $_POST['uname'];
                $diachi_kh = $_POST['address'];
                $email_kh = $_POST['email'];
                $phone_kh = $_POST['phone'];
                $ten_nguoinhan = $_POST['uname_nguoinhan'];
                $diachi_nguoinhan = $_POST['address_nguoinhan'];
                $phone_nguoinhan = $_POST['phone_nguoinhan'];
                $pttt = $_POST['pttt'];
                // tạo mới user
                $username = "guest" . rand(1, 999);
                $password = "customer";
                $iduser = insert_user_id($fullname, $username, $password, $address, $email, $phone);
                // tạo đơn hàng
                $madh = "ESSENCE" . $iduser . "-" . date("Y-m-d");
                $total = tinhTongDonHang();
                $ship = 0;
                if (isset($_SESSION['giatrivoucher'])) {
                    $voucher = $_SESSION['giatrivoucher'];
                } else {
                    $voucher = 0;
                }
                $tong_tt = ((int) $total - (int) $voucher) + (int) $ship;
                $id_bill = bill_insert_id($ma_donhang, $id_user, $ten_kh, $diachi_kh, $email_kh, $phone_kh, $ten_nguoinhan, $diachi_nguoinhan, $phone_nguoinhan, $total, $ship, $voucher, $tong_tt, $pttt);
                foreach ($_SESSION["giohang"] as $sp) {
                    insert_cart($sp['product_id'], $sp['price_sale'], $sp['product_name'], $sp['stock_quanlity'], $sp['thanhtien'], $id_bill);
                }
                unset($_SESSION["giohang"]);
                // Chuyển hướng đến trang xác nhận đơn hàng
                header('Location: index.php?page=confirm-order&order_id=' . $id_bill);
                exit();
            }
            include_once "views/donhang.php";
            break;
        case 'confirm-order':
            // Trang xác nhận đơn hàng
            $order_id = $_GET['order_id'] ?? 0;
            $tieudetrang = "Đặt hàng thành công";
            include_once 'views/header.php';

            echo "<h2>Cảm ơn bạn đã đặt hàng!</h2>";
            echo "<p>Đơn hàng của bạn đã được ghi nhận thành công.</p>";
            echo "<p><a href='index.php?page=order_info&order_id=" . $order_id . "'>Xem thông tin đơn hàng tại đây</a></p>";
            break;
        default:
            $spmoi = layTatCaSanPham(0, 8, "");
            $spbanchay = sanPhamBanChay(8);
            $sphot = sanPhamHot(8);
            include_once 'views/home.php';
            break;
    }
}
include_once 'views/footer.php';
