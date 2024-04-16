<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>assets/homePage.css">
    <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>assets/MyCart.css">
    <link rel="stylesheet" href="<?php echo base_url('ViewAssets/') ?>bootstrap/css/bootstrap.min.css">
    <script src="<?php echo base_url('ViewAssets/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>

<body>
    <!--MENU BAR-->
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
                            <a class="btn btn-rounded nav-link mx-2" href="<?php echo base_url("/Faturalar") ?>" style="color: #ffa500;">
                                <i class="fas fa-file-invoice pe-2"></i>FATURALAR
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn  btn-rounded" href="#!" style="color: #ffa500;" </a><i class="fa-solid fa-cart-shopping pe-2"></i>SEPET</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
    </div>

    <!--TABLE-->
    <div class="table ">
        <table class="table  table-hover" style="background:#f2f2f2;">
            <thead>
                <tr>
                    <th scope="col">Sepet ID</th>
                    <th scope="col">Reçete ID</th>
                    <th scope="col">Personel</th>
                    <th scope="col">İlaç Sayısı</th>
                    <th scope="col">Sepeti Görüntüle</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>XXXX</td>
                    <td>XXXXX</td>
                    <td>XXXXXXX</td>
                    <td><button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color: #808080; background:#ffa500; font-weight: bold;">GÖRÜNTÜLE</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!--MODAL FORM MYCART-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">SEPET</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    İLAÇLAR
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="card" style="width: 26.7rem;">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">ilaç 1</li>
                                            <li class="list-group-item">ilaç 2</li>
                                            <li class="list-group-item">ilaç 3</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    İLAÇ KULLANIM TALİMATI
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="card" style="width: 26.7rem;">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">ilaç 1 -- kullanım 1</li>
                                            <li class="list-group-item">ilaç 2 -- kullanım 2</li>
                                            <li class="list-group-item">ilaç 3 -- kullanım 3</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    İLAÇ FİYATLARI
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="card" style="width: 26.7rem;">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">ilaç 1 -- xx TL</li>
                                            <li class="list-group-item">ilaç 2 -- xx TL</li>
                                            <li class="list-group-item">ilaç 3 -- xx TL</li>
                                        </ul>
                                        <div class="card-footer">
                                            <p>Toplam Tutar -- xx TL</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold;">SEPETİ SİL</button>
                    <button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold;">SATIN AL</button>
                </div>
            </div>
        </div>
    </div>



</body>

</html>