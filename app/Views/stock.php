<?php include("header.php"); ?>
<div class="table">
    <table class="table  table-hover" style="background:#f2f2f2;">
        <thead>
            <tr>
                <th scope="col">İlaç ID</th>
                <th scope="col">İlaç Adı</th>
                <th scope="col">Stok Adedi</th>
                <th scope="col">Kategori</th>
                <th scope="col">Düzenle</th>
                <th scope="col">Sil</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($stock as $stocks) : ?>
                <tr>
                    <td><?php echo $stocks->medicine_id; ?></td>
                    <td><?php echo print("ilaç adı çekilecek") ?></td>
                    <td><?php echo $stocks->piece; ?></td>
                    <td><?php echo $stocks->category_id; ?></td>
                    <td><button class="btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color: #808080; background:#ffa500; font-weight: bold;">Düzenle</button></td>
                    <td><button class="btn btn-sm" type="button" id="delete_ <?php echo $stocks->stock_id; ?>" style="color: #808080; background:#ffa500; font-weight: bold; ">Sil</button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Stok Güncelleme</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="StockAdder">
                    <!-- Stok Girişi -->
                    <div class="input-group mb-3">
                        <input type="text" name="Stok" class="form-control form-control-lg bg-light fs-6" placeholder="Güncel stok adedini girin." />
                    </div>
                    <!-- İlaç Seçimi -->
                    <div class="input-group mb-3">
                        <select class="form-select" name="ilac" aria-label="İlaç seçiniz">
                            <option selected disabled>İlaç seçiniz.</option>
                            <?php foreach ($medicines as $medicines) : ?>
                                <option name="id" value="<?php echo $medicines->medicine_id; ?>"><?php echo $medicines->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Form gönderme düğmesi -->
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-custom btn-lg w-100 fs-6" style="background-color: #ffa500; color: white; font-weight: bold;">EKLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>