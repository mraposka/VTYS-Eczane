<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>assets/homepage.css">
    <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>assets/Prescriptions.css">
    <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>bootstrap/css/bootstrap.min.css">
    <script src="<?php echo base_url('ViewAssets/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>

<body>

    <div class="home">
        <header class="navbar navbar-expand-lg fixed-top navbar-light">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url("/Home") ?>">
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
                            <a class="btn  btn-rounded nav-link mx-2" href="<?php echo base_url("/Faturalar") ?>" style="color: #ffa500;"><i class="fa-solid fa-capsules pe-2"></i>FATURALAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn  btn-rounded" href="<?php echo base_url("/Sepet") ?>" style="color: #ffa500;" </a><i class="fa-solid fa-cart-shopping pe-2"></i>SEPET</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>

    <div class="input-group input-group-sm mb-3" style="margin-top:130px; width:250px; float:right; margin-right: 203px">
    <input type="text" class="form-control form-control-sm" placeholder="Aramak istediğiniz şeyi giriniz." aria-label="Recipient's username" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary btn-sm"style="color: #808080; background:#ffa500; font-weight: bold; " type="button" id="button-addon2">Button</button>
</div>




    //! TABLE START
    <div class="table">
        <table class="table  table-hover" style="background:#f2f2f2;">
            <thead>
                <tr>
                    <th scope="col">Fatura ID</th>
                    <th scope="col">TCKNO</th>
                    <th scope="col">Müşteri Adı</th>
                    <th scope="col">Personel Adı</th>
                    <th scope="col">Faturalandırılma Tarihi</th>
                    <th scope="col">Fatura Görüntüle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>2</td>
                    <td>zeynep</td>
                    <td>Ayar</td>
                    <td>03.04.2024</td>
                    <td><button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color: #808080; background:#ffa500; font-weight: bold;">GÖRÜNTÜLE</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!--MODAL FORM PRES-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">REÇETE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Verilme Tarihi</th>
                                <th scope="col">Kullanım Süresi</th>
                                <th scope="col">Reçete Rengi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>12.12.2024</td>
                                <td>15 gün</td>
                                <td>Kırmızı</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; float: right;">Ne yapacak ?</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>