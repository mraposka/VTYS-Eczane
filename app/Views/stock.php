<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>assets/homePage.css">
    <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>assets/Stock.css">
    <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>

<body>
    <div class="home">
        <header class="navbar navbar-expand-lg fixed-top navbar-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url("/Home")?>">
                    <img id="MDB-logo1" src="<?php echo base_url('ViewAssets/') ?>images/4.png" alt="MDB Logo" draggable="false" height="60" />
                    <img id="MDB-logo2" src="<?php echo base_url('ViewAssets/') ?>images/3.png" alt="MDB Logo" draggable="false" height="60" />
                </a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Ilaclar") ?>" style="color: #ffa500;"><i class="fa-solid fa-capsules pe-2"></i>İLAÇLAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Hastalar") ?>" style="color: #ffa500;"><i class="fa-solid fa-person pe-2"></i>HASTALAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Receteler") ?>" style="color: #ffa500;"><i class="fa-solid fa-notes-medical pe-2"></i>REÇETE</a>
                        </li>
                        <li class="nav-item">
                            <a class=" btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Stok") ?>" style="color: #ffa500;"><i class="fas fa-box pe-2"></i>STOK</a>
                        </li>
                        <li class="nav-item">
                            <a class=" btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Personel") ?>" style="color: #ffa500;"><i class="fas fa-user pe-2"></i>PERSONEL</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn  btn-rounded" href="<?php echo base_url("/Sepet") ?>" style="color: #ffa500;" </a> <i class="fa-solid fa-cart-shopping pe-2"></i>SEPET</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>

    //! TABLE START
    <div class="table">
        <table class="table  table-hover" style="background:#f2f2f2;">
            <thead>
                <tr>
                    <th scope="col">İlaç ID</th>
                    <th scope="col">Adet</th>
                    <th scope="col">Kategori</th>
                    <th>Kullanım Süresi</th>
                    <th scope="col">İlaç Sayısı</th>
                    <th scope="col">Reçete Görüntüle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Kırmızı </td>
                    <td>08.04.2024</td>
                    <td>1 Gün</td>
                    <td>1</td>
                    <td><button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold;">GÖRÜNTÜLE</button></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>