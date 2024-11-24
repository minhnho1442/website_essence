
<div class="container my-5">
        <div class="row">
        <div class="col-3"></div>
        <div class="col">
        <section>
        <form action="index.php?page=register" method="post">
            <h1 class="text-center my-5"><?=$tieudetrang?></h1>
  <div class="mb-3 my-5">
    <label for="username" class="username">Tên đăng nhập:</label>
    <input type="text" class="form-control" id="username" placeholder="Tên đăng nhập" name="username" required>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Mật khẩu:</label>
    <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password" required>
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
  </div>
  <div class="mb-3 d-flex">
    <p class="text-center">Bạn đã có tài khoản! <span ><a href="index.php?page=signin"> Đăng nhập</a></span>.</p>
    </div>
  <input type="submit" class="btn btn-danger mb-4" name="dangky" value="Đăng ký">
  <br>
</form>
       </section>
        </div>
        <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col mb-5"></div>
        </div>
       </div>
    
