<?php include ("header.php"); ?>
<div class="input-group input-group-sm mb-3" style="margin-top:130px; width:250px; float:right; margin-right: 203px">
    <input type="text" class="form-control form-control-sm" placeholder="Aramak istediğiniz şeyi giriniz."
        aria-label="Recipient's username" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; "
        type="button" id="button-addon2">Button</button>
</div>
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
                <td><button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        style="color: #808080; background:#ffa500; font-weight: bold;">GÖRÜNTÜLE</button></td>
            </tr>
        </tbody>
    </table>
</div>

<!--MODAL FORM PRES-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <button class="btn btn-sm"
                    style="color: #808080; background:#ffa500; font-weight: bold; float: right;">Ne yapacak
                    ?</button>
            </div>
        </div>
    </div>
</div>


</body>

</html>