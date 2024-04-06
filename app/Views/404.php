<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Sayfa Bulunamadı</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body, html {
      height: 100%;
    }

    .container-fluid {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    video {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -100;
      background-size: cover;
    }

    .content {
      text-align: center;
      color: white;
      text-shadow: 2px 2px 4px #000000;
    }
  </style>
</head>
<body>

<video autoplay muted loop>
  <source src="<?php echo base_url('ViewAssets/')?>videos/error.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="content">
        <h1>404</h1>
        <p>Üzgünüz, aradığınız sayfa bulunamadı.</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
