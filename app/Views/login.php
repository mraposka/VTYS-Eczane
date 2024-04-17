<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>assets/login.css" />
  <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Eczane Otomasyonu</title>
</head>

<body>
  <div class="div">
    <div class="container d-flex justify-conten-center align-items-center min-vh-100">
      <div class="row p-3 border rounded-5 shadow box-area" style="background-color: #f2f2f2;">
        <div class="col-md-6 rounded-4 d-flex flex-column justify-conten-center align-items-center left-box">
          <div class="featured-image mb-1 align-items-center">
            <img src="<?php echo base_url('ViewAssets/') ?>images/1.jpg" alt="image" width="250px"
              class="image-fluid" />
          </div>
        </div>
        <div class="col-md-6 right-box">
          <div class="row align-items-center cen">
            <div class="header-text mb-4">
              <h2>Hoşgeldiniz</h2>
            </div>
            <form action="Login" method="POST">
              <div class="input-group mb-3">
                <input type="text" name="user" class="form-control form-control-lg bg-light fs-6"
                  placeholder="Kullanıcı Adı" />
              </div>
              <div class="input-group mb-3">
                <input type="password" name="pass" class="form-control form-control-lg bg-light fs-6"
                  placeholder="Şifre" />
              </div>
              <div class="input-group mb-3">
                <button type="submit" class="btn btn-custom btn-lg w-100 fs-6" style="background-color: #ffa500;"><i
                    class="fa-solid fa-sign-in pe-2"></i>Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url('ViewAssets/') ?>bootstrap/js/bootstrap.min.js"></script>
</body>

</html>