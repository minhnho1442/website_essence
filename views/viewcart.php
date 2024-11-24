<?php 
$html_cart=viewcart();
?>
<?php 

?>
<section>
<div class="container py-5">
    <h1 class="text-center glow"><?=$tieudetrang?></h1>
    <div class="row">
        <div class="col-md-8">
        <h1><span style="color: red;">|</span> Chi tiết đơn hàng</h1>
        <a style="text-decoration:none;color: red;" href="index.php?page=product">Tiếp tục mua sắm</a>
        <a style="margin-left:500px ;text-decoration:none;color: red;" href="index.php?page=viewcart&del=1">Xóa tất cả đơn hàng</a>
        <table class="table table-bodered">
    <thead>
      <tr>
      <th>STT</th>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
    <?=$html_cart?>
    </tbody>
  </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3">
        <h1><span style="color: red;">|</span> Đơn hàng</h1>
       <h5>Tổng: <?=$tongdonhang?></h5>
        <form action="index.php?page=viewcart&voucher=1" method="post">
          <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>">
          <input style="width: 100%;" type="text" name="mavoucher" id="" placeholder="Nhập mã voucher"> <br/>
          <button class="btn btn-danger" type="submit">Áp mã</button>
        </form>
        <h5 >Tổng thanh toán: <?=$thanhtien?></h5> 
        <button class="btn btn-danger" style="margin-left: 150px;" type="submit"><a style="text-decoration: none;color:white;"href="index.php?page=donhang" >Thanh toán</a></button>
        </div>
    </div>
    
</div>
</section>