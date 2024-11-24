<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "views/header.php";
// controller danh mục

if (isset($_GET['act'])) {

    switch ($_GET['act']) {
        case 'danhmuc':
            // Kiểm tra người đùng có click vào nút add hay không?
            if (isset($_POST['themdm']) && ($_POST['themdm'])) {
                $tendm = $_POST['tendm'];
                danhmuc_insert($tendm);
                $alert = "Thêm thành công";
            }
            $listdanhmuc = danhmuc_select_all();
            include "views/danhmuc.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $iddm = $_GET['id'];
                danhmuc_delete($iddm);
                $alert = "Xóa thành công";
            }
            $listdanhmuc = danhmuc_select_all();
            include "views/danhmuc.php";
            break;
        case 'updatedm':
            $suadm = "";
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $iddm = $_GET['id'];
                $suadm = danhmuc_select_by_id($iddm);
            } else {
                if (isset($_POST['updatedm']) && ($_POST['updatedm']) > 0) {
                    $tendm = $_POST['tendm'];
                    $iddm = $_POST['id'];
                    danhmuc_update($iddm, $tendm);
                }
                $alert = "Cập nhật thành công";
            }
            $listdanhmuc = danhmuc_select_all();
            include "views/updatedm.php";
            break;
        /*   *******************end***********************   */
        /*   *******************SANPHAM***********************   */
        case 'sanpham':
            // Kiểm tra người đùng có click vào nút add hay không?
            if (isset($_POST['themsp']) && ($_POST['themsp'])) {
                $id_category = $_POST['id_category'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $price_sale = $_POST['price_sale'];
                $stock_quantity = $_POST['stock_quantity'];
                $sold = $_POST['sold'];
                $image = "";
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    // check xem co phai la hinh anh thuc te khong
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if ($check !== false) {
                        //  Validate kích thước file (5MB maximum)
                        if ($_FILES["image"]["size"] <= 5000000) {
                            // Chỉ cho phép các định dạng ảnh JPG, PNG, JPEG, GIF
                            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {
                                // Di chuyển file đến thư mục upload
                                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                                    echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                                    // Cập nhật biến $image với tên file
                                    $image = basename($_FILES["image"]["name"]);
                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }
                            } else {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            }
                        } else {
                            echo "Sorry, your file is too large.";
                        }
                    } else {
                        echo "File is not an image.";
                    }
                } else {
                    echo "No file was uploaded or there was an error.";
                }
                $description = $_POST['description'];
                $alert = "Thêm thành công";
                sanpham_insert($id_category, $product_name, $image, $description, $price, $price_sale, $stock_quantity, $sold);
            }
            // Hiển thí sản phẩm theo danh mục
            if (isset($_POST['hienthi']) && ($_POST['hienthi'])) {
                $idkyw = $_POST['kyw'];
                $iddm = $_POST['id_category'];
            } else {
                $idkyw = "";
                $iddm = 0;
            }
            $listsanpham = sanpham_select_all($idkyw, $iddm);
            $listdanhmuc = danhmuc_select_all();
            include "views/sanpham.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $iddm = $_GET['id'];
                sanpham_delete($iddm);
                $alert = "Xóa thành công";
                header('location: index.php?act=sanpham');
                exit();
            }
            $listsanpham = sanpham_select_all("", 0);
            include "views/sanpham.php";
            break;
        case 'updatesp':
            if (isset($_GET['id']) && ($_GET['id']) > 0) {
                $iddm = $_GET['id'];
                $sanpham = sanpham_select_one($iddm);
                var_dump($sanpham);
            } else {
                if (isset($_POST['capnhat']) && ($_POST['capnhat']) > 0) {
                    $product_name = $_POST['product_name'];
                    $price = $_POST['price'];
                    $price_sale = $_POST['price_sale'];
                    $stock_quantity = $_POST['stock_quantity'];
                    $sold = $_POST['sold'];
                    $description = $_POST['description'];
                }
                $alert = "Cập nhật thành công";
                $listsanpham = sanpham_select_all("", 0);
            }
            include "views/updatesp.php";
            break;
        case 'ds_donhang':
            include_once 'views/ds_donhang.php';
            break;
        case 'dangxuat':
            if (isset($_SESSION['role']) && $_SESSION['role']) {
                unset($_SESSION['role']);
                unset($_SESSION['username']);
                unset($_SESSION['password']);
                unset($_SESSION['iduser']);
                header('location: ../index.php');
            }
            include_once 'views/dangxuat.php';
            break;
        default:
            include "views/home.php";
            break;
    }
} else {
    include "views/home.php";
}
include "views/footer.php";
