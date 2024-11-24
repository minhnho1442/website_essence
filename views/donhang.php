
<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <h1><span style="color: red;">|</span> Thông tin người đặt hàng</h1>
                <form action="index.php?page=donhang" class="was-validated">
                    <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Nhập họ tên đầy đủ" name="uname" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <input type="address" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                        <input type="phone" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="ttdathang"><a onclick="showttnguoinhan()" style="cursor: pointer;color: red;"><i class='bx bxs-right-arrow'></i> Thay đổi thông tin người đặt hàng</a></div>
                    <div class="ttdathang py-4" id="ttnhanhang">
                    <h1><span style="color: red;">|</span> Cập nhật thông tin người đặt hàng</h1>
                    <div class="mb-3 mt-3">
                        <label for="uname" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control" id="uname_nguoinhan" placeholder="Nhập họ tên đầy đủ" name="uname_nguoinhan" >
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <input type="address" class="form-control" id="address_nguoinhan" placeholder="Nhập địa chỉ" name="address_nguoinhan" >
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                        <input type="phone" class="form-control" id="phone_nguoinhan" placeholder="Nhập số điện thoại" name="phone_nguoinhan" >
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
                    </div>
                    <button type="submit" name="capnhattk" class="btn btn-danger">Cập nhật</button>
                    </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <h1><span style="color: red;">|</span> Đơn hàng</h1>
                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item">First item</li>
                    <li class="list-group-item">Second item</li>
                    <li class="list-group-item">Third item</li>
                </ul>
                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item">Voucher:</li>
                </ul>
                <ul class="list-group mt-3 mb-3">
                    <li class="list-group-item ">Phương thức thanh toán</li>
                    <li class="list-group-item">
                        <input type="radio" name="pttt" value="1" id="" checked> Tiền mặt <br>
                        <input type="radio" name="pttt" value="2" id=""> Ví điện tử <br>
                        <input type="radio" name="pttt" value="3" id=""> Chuyển khoản <br>
                        <input type="radio" name="pttt" value="4" id=""> Thanh toán online <br>
                    </li>
                </ul>
                <h3>Tổng: 100000</h3>
                <button class="btn btn-danger" name="donhang" type="submit">Thanh toán</button>
            </div>
            </form>
        </div>
    </div>
</section>
<script>
    // show cập nhật thông tin người đặt hàng
    var ttnhanhang=document.getElementById("ttnhanhang");
    ttnhanhang.style.display="none";
    function showttnguoinhan() {
        if(ttnhanhang.style.display=="none"){
            ttnhanhang.style.display="block";
        } else{
            ttnhanhang.style.display="none";
        }
    }
</script>