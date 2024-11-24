<?php
 $html_dsblog="";
 foreach ($posts as $item){
     extract($item);
    $html_dsblog.= '<div class="card">
                        <div class="card-header"><img class="card-img-top" src="'.$image.'" alt=""></div>
                        <div class="card-footer text-center">'.$created_at.'</div>
                        <button type="submit" class="btn btn-danger mb-2" name="posts">Xem thêm</button>
                    </div>';
 }
 $html_wishlist="";
 foreach ($wishlist as $item) 
 {
    extract($item);
    $html_wishlist.='<div class="col-5"><a href="http://"><img src="'.$image.'" style="width: 150px;height: 100px;"></a></div>
                    <div class="col-7">
                        <div class="card-body">
                        '.$title.'
                        </div>
                        <div class="card-footer">'.$created_at.'</div>
                    </div>';
 }
?>
<div class="container-sm py-5">
    <h1 class="text-center glow"><?= $tieudetrang ?></h1>
    <p class="text-center">Khám phá thế giới nước hoa và phong cách sống cùng ESSENCE</p>
    <!-- Blog Posts -->
    <div class="row">
        <div class="col-md-8">
            <h1>Bài viết mới</h1>
            <hr>
                <div class="row row-cols-2 row-cols-md-3">
                    <?php echo $html_dsblog?>
                </div>
            </div>
            <div class="col-md-4">
           
                <h1>Phổ biến gần đây</h1>
                <hr>
                <div class="list-group ">
                    <a href="index.php?page=product"
                        class="list-group-item list-group-item-action list-group-item-light">Sản phẩm mới</a>
                    <a href="index.php?page=product&hot=1"
                        class="list-group-item list-group-item-action list-group-item-light">Sản phẩm hot</a>
                    <a href="index.php?page=product&bestseller=1"
                        class="list-group-item list-group-item-action list-group-item-light">Sản phẩm bán chạy</a>
                </div>
          
                <h1 class="mt-3">Có thể bạn thích</h1>
                <hr>
                    <div class="row d-flex g-2 py-2">
                        <?php echo $html_wishlist?>
                    </div>
        </div>
    </div>  
           
</div>