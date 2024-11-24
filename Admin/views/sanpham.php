<div class="container py-5">
    <h1 class="text-center">Thêm sản phẩm</h1>

    <div class="row">
        <div class="col-md-4 py-5">
            <form action="index.php?act=sanpham" method="post" enctype="multipart/form-data">
                <label for="">Danh mục:</label>
                <select name="id_category">
                    <?php
                    foreach ($listdanhmuc as $item) {
                        extract($item);
                        echo '<option value="' . $id . '">' . $category_name . '</option>';
                    }

                    ?>
                </select><br>--
                <label for="">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm">
                -- <label for="">Giá gốc:</label>
                <input type="text" class="form-control" name="price" placeholder="Giá gốc">
                -- <label for="">Giá giảm:</label>
                <input type="text" class="form-control" name="price_sale" placeholder="Giá giảm">
                -- <label for="">Số lượng:</label>
                <input type="number" min="0" class="form-control" name="stock_quantity" placeholder="Số lượng">
                -- <label for="">Đã bán:</label>
                <input type="number" min="0" class="form-control" name="sold" placeholder="Đã bán">
                -- <label for="">Hình ảnh:</label>
                <input type="file" class="form-control" name="image" placeholder="Hình ảnh sản phẩm">
                -- <label for="">Mô tả:</label> <br>
                <textarea name="description" cols="38" rows="6"></textarea> <br>
                <input type="submit" class="btn btn-danger py-2 mt-2 mb-5" name="themsp" value="Thêm sản phẩm">
                <?php if (isset($alert) && ($alert != ""))
                    echo $alert ?>
                     </form>
            </div>
            <div class="col-md-8 py-5">
            <form action="index.php?act=sanpham" method="post">
                <input type="text" name="kyw" id="kyw" placeholder="Tìm kiếm sản phẩm">
                <select name="id_category">
                <option value="0" selected>Tất cả</option>
                    <?php
                foreach ($listdanhmuc as $item) {
                    extract($item);
                    echo '<option value="' . $id . '">' . $category_name . '</option>';
                }
                ?>
            </select>   
            <input type="submit" class="btn btn-danger" name="hienthi" value="Hiển thị">
            <table class="table table-hover">
                <thead>
                    <tr class="table-light">
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                    foreach ($listsanpham as $item) {
                        extract($item);
                        $suasp="index.php?act=updatesp&id".$id;
                        // $xoasp="index.php?act=xoasp&id".$id;
                        echo '<tbody>
      <tr>
        <td>' . $id . '</td>
        <td>' . $product_name . '</td>
       <td><img src="../public/upload/' . $image . '" alt="' . $product_name . '" style="width: 100px; height: auto;"></td>
        <td>' . $price . '</td>
        <td>
        <a href="'.$suasp.'"><input type="button" class="btn btn-danger"  value="Sửa"></a>
        <a href="index.php?act=xoasp&id=' . $id . '"><input type="button" class="btn btn-danger"  value="Xóa"></a>
        </td>
      </tr>
    </tbody>';
                    }
                    ?>
                </thead>
            </table>
            </form>
        </div>
            
           
    </div>