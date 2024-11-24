<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <!-- link css -->
    <link rel="stylesheet" href="css/admin.css">
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- link gg font Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body>
    <header>
    <div class="container">
        <h1 class="bg-light text-danger py-3">ADMIN - ESSENCE</h1>
    </div>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light  ">
                <div class="container">
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse order-lg-1" id="collapsibleNavbar">
                        <ul class="navbar-nav mx-auto text-center">
                            <li class="nav-item border-0">
                                <a href="index.php" class="nav-link text-uppercase  text-dark">Trang chủ</a>
                            </li>
                            <li class="nav-item border-0">
                                <a href="index.php?act=danhmuc" class="nav-link text-uppercase text-dark">Danh mục</a>
                            </li>
                            <li class="nav-item border-0">
                                <a href="index.php?act=sanpham" class="nav-link text-uppercase text-dark">Sản phẩm</a>
                            </li>
                            <li class="nav-item border-0">
                                <a href="index.php?act=ds_donhang" class="nav-link text-uppercase text-dark">Đơn hàng</a>
                            </li>
                            <?php
                            // Kiểm tra nếu người dùng đã đăng nhập
                            if (isset($_SESSION['username'])&&($_SESSION['username'])) {
                                echo' <li class="nav-item border-0 text-danger">
                                Xin chào, '.$_SESSION['username'].'
                            </li>';
                            echo '
                                <a href="index.php?act=dangxuat" class="nav-link text-uppercase text-dark">Đăng xuất</a>
                          ';
                            } else {
                                echo '
                                <a href="index.php?act=dangnhap" class="nav-link text-uppercase text-dark">Đăng Nhập</a>
                         ';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
    </div>
    </header>
            
       