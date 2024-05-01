<?php include("header.php"); ?>
<div class="input-group input-group-sm mb-3" style="margin-top:130px; width:250px; float:right; margin-right: 203px">
    <input type="text" class="form-control form-control-sm" placeholder="Aramak istediğiniz şeyi giriniz." aria-label="Recipient's username" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; " type="button" id="button-addon2">Button</button>
</div>
<div class="table">
    <table class="table  table-hover" style="background:#f2f2f2;">
        <thead>
            <tr>
                <th scope="col">Güncelle</th>
                <th scope="col">Hasta ID</th>
                <th scope="col">Hasta Adı</th>
                <th scope="col">Hasta Soyadı</th>
                <th scope="col">Reçete Görüntüle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <button class="btn btn-sm" type="button" id="delete_<?php echo "" ?>" style="color: #808080; background:#ffa500; font-weight: bold;">
                        <i class="fa-solid fa-trash"></i>&nbsp;Sil
                    </button>
                    &nbsp;
                    <button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo "" ?>" style="color: #808080; background:#ffa500; font-weight: bold;">
                        <i class="fa-solid fa-pen-to-square"></i>&nbsp;Düzenle
                    </button>
                </td>
                <td>2</td>
                <td>zeynep</td>
                <td>Ayar</td>
                <td><button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color: #808080; background:#ffa500; font-weight: bold;">GÖRÜNTÜLE</button></td>
            </tr>
        </tbody>
    </table>
</div>
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
                            <th scope="col">İlaç Sayısı</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>12.12.2024</td>
                            <td>15 gün</td>
                            <td>Kırmızı</td>
                            <td>12</td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; float: right;">Ne yapacak ?</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Bilgiler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="far fa-id-card"></i></span>
                    <input type="text" class="form-control" placeholder="Verilme Tarihi" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-pencil-alt"></i></span>
                    <input type="text" class="form-control" placeholder="Kullanım Süresi" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                    <input type="text" class="form-control" placeholder="Reçete Rengi" aria-label="Username" aria-describedby="basic-addon1">
                </div>


            </div>
            <button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; float: right;">KAYDET</button>
        </div>
    </div>
</div>
</div>
</body>

</html>