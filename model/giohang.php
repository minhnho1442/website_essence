
<?php
// insert vào table cart
function insert_cart($id_product, $price, $name,$soluong,$thanhtien,$id_bill)
{
    $sql = "INSERT INTO cart (id_product, price, name,soluong,thanhtien,id_bill) VALUES ('$id_product', '$price', '$name','$soluong','$thanhtien','$id_bill')";
    return pdo_excute_lastId($sql);
}
function viewcart(){
    $html_cart='';
$i=1;
foreach($_SESSION["giohang"] as $sp){
    extract($sp);
    $tongtien=(int)$price_sale*(int)$stock_quanlity;
    $html_cart.='
    <tbody>
      <tr style="font-size: 1.5rem;">
      <td>'.$i.'</td>
        <td><img style="width: 100px; height:100px;" src="public/upload/'.$image.'" alt=""></td>
        <td>'.$product_name.'</td>
        <td>'.$price_sale.'</td>
        <td>'.$stock_quanlity.'</td>
        <td>'.$tongtien.'</td>
        <td>
         <form method="POST" action="index.php?page=remove_from_cart">
                    <input type="hidden" name="product_name" value="' . $product_name . '">
                    <button class="btn btn-danger btn-lg" type="submit">Xóa</button>
                </form>
        </td>
      </tr>';
  $i++;
}
$html_cart.='</tbody>';
return $html_cart;
}
function tinhTongDonHang(){
    $tong=0;
foreach($_SESSION["giohang"] as $sp){
    extract($sp);
    $tongtien=(int)$price_sale*$stock_quanlity;
    $tong+=$tongtien;
}
return $tong;
}
?>