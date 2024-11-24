<?php 
$html_dssp_chitiet="";
extract($sp_chitiet);
    $img = DIR_UPLOAD_IMG . $image;
    $html_dssp_chitiet.= '<div class="col-md-5 ">
           <img style="width: 100%;height:450px;"  src="'.$img.'" alt="">
        </div>
        <div class="col-md-3">
        <h2>'.$product_name.'</h2>
        <h5>Brand: </h5>
        <p><span class="price-sale">'.$price.' VNĐ</span> | <span class="text-danger">'.$price_sale.' VNĐ</span></p>
        <p>  '.$description.'</p>
        <div class="btn d-flex p-5">
         <form action="index.php?page=add_to_cart" method="post">
                    <input type="hidden" name="product_name" value="'.$product_name.'">
                    <input type="hidden" name="image" value="'.$image.'">
                    <input type="hidden" name="price_sale" value="'.$price_sale.'">
                    <p><strong>Số lượng:  <input style="width:50px;" type="number" name="stock_quanlity" id="" min="1" value="1" max="10"></strong>   </p>
                    <p><strong>Đã bán:</strong> '.$sold.' </p>
                    <button type="submit" class="btn btn-danger" style="width:100%"; name="themgiohang"><span><i class="bx bx-cart-alt mx-2 text-light"></i></span>Mua ngay</button>
                </form>
        </div>
        </div>';
$html_dssp_tuongtu="";
        foreach ($sp_tuongtu as $item){
            extract($item);
            $link = 'index.php?page=products-detail&id=' . $id;
            $img = DIR_UPLOAD_IMG . $image;
            $html_dssp_tuongtu.= '<div class="col">
            <div class="card" >
                <a href="' . $link . '"><img src="' . $img . '" class="card-img-top" alt=""></a>
                <div class="card-body text-center">
                    <h5 class="card-title text-dark">' . $product_name . ' <br> <span class="text-danger">(số lượng: ' . $sold . ')</span></h5>
                </div>
     <h5 class="text-center price-sale">' . $price . ' VNĐ</h5>
        <div class="d-flex justify-content-around">
            <h3 class="text-danger">' . $price_sale . ' VNĐ</h3>
        </div>
                <button class="btn btn-danger "><span><i class="bx bx-cart-alt mx-2 text-light"></i></span><span class="p-2">Thêm vào giỏ hàng</span></button>
            </div>
        </div>';
        }
?>

<div class="container">
    <h1 class="py-4 text-center glow ">Chi tiết sản phẩm</h1>
    <hr>
    <div class="row">
       <p></p>
        <?=$html_dssp_chitiet?>
        <div class="col-md-1">
        </div>
        <div class="col-md-3">
            <h2 class="text-center">Cam kết</h2>
        <div class="row">
            <div class="col-md-3 text-center">
            <div class="icon " style="width: 100%;">
            <i class='bx bx-check-shield' ></i>
            </div>
            </div>
            <div class="col-md-9">
                <div class="content text-center">
                    <p style="font-weight: bold;">Cam kết chính hãng 100% <br> <span style="font-style: italic; font-weight: lighter;">Tất cả nước hoa và mỹ phẩm</span></p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center">
            <div class="icon " style="width: 100%;">
            <i class='bx bx-globe' ></i>
            </div>
            </div>
            <div class="col-md-9">
                <div class="content text-center">
                    <p style="font-weight: bold;">Bảo hành đến khi tan biến <br> <span style="font-style: italic; font-weight: lighter;">Miễn phí đổi trả sản phẩm lỗi</span></p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center">
            <div class="icon " style="width: 100%;">
            <i class='bx bxs-package' ></i>
            </div>
            </div>
            <div class="col-md-9">
                <div class="content text-center">
                    <p style="font-weight: bold;">Giao hàng miễn phí toàn quốc <br> <span style="font-style: italic; font-weight: lighter;">Miễn phí thiệp và gói quà</span></p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 text-center">
            <div class="icon " style="width: 100%;">
            <i  class='bx bx-credit-card'></i>
            </div>
            </div>
            <div class="col-md-9">
                <div class="content text-center">
                    <p style="font-weight: bold;">Bảo hành đến khi tan biến <br> <span style="font-style: italic; font-weight: lighter;">Miễn phí đổi trả sản phẩm lỗi</span></p>
                    <hr>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="container my-5">
        <h1 class="my-3 bg-light">Sản phẩm tương tự</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4 py-1">
                <?php
                echo $html_dssp_tuongtu;
                ?>
            </div>
</div>