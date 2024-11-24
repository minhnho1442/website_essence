

<div class="container my-5">
        <div class="row">
        <div class="col-3"></div>
        <div class="col">
        <section>
          <h1 class="text-center glow"><?=$tieudetrang?></h1>
       <form action="index.php?page=signin" method="post">
  <div class="mb-3 mt-5">
    <label for="username" class="username">Tên đăng nhập:</label>
    <input type="text" class="form-control" id="username" placeholder="Tên đăng nhập" name="username" required>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Mật khẩu:</label>
    <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password" required>
  </div>
  <div class="mb-3">
   <p class="text-danger"> 
    <?php if(isset($message) && !empty($message)){
    echo "$message";
   }
   ?>
   </p>
    <p>Bạn chưa có tài khoản! <span><a href="index.php?page=register" > Tạo tài khoản</a></span>.</p>
  <input type="submit" class="btn btn-danger mb-5" name="dangnhap" value="Đăng nhập">
</form>
       </section>
        </div>
        <div class="col-3"></div>
        </div>
       </div>
