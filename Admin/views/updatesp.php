

<div class="container p-5">
    <h1 class="text-center">Cập nhật sản phẩm</h1>
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
            <input type="hidden" name="iddm" value="<?= isset($sanpham['iddm']) ? htmlspecialchars($sanpham['iddm']) : ''; ?>" >
                <label for="">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="product_name" value="<?= isset($sanpham['product_name']) ? htmlspecialchars($sanpham['product_name']) : ''; ?>" >
                -- <label for="">Giá gốc:</label>
                <input type="text" class="form-control" name="price" value="<?= isset($price) ? htmlspecialchars($price) : ''; ?>">
                -- <label for="">Giá giảm:</label>
                <input type="text" class="form-control" name="price_sale"  value="<?=$price_sale?>">
                -- <label for="">Số lượng:</label>
                <input type="number" min="0" class="form-control" name="stock_quantity"  value="<?=$stock_quantity?>" >
                -- <label for="">Đã bán:</label>
                <input type="number" min="0" class="form-control" name="sold"  value="<?=$sold?>" >
                -- <label for="">Hình ảnh:</label>
                <input type="file" class="form-control" name="image" >
                -- <label for="">Mô tả:</label> <br>
                <textarea name="description"  value="<?=$description?>" cols="56" rows="6"></textarea> <br>
                <input type="submit" class="btn btn-danger py-2 mt-2 mb-5" name="capnhat" value="Cập nhật sản phẩm">
                <?php if (isset($alert) && ($alert != ""))
                    echo $alert ?>
                     </form>
            </div>           
   