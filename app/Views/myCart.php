<?php include ("header.php"); ?>
<div class="table ">

    <table class="table  table-hover" style="background:#f2f2f2;">
        <thead>
            <tr>
                <th scope="col">Hasta Adı</th>
                <th scope="col">İlaç Adı</th>
                <th scope="col">Adeti</th>
                <th scope="col">Fiyatı</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($items != "0")
                foreach ($items as $ilacID => $ilacSayisi) { ?>
                    <tr>
                        <td scope="row"><?php echo $pat; ?></td>
                        <td><?php foreach ($medicines as $medicine)
                            if ($medicine->medicine_id == $ilacID)
                                echo $medicine->name; ?>
                        </td>
                        <td><?php echo $ilacSayisi; ?></td>
                        <td id="ilacFiyat"><?php foreach ($medicines as $medicine)
                            if ($medicine->medicine_id == $ilacID)
                                echo ($medicine->price * $ilacSayisi); ?>
                            TL</td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <div class="row"><a style="font-size:20pt;font-weight: bold; float:right;" id="toplamFiyat"></a></div>
    <div class="row" style="float:right;"><button class="btn btn-lg"
            style="color: #808080; background:#ffa500; font-weight: bold; float:right;">Alışverişi
            Tamamla</button></div>
</div>
<script>
      $(document).ready(function () {
        toplamFiyat();
    });
    function toplamFiyat() {
        var toplamFiyat = 0;
        document.querySelectorAll('#ilacFiyat').forEach(function (ilacFiyat) {
            var fiyat = parseFloat(ilacFiyat.innerText.replace(' TL', ''));
            toplamFiyat += fiyat;
        });
        document.getElementById("toplamFiyat").innerHTML = "Toplam Tutar:" + toplamFiyat;
    }
</script>
<!---
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                İLAÇLAR
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
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
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                İLAÇ KULLANIM TALİMATI
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
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
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                İLAÇ FİYATLARI
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
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
                <button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold;">SEPETİ
                    SİL</button>
                <button class="btn btn-sm" style="color: #808080; background:#ffa500; font-weight: bold;">SATIN
                    AL</button>
            </div>
        </div>
    </div>
</div>--->
</body>
<script>
    $(document).ready(function () {

    });

</script>

</html>