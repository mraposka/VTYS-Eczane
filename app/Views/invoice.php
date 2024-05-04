<?php include ("header.php"); ?>
<div class="input-group input-group-sm mb-3" style="margin-top:130px; width:250px; float:right; margin-right: 203px">
    <input type="text" class="form-control form-control-sm" placeholder="Aramak istediğiniz şeyi giriniz."
        aria-label="Recipient's username" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary btn-sm" style="color: #808080; background:#ffa500; font-weight: bold; "
        type="button" id="button-addon2">Button</button>
</div>
<div class="table">
    <table class="table table-hover" style="background:#f2f2f2;">
        <thead>
            <tr>
                <th scope="col">Fatura ID</th>
                <th scope="col">TCKNO</th>
                <th scope="col">Müşteri Adı Soyadı</th>
                <th scope="col">Faturalandırılma Tarihi</th>
                <th scope="col">Toplam Fiyat</th>
                <th scope="col">Fatura Görüntüle</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bills as $bill): ?>
                <tr>
                    <td><?= $bill->bill_id ?></td>
                    <td><?= $bill->tckno ?></td>
                    <td><?= $bill->patient_name ?></td>
                    <td><?= $bill->date ?></td> 
                    <td><?= $bill->total_price ?></td>
                    <td>
                        <button class="btn btn-sm" type="button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop<?= $bill->pres_id ?>"
                            style="color: #808080; background:#ffa500; font-weight: bold;">GÖRÜNTÜLE</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!--MODAL FORM PRES-->
<?php foreach ($bills as $bill): ?>
    <div class="modal fade" id="staticBackdrop<?= $bill->pres_id ?>" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <th scope="col">İlaç Adı</th>
                                <th scope="col">İlaç Sayısı</th>
                            </tr>
                        </thead>
                        <tbody id="innerPresTable">
                            <?php foreach ($prescs as $pres): ?>
                                <?php if ($pres->pres_id == $bill->pres_id) { ?>
                                    <tr id="inner_<?php echo $pres->pres_id; ?>">
                                        <th scope="row"><?php echo $pres->pres_id; ?></th>
                                        <td><?php echo $pres->pres_date; ?></td>
                                        <td><?php echo $pres->usage_time; ?></td>
                                        <td><?php echo $pres->pres_color; ?></td>
                                        <td id="ilacId">
                                            <?php foreach ($medicines as $medicine):
                                                if ($medicine->medicine_id == $pres->medicine_id)
                                                    echo $medicine->name; endforeach; ?>
                                        </td>
                                        <td id="ilacSay"><?php echo $pres->med_total; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php endforeach; ?>

                        </tbody>


                    </table>
                    <button onclick="addCart()" class="btn btn-sm"
                        style="color: #808080; background:#ffa500; font-weight: bold; "><i
                            class="fa-solid fa-cart-shopping"></i>&nbsp;Sepete Ekle</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</body>

</html>