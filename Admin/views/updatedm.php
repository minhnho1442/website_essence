<?php   
if(is_array($suadm)){
extract($suadm);
}
?>
<section>
<div class="container p-5">
    <h1 class="text-center">Cập nhật danh mục</h1>
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 ">
            <form action="index.php?act=updatedm" method="post">
                <input type="text" class="form-control" name="tendm" id="tendm" placeholder="Tên danh mục" value="<?php if(isset($category_name)&&($category_name!="")) echo $category_name;?>" >
                <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
                <input type="submit" class="btn btn-danger py-2 mt-2 mb-5" name="updatedm" value="Cập nhật danh mục"> 
                </form>
        </div>
        <?php if(isset($alert)&&($alert!="")) echo $alert?>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="table-light">
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            <?php //var_dump($listdanhmuc);
            if (isset($listdanhmuc) && (count($listdanhmuc)) > 0) {
                foreach ($listdanhmuc as $item) {
                    extract($item);
                    echo '<tbody>
      <tr>
        <td>' . $id . '</td>
        <td>' . $category_name . '</td>
        <td>' . $status . '</td>
        <td>
        <a href="index.php?act=suadm&id=' . $id . '"><input type="submit" class="btn btn-danger"  value="Sửa"></a>
        <a href="index.php?act=xoadm&id=' . $id . '"><input type="submit" class="btn btn-danger"  value="Xóa"></a>
        </td>
      </tr>
    </tbody>';
                }
            }
            ?>
        </thead>
    
    </table> 
</div>
</section>