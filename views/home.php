<?php
$txt_html_spmoi = "";
$txt_html_spbanchay = "";
$txt_html_sphot = "";
foreach ($spmoi as $item) {
    extract($item);
    $link = 'index.php?page=products-detail&id=' . $id;
    $img = DIR_UPLOAD_IMG . $image;
    $txt_html_spmoi .= '<div class="col">
    <div class="card bg-light" >
        <a href="' . $link . '"> <img src="' . $img . '" class="card-img-top" class="img-fluid" alt="Responsive Image"></a>
        <div class="card-body text-center">
             <h5 class=" text-dark">' . $product_name . ' <br> <span class="text-danger">(số lượng: ' . $sold . ')</span></h5>
        </div>
     <h5 class="text-center price-sale">' . $price . ' VNĐ</h5>
        <div class="d-flex justify-content-around">
            <h3 class="text-danger">' . $price_sale . ' VNĐ</h3>
        </div>
       <form action="index.php?page=add_to_cart" method="post">
                    <input type="hidden" name="product_name" value="' . $product_name . '">
                    <input type="hidden" name="image" value="' . $image . '">
                    <input type="hidden" name="price_sale" value="' . $price_sale . '">
                    <input type="hidden" name="stock_quanlity" value="1">
                    <button type="submit" class="btn btn-danger" style="width:100%"; name="themgiohang"><span><i class="bx bx-cart-alt mx-2 text-light"></i></span>Mua ngay</button>
                </form>
    </div>
</div>';
}
$txt_html_spmoi .= '<div ><a href="index.php?page=product">Xem thêm</a></div>';

// sp bán chạy
foreach ($spbanchay as $item) {
    extract($item);
    $link = 'index.php?page=products-detail&id=' . $id;
    $img = DIR_UPLOAD_IMG . $image;
    $txt_html_spbanchay .= '<div class="col">
    <div class="card" >
        <a href="' . $link . '"> <img src="' . $img . '" class="card-img-top" class="img-fluid" alt="Responsive Image"></a>
        <div class="card-body text-center">
             <h5 class=" text-dark">' . $product_name . ' <br> <span class="text-danger">(số lượng: ' . $sold . ')</span></h5>
        </div>
     <h5 class="text-center price-sale">' . $price . ' VNĐ</h5>
        <div class="d-flex justify-content-around">
            <h3 class="text-danger">' . $price_sale . ' VNĐ</h3>
        </div>
       <form action="index.php?page=add_to_cart" method="post">
                    <input type="hidden" name="product_name" value="' . $product_name . '">
                    <input type="hidden" name="image" value="' . $image . '">
                    <input type="hidden" name="price_sale" value="' . $price_sale . '">
                    <input type="hidden" name="stock_quanlity" value="1">
                    <button type="submit" class="btn btn-danger" style="width:100%"; name="themgiohang"><span><i class="bx bx-cart-alt mx-2 text-light"></i></span>Mua ngay</button>
                </form>
    </div>
</div>';
}
$txt_html_spbanchay .= '<div ><a href="index.php?page=product&bestseller=1">Xem thêm</a></div>';
// sản phẩm hot
foreach ($sphot as $item) {
    extract($item);
    $link = 'index.php?page=products-detail&id=' . $id;
    $img = DIR_UPLOAD_IMG . $image;
    $txt_html_sphot .= '<div class="col">
    <div class="card" >
         <a href="' . $link . '"> <img src="' . $img . '" class="card-img-top img-fluid"  alt="Responsive Image"></a>
        <div class="card-body text-center">
            <h5 class="text-dark">' . $product_name . ' <br> <span class="text-danger">(Đã bán: ' . $sold . ')</span></h5>
        </div>
     <h5 class="text-center price-sale">' . $price . ' VNĐ</h5>
        <div class="d-flex justify-content-around">
            <h3 class="text-danger">' . $price_sale . ' VNĐ</h3>
        </div>
       <form action="index.php?page=add_to_cart" method="post">
                    <input type="hidden" name="product_name" value="' . $product_name . '">
                    <input type="hidden" name="image" value="' . $image . '">
                    <input type="hidden" name="price_sale" value="' . $price_sale . '">
                    <input type="hidden" name="stock_quanlity" value="1">
                    <button type="submit" class="btn btn-danger" style="width:100%"; name="themgiohang"><span><i class="bx bx-cart-alt mx-2 text-light"></i></span>Mua ngay</button>
                </form>
    </div>
</div>';
}
$txt_html_sphot .= '<div><a href="index.php?page=product&hot=1">Xem thêm</a></div>';
?>
<article>
    <div class="container my-5">
        <!-- Carousel -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
    <div class="carousel-item active">
        <img src="public/images/Banner_p9.png" alt="Slide 1" class="d-block w-100">
    </div>
    <div class="carousel-item">
        <img src="public/images/Banner_p9.png" alt="Slide 2" class="d-block w-100">
    </div>
    <div class="carousel-item">
        <img src="public/images/Banner_p9.png" alt="Slide 3" class="d-block w-100">
    </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
</button>
</div>
    </div>
    <!-- ___________________________________Cart 1_________________________________________________ -->
    <!-- Sản phẩm bán chạy -->
   
  
        <div class="container my-5 ">
            <h1 class="text-center glow py-5">Sản phẩm <span><a href="index.php?page=product&bestseller=1"
                        class="text-decoration-none text-danger">Bán
                        chạy</a></span></h1>
            <div class="row row-cols-2 row-cols-md-4 g-3 py-5">
                <?php
                echo $txt_html_spbanchay;
                ?>
            </div>

        </div>

 
   
    <!-- ___________________________________Cart 2_________________________________________________ -->
    <!-- Sản phẩm hot -->
    <section>
        <div class="container my-5 ">
            <h1 class="text-center glow py-5">Sản phẩm <span class="text-danger"><a href="index.php?page=product&hot=1"
                        class="text-decoration-none text-danger">Hot</a></span></h1>
            <div class="row row-cols-2 row-cols-md-4 g-3 py-5">
                <?php
                echo $txt_html_sphot;
                ?>
            </div>

        </div>

    </section>
    <!-- ____________________________________Cart 3_________________________________________________ -->
    <!-- Sản phẩm mới -->
    <section>
        <div class="container my-5 ">
            <h1 class="text-center glow py-5">Sản phẩm <span class="text-danger"><a href="index.php?page=product"
                        class="text-decoration-none text-danger">Mới</a></span></h1>
            <div class="row row-cols-2 row-cols-md-4 g-3 py-5">
                <?php
                echo $txt_html_spmoi; 
                ?>
            </div>

        </div>

    </section>
</article>

