<?php

$html_dssp = "";
foreach ($dssp as $item) {
    extract($item);
    $link = 'index.php?page=products-detail&id=' . $id;
    $img = DIR_UPLOAD_IMG . $image;
    $html_dssp .= '<div class="col">
    <div class="card bg-light" >
        <a href="' . $link . '"><img src="' . $img . '" class="card-img-top" class="img-fluid" alt="Responsive Image"></a>
        <div class="card-body text-center">
            <h5 class="text-dark">' . $product_name . ' <br> <span class="text-danger">(Đã bán: ' . $sold . ')</span></h5>
        </div>
     <h5 class="text-center price-sale">' . $price . ' VNĐ</h5>
        <div class="d-flex justify-content-around">
            <h3 class="text-danger price">' . $price_sale . ' VNĐ</h3>
        </div>
        <form action="index.php?page=add_to_cart" method="post">
                    <input type="hidden" name="product_name" value="'.$product_name.'">
                    <input type="hidden" name="image" value="'.$image.'">
                    <input type="hidden" name="price_sale" value="'.$price_sale.'">
                    <input type="hidden" name="stock_quanlity" value="1">
                    <button type="submit" class="btn btn-danger" style="width:100%"; name="themgiohang"><span><i class="bx bx-cart-alt mx-2 text-light"></i></span>Mua ngay</button>
                </form>
    </div>
</div>';
}
$html_dsdm = "";
foreach ($dsdm as $item) {
    extract($item);
    $html_dsdm .= '<a href="index.php?page=product&iddm=' . $id . '" class="list-group-item list-group-item-action list-group-item-light">' . $category_name . '</a>';
}

?>
<section>
    <div class="container my-5">
        <div class="row">
           <div class="col-md-4 "></div>
            <div class="col-md-8"><h1 class="text-center glow mb-5"><?= $tieudetrang ?></h1></div>
        </div>
        <div class="row">
            <div class="col-md-4 ">
                <div class="list-group ">
                    <a class="list-group-item list-group-item-action list-group-item-dark active"
                        aria-current="true">
                        <h3>Sản phẩm</h3>
                    </a>
                    <a href="index.php?page=product"
                        class="list-group-item list-group-item-action list-group-item-light">Sản phẩm mới</a>
                    <a href="index.php?page=product&hot=1"
                        class="list-group-item list-group-item-action list-group-item-light">Sản phẩm hot</a>
                    <a href="index.php?page=product&bestseller=1"
                        class="list-group-item list-group-item-action list-group-item-light">Sản phẩm bán chạy</a>

                </div>
                <br>
                <div class="list-group mt-4">
                    <a class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">
                        <h3>Danh mục sản phẩm</h3>
                    </a>
                    <?= $html_dsdm ?>
                </div>
            </div>
            <!-- Product List -->
            <div class="col-md-8">
                <div class="row row-cols-2 row-cols-md-3 g-5">
                    <?php
                    echo $html_dssp;
                    ?>
                </div>
            </div>
        </div>

    </div>
</section>
