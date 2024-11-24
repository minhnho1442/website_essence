<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?= $tieudetrang ?> </title>
    <!-- link Css -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- link gg font Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- header -->

    <div class="container-fluid my-5">
        <section>
            <span class="my-background"></span>
            <header>
                <!-- Nav -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container">
                        <a href="index.php"
                            class="navbar-brand d-flex justify-content-between align-items-center order-lg-0">
                            <img src="public/images/Perfume Logo.png" style="width: 50px;" alt="shopping-icon"><span
                                class="text-dark ms-2">ESSENCE</span>
                        </a>
                        <div class="order-lg-2 d-flex">
                            <form action="index.php?page=product" method="post" class="d-flex">
                                <input class="form-control me-2" type="text" name="kyw" id="kyw" placeholder="Tìm kiếm" autocomplete="off" >
                                <button class="btn btn-danger" name="timkiem" type="submit">Search</button>
                            </form>
                            <div id="suggestions" style="display: none;"></div>
                        </div>
                        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapsibleNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse order-lg-1" id="collapsibleNavbar">
                            <ul class="navbar-nav mx-auto text-center">
                                <li class="nav-item border-0">
                                    <a href="index.php" class="nav-link text-uppercase  text-dark">Trang chủ</a>
                                </li>
                                <li class="nav-item border-0">
                                    <a href="index.php?page=product" class="nav-link text-uppercase text-dark">Sản
                                        phẩm</a>
                                </li>
                                <li class="nav-item border-0">
                                    <a href="index.php?page=contact" class="nav-link text-uppercase text-dark">Liên
                                        hệ</a>
                                </li>
                                <li class="nav-item border-0">
                                    <a href="index.php?page=blog" class="nav-link text-uppercase text-dark">Blog</a>
                                </li>
                                <?php
                                // Kiểm tra nếu người dùng đã đăng nhập
                                if (isset($_SESSION['username']) && ($_SESSION['username'])) {
                                    echo ' <li class="nav-item border-0 text-danger">
                                Xin chào, ' . $_SESSION['username'] . '
                            </li>';
                                    echo '
                                <a href="index.php?page=logout" class="nav-link text-uppercase text-dark">Đăng xuất</a>
                          ';
                                } else {
                                    echo '
                                <a href="index.php?page=signin" class="nav-link text-uppercase text-dark">Đăng Nhập</a>
                         ';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                </nav>
            </header>
        </section>
    </div>