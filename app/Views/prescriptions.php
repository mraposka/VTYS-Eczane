<?php include ("header.php"); ?>
<div class="table">
    <table class="table  table-hover" style="background:#f2f2f2;">
        <thead>
            <tr>
                <th scope="col">Hasta ID</th>
                <th scope="col">Hasta Adı</th>
                <th scope="col">Hasta Soyadı</th>
                <th scope="col">Reçete Görüntüle</th>
                <th scope="col">Reçete Sil</th>
            </tr>
        </thead>
        <tbody id="presTable">
            <?php
            // Pres_id'ye göre kayıtları grupla
            $groupedPrescs = [];
            foreach ($prescs as $pres) {
                $groupedPrescs[$pres->pres_id][] = $pres;
            }

            // Her grup için sadece bir satır ekle
            foreach ($groupedPrescs as $presGroup) {
                $pres = $presGroup[0]; // Her grup için ilk öğeyi al
            
                // Satır ekle
                echo "<tr id='{$pres->pres_id}'>";
                echo "<td id='presTable_pat_id'>{$pres->patient_id}</td>";
                echo "<td>{$patients[$pres->patient_id]['p_name']}</td>";
                echo "<td>{$patients[$pres->patient_id]['p_surname']}</td>";
                echo "<td><button onclick='changeCurrentPresID($pres->pres_id)' class='btn btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#staticBackdrop' style='color: #808080; background:#ffa500; font-weight: bold;'>GÖRÜNTÜLE</button></td>";
                echo "<td>";
                echo "<button class='btn btn-sm' type='button' onclick='delPres($pres->pres_id)' style='color: #808080; background:#ffa500; font-weight: bold;'>";
                echo "<i class='fa-solid fa-trash'></i>&nbsp;Sil</button>&nbsp;";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>

    </table>
</div>
<div id="notif"></div>
<script>
    function showSnackbar(btnid, text, status) {
        var notifDiv = document.getElementById("notif");
        if (status == 1) {
            var circle = "check-circle.svg";
            document.documentElement.style.setProperty('--notification-primary', '#aaec8a');
        } else {
            var circle = "cross-circle.svg";
            document.documentElement.style.setProperty('--notification-primary', '#ed3b32');
        }
        console.log(circle);
        var notificationContent = `
            <div class="notification">
              <div class="notification__body">
                <img src="<?php echo base_url('ViewAssets/') ?>images/` + circle + `" alt="Success" class="notification__icon">
                ` + text + ` &#128640;
              </div>
              <div class="notification__progress"></div>
            </div>
          `;
        notifDiv.innerHTML = notificationContent;
    }
    var currentPresID = -1;
    function changeCurrentPresID(id) {
        currentPresID = id;
        var table = document.getElementById("innerPresTable");
        var rows = table.getElementsByTagName("tr");
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var rowId = row.getAttribute("id");
            if (rowId != "inner_" + currentPresID) {
                row.style.display = "none";
            } else {
                row.style.display = "table-row";
            }
        }
    }
    function delPres(id) {
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
        var _URL = base_url + "/PresDel";
        $.ajax({
            type: "POST",
            url: _URL,
            data: {
                id: id
            },
            success: function (result) {
                showSnackbar("NULL", "Reçete Başarıyla Silindi!", 1);
                document.getElementById("receteKapatBtn").click();
                var table = document.getElementById("presTable");
                var rows = table.getElementsByTagName("tr");
                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var rowId = row.getAttribute("id");
                    if (rowId == id)
                        row.remove();
                }
            },
            error: function (result) {
                showSnackbar("NULL", "Reçete Silinirken Bir Hata Oluştu!", 0);
                document.getElementById("receteKapatBtn").click();
            }
        });
    }
    function addCart() {
        var items = "";
        var table = document.getElementById("innerPresTable");
        var rows = table.getElementsByTagName("tr");

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var rowId = row.getAttribute("id");

            // İlgili parent id'ye sahip satırları bul
            if (rowId === "inner_" + currentPresID) {
                var tds = row.getElementsByTagName("td");

                // Her bir <td> öğesini kontrol et
                for (var j = 0; j < tds.length; j++) {
                    var td = tds[j];

                    // İlgili <td> öğesinin id'sini kontrol et
                    if (td.id === "ilacId" || td.id === "ilacSay") {
                        items += td.className + "=";
                        console.log(td.className);
                    }

                }
                items += "-"; // Bir satır bittiğinde yeni satıra geçmek için <br> ekle
            }
        } items += document.getElementById("presTable_pat_id").innerHTML + "=id"
        items = items.replaceAll("=-", "-");
        var base_url = window.location.origin + "/" + window.location.pathname.split("/")[1];
        var _URL = base_url + "/AddCart";
        $.ajax({
            type: "POST",
            url: _URL,
            data: {
                items: items,
                pres_id: currentPresID
            },
            success: function (result) {
                showSnackbar("NULL", "Reçete Başarıyla Sepete Eklendi!", 1);
                document.getElementById("receteKapatBtn").click();
                console.log(items);
            },
            error: function (result) {
                showSnackbar("NULL", "Reçete Sepete Eklenirken Bir Hata Oluştu!", 0);
                document.getElementById("receteKapatBtn").click();
            }
        });
    }
</script>
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
                            <th scope="col">İlaç Adı</th>
                            <th scope="col">İlaç Sayısı</th>
                        </tr>
                    </thead>
                    <tbody id="innerPresTable">
                        <?php foreach ($prescs as $pres): ?>
                            <tr id="inner_<?php echo $pres->pres_id; ?>">
                                <th scope="row"><?php echo $pres->pres_id; ?></th>
                                <td><?php echo $pres->pres_date; ?></td>
                                <td><?php echo $pres->usage_time; ?></td>
                                <td><?php echo $pres->pres_color; ?></td>
                                <td id="ilacId" class="<?php echo $pres->medicine_id; ?>">
                                    <?php foreach ($medicines as $medicine):
                                        if ($medicine->medicine_id == $pres->medicine_id)
                                            echo $medicine->name;
                                    endforeach; ?>
                                </td>
                                </td>
                                <td id="ilacSay" class="<?php echo $pres->med_total; ?>"><?php echo $pres->med_total; ?>
                                </td>
                            </tr>
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


<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Bilgiler</h5>
                <button type="button" id="receteKapatBtn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="far fa-id-card"></i></span>
                    <input type="text" class="form-control" placeholder="Verilme Tarihi" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> <i class="fas fa-pencil-alt"></i></span>
                    <input type="text" class="form-control" placeholder="Kullanım Süresi" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-pencil-alt"></i></span>
                    <input type="text" class="form-control" placeholder="Reçete Rengi" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
            <button class="btn btn-sm"
                style="color: #808080; background:#ffa500; font-weight: bold; float: right;">KAYDET</button>
        </div>
    </div>
</div>
</div>
</body>

</html>