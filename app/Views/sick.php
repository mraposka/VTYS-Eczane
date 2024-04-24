<?php include("header.php"); ?>
<div class="table">
    <table class="table  table-hover" style="background:#f2f2f2;">
        <thead>
            <tr>
                <th scope="col">Hasta ID</th>
                <th scope="col">TCKNO</th>
                <th scope="col">Ad</th>
                <th scope="col">Soyad</th>
                <th>Cinsiyet</th>
                <th scope="col">Doğum Tarihi</th>
                <th scope="col">Adres</th>
                <th scope="col">Bilgileri Düzenle</th>
                <th scope="col">Reçete Görüntüle</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patient as $patient) : ?>
                <tr>
                    <td><?php echo $patient->patient_id; ?></td>
                    <td><?php echo $patient->p_name; ?></td>
                    <td><?php echo $patient->p_surname; ?></td>
                    <td><?php echo $patient->gender; ?></td>
                    <td><?php echo $patient->dob; ?></td>
                    <td><?php echo $patient->address; ?></td>
                    <td><?php echo $patient->tckno; ?></td>
                    <td><button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" style="color: #808080; background:#ffa500; font-weight: bold; ">DÜZENLE</button></td>
                    <td><button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color: #808080; background:#ffa500; font-weight: bold;">GÖRÜNTÜLE</button></td>
                </tr>
            <?php endforeach; ?>

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
                    <input type="text" class="form-control" placeholder="TCKNO" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-pencil-alt"></i></span>
                    <input type="text" class="form-control" placeholder="AD" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                    <input type="text" class="form-control" placeholder="SOYAD" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                    <input type="text" class="form-control" placeholder="DOĞUM TARİHİ" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" class="form-control" placeholder="ADRES" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-restroom"></i></span>
                        <select class="form-select w-50" style="color: #808080;" aria-label="Default select example">
                            <option selected>Cinsiyet seçin...</option>
                            <option value="1">Kadın &#x1F6BA;</option>
                            <option value="2">Erkek &#x1F6BB;</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; float: right;">KAYDET</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>